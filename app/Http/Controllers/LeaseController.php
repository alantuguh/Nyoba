<?php

namespace App\Http\Controllers;

use App\Enums\RoomStatus;
use App\Http\Requests\StoreLeaseRequest;
use App\Http\Requests\UpdateLeaseRequest;
use App\Models\Lease;
use App\Models\Room;
use App\Models\Tenant;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class LeaseController extends Controller
{
    public function index(Request $request): View
    {
        $statusFilter = $request->query('status');

        $leases = Lease::query()
            ->with(['tenant.user', 'room'])
            ->when(
                in_array($statusFilter, ['aktif', 'selesai', 'dibatalkan'], true),
                fn ($query) => $query->where('status', $statusFilter)
            )
            ->latest('start_date')
            ->get();

        $summary = [
            'total' => Lease::count(),
            'aktif' => Lease::where('status', 'aktif')->count(),
            'selesai' => Lease::where('status', 'selesai')->count(),
            'dibatalkan' => Lease::where('status', 'dibatalkan')->count(),
        ];

        return view('leases.index', compact('leases', 'summary', 'statusFilter'));
    }

    public function create(): View
    {
        $availableRooms = Room::where('status', 'kosong')
            ->orderBy('room_number')
            ->get();

        $tenants = Tenant::with('user')
            ->get()
            ->sortBy(fn (Tenant $tenant) => $tenant->user?->name ?? '');

        return view('leases.create', compact('availableRooms', 'tenants'));
    }

    public function store(StoreLeaseRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $lease = DB::transaction(function () use ($validated): Lease {
            $lease = Lease::create($validated);

            if ($lease->status === 'aktif') {
                Room::whereKey($lease->room_id)->update([
                    'status' => RoomStatus::Occupied->value, // 'terisi'
                ]);
            }

            return $lease;
        });

        return redirect()
            ->route('leases.show', $lease)
            ->with('success', 'Kontrak sewa berhasil dibuat dan status kamar telah diperbarui.');
    }

    public function show(Lease $lease): View
    {
        $lease->load(['tenant.user', 'room.masterItems']);

        return view('leases.show', compact('lease'));
    }

    public function edit(Lease $lease): View
    {
        $lease->load(['tenant.user', 'room']);

        $availableRooms = Room::query()
            ->where('status', 'kosong')
            ->orWhere('id', $lease->room_id)
            ->orderBy('room_number')
            ->get();

        $tenants = Tenant::with('user')
            ->get()
            ->sortBy(fn (Tenant $tenant) => $tenant->user?->name ?? '');

        return view('leases.edit', compact('lease', 'availableRooms', 'tenants'));
    }

    public function update(UpdateLeaseRequest $request, Lease $lease): RedirectResponse
    {
        $validated = $request->validated();

        DB::transaction(function () use ($lease, $validated): void {
            $oldRoomId = (int) $lease->room_id;
            $newRoomId = (int) $validated['room_id'];
            $newStatus = $validated['status'];

            $lease->update($validated);

            if ($oldRoomId !== $newRoomId) {
                $oldRoomStillHasActiveLease = Lease::query()
                    ->where('room_id', $oldRoomId)
                    ->where('id', '!=', $lease->id)
                    ->where('status', 'aktif')
                    ->exists();

                if (! $oldRoomStillHasActiveLease) {
                    Room::whereKey($oldRoomId)->update([
                        'status' => RoomStatus::Available->value, // 'kosong'
                    ]);
                }

                if ($newStatus === 'aktif') {
                    Room::whereKey($newRoomId)->update([
                        'status' => RoomStatus::Occupied->value, // 'terisi'
                    ]);
                } else {
                    $newRoomStillHasActiveLease = Lease::query()
                        ->where('room_id', $newRoomId)
                        ->where('id', '!=', $lease->id)
                        ->where('status', 'aktif')
                        ->exists();

                    if (! $newRoomStillHasActiveLease) {
                        Room::whereKey($newRoomId)->update([
                            'status' => RoomStatus::Available->value, // 'kosong'
                        ]);
                    }
                }

                return;
            }

            if ($newStatus === 'aktif') {
                Room::whereKey($newRoomId)->update([
                    'status' => RoomStatus::Occupied->value, // 'terisi'
                ]);
            } elseif (in_array($newStatus, ['selesai', 'dibatalkan'], true)) {
                $roomStillHasOtherActiveLease = Lease::query()
                    ->where('room_id', $newRoomId)
                    ->where('id', '!=', $lease->id)
                    ->where('status', 'aktif')
                    ->exists();

                if (! $roomStillHasOtherActiveLease) {
                    Room::whereKey($newRoomId)->update([
                        'status' => RoomStatus::Available->value, // 'kosong'
                    ]);
                }
            }
        });

        return redirect()
            ->route('leases.show', $lease)
            ->with('success', 'Kontrak sewa dan status kamar berhasil diperbarui.');
    }

    public function destroy(Lease $lease): RedirectResponse
    {
        DB::transaction(function () use ($lease): void {
            $roomId = (int) $lease->room_id;
            $wasActive = $lease->status === 'aktif';

            $lease->delete();

            if ($wasActive) {
                $roomStillHasOtherActiveLease = Lease::query()
                    ->where('room_id', $roomId)
                    ->where('status', 'aktif')
                    ->exists();

                if (! $roomStillHasOtherActiveLease) {
                    Room::whereKey($roomId)->update([
                        'status' => RoomStatus::Available->value, // 'kosong'
                    ]);
                }
            }
        });

        return redirect()
            ->route('leases.index')
            ->with('success', 'Data kontrak sewa berhasil dihapus dan status kamar telah disesuaikan.');
    }
}
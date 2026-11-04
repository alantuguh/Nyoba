<?php

namespace App\Http\Controllers;

use App\Enums\UserRole;
use App\Http\Requests\StoreTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TenantController extends Controller
{
    public function index(): View
    {
        $tenants = Tenant::query()
            ->with([
                'user',
                'leases' => fn ($query) => $query->with('room')->latest('start_date'),
                'activeLease.room',
            ])
            ->latest()
            ->get();

        return view('tenants.index', compact('tenants'));
    }

    public function create(): View
    {
        $availableUsers = User::query()
            ->where('role', UserRole::Tenant->value)
            ->whereDoesntHave('tenant')
            ->orderBy('name')
            ->get();

        return view('tenants.create', compact('availableUsers'));
    }

    public function store(StoreTenantRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $tenant = DB::transaction(function () use ($validated): Tenant {
            $tenant = Tenant::create($validated);

            User::whereKey($validated['user_id'])->update([
                'phone' => $validated['phone'],
            ]);

            return $tenant;
        });

        return redirect()
            ->route('tenants.show', $tenant)
            ->with('success', 'Profil penghuni berhasil ditambahkan.');
    }

    public function show(Tenant $tenant): View
    {
        $tenant->load([
            'user',
            'activeLease.room',
            'leases' => fn ($query) => $query->with('room')->latest('start_date'),
        ]);

        return view('tenants.show', compact('tenant'));
    }

    public function edit(Tenant $tenant): View
    {
        $tenant->load('user');

        $availableUsers = User::query()
            ->where('role', UserRole::Tenant->value)
            ->where(function ($query) use ($tenant) {
                $query->whereDoesntHave('tenant')
                    ->orWhere('id', $tenant->user_id);
            })
            ->orderBy('name')
            ->get();

        return view('tenants.edit', compact('tenant', 'availableUsers'));
    }

    public function update(UpdateTenantRequest $request, Tenant $tenant): RedirectResponse
    {
        $validated = $request->validated();

        DB::transaction(function () use ($tenant, $validated): void {
            $tenant->update($validated);

            User::whereKey($validated['user_id'])->update([
                'phone' => $validated['phone'],
            ]);
        });

        return redirect()
            ->route('tenants.show', $tenant)
            ->with('success', 'Data penghuni berhasil diperbarui.');
    }

    public function destroy(Tenant $tenant): RedirectResponse
    {
        if ($tenant->leases()->where('status', 'aktif')->exists()) {
            return redirect()
                ->route('tenants.index')
                ->with('error', 'Penghuni tidak dapat dihapus karena masih memiliki kontrak sewa yang berstatus aktif.');
        }

        DB::transaction(function () use ($tenant): void {
            $tenant->delete();
        });

        return redirect()
            ->route('tenants.index')
            ->with('success', 'Data penghuni berhasil dihapus.');
    }
}
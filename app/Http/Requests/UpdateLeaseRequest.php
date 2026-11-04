<?php

namespace App\Http\Requests;

use App\Enums\RoomStatus;
use App\Models\Lease;
use App\Models\Room;
use Closure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLeaseRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isOwner() ?? true;
    }

    public function rules(): array
    {
        /** @var Lease|null $lease */
        $lease = $this->route('lease');
        $currentRoomId = $lease instanceof Lease ? (int) $lease->room_id : null;

        return [
            'tenant_id' => [
                'required',
                'integer',
                Rule::exists('tenants', 'id')->whereNull('deleted_at'),
            ],
            'room_id' => [
                'required',
                'integer',
                Rule::exists('rooms', 'id')->whereNull('deleted_at'),
                function (string $attribute, mixed $value, Closure $fail) use ($currentRoomId): void {
                    $newRoomId = (int) $value;
                    $requestedStatus = $this->input('status');

                    if ($newRoomId !== $currentRoomId && $requestedStatus === 'aktif') {
                        $isAvailable = Room::query()
                            ->whereKey($newRoomId)
                            ->where('status', RoomStatus::Available->value)
                            ->exists();

                        if (! $isAvailable) {
                            $fail('Kamar pengganti yang dipilih sedang terisi atau butuh perbaikan.');
                        }
                    }
                },
            ],
            'start_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after:start_date'],
            'deposit_amount' => ['required', 'numeric', 'min:0'],
            'status' => ['required', 'string', Rule::in(['aktif', 'selesai', 'dibatalkan'])],
        ];
    }

    public function messages(): array
    {
        return [
            'tenant_id.required' => 'Penghuni wajib dipilih.',
            'tenant_id.exists' => 'Data penghuni tidak valid atau tidak ditemukan.',
            'room_id.required' => 'Kamar kos wajib dipilih.',
            'room_id.exists' => 'Kamar kos tidak ditemukan.',
            'start_date.required' => 'Tanggal mulai sewa (check-in) wajib diisi.',
            'start_date.date' => 'Format tanggal mulai sewa tidak valid.',
            'end_date.required' => 'Tanggal berakhir sewa (check-out) wajib diisi.',
            'end_date.date' => 'Format tanggal berakhir sewa tidak valid.',
            'end_date.after' => 'Tanggal berakhir sewa wajib setelah tanggal mulai sewa.',
            'deposit_amount.required' => 'Nominal uang deposit wajib diisi.',
            'deposit_amount.numeric' => 'Nominal uang deposit harus berupa angka.',
            'deposit_amount.min' => 'Nominal uang deposit tidak boleh kurang dari Rp 0.',
            'status.required' => 'Status kontrak sewa wajib dipilih.',
            'status.in' => 'Status kontrak sewa harus salah satu dari: aktif, selesai, atau dibatalkan.',
        ];
    }
}
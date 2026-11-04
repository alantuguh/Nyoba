<?php

namespace App\Http\Requests;

use App\Enums\UserRole;
use App\Http\Requests\Auth\RegisterTenantRequest;
use App\Models\Tenant;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateTenantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isOwner() ?? true;
    }

    public function rules(): array
    {
        $tenant = $this->route('tenant');
        $tenantId = $tenant instanceof Tenant ? $tenant->id : $tenant;

        return [
            'user_id' => [
                'required',
                'integer',
                Rule::exists('users', 'id')
                    ->where('role', UserRole::Tenant->value)
                    ->whereNull('deleted_at'),
                Rule::unique('tenants', 'user_id')
                    ->ignore($tenantId)
                    ->whereNull('deleted_at'),
            ],
            'phone' => [
                'required',
                'string',
                'max:20',
                'regex:' . (defined(RegisterTenantRequest::class . '::PHONE_REGEX')
                    ? RegisterTenantRequest::PHONE_REGEX
                    : StoreTenantRequest::PHONE_REGEX),
            ],
            'identity_number' => ['nullable', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:500'],
            'emergency_contact' => ['nullable', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'user_id.required' => 'Akun pengguna (user) penghuni wajib dipilih.',
            'user_id.exists' => 'Akun pengguna tidak ditemukan atau bukan ber-role penghuni (tenant).',
            'user_id.unique' => 'Akun pengguna ini sudah digunakan oleh profil penghuni lain.',
            'phone.required' => 'Nomor telepon/WhatsApp wajib diisi.',
            'phone.regex' => 'Format nomor telepon/WhatsApp tidak valid (contoh: 081234567890).',
            'phone.max' => 'Nomor telepon/WhatsApp maksimal 20 karakter.',
            'identity_number.max' => 'Nomor identitas (KTP/KTM) maksimal 30 karakter.',
            'address.max' => 'Alamat asal maksimal 500 karakter.',
            'emergency_contact.max' => 'Kontak darurat maksimal 100 karakter.',
        ];
    }
}
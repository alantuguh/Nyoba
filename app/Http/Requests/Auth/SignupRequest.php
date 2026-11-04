<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use App\Enums\UserRole;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

/**
 * Pendaftaran mandiri (publik, tanpa login) untuk Pemilik Kos atau Penghuni.
 * Role hanya boleh 'owner' atau 'tenant' (lihat UserRole::values()).
 */
class SignupRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'role' => ['required', Rule::in(UserRole::values())],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'phone' => ['required', 'string', 'regex:'.RegisterTenantRequest::PHONE_REGEX],
            'password' => ['required', 'confirmed', Password::min(8)],
            'device_name' => ['nullable', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return RegisterTenantRequest::sharedMessages() + [
            'role.required' => 'Pilih daftar sebagai pemilik kos atau penghuni.',
            'role.in' => 'Pilihan peran tidak valid.',
        ];
    }
}

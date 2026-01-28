<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreKaryawanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('create karyawan');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nama' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:255', 'unique:karyawan,nip'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:karyawan,email'],
            'phone' => ['nullable', 'string', 'max:20'],
            'jabatan' => ['required', 'string', 'max:255'],
            'departemen' => ['required', 'string', 'max:255'],
            'tanggal_masuk' => ['required', 'date'],
            'status' => ['required', 'in:active,inactive'],
            'user_id' => ['nullable', 'exists:users,id'],
        ];
    }
}

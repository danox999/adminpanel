<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateKaryawanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('edit karyawan');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $karyawan = $this->route('karyawan');
        $karyawanId = $karyawan instanceof \App\Models\Karyawan ? $karyawan->id : $karyawan;

        return [
            'nama' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:255', Rule::unique('karyawan', 'nip')->ignore($karyawanId)],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('karyawan', 'email')->ignore($karyawanId)],
            'phone' => ['nullable', 'string', 'max:20'],
            'jabatan' => ['required', 'string', 'max:255'],
            'departemen' => ['required', 'string', 'max:255'],
            'tanggal_masuk' => ['required', 'date'],
            'status' => ['required', 'in:active,inactive'],
            'user_id' => ['nullable', 'exists:users,id'],
        ];
    }
}

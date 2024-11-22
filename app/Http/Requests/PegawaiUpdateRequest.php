<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PegawaiUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $pegawaiId = $this->route('pegawai');

        return [
            'nama' => 'required|string|max:255',
            'email' => "required|email|unique:pegawai,email,{$pegawaiId}|max:255",
            'telepon' => 'required|string|regex:/^[0-9]+$/|max:15',
            'alamat' => 'nullable|string',
            'tanggal_lahir' => 'required|date|before:today',
            'jenis_kelamin' => 'required|in:L,P',
            'jabatan' => 'required|string|max:100',
            'tanggal_masuk' => 'required|date|before_or_equal:today',
            'gaji' => 'required|numeric|min:0',
            'status' => 'required|in:Aktif,Nonaktif',
        ];
    }
}

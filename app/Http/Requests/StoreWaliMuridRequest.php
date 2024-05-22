<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreWaliMuridRequest extends FormRequest
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
        return [
            'slug' => 'nullable|string|max:255',
            'user_id' => 'required|uuid|exists:users,id',
            'alamat' => 'required|string|max:255',
            'nama' => 'nullable|string|max:255',
            'nik' => 'nullable|string|max:255',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'agama' => 'nullable|string|max:255',
            'pekerjaan' => 'nullable|string|max:255',
            'no_hp' => 'nullable|string|max:255',
            'pendidikan' => 'nullable|string|max:255',
            'pendapatan' => 'nullable|string|max:255',
            'avatar' => 'required|string|max:255',
            'kewarganegaraan' => 'required|string|max:255',
        ];
    }
}

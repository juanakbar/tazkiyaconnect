<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WaliMuridResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'user_id' => $this->user_id,
            'alamat' => $this->alamat,
            'nama' => $this->nama,
            'nik' => $this->nik,
            'tempat_lahir' => $this->tempat_lahir,
            'tanggal_lahir' => $this->tanggal_lahir,
            'agama' => $this->agama,
            'pekerjaan' => $this->pekerjaan,
            'no_hp' => $this->no_hp,
            'pendidikan' => $this->pendidikan,
            'pendapatan' => $this->pendapatan,
            'avatar' => $this->avatar,
            'kewarganegaraan' => $this->kewarganegaraan,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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

            'nama_produk' => $this->name,

            'harga' => 'Rp. ' . number_format($this->price),

            // menampilkan relasi
            'kategory' => $this->category
        ];
    }
}

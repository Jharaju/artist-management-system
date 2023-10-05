<?php

namespace App\Http\Resources\Artist;

use Illuminate\Http\Resources\Json\JsonResource;

class ArtistResourcePagination extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "artist" => [
                "id"      => $this->id,
            "name"    => $this->name,
            "dob"  => $this->area,
            "gender" => $this->employee,
            "address" => $this->address,
            "first_release_year" => $this->first_release_year,
            "no_of_albums_released" => $this->no_of_albums_released
            ],
            'pageno' => $this->pageno,
            'total_pages' => $this->total_pages
        ];
    }
}

<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResourcePagination extends JsonResource
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
            'user' => [
                "id"              => $request->id,
                "first_name"      => $this->first_name,
                "last_name"    => $this->last_name,
                "email"  => $this->email,
                "phone" => $this->phone,
                "dob" => $this->dob,
                "gender" => $this->gender,
                "address" => $this->address
            ],
            'pageno' => $this->pageno,
            'total_pages' => $this->total_pages
        ];
    }
}

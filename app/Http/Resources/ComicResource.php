<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ComicResource extends JsonResource
//Resources are templates for youre data when you want to show how you want the JSON data
// to be displayed to the user when they make an API request.
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'genre' => $this->genre,
            'author' => $this->author,
            'illustrator' => $this->illustrator,
            'issues' => $this->issues,
            'distributor_id' => $this->distributor->id,
            'distributor_name' => $this->distributor->name,
            'distributor_biograpghy' => $this->distributor->biography
        ];
    }
}

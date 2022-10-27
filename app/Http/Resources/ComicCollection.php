<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ComicCollection extends ResourceCollection
//collection class helps with return more than one resource, ie: multiple comics
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'version' => '1.0.0',
            'author' => 'AdamZ',
        ];
    }
}

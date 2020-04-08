<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Book extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'pages' => $this->pages,
            'ISBN' => $this->ISBN,
            'price' => $this->price,
            'published_at' => $this->published_at,
            'categories' => CategoryResource::collection($this->whenLoaded('categories'))
        ];
    }
}

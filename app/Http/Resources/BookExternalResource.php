<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class BookExternalResource extends JsonResource
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
            'name' => $this->name,
            'isbn' => $this->isbn,
            'authors' => $this->authors,
            'number_of_pages' => $this->numberOfPages,
            'publisher' => $this->publisher,
            'country' => $this->country,
            'release_date' => Carbon::parse($this->released)->format('Y-m-d')
        ];
    }
}

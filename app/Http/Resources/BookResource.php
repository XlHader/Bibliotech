<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "title" => $this->title,
            "author" => $this->author,
            "number_pages" => $this->number_pages,
            "icon" => $this->icon,
            "isbn_code" => $this->isbn_code,
            "category_id" => $this->category_id,
            "is_avaible" => $this->is_avaible,
            "loans" => $this->loans()->withPivot('id')->get()->map(function($loan) {
                return [
                    'id' => $loan->pivot->id,
                    'client_id' => $loan->id,
                    'book_id' => $loan->pivot->book_id
                ];
            })
        ];
    }
}
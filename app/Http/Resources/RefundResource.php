<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RefundResource extends JsonResource
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
            'loan' => $this->loan,
            'days_of_delay' => $this->days_of_delay,
            'penalty' => $this->penalty,
            'refund_date' => $this->refund_date,
            'created_at' => $this->created_at
        ];
    }
}

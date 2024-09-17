<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RemittancesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'num_Remitten'=>$this->num_Remitten,
            'sending_Office'=>$this->sending_Office,
            'Future_Office'=>$this->Future_Office,
            'Amount_Trens'=>$this->Amount_Trens,
            'date'=>$this->date,

        ];
    }
}

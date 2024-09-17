<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OfficarResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
      //  return parent::toArray($request);
      return[
        'id'=>$this->id,
        'Office_Name'=>$this->Office_Name,
        'address'=>$this->address,
        'Country'=>$this->Country,
        'current_balance'=>$this->current_balance,
 
      ];
    }
}

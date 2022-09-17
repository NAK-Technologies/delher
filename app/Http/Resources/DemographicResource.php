<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DemographicResource extends JsonResource
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
            'dob' => \Carbon\Carbon::parse($this->dob),
            'city_id' => (int)$this->city_id,
            'area' => $this->area,
            'street' => $this->street ?? null,
            'house_no' => $this->house_no ?? null,
            'education' => $this->education,
            'occupation' => $this->occupation,
            'visit_type' => $this->visit_type,
            'exclusively_breastfed' => (bool)$this->exclusively_breastfed,
        ];
    }
}

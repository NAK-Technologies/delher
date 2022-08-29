<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        // dump($request);
        return [
            'id' => $this->id,
            'mr_no' => $this->mr_no,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'contact' => $this->contact,
            'cnic' => $this->cnic,
            'father_name' => $this->father_name,
            'mother_name' => $this->mother_name
        ];
    }
}

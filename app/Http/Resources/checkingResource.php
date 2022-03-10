<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class checkingResource extends JsonResource
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
          'id' => $this->id,
          'stt' => $this->stt,
          'id_staff' => $this->id_staff,
          'date_check' => $this->date_check,
          'time_in' => $this->time_in,
          'time_out' => $this->time_out,
          'temperature' => $this->temperature,
          'created_at' => $this->created_at,
          'updated_at' => $this->updated_at,
      ];
    }
}

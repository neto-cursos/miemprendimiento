<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmprendimientoResource extends JsonResource
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
            'empr_nomb'=>$this->empr_nomb,
            'empr_rubro'=>$this->empr_rubro,
            'empr_tipo'=>$this->empr_tipo
        ];
    }
}

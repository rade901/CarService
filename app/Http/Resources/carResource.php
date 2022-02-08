<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class carResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return 
        [
        'id'=> $this->id,
        'type'=>'car',
        'attributes'=>[
            'mark'=>$this->mark,
            'number_chassis'=>$this->number_chassis,
            'power_kw'=>$this->power_kw,
            'in_trafic'=>$this->in_trafic,
            'created'=>$this->created_at,
            
             
        ]
        
    ];
    }
}

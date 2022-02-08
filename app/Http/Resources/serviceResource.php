<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class serviceResource extends JsonResource
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
        'type'=>'service',
        'attributes'=>[
            'name'=>$this->name,
            'price'=>$this->price,
            'description'=>$this->description,
            'created'=>$this->created_at,
            
             
        ]
        
    ];
    }
}

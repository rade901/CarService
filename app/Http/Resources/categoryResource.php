<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class categoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return   [
            'id'=> $this->id,
            'type'=>'Category',
            'attributes'=>[
                'name'=>$this->name,
                'created_at'=>$this->created_at,
                'updated_at'=>$this->updated_at,
            ]
        
        ];
    }
}

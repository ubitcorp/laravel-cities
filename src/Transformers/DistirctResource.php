<?php

namespace ubitcorp\Cities\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class DistrictResource extends Resource
{ 
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {  
        return [
            'id' => $this->id,
            'city_id' => $this->city_id,
            'name' => $name
        ];
    }
}

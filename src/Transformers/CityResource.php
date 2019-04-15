<?php

namespace ubitcorp\Cities\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class CityResource extends Resource
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
            'country_id' => $this->country_id,
            'div1_code' => $div1_code,
            'div1_name' => $div1_name,
            'div2_code' => $div2_code,
            'div2_name' => $div2_name,
            'name' => $name,
            'lat' => $lang,
            'long' => $long,
            'timezone_id' => $this->timezone_id
        ];
    }
}

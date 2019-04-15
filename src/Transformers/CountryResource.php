<?php

namespace ubitcorp\Cities\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class CountryResource extends Resource
{ 
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        //came from middleware
        $ln = resolve('city_language');
 
        $name = $this->name;

        if(isset($this->translations[$ln]))
        {
            $name = $this->translations[$ln];
        }

        return [
            'id' => $this->id,
            'continent_id' => $this->continent_id,
            'name' => $name,
            'iso2' => $iso2,
            'iso3' => $iso3,
            'phone_code' => $this->phone_code
        ];
    }
}

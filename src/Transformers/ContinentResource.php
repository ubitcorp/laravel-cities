<?php

namespace ubitcorp\Cities\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class ContinentResource extends Resource
{ 
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $name = $this->name;

        $ln = $request->header("Accept-Language") ?? config("cities.language");  

        if(isset($this->translations[$ln]))        
            $name = $this->translations[$ln];
        

        return [
            'id' => $this->id,
            'name' => $name,
            'code' => $this->code
        ];
    }
}

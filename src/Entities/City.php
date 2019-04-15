<?php

namespace ubitcorp\City\Entities;

use Illuminate\Database\Eloquent\Model;
use ubitcorp\City\Traits\HasDistrict;
use ubitcorp\Filter\Traits\Filter;

class City extends Model
{
    use Filter;
    protected $guarded = ["id"];
 
    public function districts(){
        return $this->hasMany(\ubitcorp\City\Entities\District::class);
    }

    public function country(){
        return $this->belongsTo(\ubitcorp\City\Entities\Country::class);
    }
     
}

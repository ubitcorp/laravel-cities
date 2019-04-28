<?php

namespace ubitcorp\Cities\Entities;

use Illuminate\Database\Eloquent\Model;
use ubitcorp\Cities\Traits\HasDistrict;
use ubitcorp\Filter\Traits\Filter;

class City extends Model
{
    use Filter;
    protected $guarded = ["id"];
 
    public function districts(){
        return $this->hasMany(\ubitcorp\Cities\Entities\District::class);
    }

    public function country(){
        return $this->belongsTo(\ubitcorp\Cities\Entities\Country::class);
    }

    public function timezone(){
        return $this->belongsTo(\ubitcorp\Cities\Entities\Timezone::class);
    }    
     
}

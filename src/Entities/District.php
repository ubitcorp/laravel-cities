<?php

namespace ubitcorp\City\Entities;

use Illuminate\Database\Eloquent\Model;
use ubitcorp\Filter\Traits\Filter;

class District extends Model
{
    use Filter;
    protected $guarded = ["id"];

    public function city(){
        return $this->belongsTo(\ubitcorp\City\Entities\City::class);
    }
}

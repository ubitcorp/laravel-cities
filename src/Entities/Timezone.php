<?php

namespace ubitcorp\Cities\Entities;

use Illuminate\Database\Eloquent\Model; 
use ubitcorp\Filter\Traits\Filter;

class Timezone extends Model
{
    use Filter;
    protected $guarded = ["id"];
    public $timestamps = false;
 
    public function cities(){
        return $this->hasMany(\ubitcorp\Cities\Entities\City::class);
    }
 
     
}

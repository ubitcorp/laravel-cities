<?php

namespace ubitcorp\City\Entities;

use Illuminate\Database\Eloquent\Model;
use \ubitcorp\City\Traits\HasTranslations;
use ubitcorp\Filter\Traits\Filter;

class Continent extends Model
{
    use HasTranslations, Filter;

    protected $guarded = ["id"];

    protected $casts = [
        'translations' => 'json',
    ];

    public function countries(){
        return $this->hasMany(\ubitcorp\City\Entities\Country::class);
    }

    public function getNameAttribute(){
        $ln = resolve('city_language');
        return isset($this->translations[$ln]) ? $this->translations[$ln] : $this->attributes["name"];
    }
}

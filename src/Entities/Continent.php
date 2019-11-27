<?php

namespace ubitcorp\Cities\Entities;

use Illuminate\Database\Eloquent\Model;
use \ubitcorp\Cities\Traits\HasTranslations;
use ubitcorp\Filter\Traits\Filter;

class Continent extends Model
{
    use HasTranslations, Filter;

    protected $guarded = ["id"];
    public $timestamps = false;

    protected $casts = [
        'translations' => 'json',
    ];

    public function countries(){
        return $this->hasMany(\ubitcorp\Cities\Entities\Country::class);
    }

    public function getNameAttribute(){
        $ln = resolve('city_language');
        return isset($this->translations[$ln]) ? $this->translations[$ln] : $this->attributes["name"];
    }
}

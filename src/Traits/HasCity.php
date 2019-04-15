<?php

namespace ubitcorp\City\Traits;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use \ubitcorp\City\Entities\City;
use \ubitcorp\City\Entities\CityModel;
use \ubitcorp\City\Exceptions\HasOneCityException;
use Illuminate\Database\Eloquent\Collection;

trait HasCity
{ 
    //this line must be in the model
    //if this is true, the model can have only one city
    //else the model can have multi city
    //protected $hasOneCity = true;    

    public function city() {
        return $this->hasOneThrough(
            City::class, 
            CityModel::class,
            'model_id','id','id','city_id');    //bunu yapana kadar canim cikti..

        //bunda sadece pivot datasi geliyor. city gelmiyordu
        //return $this->morphOne(\ubitcorp\City\Entities\CityModel::class, 'citiable', "model_type", "model_id");
    }

    public function cities(): MorphToMany
    {
        return $this->morphToMany(
            City::class,
            'model',
            'city_model',
            'model_id',
            'city_id'
        );
    }

    public function getCityNameAttribute(){
        return $this->city->name;
    }

    /**
     * Add another city to model 
     *  */     
    public function addCity($city)
    {
        if($this->hasOneCity && $city instanceof Collection)
            throw HasOneCityException::notBeAnArray();

        $this->cities()->sync($city, false);        
        $this->load("cities");
    }    

    /**
     * Remove other city from the model and add this one. 
     *  */        
    public function syncCity($city)
    {
        if($this->hasOneCity && $city instanceof Collection)
            throw HasOneCityException::notBeAnArray();

        $this->cities()->sync($city, true);
        $this->load("cities");
    }

    public function detachCity($city)
    {
        $this->cities()->detach($city);
    }
}
<?php

namespace ubitcorp\Cities\Traits;

use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait HasDistrict
{ 
    public function district() {
        return $this->hasOneThrough(
            \ubitcorp\Cities\Entities\District::class, 
            \ubitcorp\Cities\Entities\DistrictModel::class,
            'model_id','id','id','district_id'); 
    }
 
    public function districts(): MorphToMany
    {
        return $this->morphToMany(
            \ubitcorp\Cities\Entities\District::class,
            'model',
            'district_model',
            'model_id',
            'district_id'
        );
    }


    public function getDistrictNameAttribute(){
        return $this->district->name;
    }    
 

    /**
     * Add another district to model 
     *  */     
    public function addDistrict($district)
    {
        if($this->hasOneDistrict && $district instanceof Collection)
            throw HasOneDistrictException::notBeAnArray();

        $this->districts()->sync($district, false);        
        $this->load("cities");
    }    

    /**
     * Remove other district from the model and add this one. 
     *  */        
    public function syncDistrict($district)
    {
        if($this->hasOneDistrict && $district instanceof Collection)
            throw HasOneDistrictException::notBeAnArray();

        $this->districts()->sync($district, true);
        $this->load("districts");
    }

    public function detachDistrict($district)
    {
        $this->districts()->detach($district);
    }    
}
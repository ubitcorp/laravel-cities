<?php

namespace ubitcorp\Cities\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
 
use \ubitcorp\Cities\Transformers\ContinentResource;
use \ubitcorp\Cities\Transformers\CountryResource;
use \ubitcorp\Cities\Transformers\CityResource;
use \ubitcorp\Cities\Transformers\DistrictResource;
use \ubitcorp\Cities\Transformers\TimezoneResource;

use \ubitcorp\Cities\Entities\Continent;
use \ubitcorp\Cities\Entities\Country;
use \ubitcorp\Cities\Entities\City;
use \ubitcorp\Cities\Entities\District;
use \ubitcorp\Cities\Entities\Timezone;


class CityController extends Controller
{ 
 
    public function __construct()
    {
        $this->middleware(\ubitcorp\Cities\Http\Middleware\TranslationFiltering::class)->only("continents","countries"); 
    } 

    // continents
    public function continents(){  
        return ContinentResource::collection(Continent::filter()->get());
    }

    public function continent(Continent $continent){  
        return new ContinentResource($continent);
    }   

    //countries
    public function countries(){  
        return CountryResource::collection(Country::filter()->get());
    }

    public function country(Country $country){  
        return new CountryResource($country);
    }   
    
    //cities
    public function cities(Request $request){ 
        $request->validate([
            'country_id' => 'required'
        ]);
 
        return CityResource::collection(City::filter()->orderBy('name')->get());
    }

    public function city(City $city){ 
        return new CityResource($city);
    }       
          
    //districts
    public function districts(Request $request){ 
        $request->validate([
            'city_id' => 'required'
        ]);        
        return DistrictResource::collection(District::filter()->orderBy("name")->get());
    }

    public function distirct(District $district){ 
        return new DistrictResource($district);
    }       
        
    //timezones
    public function timezones(){   
        return TimezoneResource::collection(Timezone::filter()->orderBy("name")->get());        
    }      
    
    public function timezone(Timezone $timezone){ 
        return new TimezoneResource($timezone);
    }      
            
}

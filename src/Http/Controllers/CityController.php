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

use \ubitcorp\Cities\Http\Middleware\Translation;

class CityController extends Controller
{ 

    function __construct(Request $request){
    }

    // continents
    public function continents(Request $request){ 
        $this->middleware(Translation::class);
        return ContinentResource::collection(Continent::filter()->get());
    }

    public function continent(Request $request, Continent $continent){ 
        $this->middleware(Translation::class);        
        return new ContinentResource($continent);
    }   

    //countries
    public function countries(Request $request){ 
        $this->middleware(Translation::class);
        return CountryResource::collection(Country::filter()->get());
    }

    public function country(Request $request, Country $country){ 
        $this->middleware(Translation::class);
        return new CountryResource($country);
    }   
    
    //cities
    public function cities(Request $request){ 
        return CityResource::collection(City::filter()->get());
    }

    public function city(Request $request, City $city){ 
        return new CityResource($city);
    }       
          
    //districts
    public function distircts(Request $request){ 
        return DistrictResource::collection(District::filter()->get());
    }

    public function distirct(Request $request, District $district){ 
        return new DistrictResource($district);
    }       
        
    //timezones
    public function timezones(Request $request){   
        return TimezoneResource::collection(Timezone::filter()->get());        
    }      
    
    public function timezone(Request $request, Timezone $timezone){ 
        return new TimezoneResource($timezone);
    }      
            
}

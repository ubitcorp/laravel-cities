<?php

namespace ubitcorp\City\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use ReflectionException;

class Translation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    { 
        $ln = config("city.language", "en");    
        
        if(isset($request['ln'])){
            $ln = $request->ln;    
            unset($request['ln']);
        }

        if($ln && isset($request->name))
        {
            $request["translations"]=$request->name;
            unset($request['name']);
        }
    
        app()->instance('city_language', $ln);

        return $next($request);
    }
}

<?php
 
namespace ubitcorp\Cities\Http\Middleware;

use Closure;

class TranslationFiltering
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    { 
        if($request->header("Accept-Language") && $request->header("Accept-Language")!="en" && $request->has('name')){
            $request->request->add(["translations.".$request->header("Accept-Language")=>$request->name]);
            $request->request->remove("name"); 
        } 
        
        return $next($request);
    }
}

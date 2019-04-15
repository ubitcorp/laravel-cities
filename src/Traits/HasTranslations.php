<?php

namespace ubitcorp\Cities\Traits;

trait HasTranslations
{  

    public function ln($ln, $default = ""){
        try{
            return $this->getAttribute("translations")[$ln];
        }
        catch(\Exception $e)
        {
            return $default ? $default : $this->name;
        }
    }  
 
}
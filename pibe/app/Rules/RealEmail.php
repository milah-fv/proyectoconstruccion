<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class RealEmail implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $email = explode("@",$value);
    
        if(!isset($email[1])) 
        { 
            return false; 
        } 
        else 
        {  
            $domain = $email[1];
            $domain = $domain . '.';
            return checkdnsrr($domain,"MX");  
        }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Direccion de email no válida';
    }
}

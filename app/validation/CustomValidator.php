<?php
namespace App\validation;
class CustomValidator extends \Illuminate\Validation\Validator{
    
    public function validatePhone($attribute, $value, $parameters){
        return preg_match('/^13\d{9}$|^14\d{9}$|^15\d{9}$|^17\d{9}$|^18\d{9}$/',$value);
    }
}
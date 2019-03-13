<?php

namespace App\Validation\Import;

use App\Validation\Validation;

class SearchValidation extends Validation
{
    public function validate()
    {
        $this->rules = [
            'price_from' => 'numeric',
            'price_to' => 'numeric',
            'orders_from' => 'numeric'
        ];


        if($this->validator()){
            return true;
        };

    }

}
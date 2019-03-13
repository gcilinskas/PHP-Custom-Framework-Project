<?php

namespace App\Validation\Import;

use App\Validation\Validation;

class PublishValidation extends Validation
{
    public function validate()
    {
        $this->rules = [
            'title' => 'required',
            'category' => 'required',
            'price' => [
                'required',
                'numeric'
            ]
        ];


        if($this->validator()){
            return true;
        };

    }

}
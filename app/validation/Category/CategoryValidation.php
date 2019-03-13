<?php

namespace App\Validation\Category;

use App\Validation\Validation;

class CategoryValidation extends Validation
{
    public function validate()
    {
        $this->rules = [
            'title' => 'required',
            'description' => 'required'
        ];

        if($this->validator()){
            return true;
        };
    }

}
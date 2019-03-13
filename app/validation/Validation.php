<?php

namespace App\Validation;

use Valitron\Validator;
use App\Session\Session;
use App\Exceptions\Handler;
use Doctrine\ORM\EntityManager;
use App\Exceptions\ValidationException;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\RedirectResponse;

class Validation
{
    protected $request;
    protected $response;
    protected $rules;

    public function __construct(ServerRequestInterface $request, ResponseInterface $response, array $rules = [])
    {
        $this->request = $request;
        $this->response = $response;
        $this->rules = $rules;
    }

    public function validator()
    {

        $validator = new Validator($this->request->getParsedBody());
        $validator->mapFieldsRules($this->rules);

        if(!$validator->validate()) {            

            // Handle Validation Exception
            $handler = new Handler(new ValidationException($this->request, $validator->errors()));
            $handler->respond();

            return false;
               
        }

        return true;
    }

    public function flashFeedback() : array
    {
        if(Session::exists('errors')) {

            $old = Session::flash('old');
            $errors = Session::flash('errors');

            return ['old' => $old, 'errors' => $errors];
        }

        return [];

    }

}
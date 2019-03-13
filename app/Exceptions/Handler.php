<?php

namespace App\Exceptions;

use Exception;
use ReflectionClass;
use App\Session\Session;
use Zend\Diactoros\Response\RedirectResponse;


class Handler
{

    protected $exception;
    protected $session;

    public function __construct(Exception $exception)
    {
        $this->exception = $exception;
    }

    public function respond()
    {
        //get thrown exception class name
        $class = (new ReflectionClass($this->exception))->getShortName();

        //check if exception is handled in this class
        if(method_exists($this,$method = "handle{$class}")) {
            return $this->{$method}();
        }

        return $this->unhandledException();
    }


    protected function handleValidationException()
    {
        // Save Validation Errors to session
        Session::set([
            'errors' => $this->exception->getErrors(),
            'old' => $this->exception->getOldInput()
            ]);
    }

    protected function unhandledException()
    {
        dump($this->exception);
    }
}
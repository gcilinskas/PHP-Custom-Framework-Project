<?php

namespace App\Middleware;

use App\Middleware\UserAuthenticator;
use App\Middleware\AdminAuthenticator;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AuthMiddleware implements MiddlewareInterface
{
    /**
     * @var string
     */
    protected $securedPath;

    protected $authenticator;
    
    /**
     * @var ResponseInterface
     */
    protected $errorResponsePrototype;

    public function __construct(string $securedPath, $authenticator, ResponseInterface $errorResponsePrototype)
    {
        $this->securedPath = $securedPath;
        $this->authenticator = $authenticator;
        $this->errorResponsePrototype = $errorResponsePrototype;
    }


    public function process(ServerRequestInterface $request,RequestHandlerInterface $handler) : ResponseInterface
    {
         // Invoke the remaining middleware and cancel authentication if the current URL is for a public endpoint
         if (substr($request->getUri()->getPath(), 0, strlen($this->securedPath)) !== $this->securedPath) {
            return $handler->handle($request);
        }
        
        // redirect if authentication fails
        if ($this->authenticator->authenticate() === false) {

            if($this->authenticator instanceof AdminAuthenticator) {
                return redirect('/');
            }

            if($this->authenticator instanceof UserAuthenticator) {
                return redirect('/login');
            }

        }

        return $handler->handle($request);
    }
}
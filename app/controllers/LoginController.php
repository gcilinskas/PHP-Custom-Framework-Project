<?php

namespace App\Controllers;

use App\Session\Session;
use App\Controllers\Controller;
use App\Validation\Auth\LoginValidation;
use Zend\Diactoros\Response\RedirectResponse;


class LoginController extends Controller
{

    public function index($request, $response)
    {

        // Flash Validation Feedback if exist
        $validation = new LoginValidation($request, $response);
        $validationFeedback = $validation->flashFeedback();

        return $this->render($response, $request->getUri()->getPath(),
        [
            'errors' => $validationFeedback['errors'] ?? '',
            'old' => $validationFeedback['old'] ?? ''
        ]
        );
    }

   public function login($request, $response)
   {

        $validation = new LoginValidation($request, $response);

        // Validate Input Data && If Error occured => Save Errors To Session
        if ( !$validation->validate() || !$validation->checkLogin($this->entityManager) ) {
            $lastUrl = parse_url($_SERVER['HTTP_REFERER'])['path'];
            return new RedirectResponse($lastUrl);
        }

        // set user session
        $user = $this->entityManager->getRepository('App\Models\User')->findByEmail(get('email'));
        $_SESSION['user'] = serialize($user);

       return new RedirectResponse('/');
   }

   public function logout($request,$response)
   {

        Session::clear('user');

        return new RedirectResponse('/');
   }

   public function register($request,$response)
   {
        

        return $this->render($response, '/register');
   }

}
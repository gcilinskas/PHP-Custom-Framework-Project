<?php

namespace App\Controllers;

use App\DAO\UserDAO;
use App\Session\Session;
use App\Validation\Auth\LoginValidation;
use App\Validation\Auth\RegisterValidation;
use Zend\Diactoros\Response\RedirectResponse;


class AuthController extends Controller
{

   public function login($request, $response)
   {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $validation = new LoginValidation($request, $response);

            // Validate Input Data && If Error occured => Save Errors To Session
            if (!$validation->validate() || !$validation->checkLogin($this->entityManager)) {
                $lastUrl = parse_url($_SERVER['HTTP_REFERER'])['path'];
                return new RedirectResponse($lastUrl);
            }

            // set user session
            $user = $this->entityManager->getRepository('App\Models\User')->findByEmail(get('email'));
            $_SESSION['user'] = serialize($user);

            return new RedirectResponse('/');
        } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
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
   }

   public function logout($request,$response)
   {

        Session::clear('user');

        return new RedirectResponse('/');
   }

   public function register($request,$response)
   {
        if($_SERVER['REQUEST_METHOD'] == 'GET'){

             // Flash Validation Feedback if exist
             $validation = new RegisterValidation($request, $response);
             $validationFeedback = $validation->flashFeedback();
 
             return $this->render($response, $request->getUri()->getPath(),
                 [
                     'errors' => $validationFeedback['errors'] ?? '',
                     'old' => $validationFeedback['old'] ?? ''
                 ]
             );

        } else if($_SERVER['REQUEST_METHOD'] == 'POST') {

            $validation = new RegisterValidation($request, $response);

            // Validate Input Data && If Error occured => Save Errors To Session
            if (!$validation->validate() || !$validation->checkRegister($this->entityManager)) {
                $lastUrl = parse_url($_SERVER['HTTP_REFERER'])['path'];
                return new RedirectResponse($lastUrl);
            }

            $userDAO = new UserDAO($this->entityManager);
            $userDAO->store();

            return new RedirectResponse('/login');

        }

        
   }

}
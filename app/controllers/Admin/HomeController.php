<?php

namespace App\Controllers\Admin;

use App\Controllers\Controller;
use Psr\Http\Message\ResponseInterface;

class HomeController extends Controller
{
    public function index($request, $response) : ResponseInterface
    {
        return $this->render($response, 'admin/index');
    }
}
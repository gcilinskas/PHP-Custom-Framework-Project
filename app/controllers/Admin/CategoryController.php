<?php

namespace App\Controllers\Admin;

use App\DAO\CategoryDAO;
use App\Controllers\Controller;
use App\Helpers\CategoryHelpers;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Zend\Diactoros\Response\RedirectResponse;
use App\Validation\Category\CategoryValidation;

class CategoryController extends Controller
{
    public function index(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $categoryDAO = new CategoryDAO($this->entityManager);
        $categories = $categoryDAO->all() ?? '';

        return $this->render($response, 'admin/category/index', ['categories' => $categories]);
    }

    public function add($request, $response)
    {
        // Flash Validation Feedback if exist
        $validation = new CategoryValidation($request, $response);
        $validationFeedback = $validation->flashFeedback();

        return $this->render($response, 'admin/category/add', $validationFeedback ?? []);
    }

    public function store($request, $response)
    {

        $validation = new CategoryValidation($request, $response);

        // Validate Input Data And Save Errors To Session
        if (!$validation->validate()) {
            $lastUrl = parse_url($_SERVER['HTTP_REFERER'])['path'];
            return new RedirectResponse($lastUrl);
        }

        // Store Category
        $categoryDAO = new CategoryDAO($this->entityManager);
        $categoryDAO->store();

        return new RedirectResponse(redirect('/admin/category'));
    }

    public function delete()
    {
        $categoryDAO = new CategoryDAO($this->entityManager);
        $categoryDAO->delete();
        return new RedirectResponse(redirect('/admin/category'));
    }

    public function edit($request, $response)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {

            // Flash Validation Feedback if exist
            $validation = new CategoryValidation($request, $response);
            $dataAndErrors = $validation->flashFeedback();

            // Set Default Values from DB
            if($dataAndErrors == []) {
               $categoryHelper = new CategoryHelpers();
               $dataAndErrors = $categoryHelper->setEditFields($this->entityManager);
            }

            return $this->render($response, 'admin/category/edit', $dataAndErrors);

        } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $validation = new CategoryValidation($request, $response);

            // Validate Input Data And Save Errors To Session
            if (!$validation->validate()) {
                $lastUrl = parse_url($_SERVER['HTTP_REFERER'])['path'];
                return new RedirectResponse($lastUrl);
            }

            // Update Category
            $categoryDAO = new CategoryDAO($this->entityManager);
            $categoryDAO->update();

            return new RedirectResponse(redirect('/admin/category'));

        }

    }

}
<?php

namespace App\Controllers;

use Twig_Environment;
use AliseeksApi\Configuration;
use Doctrine\ORM\EntityManager;
use Psr\Http\Message\ResponseInterface;

class Controller
{
    protected $twig;
    protected $entityManager;
    protected $config;

    // cia request response permest

    public function __construct(Twig_Environment $twig, EntityManager $entityManager, Configuration $aliConfig)
    {
        $this->twig = $twig;
        $this->entityManager = $entityManager;
        $this->aliConfig = $aliConfig;
    }

    public function render(ResponseInterface $response, string $view, array $data = [])
    {
        $response->getBody()->write(
            $this->twig->render($view . '.twig', $data)
        );

        return $response;
    }




}
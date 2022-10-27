<?php

namespace App\Controller;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        return $this->twig->render('Login/index.html.twig');
    }

    /**
     * Display accueil page
     */
    public function accueil(): string
    {
        return $this->twig->render('Accueil/accueil.html.twig');
    }
}

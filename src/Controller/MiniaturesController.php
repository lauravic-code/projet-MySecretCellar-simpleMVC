<?php

namespace App\Controller;

class MiniaturesController extends AbstractController
{
    /**
     * Display miniatures page
     */
    public function index(): string
    {
        return $this->twig->render('Miniatures/miniatures.html.twig');
    }
}

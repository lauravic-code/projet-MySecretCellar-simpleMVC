<?php

namespace App\Controller;

class CaveController extends AbstractController
{
    /**
     * Display miniatures page
     */
    public function index(): string
    {
        return $this->twig->render('MaCave/cave.html.twig');
    }
}

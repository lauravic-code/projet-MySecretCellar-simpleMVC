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

        /**
     * Show informations for a specific item
     */
    public function show(): string
    {


        return $this->twig->render('MaCave/show.html.twig');
    }
}

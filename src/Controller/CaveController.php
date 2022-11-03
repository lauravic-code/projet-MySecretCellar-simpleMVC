<?php

namespace App\Controller;

use App\Model\CaveManager;

class CaveController extends AbstractController
{
    /**
     * Display miniatures page
     */
    public function index(): string
    {
        $wineManager = new CaveManager();
        $wines = $wineManager->selectAll();

        return $this->twig->render('MaCave/cave.html.twig', ['wines' => $wines]);
    }

        /**
     * Show informations for a specific item
     */
    public function show(): string
    {


        return $this->twig->render('MaCave/show.html.twig');
    }
}

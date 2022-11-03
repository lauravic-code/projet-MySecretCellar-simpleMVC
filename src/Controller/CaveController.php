<?php

namespace App\Controller;

use App\Model\WineManager;

class CaveController extends AbstractController
{
    /**
     * Display miniatures page
     */
    public function index(): string
    {
        $wineManager = new WineManager();
        $wines = $wineManager->selectAll();
        return $this->twig->render('MaCave/cave.html.twig', ['wines' => $wines]);
    }
}

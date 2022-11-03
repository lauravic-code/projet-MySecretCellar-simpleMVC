<?php

namespace App\Controller;

use App\Model\WineManager;

class WineController extends AbstractController
{
    /**
     * Show informations for a specific wine
     */
    public function show(int $id): string
    {
        $wineManager = new WineManager();
        $wine = $wineManager->selectOneById($id);

        return $this->twig->render('Form/UpdateForm.html.twig', ['wine' => $wine]);
    }
}

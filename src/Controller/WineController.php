<?php

namespace App\Controller;

use App\Model\WineManager;

class WineController extends AbstractController
{
    /**
     * Show informations for a specific wine
     */
    public function showupdateForm(int $id): string
    {
        $wineManager = new WineManager();
        $wine = $wineManager->selectOneById($id);

        return $this->twig->render('Form/UpdateForm.html.twig', ['wine' => $wine]);
    }

    public function showWineById(int $id): string
    {
        $wineManager = new WineManager();
        $wine = $wineManager->selectOneById($id);

        return $this->twig->render('Wine/show.html.twig', ['wine' => $wine]);
    }
}

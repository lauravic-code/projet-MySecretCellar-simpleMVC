<?php

namespace App\Controller;

// use App\Model\ItemManager;

class FormController extends AbstractController
{
    public function viewAddForm(): string
    {
        // $formManager = new FormManager();

        return $this->twig->render('Form/AddForm.html.twig');
    }
}

<?php

namespace App\Controller;

// use App\Model\ItemManager;

class FormController extends AbstractController
{
    public function viewForm(): string
    {
        // $formManager = new FormManager();

        return $this->twig->render('Form/form.html.twig');
    }
}

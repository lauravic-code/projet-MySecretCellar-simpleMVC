<?php

namespace App\Controller;

// use App\Model\ItemManager;

class FormAddController extends AbstractController
{
    public function viewAddForm(): string
    {
        // $formManager = new FormManager();

        return $this->twig->render('Form/AddForm.html.twig');
    }
}

<?php

namespace App\Controller;

// use App\Model\ItemManager;

class FormUpdateController extends AbstractController
{
    public function viewUpdateForm(): string
    {
        // $formManager = new FormManager();

        return $this->twig->render('Form/UpdateForm.html.twig');
    }
}


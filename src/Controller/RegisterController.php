<?php

namespace App\Controller;

class RegisterController extends AbstractController
{
    public function viewRegister()
    {
        return $this->twig->render('register/register.html.twig');
    }
}

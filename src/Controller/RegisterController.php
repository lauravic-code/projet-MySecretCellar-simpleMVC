<?php

namespace App\Controller;

class RegisterController extends AbstractController
{
    public function viewRegister()
    {
        var_dump($_SERVER['REQUEST_METHOD']);
        return $this->twig->render('register/register.html.twig');
    }
}

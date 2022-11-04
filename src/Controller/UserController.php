<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function viewProfil()
    {
        return $this->twig->render('Profil/profil.html.twig');
    }

    public function createUser()
    {
        $userManager = new UserManager();
        var_dump($_POST);
        $userManager->insertUser();

        return $this->twig->render('Login/index.html.twig');
    }
}

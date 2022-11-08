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
        $userManager->insertUser();

        return $this->twig->render('Login/index.html.twig');
    }

    public function updateUser()
    {
        $userManager = new UserManager();
        $userManager->updateUser();
        return $this->twig->render('Profil/profil.html.twig');
    }

    public function viewUpdateForm()
    {
        //header('Location:/UpdateUser/updateUser.html.twig');
        return $this->twig->render('UpdateUser/updateUser.html.twig');

        //return null;
    }
}

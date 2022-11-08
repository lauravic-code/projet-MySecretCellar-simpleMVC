<?php

namespace App\Controller;

use App\Model\SecurityManager;

class SecurityController extends AbstractController
{
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $errors = [];
            if ($_POST['email'] === '') {
                $errors['email'] = 'Veuillez saisir un email';
            }
            if ($_POST['password'] === '') {
                $errors['password'] = 'Veuillez saisir un mot de passe';
            }
            if (!$errors) {
                $securityManager = new SecurityManager();
                $results = $securityManager->login($_POST);
                if ($results) {
                    header('Location:/accueil');
                     $_SESSION['user'] = $results;

                    return null;
                }
                header('Location:/');
                return null;
            }
        }

        return $this->twig->render('Login/index.html.twig');
    }

    public function logout()
    {
        session_destroy();
        header('Location:/');
        return null;
    }
}

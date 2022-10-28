<?php

namespace App\Controller;

class ProfilController extends AbstractController
{
    public function viewProfil()
    {
        return $this->twig->render('Profil/profil.html.twig');
    }
}


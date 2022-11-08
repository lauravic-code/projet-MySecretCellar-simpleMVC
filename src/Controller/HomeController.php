<?php

namespace App\Controller;

use App\Model\HomeManager;
use App\Model\WineManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     */
    public function index(): string
    {
        return $this->twig->render('Login/index.html.twig');
    }

    /**
     * Display accueil page
     */
    // $date = date('Y');
    public function accueil(): string
    {
        $date = date('Y');

        $homeManager = new HomeManager();
        $randWine = $homeManager->randomWine($date);

        $wineManager = new WineManager();
        $sumValue = $wineManager->sumValue();
        $nbBottles = $wineManager->nbBottles();


        var_dump($randWine, $sumValue, $nbBottles);
        return $this->twig->render(
            'Accueil/accueil.html.twig',
            ['randWine' => $randWine,
            'sumValue' => $sumValue['sum(value)'],
            'nbBottles' => $nbBottles['sum(stock)']]
        );
    }
}

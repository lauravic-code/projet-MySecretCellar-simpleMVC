<?php

namespace App\Controller;

use App\Model\AppellationManager;
use App\Model\ColorManager;
use App\Model\CountryManager;
use App\Model\RegionManager;
use App\Model\TypeManager;
use App\Model\WineManager;

class CaveController extends AbstractController
{
    /**
     * Display miniatures page
     */
    public function index(): string
    {
        // get table wine
        $wineManager = new WineManager();
        $wines = $wineManager->selectAll('domaine');
        // get table appellation
        $appellationsManager = new AppellationManager();
        $appellations = $appellationsManager->selectAll('label');
        // get table country
        $countryManager = new CountryManager();
        $countries = $countryManager->selectAll('label');
        // get table region
        $regionManager = new RegionManager();
        $regions = $regionManager->selectAll('label');
        // get table color
        $colorManager = new ColorManager();
        $colors = $colorManager->selectAll('label');
        // get table type
        $typeManager = new TypeManager();
        $types = $typeManager->selectAll('label');


        if (empty($wines)) {
            return $this->twig->render('MaCave/emptyCave.html.twig');
        } else {
            return $this->twig->render('MaCave/cave.html.twig', [
            'wines' => $wines,
            'appellations' => $appellations,
            'countries' => $countries,
            'regions' => $regions,
            'colors' => $colors,
            'types' => $types
            ]);
        }
    }

    public function showFilteredCellar()
    {
        return $this->twig->render('MaCave/filteredCellar.html.twig');
    }
}

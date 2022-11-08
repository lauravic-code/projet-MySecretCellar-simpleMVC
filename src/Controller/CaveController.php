<?php

namespace App\Controller;

use App\Model\AppellationManager;
use App\Model\ColorManager;
use App\Model\CountryManager;
use App\Model\FiltresManager;
use App\Model\RegionManager;
use App\Model\TypeManager;
use App\Model\WineManager;

class CaveController extends AbstractController
{
    public array $wines;
    public array $appellations;
    public array $countries;
    public array $regions;
    public array $colors;
    public array $types;

    /**
     * Get the value of wines
     */
    public function getWines()
    {
        $wineManager = new WineManager();
        $this->wines = $wineManager->selectAll('domaine');
        return $this->wines;
    }


    public function getAppellation()
    {
        $appellationsManager = new AppellationManager();
        $this->appellations = $appellationsManager->selectAll('label');
        return $this->appellations;
    }

    /**
     * Get the value of countries
     */
    public function getCountries()
    {

        // get table country
        $countryManager = new CountryManager();
        $this->countries = $countryManager->selectAll('label');
        return $this->countries;
    }

    /**
     * Get the value of regions
     */
    public function getRegions()
    {

        // get table region
        $regionManager = new RegionManager();
        $this->regions = $regionManager->selectAll('label');
        return $this->regions;
    }

    /**
     * Get the value of colors
     */
    public function getColors()
    {
        // get table color
        $colorManager = new ColorManager();
        $this->colors = $colorManager->selectAll('label');
        return $this->colors;
    }

    /**
     * Get the value of types
     */
    public function getTypes()
    {
        // get table type
        $typeManager = new TypeManager();
        $this->types = $typeManager->selectAll('label');
        return $this->types;
    }


    public function index(): string
    {


        if (empty($this->getWines())) {
            return $this->twig->render('MaCave/emptyCave.html.twig');
        } else {
            return $this->twig->render('MaCave/cave.html.twig', [
                'wines' => $this->getWines(),
                'appellations' => $this->getAppellation(),
                'countries' => $this->getCountries(),
                'regions' => $this->getRegions(),
                'colors' => $this->getColors(),
                'types' => $this->getTypes(),
            ]);
        }
    }

    public function showFilteredCellar()
    {
        $filtresManager = new FiltresManager();
        $wines = $filtresManager->filterWines($_POST);
        return $this->twig->render('MaCave/filteredCellar.html.twig', [
            'wines' => $wines,
            'appellations' => $this->getAppellation(),
            'countries' => $this->getCountries(),
            'regions' => $this->getRegions(),
            'colors' => $this->getColors(),
            'types' => $this->getTypes(),
        ]);
    }

    public function showCellarByDomain()
    {
        $wineManager = new WineManager();
        $wines = $wineManager->searchDomaine($_POST['wine']);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            return $this->twig->render('MaCave/cellarByDomain.html.twig', [
                'wines' => $wines,
                'appellations' => $this->getAppellation(),
                'countries' => $this->getCountries(),
                'regions' => $this->getRegions(),
                'colors' => $this->getColors(),
                'types' => $this->getTypes(),
            ]);
        }
    }
}

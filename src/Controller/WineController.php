<?php

namespace App\Controller;

use App\Model\WineManager;
use App\Model\AppellationManager;
use App\Model\ColorManager;
use App\Model\CountryManager;
use App\Model\GrapeVarietyManager;
use App\Model\RegionManager;
use App\Model\TypeManager;
use App\Model\WinePairingManager;

class WineController extends AbstractController
{
    /**
     * Show add form
     */
    public function viewAddForm(): string
    {
        return $this->twig->render('Form/AddForm.html.twig');
    }

    /**
     * Show update form for a specific wine
     */
    public function viewUpdateForm(int $id): string
    {
        // Get all fields for a specific wine.
        $wineManager = new WineManager();
        $wine = $wineManager->selectOneById($id);

        // Get the label of appellation related to this specific wine.
        $appellationManager = new AppellationManager();
        $appellationLabel = $appellationManager->selectLabel($wine['appellation_id']);

        // Get the label of color related to this specific wine
        $colorManager = new ColorManager();
        $colorLabel = $colorManager->selectLabel($wine['color_id']);

        // Get the label of country related to this specific wine
        $countryManager = new CountryManager();
        $countryLabel = $countryManager->selectLabel($wine['country_id']);

        // Get the label of region related to this specific wine
        $regionManager = new RegionManager();
        $regionLabel = $regionManager->selectLabel($wine['region_id']);

        // Get the label of type related to this specific wine
        $typeManager = new TypeManager();
        $typeLabel = $typeManager->selectLabel($wine['type_id']);

        // Get the all the winePairing related to this specific wine
        $winePairingManager = new WinePairingManager();
        $winePairings = $winePairingManager->selectInnerJoin($wine['id']);
        // passing for multidimensional table to a simple one->$tabwinePairing[]
        $keys = array_keys($winePairings);
        $tabwinePairing = [];
        $countWinePairings = count($winePairings);
        for ($i = 0; $i < $countWinePairings; $i++) {
            foreach ($winePairings[$keys[$i]] as $value) {
                $tabwinePairing[] = $value;
            }
        }

        return $this->twig->render(
            'Form/UpdateForm.html.twig',
            ['wine' => $wine,
            'appellation' => $appellationLabel,
            'color' => $colorLabel,
            'country' => $countryLabel,
            'region' => $regionLabel,
            'type' => $typeLabel,
            'winePairing' => $tabwinePairing]
        );
    }

    /**
     * Show informations for a specific wine
     */
    public function showWineById(int $id): string
    {
        $wineManager = new WineManager();
        $wine = $wineManager->selectOneById($id);

        return $this->twig->render('Wine/show.html.twig', ['wine' => $wine]);
    }
}

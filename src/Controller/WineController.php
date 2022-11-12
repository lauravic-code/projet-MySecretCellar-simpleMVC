<?php

namespace App\Controller;

use App\Model\WineManager;
use App\Model\AppellationManager;
use App\Model\ColorManager;
use App\Model\CountryManager;
use App\Model\FileManager;
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
        $wineManager = new WineManager();

        return $this->twig->render(
            'Form/AddForm.html.twig',
            $wineManager->getAddFormData()
            // ou  : (new WineManager())->getAddFormData()
        );
    }

    public function uploadFile()
    {
        $errors = FileManager::getErrors();

        if (!empty($errors)) {
            $displayErrors = '';
            foreach ($errors as $error) {
                $displayErrors .= "<div><h3>" . $error . "<h3><br></div>";
                echo ($displayErrors);
            }
        } else {
            return FileManager::uploadFile();
        }
        return null;
    }

    public function createWine()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $wineDatas  = $_POST;

            if (!empty($_FILES['avatar']['tmp_name'])) {
                $path = $this->uploadFile();

                // $this->deleteFile();
            } else {
                $path = null;
            }
            $wineManager = new WineManager();
            $id = $wineManager->insertWine($wineDatas, $path);
            // creating new WinePairingManager and update the join where wine_id
            // remember => $wineDatas= $_POST
            $winePairing = new WinePairingManager();
            $winePairing->insert($wineDatas, $id);




            header('Location:/showWine?id=' . $id);
            return null;
        }

        // return $this->twig->render('add.html.twig');
    }

    /**
     * Show update form for a specific wine
     */
    public function viewWineInfo(int $id): string
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

        // get all appellations
        $appellationsManager = new AppellationManager();
        $appellations = $appellationsManager->selectAll('label');
        // get all countrys
        $countryManager = new CountryManager();
        $countries = $countryManager->selectAll('label');
        // get all regions
        $regionManager = new RegionManager();
        $regions = $regionManager->selectAll('label');
        // get all types
        $typeManager = new TypeManager();
        $types = $typeManager->selectAll('label');

        return $this->twig->render(
            'Form/UpdateForm.html.twig',
            [
                // related to the specific wine
                'wine' => $wine,
                'appellation' => $appellationLabel,
                'color' => $colorLabel,
                'country' => $countryLabel,
                'region' => $regionLabel,
                'type' => $typeLabel,
                'winePairing' => $tabwinePairing,
                // select all do put in selects of the forms
                'appellations' => $appellations,
                'countries' => $countries,
                'regions' => $regions,
                'types' => $types
            ]
        );
    }

    /**
     * Show informations for a specific wine
     */
    public function showWineById(int $id): string
    {
        $wineManager = new WineManager();
        $wine = $wineManager->selectOneById($id);

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
            'Wine/show.html.twig',
            [
                'wine' => $wine,
                'tabwinePairings' => $tabwinePairing,
                'typeLabel' => $typeLabel,
                'regionLabel' => $regionLabel,
                'countryLabel' => $countryLabel,
                'colorLabel' => $colorLabel,
                'appellationLabel' => $appellationLabel
            ]
        );
    }

    public function updateWine()
    {

        // defining $_POST
        $wineDatas = $_POST;
        // defineing $_FILES if picture exist

        // $winePictureDatas = $_FILES;

        // creating new wineManager and update the wine
        // remember => $wineDatas= $_POST and $winePictureDatas= $_FILES

        if (!empty($_FILES['avatar']['tmp_name'])) {
            $path = $this->uploadFile();

            // $this->deleteFile();
        } else {
            $path = null;
        }
        $wineManager = new WineManager();
        $wineManager->update($wineDatas, $path);


        // creating new WinePairingManager and update the join where wine_id
        // remember => $wineDatas= $_POST
        $winePairing = new WinePairingManager();
        $winePairing->update($wineDatas);

        // TODO create a SESSION here
        header('Location:maCave');
        return null;
    }

    public function updateStock($id)
    {

        $wineManager = new WineManager();
        $wine = $wineManager->selectOneById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $newStock = array_map('trim', $_POST);
            // TODO validations (length, format...)
            // if validation is ok, update and redirection
            $wineManager->updateStock($wine, $newStock);
            header('Location: /showWine?id= ' . $id);
        }
    }
}

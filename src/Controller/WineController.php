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
        // get table country
        $countryManager = new CountryManager();
        $countries = $countryManager->selectAll('label');
        // get table region
        $regionManager = new RegionManager();
        $regions = $regionManager->selectAll('label');
        // get table type
        $typeManager = new TypeManager();
        $types = $typeManager->selectAll('label');
//get appellation
        $appellationsManager = new AppellationManager();
        $appellations = $appellationsManager->selectAll('label');

        return $this->twig->render(
            'Form/AddForm.html.twig',
            [
                'appellations' => $appellations,
                'countries' => $countries,
                'regions' => $regions,
                'types' => $types
            ]
        );
    }
    public function uploadFile()
    {

        // chemin vers un dossier sur le serveur qui va recevoir les fichiers uploadés
        //(attention ce dossier doit être accessible en écriture)
            $uploadDir = __DIR__ . '/../../public/uploads/';

        // le nom de fichier sur le serveur est ici généré à partir du nom de fichier sur
        //le poste du client (mais d'autre stratégies de nommage sont possibles)
            $uploadFile = $uploadDir . basename($_FILES['avatar']['name']);
        // Je récupère l'extension du fichier
            $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        // Les extensions autorisées
            $authorizedExtensions = ['jpg','jpeg','png'];
        // Je récupère le type mime du fichier
            $typeMime = mime_content_type($_FILES['avatar']['tmp_name']);
        // Les types mime autorisées (image/jpeg, png, gif, image/webp)
            $authorizedTypeMime = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
        // Le poids max géré par PHP par défaut est de 2M
            $maxFileSize = 2000000;

            // Je sécurise et effectue mes tests

        /****** Si l'extension est autorisée *************/
        if (!in_array($extension, $authorizedExtensions)) {
            $errors[] = 'Veuillez sélectionner une image de type Jpg ou Jpeg ou Png !';
        }

        /****** Si le type mime est autorisée *************/
        if (!in_array($typeMime, $authorizedTypeMime)) {
            $errors[] = 'Le fichier est de type "' . $typeMime .
            '",veuillez sélectionner une img de type Jpg ou Jpeg ou Png !';
        }

        /****** On vérifie si l'image existe et si le poids est autorisé en octets *****/
        if (
                file_exists($_FILES['avatar']['tmp_name']) &&
                filesize($_FILES['avatar']['tmp_name']) > $maxFileSize
        ) {
            $errors[] = "Votre fichier doit faire moins de 2M !";
        }

        if (!empty($errors)) {
            $displayErrors = '';
            foreach ($errors as $error) {
                $displayErrors .= "<div><h3>" . $error . "<h3><br></div>";
                echo($displayErrors);
            }
        } else {
            // /****** on ajoute un uniqid au nom de l'image *************/
            $explodeName = explode('.', basename($_FILES['avatar']['name']));
            $name = $explodeName[0];
            $extension = $explodeName[1];
            $uniqName = $name . uniqid('', true) . "." . $extension;
            $uploadFile = $uploadDir . $uniqName;



            // on déplace le fichier temporaire vers le nouvel emplacement sur
            //le serveur. Ça y est, le fichier est uploadé
            move_uploaded_file($_FILES['avatar']['tmp_name'], $uploadFile);
            return preg_replace("/.+public/", '', $uploadFile);
        }
            return null;
    }

    public function createWine()
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            // $wine = array_map('trim', $_POST);

            $wineDatas  = $_POST;

            if ($_FILES) {
            // if validation is ok, insert and redirection
                $this->uploadFile();
                $wineManager = new WineManager();

                $id = $wineManager->insertWine($wineDatas);

                header('Location:/showWine?id=' . $id);
                return null;
                // return $this->twig->render('MaCave/cave.html.twig');
            }

            // return $this->twig->render('add.html.twig');
        }
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

<?php

namespace App\Model;

use PDO;

class FileManager
{
    public static function uploadFile()
    {

        // chemin vers un dossier sur le serveur qui va recevoir les fichiers uploadés
        //(attention ce dossier doit être accessible en écriture)
        $uploadDir = __DIR__ . '/../../public/uploads/';

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

    public static function getErrors()
    {
        $errors = [];
        // Je récupère l'extension du fichier
        $extension = pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION);
        // Les extensions autorisées
        $authorizedExtensions = ['jpg', 'jpeg', 'png'];
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
        return $errors;
    }
}

<!-- <?php

// require_once __DIR__ . '/../vendor/autoload.php';

// require_once __DIR__ . '/../config/debug.php';
// require_once __DIR__ . '/../config/db.php';

// require_once __DIR__ . '/../config/config.php';
// require_once __DIR__ . '/../src/routing.php';

// include "../config/config.php";
// include "../config/bdd.php";

// if (!isConnect()) {

//     header('location:' . URL_ADMIN . 'login.php');
// }

// $sql = 'SELECT * FROM categorie';
// $requete = $bdd->query($sql);
// $categories = $requete->fetchAll(PDO::FETCH_ASSOC);

// $sql='SELECT * FROM auteur';
// $requete=$bdd->query($sql);
// $auteurs= $requete->fetchAll(PDO::FETCH_ASSOC);

?> -->

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nouvelle bouteille</title>

    <!-- Custom fonts for this template-->
  
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    
</head>

<body >
<div id="wrapper" class="container-fluid">
     <div class="block1 d-sm-flex ">  <!--align-items-center justify-content-between -->
        <h1 class="h1">Nouvelle bouteille</h1>
    </div>
        <form action="" method="POST"  class=" block2 container-fluid" enctype="multipart/form-data">

            <div class=" ss-block1"><!--ms-3 container-fluid row -->
                <div class="">
                    <label for="illustration" class="form-label"></label>
                    <input type="file" name="illustration" class="form-control" id="illustration">
                </div>
                <div class="">
                    <div class="">
                        <label for="domaine" class="form-label">domaine :</label>
                        <input type="text" name="domaine" class="form-control" id="domaine">
                    </div>
                    <div class=""><!--d-flex flex-column -->
                        <div class=""><!--d-flex flex-column row -->
                            <label for="type" class="form-label">Type :</label>
                            <select class="select-type" name="type[]" multiple id="type">
                                <?php foreach ($types as $type) : ?>
                                        <option value="<?= $type['id'] ?>"><?= $type['libelle'] ?> </option>
                                    <?php endforeach ?>
                            </select>
                        </div>
                        <div class="select_app_block d-flex flex-column">
                            <label for="appellation" class="form-label">appellation :</label>
                            <select class="select-app" name="appellation[]" multiple id="appellation">
                                <?php foreach ($appellations as $appellation) : ?>
                                    <option value="<?= $appellation['id'] ?>"><?= $appellation['nom'] ?> </option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            
                        <div class="select_region_block d-flex flex-column">
                            <label for="region" class="form-label">region :</label>
                            <select class="select-region" name="region[]" multiple id="region">
                                <?php foreach ($regions as $region) : ?>
                                    <option value="<?= $region['id'] ?>"><?= $region['nom'] ?> </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    </div>
                        <label for="pays" class="form-label">pays :</label>
                        <select class="select-pays" name="pays[]" multiple id="pays">
                            <?php foreach ($payss as $pays) : ?>
                                <option value="<?= $pays['id'] ?>"><?= $pays['nom'] ?> </option>
                            <?php endforeach ?>
                        </select>
                    
                    <label for="vintage" class="form-label">vintage :</label>
                    <select class="select-vintage" name="vintage[]" multiple id="vintage">
                        <?php foreach ($vintages as $vintage) : ?>
                            <option value="<?= $vintage['id'] ?>"><?= $vintage['nom'] ?> </option>
                        <?php endforeach ?>
                    </select>                    
                </div>
            </div>
            <div class="row d-flex">
                <label for="cepage" class="form-label">cepage :</label>
                <select class="select-cepage" name="cepage[]" multiple id="cepage">
                 <?php foreach ($cepages as $cepage) : ?>
                    <    option value="<?= $cepage['id'] ?>"><?= $cepage['nom'] ?> </option>
                    <?php endforeach ?>
                </select>
            </div>
                
            <div class="mb-3 ss-block2">
                <div class="row ss-ss-block1">
                    <div class="mb-3">
                        <label for="description" class="form-label">Résumé :</label>
                        <textarea type="text" name="description" class="form-control" id="description" rows="10"></textarea>
                    </div>
                    <label for="met" class="form-label">met :</label>
                    <select class="select-met" name="met[]" multiple id="met">
                        <?php foreach ($mets as $met) : ?>
                            <option value="<?= $met['id'] ?>"><?= $met['nom'] ?> </option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="row ss-ss-block2">
                    <div class="mb-3 col-3">
                        <label for="date_achat" class="form-label">Date d'achat :</label>
                        <input type="date" name="date_achat" class="form-control" id="date_achat"></textarea>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="aging" class="form-label">Date d'achat :</label>
                        <input type="date" name="aging" class="form-control" id="aging"></textarea>
                    </div>
                    <div class="mb-3 col-3">
                        <label for="price" class="form-label">price :</label>
                        <input type="number" name="price" class="form-control" id="price">
                    </div>
                    <div class="mb-3 col-3">
                        <label for="value" class="form-label">value :</label>
                        <input type="number" name="value" class="form-control" id="value">
                    </div>
                </div>
            <div class="row ss-block3">
                <div class="row ss-ss-block2">
                    <div class="mb-3 col-10">
                            <label for="rank" class="form-label">Ranking :</label>
                            <input type="number" name="rank" class="form-control" id="rank">
                    </div>
                    
                    <div class="mb-3">
                        <label for="comment" class="form-label">Résumé :</label>
                        <textarea type="text" name="comment" class="form-control" id="comment" rows="10"></textarea>
                    </div>
                </div>
            </div>
            <div class="row ss-block4">
                <div class="mb-3 col-3">
                    <label for="stock" class="form-label">stock :</label>
                    <input type="number" name="stock" class="form-control" id="stock">
                </div>
                <div class="mb-3">
                    <label for="location" class="form-label">Résumé :</label>
                    <textarea type="text" name="location" class="form-control" id="location" rows="10"></textarea>
                </div>
            </div>
                           
            <div class="d-flex">
                <div class="mb-3  mr-3">
                    <input type="submit" name="btn_add_bottle" class=" btn btn-primary" value="Ajouter"></input>
                </div>
                <div class="mb-3">
                    <a href="" class="btn btn-warning">Annuler</a>
                </div>
            </div>

        </form>
    </div>  
          
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
            <script>
                $('.select-cat').select2();
                $('.select-auteur').select2();
                $('.select-type').select2();
                $('.select-app').select2();

            </script>
</body>

</html>
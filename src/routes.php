<?php

// list of accessible routes of your application, add every new route here
// key : route to match
// values : 1. controller name
//          2. method name
//          3. (optional) array of query string keys to send as parameter to the method
// e.g route '/item/edit?id=1' will execute $itemController->edit(1)
return [
    '' => ['HomeController', 'index',],
    'items' => ['ItemController', 'index',],
    'items/edit' => ['ItemController', 'edit', ['id']],
    'items/show' => ['ItemController', 'show', ['id']],
    'items/add' => ['ItemController', 'add',],
    'items/delete' => ['ItemController', 'delete',],
    //form add new bottle
    'add' => ['WineController', 'viewAddForm'],
    //show form update bottle
    'showUpdateForm' => ['WineController', 'viewWineInfo', ['id']],
    //traitment of $_post from update wine
    'updateWine' => ['WineController', 'updateWine'],
    'addWine' => ['WineController', 'createWine', ['id']],
    //register
    'register' => ['RegisterController', 'viewRegister',],
    // MaCave
    'maCave' => ['CaveController', 'index',],
    // Ma Cave : filtres
    'filteredCellar' => ['CaveController', 'showFilteredCellar'],
    'cellarByDomain' => ['CaveController', 'showCellarByDomain'],
    // fiche Vin
    'showWine' => ['WineController', 'showWineById', ['id']],
    //accueil
    "accueil" => ['HomeController', 'accueil'],
    //profil
    "profil" => ['UserController', 'viewProfil'],
    //go to UpdateUser Form
    "updateUserForm" => ['UserController', 'viewUpdateForm'],
    // signup
    "signup" => ["UserController", "createUser"],
    //update User
    "updateUser" => ["UserController", "updateUser"],
    //Login
    "login" => ["SecurityController", "login"],
    //Logout
    "logout" => ["SecurityController", "logout"],
];

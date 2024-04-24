<?php

require './models/model.php';

function DisplayHome(){ 
    require './views/home.php'; 
    require_once './views/footer.php';
}

function DisplayLogin(){
    require './views/login.php'; 
}

function DisplayRegister(){
    require './views/register.php'; 
}

function DisplayError404(){
    require './views/error404.php'; 
}

function DisplayAccountHome(){
    require './views/account-home.php';
}

function DisplayUploadCar(){
    require './views/upload-car.php';
}

function DisplayHistory(){
    require './views/history.php';
}

function loginProcess(){
    // Vérifie si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        // Vérifie le type d'action
        if ($_POST["form_type"] == "login") {
            // Appelle la fonction loginProcessDB() pour se connecter
            if (loginProcessDB()) {
                // Redirige vers la page home.php si l'ajout est réussi
                require("./views/home.php");
                exit; // Assure que le script se termine ici
            }
        }
    }
}

function registerProcess(){
    // Vérifie si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
        // Vérifie le type d'action
        if ($_POST["form_type"] == "register") {
            // Appelle la fonction registerProcessDB() pour créer le compte
            if (registerProcessDB()) {
                // Redirige vers la page login.php si l'ajout est réussi
                require("./views/login.php");
                exit; // Assure que le script se termine ici
            }
        }
    }
}

function logOut(){
    logOutDB();
    require("./views/home.php");
    exit; // Assure que le script se termine ici
}

function uploadCarProcess(){
    
}
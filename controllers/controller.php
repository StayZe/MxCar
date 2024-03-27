<?php

require './models/model.php';

function DisplayHome(){
    require_once './views/header.php';
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

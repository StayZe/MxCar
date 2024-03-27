<?php

require './models/model.php';

function DisplayHome(){
    require './views/home.php'; 
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

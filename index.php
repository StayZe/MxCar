<?php
require './controllers/controller.php';
session_start();

if(isset($_GET['action']) && !empty($_GET['action'])){
    $action = $_GET['action'];

    if($action == 'home'){
        DisplayHome();
    } elseif($action == 'login'){
        DisplayLogin();
    } elseif($action == 'loginProcess'){
        loginProcess();
    } elseif($action == 'register'){
        DisplayRegister();
    } elseif($action == 'registerProcess'){
        registerProcess();
    } elseif($action == 'logOut'){
        logOut();
    } else {
        DisplayError404();
    }
} else{
    DisplayHome();
}
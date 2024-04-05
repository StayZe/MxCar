<?php

require './controllers/controller.php';
session_start();

if(isset($_GET['action']) && !empty($_GET['action'])){
    $action = $_GET['action'];

    if($action == 'home'){
        DisplayHome();
    } elseif($action == 'login'){
        DisplayLogin();
    } elseif($action == 'register'){
        DisplayRegister();
    }else {
        DisplayError404();
    }
} else{
    DisplayHome();
}
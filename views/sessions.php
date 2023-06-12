<?php

session_start();

if (isset($_SESSION["idUser"])) $sessionUserID = $_SESSION["idUser"];
if (isset($_SESSION["nameUser"])) $sessionUserName = $_SESSION["nameUser"];
if (isset($_SESSION["loginUser"])) $sessionUserLogin = $_SESSION["loginUser"];

$logged = false;

if (isset($sessionUserID) && isset($sessionUserName) && isset($sessionUserLogin)) {
    $logged = true;
}

//CAPTURANDO O NOME DA PÁGINA EM QUE A PESSOA SE ENCONTRA 
$pageName = explode("?", explode("objective_test/", $_SERVER["REQUEST_URI"])[1])[0];

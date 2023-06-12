<?php

require_once(__DIR__."../../vendor/autoload.php");

$dotenv = \Dotenv\Dotenv::createImmutable(__DIR__."../../");
$dotenv->load();

// ------------------------------------------------------------------------
// CONEXÃO COM O BANCO DE DADOS

$connection = new PDO('mysql:host=' . $_ENV["SIS_BD_HOST"] . ';dbname=' . $_ENV["SIS_BD_DATABASE"], $_ENV["SIS_BD_USER"], $_ENV["SIS_BD_PASSWORD"], array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

<?php

include_once("../models/User.php");
include_once("../config/db.php");

$user   = new User($connection);
$action = isset($_POST["action"]) ? $_POST["action"] : null;

if ($action == "insertUser") {
    $array = [
        $_POST["nameUser"],    
        $_POST["loginUser"],    
        $_POST["password"],   
        date("Y-m-d H:i:s"),    
    ];

    echo json_encode($user->store($array));
    exit;
}

if ($action == "loginUser") {
    $array = [
        $_POST["loginUser"],    
        $_POST["password"],     
    ];

    $dataUser = $user->sign_in($array);

    if (empty($dataUser[0])) {
        echo json_encode([[], "Falha"]);
    } else {
        echo json_encode($user->create_sessions($dataUser));
    }
    exit;
}

if ($action == "signoutUser") {
    echo json_encode($user->delete_sessions());
    exit;
}
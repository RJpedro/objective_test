<?php

include_once("../models/Notice.php");
include_once("../config/db.php");

$noticie = new Notice($connection);
$action  = isset($_POST["action"]) ? $_POST["action"] : null;

if ($action == "insertNotice") {
    $array = [
        $_POST["id"],    
        $_POST["author"],    
        json_encode($_POST["categories"]),    
        json_encode($_POST["content"]),    
        json_encode($_POST["excerpt"]),    
        $_POST["thumb"],    
        $_POST["title"],    
        date("Y-m-d H:i:s"),    
    ];

    echo json_encode($noticie->store($array));
    exit;
}

if ($action == "getNotices") {
    $idsNotices = isset($_POST["idsNotices"]) ? $_POST["idsNotices"] : null;
    $limit = intval($_POST["limit"]);

    $arrayNotices = $noticie->getAllNotices($limit, $idsNotices);
    $arrayIdsNotices = $noticie->getIdsAllNotices($arrayNotices);
    
    echo json_encode([
        "notices_infos" => $arrayNotices,
        "notices_ids" => $arrayIdsNotices,
    ]);
    exit;
}

if ($action == "getOneNotice") {
    $arrayNotices = $noticie->getOneNotice($_POST["id"]);
    
    echo json_encode($arrayNotices);
    exit;
}
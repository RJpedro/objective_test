<?php

include_once("./sessions.php");

$idNotice = isset($_GET["id"]) ? $_GET["id"] : null;

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include_once("../inc/inc-head.php"); ?>
    <link rel="stylesheet" href="../assets/css/intern-notice.css?no-cache=<?php echo date("His") ?>" />
    <link rel="stylesheet" href="../assets/css/inc-footer-notices.css?no-cache=<?php echo date("His") ?>" />
    <title>Termos de Uso</title>
</head>

<body>
    <?php include_once("../inc/inc-header.php"); ?>
    <div class="destaq-area">
        <div class="main-area">
            <input type="text" id="idNotice" value="<?php echo $idNotice; ?>" hidden>
            
            <div class="notice-area"></div>
            
            <?php include_once("../inc/inc-footer-notices.php"); ?>
        </div>
    </div>
    <?php include_once("../inc/inc-footer.php"); ?>

    <script src="../assets/js/intern-notice.js?no-cache=<?php echo date("His") ?>"></script>
    <script src="../assets/js/scripts.js?no-cache=<?php echo date("His") ?>"></script>
    <script src="../assets/js/footer-notices.js?no-cache=<?php echo date("His") ?>"></script>
</body>

</html>
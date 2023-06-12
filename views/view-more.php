<?php include_once("./sessions.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <?php include_once("../inc/inc-head.php"); ?>
    <link rel="stylesheet" href="../assets/css/view-more.css" />
    <title>Notícias</title>
</head>

<body>
    <?php include_once("../inc/inc-header.php"); ?>

    <div class="destaq-area">
        <div class="main-area">
            <div class="notices-area"></div>
            <button id="btn-load-more" class="btn-load-more">
                <span>Carregar Mais</span>
                <i class="ph-duotone ph-caret-double-right"></i>
            </button>
        </div>
    </div>

    <?php include_once("../inc/inc-footer.php"); ?>

    <script src="../assets/js/scripts.js?no-cache=<?php echo date("His")?>"></script>
    <script src="../assets/js/view-more.js?no-cache=<?php echo date("His")?>"></script>
</body>

</html>
<?php include_once("./views/sessions.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./assets/css/reset.css?no-cache=<?php echo date("His") ?>" />
    <link rel="stylesheet" href="./assets/css/header.css?no-cache=<?php echo date("His") ?>" />
    <link rel="stylesheet" href="./assets/css/footer.css?no-cache=<?php echo date("His") ?>" />
    <link rel="stylesheet" href="./assets/css/animations.css?no-cache=<?php echo date("His") ?>" />
    <link rel="stylesheet" href="./assets/css/style.css?no-cache=<?php echo date("His") ?>" />
    <link rel="stylesheet" href="./assets/css/home-page.css?no-cache=<?php echo date("His") ?>" />
    <link rel="icon" href="./assets/img/nN.png" type="image/x-icon" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <title>Home</title>
</head>

<body>
    <?php include_once("./inc/inc-header.php"); ?>

    <div class="destaq-area">
        <div class="main-area">
            <div class="left-part">
                <div class="content-main-notice">
                    <div class="main-notice"></div>
                    <div class="bar"></div>
                    <div class="left-part-content content-see-more"></div>
                </div>
                <button id="btn-view-more" class="btn">
                    <span>Ver Mais</span>
                    <i class="ph-duotone ph-caret-double-right"></i>
                </button>
            </div>
            <div class="rigth-part">
                <div class="rigth-part-content content-see-more"></div>
            </div>
        </div>
    </div>

    <footer>
        <div class="more-informations">
            <img src="./assets/img/noticiasNews.png" alt="Notícias News" class="footer-img" />

            <p class="about-us">
                Site de notícias inovador e dinâmico que utiliza uma API para trazer
                informações atualizadas em tempo real. Com acesso direto às principais
                fontes de notícias, garantimos que você esteja sempre um passo à
                frente, obtendo as últimas manchetes e reportagens de forma rápida e
                conveniente.
            </p>

            <div class="copyright">
                <p>© 2023 | notíciasNEWS - Todos os direitos reservados</p>
                <p>Powered by Objctv.one</p>
            </div>
        </div>

        <div class="more-options">
            <?php if ($logged === false) : ?>
                <?php if ($pageName !== "login.php") : ?>
                    <button class="btn-more-options" data-target="./login.php?no-cache=<?php echo date("His") ?>">
                        <i class="ph-duotone ph-sign-in"></i>
                        <span>Acesse sua conta agora</span>
                    </button>
                <?php endif; ?>
                <?php if ($pageName !== "register.php") : ?>
                    <button class="btn-more-options" data-target="./register.php?no-cache=<?php echo date("His") ?>">
                        <i class="ph-duotone ph-user-plus"></i>
                        <span>Não possui conta, registre-se agora! </span>
                    </button>
                <?php endif; ?>
            <?php else : ?>
                <button class="btn-more-options btn-signout">
                    <i class="ph-duotone ph-sign-out"></i>
                    <span>Deslogar da Conta </span>
                </button>
            <?php endif; ?>
            <button class="btn-more-options" data-target="./views/view-more.php?no-cache=<?php echo date("His") ?>">
                <i class="ph-duotone ph-text-columns"></i>
                <span>Ver mais noticias</span>
            </button>
            <button class="btn-more-options" data-target="./views/use-terms.php?no-cache=<?php echo date("His") ?>">
                <i class="ph-duotone ph-book-bookmark"></i>
                <span>Termos de uso</span>
            </button>
        </div>
    </footer>

    <script src="./assets/js/scripts.js?no-cache=<?php echo date("His") ?>"></script>
    <script src="./assets/js/home-page.js?no-cache=<?php echo date("His") ?>"></script>
</body>

</html>
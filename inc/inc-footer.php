<footer>
    <div class="more-informations">
        <img src="../assets/img/noticiasNews.png" alt="Notícias News" class="footer-img" />

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
            <?php if ($pageName !== "views/login.php") : ?>
                <button class="btn-more-options" data-target="./login.php?no-cache=<?php echo date("His") ?>">
                    <i class="ph-duotone ph-sign-in"></i>
                    <span>Acesse sua conta agora</span>
                </button>
            <?php endif; ?>
            <?php if ($pageName !== "views/register.php") : ?>
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
        <button class="btn-more-options" data-target="./view-more.php?no-cache=<?php echo date("His") ?>">
            <i class="ph-duotone ph-text-columns"></i>
            <span>Ver mais noticias</span>
        </button>
        <button class="btn-more-options" data-target="./use-terms.php?no-cache=<?php echo date("His") ?>">
            <i class="ph-duotone ph-book-bookmark"></i>
            <span>Termos de uso</span>
        </button>
    </div>
</footer>
<div class="nav-bar">
    <div class="notices-news-complete"></div>
    <div></div>
    <div class="top-bottons">
        <?php if ($logged === true) : ?>
            <button class="btn btn-top-bottons btn-signout">
                <span>Sair </span>
                <i class="ph-duotone ph-sign-out"></i>
            </button>
        <?php else: ?>
            <button class="btn btn-top-bottons" data-target="./login.php?no-cache=<?php echo date("His") ?>">
                <span>Acessar Contar</span>
                <i class="ph-duotone ph-sign-in"></i>
            </button>
            <button class="btn btn-top-bottons" data-target="./register.php?no-cache=<?php echo date("His") ?>">
                <span>Registrar-se </span>
                <i class="ph-duotone ph-user-plus"></i>
            </button>
        <?php endif; ?>
    </div>
</div>
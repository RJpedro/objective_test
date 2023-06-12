<?php include_once("./sessions.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php include_once("../inc/inc-head.php"); ?>
  <link rel="stylesheet" href="../assets/css/login.css?no-cache=<?php echo date("His") ?>" />
  <title>Login</title>
</head>

<body>
  <div class="top-area">
    <div class="card-login">
      <div class="main-area">
        <img class="background-img" src="../assets/img/img.png" alt="Notícias News">

        <div class="form-create">
          <div class="main-form">
            <h4 class="title-form">
              Acesse <span class="account"> sua conta!</span>
            </h4>

            <input type="text" id="loginUser" name="loginUser" placeholder="Entre com seu e-mail" />
            <input type="password" id="passwordUser" name="passwordUser" placeholder="Digite sua senha" />

            <button id="btn-login" class="btn-login">
              <span>Entrar</span>
              <i class="ph-duotone ph-sign-in"></i>
            </button>

            <span class="have-account">Não possui conta? <a href="./register.php?no-cache=<?php echo date("His") ?>"> Cadastre-se agora mesmo!</a></span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include_once("../inc/inc-footer.php"); ?>

  <script src="../assets/js/scripts.js?no-cache=<?php echo date("His") ?>"></script>
  <script src="../assets/js/user.js?no-cache=<?php echo date("His") ?>"></script>
</body>

</html>
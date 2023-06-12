<?php include_once("./sessions.php"); ?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <?php include_once("../inc/inc-head.php"); ?>
  <link rel="stylesheet" href="../assets/css/register.css?no-cache=<?php echo date("His") ?>" />
  <title>Registrar-se</title>
</head>

<body>
  <div class="top-area">

    <div id="main-popup" class="main-popup animation-message">
      <div id="secondary-popup" class="secondary-popup">
          <span class="message-popup" style="color: #ffff;"></span>
      </div>
    </div>

    <div class="card-login">
      <div class="main-area">
        <img class="background-img" src="../assets/img/img.png" alt="Notícias News">

        <div class="form-create">
          <div class="main-form">
            <h4 class="title-form">
              Registrar <span class="account"> conta</span>
            </h4>

            <input type="text" id="nameUser" name="nameUser" placeholder="Entre com seu nome" value="" />
            <input type="email" id="loginUser" name="loginUser" placeholder="Entre com seu e-mail" value="" />
            <input type="password" id="passwordUser" name="passwordUser" placeholder="Digite sua senha" value="" />
            <input type="password" id="passwordRepeatUser" name="passwordRepeatUser" placeholder="Repita sua senha" value="" />

            <button id="btn-register" class="btn">
              <span>Registrar-se</span>
              <i class="ph-duotone ph-user-plus"></i>
            </button>

            <span class="have-account">Já possui conta? <a href="./login.php"> Acesse sua conta!</a></span>
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
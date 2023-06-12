// EVENTOS DE CLIQUES
$("#btn-register").on("click", () => {
  //VERIFICANDO SE EXISTE ALGUM CAMPO NULO
  verifyFields([
    "#nameUser",
    "#loginUser",
    "#passwordUser",
    "#passwordRepeatUser",
  ]);

  // VERIFICANDO SE O EMAIL CONTEM @
  if ($("#loginUser").val().indexOf("@") === -1) {
    throw bodyAlertMessage("Por favor, seu e-mail deve conter @!", "#ba262780", "#ba2627");
  }

  // VERIFICANDO SE AS SENHAS CORRESPONDEM
  if ($("#passwordUser").val() !== $("#passwordRepeatUser").val()) {
    throw bodyAlertMessage("Por favor, selecione senhas iguais!", "#ba262780", "#ba2627");
  }

  ajax(
    "../controllers/UserController.php",
    "POST",
    {
      action: "insertUser",
      nameUser: $("#nameUser").val(),
      loginUser: $("#loginUser").val(),
      password: $("#passwordUser").val(),
    },
    (data) => {
      var status = data[1];
      if (status === "Sucesso") {
        bodyAlertMessage("Cadastro Feito Com Sucesso", "#44444480", "#444444");
        setTimeout(() => {
          $(location).attr("href", "../views/login.php");
        }, 2000);
      } 
    }
  );
});

$("#btn-login").on("click", () => {
  ajax(
    "../controllers/UserController.php",
    "POST",
    {
      action: "loginUser",
      loginUser: $("#loginUser").val(),
      password: $("#passwordUser").val(),
    },
    (data) => {
      var status = data[1];
      if (status === "Sucesso") {
          $(location).attr("href", "../index.php");
      }
    }
  );
});

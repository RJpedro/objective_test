var arrayNoticesIds = [];
var arrayNoticesInfos = [];

// FUNÇÃO RESPONSÁVEL POR CONSUMIR A API
async function apiConnection() {
  var apiConnectionGet = await fetch(
    "https://thmais.com.br/wp-json/feed/v1/posts/every"
  );

  const apiConnectionData = await apiConnectionGet.json();

  return apiConnectionData;
}

// FUNÇÃO RESPONSÁVEL POR FAZER O REDIRECIONAMENTO DA GRANDE MAIORIA DOS BOTÕES
function redirect(event, parent) {
  var urlRedirect = $(event.target).attr("data-target");

  // ESSE TRATAMENTO É FEITO PARA CASO A PESSOA CLIQUE EM CIMA DO SPAM,
  // NESSE CASO EU BUSCO O ELMENTO PAI MAIS PROXIMO QUE CONTÉM A CLASSE
  // ESPECIFICADA E PEGO A URL DA PÁGINA PARA FAZER O REDIRECIONAMENTO
  if (urlRedirect == null || urlRedirect == undefined) {
    urlRedirect = $(event.target).parent(parent).attr("data-target");
  }

  $(location).attr("href", urlRedirect);
}

// FUNÇÃO RESPONSÁVEL POR VERIFICAR SE EXISTE ALGUM CAMPO NULO E DAR FOCO NO MESMO
function verifyFields(array) {
  array.forEach((element) => {
    if ($(element).val() == null || $(element).val() == "") {
      throw $(element).focus();
    }
  });

  return true;
}

// FUNÇÃO RESPONSÁVEL POR CRIAR AJAX DE ACORDO COM OS DADOS ENVIADOS
function ajax(url, metodo, dados, callback) {
  $.ajax({
    url: url,
    type: metodo,
    data: dados,
    processData: true,
    enctype: "multipart/form-data",
  })
    .done(function (data) {
      var data = JSON.parse(data);
      callback(data);
    })
    .fail(function () {
      console.log("error no corpo do ajax");
    });
}

// FUNÇÃO RESPONSÁVEL POR CRIAR O CORPO PADRÃO DOS CARDS DE NOTÍCIAS
function createCardsNotices(notice) {
  var categories = JSON.parse(notice.categories);
  var cardNotice = "";
  var cardType = "";
  var cardTitle = "";
  var cardBy = "";
  var imgNotice = "";

  var thumb =
    notice.thumb != "false" ? notice.thumb : "../assets/img/no_image.jpg";
  
  var thumbIndex =
    notice.thumb != "false" ? notice.thumb : "./assets/img/no_image.jpg";

  cardBy = $(
    `<div class='card-by'>Por: <span>${notice.author}</span> - 1 abr 2023 07h15</div>`
  );

  if (categories != null && categories != undefined) {
    categories.forEach((category) => {
      cardType += `<div class='card-type' title='${category}'>${category}</div>`;
    });
  }

  cardType = $("<div class='type-content'></div>").append(cardType);

  cardTitle = $(
    `<div class='card-title' title='Clique Para Saber Mais'>${notice.title}</div>`
  );

  cardContent = $(
    `<div class='card-content' title='Clique Para Saber Mais'>${notice.title}</div>`
  );

  imgNotice = $(`<img src='${thumb}' alt='Imagem da Notícia'>`);

  cardNotice = $("<div class='card-noticie'></div>")
    .append(cardType)
    .append(cardContent)
    .append(cardBy);

  return {
    cardNotice: cardNotice,
    cardType: cardType,
    cardTitle: cardTitle,
    cardContent: cardContent,
    cardBy: cardBy,
    thumb: thumb,
    thumbIndex: thumbIndex,
    imgNotice: imgNotice,
  };
}

// FUNÇÃO RESPONSÁVEL POR INSERIR A NOTICIA NO BANCO DE DADOS CASO ELA NAO EXISTA AINDA
function insertNotices(notices) {
  notices.forEach((notice) => {
    if (arrayNoticesIds.indexOf(parseInt(notice.id)) < 0) {
      ajax(
        "../controllers/NoticeController.php",
        "POST",
        {
          action: "insertNotice",
          id: notice.id,
          author: notice.author,
          categories: notice.categories,
          content: notice.content,
          excerpt: notice.excerpt,
          thumb: notice.thumb,
          title: notice.title,
        },
        (data) => {}
      );

      // ADICIONANDO NOTICIA NO ARRAY TAMBEM
      arrayNoticesIds.push(parseInt(notice.id));
    }
  });
}

// FUNÇÃO RESPONSÁVEL POR PEGAR TODOS AS NOTICIAS QUE JA FORAM GRAVADAS NO BANCO E COMPARAR COM O
// RETORNO DA API PARA SABER SE DEVEMOS GRAVAR ALGUMA NOTICIA NOVA OU NAO
function verifyNewsNotices() {
  ajax(
    "../controllers/NoticeController.php",
    "POST",
    {
      action: "getNotices",
      limit: null,
      idsNotices: "",
    },
    async (data) => {
      arrayNoticesInfos = data.notices_infos[0];
      arrayNoticesIds = data.notices_ids[0];

      // CONSUMINDO A API DE NOTICIAS
      const notices = await apiConnection();
      insertNotices(notices);
    }
  );
}

// FUNÇÃO RESPONSÁVEL POR MOSTRAR A MENSAGEM DE ALERTA
function bodyAlertMessage(text, background, borderColor) {
  $(".message-popup").text(text);

  $("#secondary-popup").css({
    background: background,
    "border-bottom": `3px solid ${borderColor}`,
  });

  $("#main-popup").css({
    display: "block",
  });

  setTimeout(() => {
    $("#main-popup").css({
      display: "none",
    });
  }, 4000);
}

// PEGANDO NOTÍCIAS QUE ESTÃO CADASTRADAS NO BANCO
// E CONSUMINDO API PARA QUE SEMPRE AO DEPARARMOS
// COM UMA NOTICIA NOVA ADICIONA-LA NO BANCO DE DADOS
verifyNewsNotices();

setInterval(() => {
  verifyNewsNotices();
}, 13000);

$(".btn-more-options").on("click", (event) => {
  redirect(event, ".btn-more-options");
});

$(".btn-top-bottons").on("click", (event) => {
  redirect(event, ".btn-top-bottons");
});

$(".btn-signout").on("click", () => {
  ajax(
    "../controllers/UserController.php",
    "POST",
    {
      action: "signoutUser",
    },
    async (data) => {
      if (data == "Sucesso") {
        $(location).attr("href", "../index.php");
      } else {
      }
    }
  );
});

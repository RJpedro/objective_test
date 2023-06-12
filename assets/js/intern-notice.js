$(document).ready(() => {
  var idNotice = $("#idNotice").val();

  // NO CASO DESSA TELA EM ESPECÍFICO TERIA QUE SER FEITO ALGUMAS ALTERAÇÕES 
  // NA FUNÇÃO PRINCIPAL DE CRIAÇÃO DE CARD DE NOTICIA POR ISSO, DECIDI CRIAR ESTÁ FUNÇÃO PARA ESTA TELA 
  function createNoticeBody(notice) {
    var mainTitle = "";
    var firstParagraph = "";
    var share = "";
    var cardBy = "";
    var shareButtons = "";
    var postImage = "";
    var noticeDescription = "";
    let thumb =
      notice.thumb != "false" ? notice.thumb : "../assets/img/no_image.jpg";

    mainTitle = $(`<h1 class='main-title'>${notice.title}</h1>`);
    firstParagraph = $(
      `<h1 class='first-paragraph'>${JSON.parse(notice.excerpt)}</h1>`
    );

    cardBy = $(
      `<div class='card-by'>Por: <span>${notice.author}</span> - 1 abr 2023 07h15</div>`
    );

    shareButtons = $("<div class='share-buttons'></div>")
      .append($("<span>Compartilhe: </span>"))
      .append(
        $(
          "<button data-target='https://www.facebook.com/?stype=lo&jlou=AfdZFVhwEisQjAI5itj_RQQ4d2hNPGM0_fVdCumFDWeP9YyanHOQLhxCP7-JBFUhpjhWzCfZUOVihnLg_zNZOKJzgL1BhFtBJZdc2XEMGtUWeQ&smuh=46992&lh=Ac8r9uFY_ndFthyKnv8&wtsid=rdr_0WqyttkIWa6RPKh6r'><i class='ph-duotone ph-facebook-logo'></i></button>"
        )
      )
      .append(
        $(
          "<button data-target='https://twitter.com/login?lang=pt'><i class='ph-duotone ph-twitter-logo'></i></button>"
        )
      )
      .append(
        $(
          "<button data-target='https://web.telegram.org/k/'><i class='ph-duotone ph-telegram-logo'></i></button>"
        )
      )
      .append(
        $(
          "<button data-target='https://web.whatsapp.com/'><i class='ph-duotone ph-whatsapp-logo'></i></button>"
        )
      )
      .append(
        $(
          "<button data-target='https://www.linkedin.com/'><i class='ph-duotone ph-linkedin-logo'></i></button>"
        )
      )
      .append(
        $(
          "<button data-target='https://mail.google.com/'><i class='ph-duotone ph-envelope-simple'></i></button>"
        )
      );

    share = $("<div class='share'></div>").append(cardBy).append(shareButtons);

    postImage = $("<div class='post-image'></div>")
      .append($(`<img src='${thumb}' alt='Imagem da Notícia'>`))
      .append($(`<span>Fonte: ${notice.author}</span>`));

    noticeDescription = $(
      `<div class='notice-description'>${JSON.parse(notice.content)}</div>`
    );

    // INSERINDO NOTICIA NA SUA RESPECTIVA DIV
    $(".notice-area")
      .append(mainTitle)
      .append(firstParagraph)
      .append(share)
      .append(postImage)
      .append(noticeDescription);
  }

  // PEGANDO TODAS NOTICIAS QUE JA FORAM SALVAS NO BANCO DE DADOS E SEUS RESPECTIVOS IDS
  ajax(
    "../controllers/NoticeController.php",
    "POST",
    {
      action: "getOneNotice",
      id: idNotice,
    },
    (data) => {
      arrayNoticieInfo = data[0][0];
      createNoticeBody(arrayNoticieInfo);
    }
  );

  // REDIRECIONANDO PARA A URL QUE ESTA CONTIDA NO BOTÃO DE COMPARTILHAR
  $(".main-area").on("click", (event) => {
    redirect(event, "button");
  });
});

$(document).ready(() => {
  $("#btn-view-more").on("click", () => {
    $(location).attr("href", "./views/view-more.php");
  });

  // FUNÇÃO RESPONSÁVEL POR CRIAR TODO O CONTEÚDO DE NOTICIAS DA PARTE ESQUERDA DA TELA
  function createLeftPart(notices) {
    var isFirst = true;
    var isFooter = true;

    notices.forEach((notice) => {
      cardParts = createCardsNotices(notice);

      if (isFirst) {
        $(".main-notice").append(
          $(`<a href='./views/intern-notice.php?id=${notice.id}'></a>`)
            .append(cardParts.cardType)
            .append(cardParts.cardTitle)
            .append(
              $(`<img src='${cardParts.thumbIndex}' alt="Notícia Principal">`)
            )
        );
      } else {
        if (!isFooter) {
          $(".left-part-content").append($("<div class='divisor'></div>"));
        }
        
        $(".left-part-content").append(
          $(`<a href='./views/intern-notice.php?id=${notice.id}'></a>`).append(
            $("<div class='card-notice'></div>")
              .append(cardParts.cardType)
              .append(cardParts.cardTitle)
              .append(cardParts.cardBy)
          )
        );
        
        isFooter = false;
      }

      isFirst = false;
    });
  }

  // FUNÇÃO RESPONSÁVEL POR CRIAR TODO O CONTEÚDO DE NOTICIAS DA PARTE DIREITA DA TELA
  function createRigthPart(notices) {
    var isFirst = true;

    notices.forEach((notice) => {
      cardParts = createCardsNotices(notice);

      if (!isFirst) {
        $(".rigth-part-content").append($(`<div class='bar'></div>`));
      }

      $(".rigth-part-content").append(
        $(`<a href='./views/intern-notice.php?id=${notice.id}'></a>`)
          .append(
            $(
              `<img src='${cardParts.thumbIndex}' alt='Imagem da Notícia'></img>`
            )
          )
          .append(
            $("<div class='card-notice'></div>")
              .append(cardParts.cardType)
              .append(cardParts.cardTitle)
              .append(cardParts.cardBy)
          )
      );
      isFirst = false;
    });
  }

  // PEGANDO TODAS NOTICIAS QUE JA FORAM SALVAS NO BANCO DE DADOS E SEUS RESPECTIVOS IDS
  ajax(
    "./controllers/NoticeController.php",
    "POST",
    {
      action: "getNotices",
      limit: 7,
    },
    async (data) => {
      arrayNoticesInfos = data.notices_infos[0];

      // ENVIANDO APENAS TRÊS NOTICIAS PARA O COTAINER ESQUERDO
      createLeftPart(arrayNoticesInfos.slice(0, 3));

      // ENVIANDO OUTRAS NOTICIAS PARA O CONTAINER DIREITO
      createRigthPart(arrayNoticesInfos.slice(3));
    }
  );
});

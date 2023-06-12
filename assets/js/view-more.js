$(document).ready(() => {
  var arrayNoticesViewMore = [];
  var arrayNoticesInView = [];

  // FUNÇÃO PRINCIPAL QUE CRIA A
  function createCardNotices(notices) {
    notices.forEach((notice) => {
      if (arrayNoticesInView.indexOf(parseInt(notice.id_notice_api)) < 0) {
        var cardParts = createCardsNotices(notice);

        cardContent = $("<div class='card-content'></div>")
          .append(cardParts.cardType)
          .append(cardParts.cardTitle)
          .append(cardParts.cardBy);

        cardNotice = $("<div class='card-notice'></div>")
          .append(cardParts.imgNotice)
          .append(cardContent);

        // ADICIONANDO BARRA CASO A NOTICIA NAO SEJA A PRIMERIA
        if (arrayNoticesInView.length !== 0) {
          $(`.notices-area`).append($(`<div class='bar'></div>`));
        }

        // ADICIONANDO O CONTEUDO DA NOTICIA CRIADA NO CONTEUDO PRINCIPAL DA PAGINA
        $(`.notices-area`).append(
          $(`<a href='../views/intern-notice.php?id=${notice.id}'></a>`).append(
            cardNotice
          )
        );

        // ESTE ARRAY SERVE PARA TERMOS UM CONTROLE DE QUAIS NOTICIAS JA FORAM ADICIONADAS NA TELA PRINCIPAL DO USUARIO
        arrayNoticesInView.push(parseInt(notice.id_notice_api));
      }
    });
  }

  // FUNÇÃO RESPONSÁVEL POR PEGAR AS 10 ULTIMAS NOTICIAS,
  // NELA ENVIO O ARRAY DE NOTICIAS QUE JA FORAM CARREGADAS PARA NÃO BUSCA-LAS NOVAMENTE
  function cardsFactory() {
    ajax(
      "../controllers/NoticeController.php",
      "POST",
      {
        action: "getNotices",
        limit: 10,
        idsNotices: arrayNoticesInView,
      },
      (data) => {
        arrayNoticesViewMore = data.notices_infos[0];
        arrayNoticesIds = data.notices_ids[0];

        createCardNotices(arrayNoticesViewMore);
      }
    );
  }

  // CHAMANDO A FUNÇÃO PARA CONTINUAR TRAZENDO NOTICIAS QUANDO A PESSOA CLICAR EM CARREGAR MAIS
  $("#btn-load-more").on("click", () => {
    cardsFactory();
  });

  // CHAMANDO A FUNÇÃO PARA CARREGAR AS 10 PRIMEIRAS NOTICIAS
  cardsFactory();
});

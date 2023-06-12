$(document).ready(() => {
  // PEGANDO TODAS NOTICIAS QUE JA FORAM SALVAS NO BANCO DE DADOS E SEUS RESPECTIVOS IDS
  ajax(
    "../controllers/NoticeController.php",
    "POST",
    {
      action: "getNotices",
      limit: 4,
      idsNotices: "",
    },
    async (data) => {
      arrayNoticesInfos = data.notices_infos[0];
      var isFirst = true;

      // CRIANDO DINAMICAMENTE O FOOTER DE NOTICIAS COM AS 4 ULTIMAS NOTICIAS CADASTRADAS NO BANCO DE DADOS
      arrayNoticesInfos.forEach((notice) => {
        cardParts = createCardsNotices(notice);

        if (isFirst === false) {
          $(".content-see-more").append($("<div class='divisor-footer-notices'></div>"));
        }

        $(".content-see-more").append(
          $(
            `<a class='d-flex jf-space-between' href='../views/intern-notice.php?id=${notice.id}'></a>`
          )
            .append(cardParts.cardType)
            .append(cardParts.cardTitle)
            .append(cardParts.cardBy)
        );

        isFirst = false;
      });
    }
  );
});

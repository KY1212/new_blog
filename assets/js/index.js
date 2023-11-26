jQuery(function ($) {

  function heightAlign() {
    // ページ内の全ての .p-container__postTitle の高さを取得する
    const postTitles = document.querySelectorAll('.p-container__postTitle');
    let heights = [];
    for (let i = 0; i < postTitles.length; i++) {
      heights[i] = postTitles[i].clientHeight;
    }

    let height, heightLarge, lastHeight;
    for (let i = 0; i < postTitles.length; i++) {
      height = heights[i];
      // 最初のループ以外で、前回の高さと異なる場合
      if (i > 0 && height !== lastHeight) {
        // 一つ前の要素と比較して大きい方を heightLarge に代入
        if (height > lastHeight) {
          heightLarge = height;
          postTitles[i-1].style.height = `${heightLarge}px`;
        } else {
          heightLarge = lastHeight;
          postTitles[i].style.height = `${heightLarge}px`;
        }
      }
      // 最後の要素でループが終了した場合
      if (i === postTitles.length - 1) {
        postTitles[i].style.height = `${heightLarge}px`;
      }
      lastHeight = height;
    }
  }

function hamburger() {
  const menu = $(".p-header__menu--wrap");
  $(".c-hamburger").on("click", function () {
    // $.toggleClass('is-active');
    menu.toggleClass("is-display");

    if (menu.hasClass("is-display")) {
      menu.animate({
        left: "0%"
      }, 200 );
    } else if (!(menu.hasClass("is-display"))) {
      menu.animate({
        left: "100%"
      }, 200 );
    }

    //スクロール禁止
    $('body').toggleClass("c-no_scroll");
  });
}


  $(".c-hamburger").click(function () {
    $(this).toggleClass('active');
});


  heightAlign();
  hamburger();
});

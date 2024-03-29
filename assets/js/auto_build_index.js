$(function () {

function auto_build_index() {
    // 設定
    const TOC_INSERT_SELECTOR = '.p-index';              // [セレクター指定] 目次を挿入する要素 querySelector用
    const HEADING_SELECTOR    = '.p-single__h3,.p-single__h4'; // [セレクター指定] 収集する見出し要素 querySelectorAll用
    const LINK_CLASS_NAME     = 'tocLink';           // [クラス名] 目次用aタグに追加するクラス名     .無し
    const ID_NAME             = 'is-heading';           // [ID名]    目次に追加するID名のプレフィックス #無し
    const tocInsertElement    = document.querySelector(TOC_INSERT_SELECTOR);
    const headingElements     = document.querySelectorAll(HEADING_SELECTOR);
    const layer = [];
    let id = 0;
    const uid   = () =>`${ID_NAME}${id++}`;
    let oldRank = -1;
    try {
        const createLink = (el) => {
            let li = document.createElement('li');
            let a  = document.createElement('a');
            el.id  = el.id || uid();
            a.href = `#${el.id}`;
            a.innerText = el.innerText;
            a.className = LINK_CLASS_NAME;
            li.appendChild(a);
            return li;
        };
        const findParentElement = (layer, rank, diff) => {
            do {
                rank += diff;
                if (layer[rank]) return layer[rank];
            } while (0 < rank && rank < 7);
            return false;
        };
        const appendToc = (el, toc) => {
            el.appendChild(toc.cloneNode(true));
        };
        headingElements.forEach( (el) => {
            let rank   = Number(el.tagName.substring(1));
            let parent = findParentElement(layer, rank, -1);
            if (oldRank > rank) layer.length = rank + 1;
            if (!layer[rank]) {
                layer[rank] = document.createElement('ol');
                if (parent.lastChild) parent.lastChild.appendChild(layer[rank]);
            }
            layer[rank].appendChild(createLink(el));
            oldRank = rank;
        });
        if (layer.length) appendToc(tocInsertElement, findParentElement(layer, 0, 1));
    } catch (e) {
        //error 
    }
}


function smoothScroll(){
  let isScrolling = false;
  $('a[href^="#"]').on("click", function() {
    if (isScrolling) return false;
    isScrolling = true;
    let headerHeight = $('.p-header').outerHeight();
    let adjust = headerHeight;
    let speed = 600;
    let href = $(this).attr("href");
    let target = $(href == "#" || href == "" ? 'html' : href);
    let position = target.offset().top - adjust;
    console.log("ddd")
    $(window).animate({
      scrollTop: position
    }, 300, function() {
      isScrolling = false;
    });
    return false;
  });
}
  auto_build_index();
  smoothScroll();
});

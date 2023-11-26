$(function () {
  
  function slider() {
    //変数宣言
    const $sliderWrap = $('.p-slider');
    const $slider = $('.p-slider');
    const $slides = $('.p-slider__wrap');
    const $slide = $('.p-slider__slide');
    const $indicator = $('.p-indicator');
    const $prev = $('.prev');
    const $next = $('.next');
    const slideLength = $slide.length;
    let currentIndex = 0;
    let $indicatorItem = '';
    
    //インジケータの生成
    function addIndicator(){
      let indicatorHTML = '';
      for (let i = 0; i <= slideLength; i++){
      indicatorHTML = $(`.p-slider__slide:nth-child(${i}) img`).prop('outerHTML');
        $indicator.append(indicatorHTML).find("img").addClass("p-indicator__slide");
      }
      $indicatorItem = $('.p-indicator__slide');
      $indicatorItem.eq(currentIndex).addClass('is-active');
    }

    
    //スライドクローン
    function cloneSlide() {
      const $lastSlide = $slides.find('.p-slider__slide:last-child');
      const $firstSlide = $slides.find('.p-slider__slide:first-child');
      $lastSlide.clone(true).prependTo($slides);
      $firstSlide.clone(true).appendTo($slides);
    }

    // スライド開始位置調整
    $slides.animate({
      left: (currentIndex + 1) * -100 + '%'
    },0);
    //スライドアニメーション
    function changeSlide() {
      const duration = 300;
      if(currentIndex == 1){
        currentIndex;
        console.log(currentIndex)
      }
      console.log("関数入"+currentIndex)
      $slides.animate({
        left: (currentIndex + 1) * -100 + '%'
      },duration);
      if(currentIndex == slideLength){
        console.log("next"+currentIndex)
        currentIndex = 0;
        $slides.animate({
          left: (currentIndex + 1) * -100 + '%'
        },0);
      }else if(currentIndex == -1) {
        console.log("prev"+currentIndex)
        currentIndex = slideLength -1;
        $slides.animate({
          left: (currentIndex + 1) * -100 + '%'
        },0);
      }
      updateNav();
    }

    //スタートタイマー
    function startTimer() {
      const interval = 6000;
      timer = setInterval(nextSlide, interval);
    }

    //ストップタイマー
    function stopTimer() {
      clearInterval(timer);
    }

    //インジケータの更新
    function updateNav() {
      $indicatorItem.removeClass("is-active").eq(currentIndex).addClass("is-active");
    }

    //インジケータークリック処理
    function goSomeWhere() {
      if(!$slides.is(':animated')){
        currentIndex = $(this).index();
        changeSlide();
      }
    }

    //prevボタンの処理
    function prevSlide() {
      if(!$slides.is(':animated')){
        currentIndex--;
        changeSlide();
      }
    }
    
    //nextボタンの処理
    function nextSlide() {
      if(!$slides.is(':animated')){
        currentIndex++;
        changeSlide();
      }
    }

    //クリック、マウスイベント群
    function setEvent() {
      $slider.on({
        mouseenter: stopTimer,
        mouseleave: startTimer
      });
      $prev.on('click', prevSlide);
      $next.on('click', nextSlide);
      $indicatorItem.on('click', goSomeWhere);
    }

    //初期発火イベント群
    function init() {
      addIndicator();
      cloneSlide();
      setEvent();
      startTimer();
    }
    //init発火
    init();
  }

    slider();



});


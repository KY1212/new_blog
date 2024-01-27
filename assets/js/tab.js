$(function(){
  $('.is-tab:nth-child(1)').addClass('is-show');
  $('.is-tab__title').on('click', function(){
    var index = $('.is-tab__title').index(this);
    $('.is-tab__title').removeClass('selected'); 
    $(this).addClass('selected');
    $('.is-tab').removeClass('is-show');
    $('.is-tab').eq(index).addClass('is-show');
    $('.is-tab__title.is-tab__active').removeClass('is-tab__active');
    $('.is-tab__title').eq(index).addClass('is-tab__active');

  });
});
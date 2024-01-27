$(function(){
  $('.is-hamburger').on('click', function(){
    $('.is-hamburger').toggleClass('is-open');
    $('.p-header__menu__sp').toggleClass('is-visible');
    $('.c-wrapper').toggleClass('is-fixed');
  });
});
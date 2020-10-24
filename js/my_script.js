// ドロップ機能
(function () {
  document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('dropdown-btn');
    if(btn) {
      btn.addEventListener('click', function(){
        this.classList.toggle('is-open');
      });
    }
  });
}());

(function () {
  document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('category-item');
    if(btn) {
      btn.addEventListener('click', function(){
        this.classList.toggle('is-open');
      });
    }
  });
}());

(function () {
  document.addEventListener('DOMContentLoaded', function() {
    const btn = document.getElementById('brand-item');
    if(btn) {
      btn.addEventListener('click', function(){
        this.classList.toggle('is-open');
      });
    }
  });
}());

$(function(){
 
  /* TOP-Pageボタン制御 */
  $('.page-top').hide();  

  $(window).scroll(function () {
      if ($(this).scrollTop() > 100) {  
        $('.page-top').fadeIn();
      } else {
        $('.page-top').fadeOut();
      }
  });

  $('.page-top').click(function () {      
      $('body,html').animate({scrollTop: 0}, 500);  
      return false;
  });
  
  /* スライドショー */
  $('.nav_btn .next').click(function(){
    $('.slide:not(:animated)').animate({
      'margin-left' : -1*$('.slide li').width()
    },function(){
      $('.slide').append($('.slide li:first-child'));
      $('.slide').css('margin-left','0');
    });
  });

  $('.nav_btn .prev').click(function(){
    $('.slide:not(:animated)').prepend($('.slide li:last-child'))
    .css('margin-left', -1*$('slide li').width())
    .animate({
      'margin-left' : 0
    });
  });


});


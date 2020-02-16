var $ = jQuery;
$(document).ready(function () {
  $('.backtotop').click(function(){
    $('html, body').animate({
      scrollTop: (0)
    }, 1000);
  })
  $('#navbar .user-menu .navbar-right button').click(function(){
    $(this).parent().toggleClass('open')
  })
})

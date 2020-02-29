var $ = jQuery;
$(document).ready(function () {
  $('.backtotop').click(function(){
    $('html, body').animate({
      scrollTop: (0)
    }, 1000);
  })
  $('#navbar .user-menu .navbar-right button').click(function(){
    $(this).parent().toggleClass('open');
  });
})
//show collapse menu
$(document).ready(function(){
  var isShow = false;
  $("body").click(function(){
    if(isShow) {
      $(".px-5 div#navbar-collapse").addClass("collapse");
      $("#block-system-main-menu").css('transform', 'translate(100%,0)');
      $("body").removeClass("over-open-menu");
      isShow = false;
    }
  });
  $("#navbar .navbar-header button").click(function () {
    if(!isShow) {
      $(".px-5 div#navbar-collapse").removeClass("collapse");
      $("#block-system-main-menu").css('transform', 'translate(10px,10px)');
      $("body").addClass("over-open-menu");
      setTimeout(function () {
        isShow = true;
      },1000);
    }
  });

  $(".mdi-magnify").click(function(){
    $(".form-search-menu").css("display" ,"inline");
  });
});
// search box in page news
$(".page-news .view-filters").ready(function(){
  $("#edit-title").attr("placeholder", "محصول مورد نظر را جستجو کنید");
  // $("input#edit-created-min").attr({ "value":" ", "placeholder": "از تاریخ"});
  // $("input#edit-created-max").attr({ "value":" ", "placeholder": "تا تاریخ"});
  $.getScript("/sites/all/libraries/persiandatepicker/persian-date.min.js").done(function(){
    $.getScript("/sites/all/libraries/persiandatepicker/persian-datepicker.min.js").done(function(){
      $("input#edit-created-min, input#edit-created-max").blur(function () {
        $(this).persianDatepicker({
          observer: true,
          format: 'YYYY/MM/DD',
          altField: '.observer-example-alt',
        });
      });
    });
  });
});
//carousel in node news//carousel in node news
 $(".node-type-news.not-front").ready(function () {

     $(".field-name-field-news-image .field-items").addClass("owl-carousel owl-theme").owlCarousel({
       rtl: true,
       loop: true,
       margin: 15,
       responsiveClass: true,
       nav: true,
       autoplayTimeout: 3200,
       responsive: {
         0: { items: 1 },
         600: { items: 1 },
         1000: { items: 1 }
       }
     });
 });

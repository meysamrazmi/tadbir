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
  $("body").click(function(){
      $(".px-5 div#navbar-collapse").addClass("collapse");
      $("body").removeClass("over-open-menu");
  });
  $("#block-system-main-menu").click(function (ev) {
    ev.stopPropagation();
  });
  $("#navbar .navbar-header button").click(function (ev) {
    $(".px-5 div#navbar-collapse").removeClass("collapse");
      $("body").addClass("over-open-menu");
      ev.stopPropagation();
  });

  $(".mdi-magnify").click(function(){
    $(".form-search-menu").toggleClass("open");
  });
  //close alert box
  $( "body .close" ).click(function() {
    $(".alert-block").hide();
  });

//add class item
  $("#node-3").ready(function () {
    $("#projects .view-content .views-field-field-ima .field-content").addClass("items");
  });
  $(".page-gallery").ready(function () {
    $(" .view-content .views-field-field-main-image .field-content").addClass("items");
  });
  $(".page-videos").ready(function () {
    $(" .view-content .views-field-field-image-video .field-content").addClass("items");
  });

  $(".node-type-news").ready(function () {
    $(".group-footer .view-content .views-field-field-news-image .field-content").addClass("items");
  });

  $(".node-type-projects").ready(function () {
    $(".group-footer .view-content .views-field-field-ima .field-content").addClass("items");
  });

  $(".node-type-subset").ready(function () {
    $(".group-footer .field-name-field-tarh .field-name-field-ima").addClass("items");
  });

});
// search box in page news
$(".page-news .view-filters").ready(function(){
  $("#edit-title").attr("placeholder", "کلمه مورد نظر را جستجو کنید");
  $("#edit-body-value").attr("placeholder", "در محتوا");
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
   $(".field-name-field-news-image .field-items img").each(function(){
     $(this).after("<span>" + $(this).attr("title") + "</span>");
   })
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
 // page form

$(".page-node-59 #block-system-main, #node-59").ready(function () {
  $("form").addClass("container");
  $(".webform-progressbar").addClass("col-md-3 col-sm-3 col-xs-12");
});
//comment form
$("form.comment-form .form-actions span").text("ارسال پیام");


//carousel in node project//carousel in node news
$(".node-type-projects.not-front").ready(function () {
  $(".field-name-field-middle-slide .field-items img").each(function(){
    $(this).after("<span>" + $(this).attr("title") + "</span>");
  })
  $(".field-name-field-middle-slide .field-items, .field-name-field-slides .field-items ").addClass("owl-carousel owl-theme").owlCarousel({
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

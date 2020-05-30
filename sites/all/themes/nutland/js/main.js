var $ = jQuery;

//show collapse menu
$(document).ready(function(){
  $(".navbar-toggle").click(function(){
    $("#navbar").toggleClass("resp");
    $(".px-5 div#navbar-collapse").toggle(100);
    $(".icon-bar").toggleClass("hidden");
    $(this).toggleClass("xclose");
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
    $(".view form").prepend("<div class='filter hidden-sm hidden-lg hidden-md'><strong>فیلترها</strong></div>");
    $(".view form").on('click', ".filter", function(){
      $(".views-exposed-form").toggle();
      $(".view-header").css('opacity','1');
    });
  });
  $(".page-videos").ready(function () {
    $(" .view-content .views-field-field-image-video .field-content").addClass("items");

  });
  $(".page-news").ready(function () {
    $(".view-content .views-field-field-news-image").addClass("items");
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
  $("#edit-body-value").attr("placeholder", "در تمامی محتواها");
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
//birthday

$(".page-node-5").ready(function(){
  $.getScript("/sites/all/libraries/persiandatepicker/persian-date.min.js").done(function(){
    $.getScript("/sites/all/libraries/persiandatepicker/persian-datepicker.min.js").done(function(){
      $("input#edit-submitted-date").blur(function () {
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


//carousel in node project//carousel in node news
$(".node-type-projects.not-front").ready(function () {
  $(".field-name-field-middle-slide .field-items img").each(function(){
    $(this).after("<span>" + $(this).attr("title") + "</span>");
  })
  $(".field-name-field-middle-slide .field-items").addClass("owl-carousel owl-theme").owlCarousel({
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
//carousel in node subset
$(".node-type-subset.not-front").ready(function () {
  $(".field-name-field-title").click(function(){
    $(".field-name-field-expo").toggle();
  });
  $(".field-name-field-tarh .items").prepend("<div class='line_effect'><span class='lineInner'></span></div>");
  $(".group-left .field-type-image .field-items .field-item").addClass("items");
  $(".field-name-field-slider-main .field-items img, .field-name-field-slider-main .field-items video").each(function(){
    $(this).after("<div class='field-name-field-body'>" + "<div class='field-item'>" + "<p>" + $(this).attr("title") + "</p>" + "</div>" + "</div>");
  })
  $(".field-name-field-slider-main .field-items").addClass("owl-carousel owl-theme").owlCarousel({
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
//project slider

$(".node-type-projects.not-front").ready(function () {
  $(".field-name-field-slide-main .field-items img, .field-name-field-slide-main .field-items video").each(function(){
    $(this).after("<div class='field-name-field-body'>" + "<div class='field-item'>" + "<p>" + $(this).attr("title") + "</p>" + "</div>" + "</div>");
  })
  $(".field-name-field-slide-main .field-items").addClass("owl-carousel owl-theme").owlCarousel({
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
//fix header on scroll
$(window).scroll(function(){
  var sticky = $('.navbar-static-top'),
    scroll = $(window).scrollTop();
  if (scroll >= 100) sticky.addClass('fixed');
  else sticky.removeClass('fixed');
});

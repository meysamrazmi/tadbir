var $ = jQuery;
function videoPlay(event) {
  if($(".active video").length){
    let player = new MediaElementPlayer('.active video');
    player.play();
  }
}

//show collapse menu
$(document).ready(function(){
  $(".navbar-toggle").click(function(){
    $("#navbar").toggleClass("resp");
    $(".px-5 div#navbar-collapse").toggle(100);
    $(".icon-bar").toggleClass("hidden");
    $(this).toggleClass("xclose");
  });
  //convert + to -
  $(".menu.nav .dropdown:not(:nth-child(2))").each(function(){
    $(this).addClass("heigth-" + $(this).find(".dropdown-menu li").length);
  })
  $(".menu.nav .dropdown:nth-child(2)").each(function(){
    $(this).addClass("subset-heigth-" + $(this).find(".dropdown-menu .subsets a").length);
  })
  $(".menu.nav .dropdown").click(function(){
    $(this).toggleClass("petro").find("a .caret").toggleClass("petro");
  });
  let removeOverlay = function(){
    $('.subset-link').removeClass('open');
    $('#block-block-9').removeClass('open');
    $('.left-menu ul li i.mdi-close').removeClass("mdi-close").addClass('mdi-magnify');
    $(".form-search-menu").removeClass("open");
    $('#useroverlay').removeClass("open");
    $('body').removeClass("overlay-open search-open");
    setTimeout(function() {
      $('#block-block-9 .subsets a').removeClass('aos-init aos-animate')
    }, 200)
  }
  $('#useroverlay').click(removeOverlay)
  $('.subset-link').click(function(){
    if($(this).hasClass('open')){
      removeOverlay()
      return
    }
    $('.subset-link').addClass('open');
    $('#block-block-9').addClass('open');
    $('#useroverlay').addClass("open");
    $('body').addClass("overlay-open");
    $('#block-block-9 .subsets > div > a').each(function(i){
      $(this).attr({
        "data-aos": "fade-up",
        "data-aos-delay": (i * 100) + 200,
      })
    }).promise().done( function(){
      setTimeout(function(){
        if(!$('.subsets').hasClass('fired')){
          AOS.init({
            once: true,
            duration: 600,
            offset: -700,
            easing: 'ease-in-sine',
          });
          $('.subsets').addClass('fired');
        } else{
          AOS.refreshHard({
            once: true,
            duration: 700,
            offset: -700,
            easing: 'ease-in-sine',
            delay: 200
          });
        }
      }, 50)
    })
  })
  $(".left-menu ul li.grob").click(function(){
    $(this).find('i').toggleClass("mdi-close mdi-magnify");
    $(".form-search-menu").toggleClass("open");
    $('#useroverlay').toggleClass("open");
    $('body').toggleClass("search-open");
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
    if(Drupal.settings.hasOwnProperty('pathPrefix') && Drupal.settings.pathPrefix == 'en/'){
      $(".view form").prepend("<div class='filter hidden-sm hidden-lg hidden-md'><strong>Filters</strong></div>");
    }
    else {
      $(".view form").prepend("<div class='filter hidden-sm hidden-lg hidden-md'><strong>فیلترها</strong></div>");
    }
    $(".view form").on('click', ".filter", function(){
      $(".views-exposed-form").toggle();
      $(".view-header").css('opacity','1');
    });
  });
  $(".page-videos").ready(function () {
    $(" .view-content .views-field-field-image-video .field-content").addClass("items");
  });
  $(".page-videos , .page-gallery").ready(function () {
    $(".page-videos #block-system-main .view-content, .page-gallery #block-system-main .view-content").append('<div class="views-row"></div><div class="views-row"></div>');
  });
  $(".news-type-image").each(function () {
    $(this).parent().addClass("items");
  });

  $(".node-type-news").ready(function () {
    $(".group-footer .view-content .views-field-field-news-image .field-content").addClass("items");
  });
  $(".node-type-article ").ready(function () {
    $(".group-footer .view-content .views-field-field-image .field-content").addClass("items");
  });

  $(".node-type-projects").ready(function () {
    $(".group-footer .view-content .views-field-field-ima .field-content").addClass("items");
  });

  $(".node-type-subset").ready(function () {
    $(".field-name-field-tarh .field-name-field-ima").addClass("items");
  });

});
// search box in page news
$(".view-filters").ready(function(){
  $("#edit-title").attr("placeholder", "کلمه مورد نظر را جستجو کنید");
  $("#edit-body-value").attr("placeholder", "در تمامی محتواها");
  if(Drupal.settings.hasOwnProperty('pathPrefix') && Drupal.settings.pathPrefix == 'en/'){
    $("#edit-title").attr("placeholder", "Search");
    $("#edit-body-value").attr("placeholder", "in all contents");
  }

  $("input#edit-created-min, input#edit-created-max").each(function(){
    if($(this).val().indexOf('/') > -1)
      $(this).val(moment($(this).val(), 'MM/DD/YYYY').format('YYYY-MM-DD'));
  })
  $.getScript("/sites/all/libraries/persiandatepicker/persianDatepicker.js").done(function(){
    $("#block-system-main").on("mouseenter", "input#edit-created-min, input#edit-created-max", function () {
      if(!$(this).hasClass('onn')){
        $(this).addClass('onn');
        $(this).blur();
        let a = moment($(this).val(), 'YYYY-MM-DD').format('jYYYY-jMM-jDD');
        console.log(a);
        $(this).persianDatepicker({
          showGregorianDate: true,
          // selectedDate: a,
          persianNumbers: false,
          formatDate: 'YYYY-MM-DD',
        });
      }
    });

  });
});
//birthday

$(".page-node-5").ready(function(){
  $.getScript("/sites/all/libraries/persiandatepicker/persianDatepicker.js").done(function(){
    $("#block-system-main").on("mouseenter", "input#edit-submitted-date", function () {
      if(!$(this).hasClass('onn')){
        $(this).addClass('onn');
        $(this).blur();
        let a = moment($(this).val(), 'YYYY-MM-DD').format('jYYYY-jMM-jDD');
        console.log(a);
        $(this).persianDatepicker({
          showGregorianDate: true,
          // selectedDate: a,
          persianNumbers: false,
          formatDate: 'YYYY-MM-DD',
        });
      }
    });
  });
});


//carousel in node news//carousel in node news
 $(".node-type-news.not-front").ready(function () {
   $(".field-name-field-news-image .field-items img").each(function(){
     if($(this).attr("title")){
       $(this).after("<span>" + $(this).attr("title") + "</span>");
     }
   })
     $(".field-name-field-news-image .field-items").addClass("owl-carousel owl-theme").owlCarousel({
       rtl: !(Drupal.settings.hasOwnProperty('pathPrefix') && Drupal.settings.pathPrefix == 'en/'),
       loop: true,
       margin: 15,
       responsiveClass: true,
       nav: true,
       autoplayTimeout: 10000,
       autoplay:true,
       autoplayHoverPause:true,
       responsive: {
         0: { items: 1 },
         600: { items: 1 },
         1000: { items: 1 }
       },
       onTranslated: videoPlay,
     });
   $('.owl-carousel').click(videoPlay);
 });
 // page form

$(".page-node-59 #block-system-main, #node-59").ready(function () {
  $("form").addClass("container");
  $(".webform-progressbar").addClass("col-md-3 col-sm-3 col-xs-12");
});


//carousel in node project//carousel in node news
$(".node-type-projects.not-front").ready(function () {
  $(".field-name-field-middle-slide .field-items img").each(function(){
    if($(this).attr("title")){
      $(this).after("<span>" + $(this).attr("title") + "</span>");
    }
  })
  $(".field-name-field-middle-slide .field-items").addClass("owl-carousel owl-theme").owlCarousel({
    rtl: !(Drupal.settings.hasOwnProperty('pathPrefix') && Drupal.settings.pathPrefix == 'en/'),
    loop: true,
    margin: 15,
    responsiveClass: true,
    nav: true,
    autoplayTimeout: 3200,
    responsive: {
      0: { items: 1 },
      600: { items: 1 },
      1000: { items: 1 }
    },
    onTranslated: videoPlay,
  });
  $('.owl-carousel').click(videoPlay);
});
//carousel in node subset
$(".node-type-subset.not-front").ready(function () {
  $(".field-name-field-tarh .items").prepend("<div class='line_effect'><span class='lineInner'></span></div>");
  $(".field-name-field-slider-main .field-items img").each(function(){
    let a = $(this).attr("title")? $(this).attr("title") : ''
    $(this).after("<div class='field-name-field-body'><div class='field-item'><p>" + a + "</p></div></div>");
  })

  $(".field-name-field-slider-main .field-items").addClass("owl-carousel owl-theme").owlCarousel({
    rtl: !(Drupal.settings.hasOwnProperty('pathPrefix') && Drupal.settings.pathPrefix == 'en/'),
    loop: true,
    margin: 15,
    responsiveClass: true,
    nav: true,
    autoplayTimeout: 10000,
    autoplay:true,
    autoplayHoverPause:true,
    responsive: {
      0: { items: 1 },
      600: { items: 1 },
      1000: { items: 1 }
    },
    onTranslated: videoPlay,
  });
  $('.owl-carousel').click(videoPlay);

  $(".field-name-field-company .field-items").addClass("owl-carousel owl-theme").owlCarousel({
    rtl: !(Drupal.settings.hasOwnProperty('pathPrefix') && Drupal.settings.pathPrefix == 'en/'),
    loop: true,
    margin: 15,
    responsiveClass: true,
    nav: true,
    dots: false,
    autoplayTimeout: 3000,
    autoplay:true,
    autoplayHoverPause:true,
    responsive: {
      0: { items: 2 },
      500: { items: 2 },
      600: { items: 3 },
      1000: { items: 5 }
    },
  });
  $(".field-name-field-tarh > .field-items").addClass("owl-carousel owl-theme").owlCarousel({
    rtl: !(Drupal.settings.hasOwnProperty('pathPrefix') && Drupal.settings.pathPrefix == 'en/'),
    margin: 15,
    responsiveClass: true,
    nav: true,
    dots: false,
    responsive: {
      0: { items: 1 },
      600: { items: 2 },
    },
  });
});
//project slider

$(".node-type-projects.not-front").ready(function () {
  $(".field-name-field-slide-main .field-items img, .field-name-field-slide-main .field-items video").each(function(){
    let a = $(this).attr("title")? $(this).attr("title") : ''
    $(this).after("<div class='field-name-field-body'>" + "<div class='field-item'>" + "<p>" + a + "</p>" + "</div>" + "</div>");
  })
  $(".field-name-field-slide-main .field-items").addClass("owl-carousel owl-theme").owlCarousel({
    rtl: !(Drupal.settings.hasOwnProperty('pathPrefix') && Drupal.settings.pathPrefix == 'en/'),
    loop: true,
    margin: 15,
    responsiveClass: true,
    nav: true,
    autoplayTimeout: 3000,
    autoplay:true,
    autoplayHoverPause:true,
    responsive: {
      0: { items: 1 },
      600: { items: 1 },
      1000: { items: 1 }
    },
    onTranslated: videoPlay,
  });
  $('.owl-carousel').click(videoPlay);
});
//fix header on scroll
$(window).scroll(function(){
  let sticky = $('.navbar-fixed-top'),
    scroll = $(window).scrollTop();
  if (scroll > 0){
    $('body').addClass('fixed');
    sticky.addClass('fixed');
  } else {
    $("body").removeClass('fixed');
    sticky.removeClass('fixed');
  }
});

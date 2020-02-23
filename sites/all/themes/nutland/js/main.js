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
//show search on click magnify
$(document).ready(function(){
  $(".mdi-magnify").click(function(){
    $("#block-google-cse-google-cse").css("display" ,"inline");
  });
  $("#edit-sa").click(function(){
    $("#block-google-cse-google-cse").css("background" , "white");
  });
});
// search box in page news
$.getScript("/sites/all/libraries/persiandatepicker/persian-date.min.js");
$.getScript("/sites/all/libraries/persiandatepicker/persian-datepicker.min.js");
$(".page-news .view-filters").ready(function(){
  $("#edit-title").attr("placeholder", "محصول مورد نظر را جستجو کنید");
  $("input#edit-created-min").attr({ "value":" ", "placeholder": "از تاریخ"});
  $("input#edit-created-max").attr({ "value":" ", "placeholder": "تا تاریخ"});
  $("input#edit-created-min").persianDatepicker({
    observer: true,
    format: 'YYYY/MM/DD',
    altField: '.observer-example-alt'
  });
  $("input#edit-created-max").persianDatepicker({
    observer: true,
    format: 'YYYY/MM/DD',
    altField: '.observer-example-alt'
  });
});

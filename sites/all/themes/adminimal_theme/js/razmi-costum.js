var $ = jQuery;
$(document).ready(function () {

  $('.form-textarea-wrapper .grippie').click( function () {
    $('.form-textarea-wrapper textarea').addClass('dir-ltr');
    $('.form-textarea-wrapper textarea').css('direction', 'ltr');

  });
  $('#field-classes-timing-values > tbody > tr .field-vip input').change(function(){
    if($(this).prop("checked")){
      $(this).parents('tr').addClass('groupClass')
    }else{
      $(this).parents('.groupClass').removeClass('groupClass')
    }
  })
  $('#field-classes-timing-values > tbody > tr').each(function(){
    if($(this).find('.field-vip input').prop("checked")){
      $(this).addClass('groupClass')
    }
  })

  $('body').on('keypress paste', 'textarea.text-summary', function(e) {
    var tval = $(this).val(),
      tlength = tval.length,
      set = 500,
      remain = parseInt(set - tlength);
    $(this).parent().parent().find('.description').text('برای استفاده از مقدار برش‌یافته متن کامل به عنوان خلاصه، این را خالی بگذارید. '+ remain +'/'+ set +' کاراکتر باقی مانده.');
    if (remain <= 0 && e.which !== 0 && e.charCode !== 0) {
      $(this).val((tval).substring(0, set));
      return false;
    }
  })
});


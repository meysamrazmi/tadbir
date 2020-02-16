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


});


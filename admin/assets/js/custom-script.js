$(document).ajaxStart(function() { Pace.restart(); });
$(function() {
	$( "form.validate" ).submit(function( event ) {

	var access = true;
	$(this).find('.required').each(function() {
		var v = $(this).val();

		if(v == null) v='';
		if((v.replace(/\s+/g, '')) == '') {
			//alert('e');
			access = false;
			$(this).parents(".form-group").addClass("has-error");
		}
		else {
			//alert('s');
			$(this).parents(".form-group").removeClass("has-error");
		}
	});
	if(access) {
		return;
	}
	else {
		$("html, body").animate({ scrollTop: $('.has-error').offset().top - 50 }, "slow");
	}
	event.preventDefault();
	
	});
});
/* Admin Profile picture settings ****start*****/
$('#profile_pic').on("change", function() {
	readURL(this);
});


$('#profileimg-form').change(function() {
	$('form#profilepic-form-img').submit();
});
/*****end*****Admin Profile picture settings */
/* Admin Profile password settings ****start*****/
/* Old password */
$("#passwordold").on("keyup",function(){
    if($(this).val())
        $(".glyphicon-eye-open-old").show();
    else
        $(".glyphicon-eye-open-old").hide();
    });
$(".glyphicon-eye-open-old").mousedown(function(){
                $("#passwordold").attr('type','text');
            }).mouseup(function(){
            	$("#passwordold").attr('type','password');
            }).mouseout(function(){
            	$("#passwordold").attr('type','password');
            });
/* New password */
$("#passwordnew").on("keyup",function(){
    if($(this).val())
        $(".glyphicon-eye-open-new").show();
    else
        $(".glyphicon-eye-open-new").hide();
    });
$(".glyphicon-eye-open-new").mousedown(function(){
                $("#passwordnew").attr('type','text');
            }).mouseup(function(){
            	$("#passwordnew").attr('type','password');
            }).mouseout(function(){
            	$("#passwordnew").attr('type','password');
            });
/* Confirm new password */
$("#passwordconform").on("keyup",function(){
    if($(this).val())
        $(".glyphicon-eye-open-conform").show();
    else
        $(".glyphicon-eye-open-conform").hide();
    });
$(".glyphicon-eye-open-conform").mousedown(function(){
                $("#passwordconform").attr('type','text');
            }).mouseup(function(){
            	$("#passwordconform").attr('type','password');
            }).mouseout(function(){
            	$("#passwordconform").attr('type','password');
            });
/*****end*****Admin Profile password settings */	













function reload_gallery() {
	
	$('.thumbnail a').colorbox({
        rel: 'thumbnail a',
        transition: "elastic",
        maxWidth: "95%",
        maxHeight: "95%",
        slideshow: true
    });
	
}






/*****popup view of render management ***/
$('.show-render').on("click", function(){
	var id = $(this).attr("data-id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets_admin/images/ajax-loader-4.gif" /></p>';
    $('#popup-renderModal .modal-renderbody').html(loader);
    $('#popup-renderModal').modal({show:true});
	$.ajax({	        
				type: "POST",
				url: base_url+'Renter/viewpopup',
                
				data: {'id':id},
				cache: false,
				success: function(result)
				{
					$('#popup-renderModal .modal-renderbody').html(result);
				}
	});
})
/*****popup view of Car Directory management ***/
$('.show-Cardirectory').on("click", function(){
	var id = $(this).attr("data-id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets_admin/images/ajax-loader-4.gif" /></p>';
    $('#popup-directoryModal .modal-directorybody').html(loader);
    $('#popup-directoryModal').modal({show:true});
	$.ajax({	        
				type: "POST",
				url: base_url+'Cardirectory/viewpopup',
                
				data: {'id':id},
				cache: false,
				success: function(result)
				{
					$('#popup-directoryModal .modal-directorybody').html(result);
				}
	});
})
/*****popup view of Dealership management ***/
$('.show-dealer').on("click", function(){
	var id = $(this).attr("data-id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets_admin/images/ajax-loader-4.gif" /></p>';
    $('#popup-dealerModal .modal-dealerbody').html(loader);
    $('#popup-dealerModal').modal({show:true});
	$.ajax({	        
				type: "POST",
				url: base_url+'Dealer/viewpopup',
                
				data: {'id':id},
				cache: false,
				success: function(result)
				{
					$('#popup-dealerModal .modal-dealerbody').html(result);
				}
	});
})
/*****popup view of Showroom management ***/
$('.show-Showroom').on("click", function(){
	var id = $(this).attr("data-id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets_admin/images/ajax-loader-4.gif" /></p>';
    $('#popup-showroomModal .modal-showroombody').html(loader);
    $('#popup-showroomModal').modal({show:true});
	$.ajax({	        
				type: "POST",
				url: base_url+'Showroom/viewpopup',
                
				data: {'id':id},
				cache: false,
				success: function(result)
				{
					$('#popup-showroomModal .modal-showroombody').html(result);
					
				}
	});
})
/*****popup view of Payment management ***/
$('.show-Payment').on("click", function(){
	var id = $(this).attr("data-id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets_admin/images/ajax-loader-4.gif" /></p>';
    $('#popup-paymentModal .modal-paymentbody').html(loader);
    $('#popup-paymentModal').modal({show:true});
	$.ajax({	        
				type: "POST",
				url: base_url+'Payment/viewpopup',
                
				data: {'id':id},
				cache: false,
				success: function(result)
				{
					$('#popup-paymentModal .modal-paymentbody').html(result);
					
				}
	});
})
/*****popup view of Deal management ***/
$('.show-deal').on("click", function(){
	var id = $(this).attr("data-id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets_admin/images/ajax-loader-4.gif" /></p>';
    $('#popup-dealModal .modal-dealbody').html(loader);
    $('#popup-dealModal').modal({show:true});
	$.ajax({	        
				type: "POST",
				url: base_url+'Deal/viewpopup',
                
				data: {'id':id},
				cache: false,
				success: function(result)
				{
					$('#popup-dealModal .modal-dealbody').html(result);
				}
	});
})
/***Car Gallery delete ****/
$('.thumbnails').on('click', '.gallery-delete', function (e) {
	 e.preventDefault();
	var id = $(this).parents('.thumbnail').data("id");
	var loader = '<p class="text-center"><img src="'+base_url+'assets_admin/images/ajax-loader-4.gif" /></p>';
	$.ajax({	        
				type: "POST",
				url: base_url+'Cardirectory/delete_cargallery',
                
				data: {'id':id},
				cache: false,
				success: function(result)
				{
					$(this).parents('.thumbnail').fadeOut(3000);
					location.reload();
				}
	});
})
//Multi Select Box 	//			   
$(document).ready(function() {			
				 
$(".js-example-basic-multiple").select2();   
				   
});	
/*******script for state by city using google map API********/
var autocomplete = {};
		var autocompletesWraps = ['test2'];
		var test2_form = { street_number: 'short_name', route: 'long_name', locality: 'long_name', administrative_area_level_1: 'long_name', 
		                   country: 'long_name', postal_code: 'short_name',latitude: 'long_name' };

		function initialize() {
			$.each(autocompletesWraps, function(index, name) {
				if($('#'+name).length == 0) {
					return;
				}
				autocomplete[name] = new google.maps.places.Autocomplete($('#'+name+' .autocomplete')[0], { types: ['geocode'] });	
				google.maps.event.addListener(autocomplete[name], 'place_changed', function() {
					
					var place = autocomplete[name].getPlace();
					
					document.getElementById('lat').value = place.geometry.location.lat();
					document.getElementById('lon').value = place.geometry.location.lng();	
					var form = eval(name+'_form');

					for (var component in form) {
						$('#'+name+' .'+component).val('');
						$('#'+name+' .'+component).attr('disabled', false);
					}
					for (var i = 0; i < place.address_components.length; i++) {
						var addressType = place.address_components[i].types[0];
						if (typeof form[addressType] !== 'undefined') {
						  var val = place.address_components[i][form[addressType]];
						  $('#'+name+' .'+addressType).val(val);
						}
					}
				});
			});
		}
/*******end********/
/**Add permission**/	 
	/* Get the checkboxes values based on the class attached to each check box */
	$(".role_checkbox").click(function() {
		 var t='';
		$(".role_checkbox:checked").each(function() {
			
			t+=$(this).val()+',';
			$('.role_permission').val($(this).val());
		});	
		var input = $('.role_permission1');
		input.val(t);
	
		t='';
	});
/**Add to role permission**/
$('.role-sub').click(function(){
	var createdby_id = $('#conceiveID').val();
	var role_id = $('#get_role_id').val();
    page_id = $('.role_permission1').val();
	$.ajax({
		url: base_url+"Role/update_role",
		type:'post',
		data:{'role_id':role_id,'page_id':page_id,'created_by':createdby_id},
		success:function(book){
			$(".result-role").show();
			console.log(book);
			if(book==2 || book ==4){
					$(".result-role").html('<p class="error">Error</p>');
					//setTimeout(function(){$(".result-role").hide(); }, 3000);
			}else if(book == 1){
					$(".result-role").html('<p class="success">Role Permission Added successfully</p>');
					//setTimeout(function(){$(".result-role").hide(); }, 1500);
			}else{
					$(".result-role").html('<p class="success">Role Permission Changes successfully</p>');
					//setTimeout(function(){$(".result-role").hide(); }, 1500);
			}
		}	
	});  
}); 
/**Datepicker for Add renter page**/
$(function() {
    $(".datepicker1").datepicker({
		 //maxDate: 0
		format: 'dd-mm-yyyy',
		autoclose: true
		});

});
$(function() {
			var general_today = new Date(); 
			var general_dd = general_today.getDate();
			var general_mm = general_today.getMonth()+1; //January is 0! 
			var general_hours = general_today.getHours(); 
			var general_minutes = general_today.getMinutes();
			var general_yyyy = general_today.getFullYear();
			today_original = general_yyyy+'-'+general_mm+'-'+general_dd+' '+general_hours+':'+general_minutes; 
			$(".datetimepicker1").datetimepicker({ minuteStep:60, autoclose: true, startDate: today_original, format: 'dd-mm-yyyy HH:ii P'});
});

$(function() {	
	$("#from_datetimepicker").on("change", function(){ 
		$(".to_datetimepicker").val('');
		var from_date = $("#from_datetimepicker").val();	
		$.ajax({
			url:base_url+"Carpayments/get_fromdatetime",
			type: 'post',			
			data:'from_date='+from_date,
			success:function(data){							
				$(".to_datetimepicker").datetimepicker({
					minuteStep:60, 
					autoclose: true, 
					startDate:data,
					format: 'dd-mm-yyyy HH:ii P'			
				});
			}			
		});
	})
});



$( document ).ready(function() {
    $('.hiderole').hide();
});

$(function () {
      	$(".timepicker").timepicker({
      		'minTime': '12:00 Am',
    		'maxTime': '11:30 Pm',
			'timeFormat': 'g:i A',
			'step' : '60',
			'disableTextInput' : 'false',			
	      showInputs: false
	    });
});
/**place by location**/
 
 $(document).ready(function(){ 
   $("#place").hide();
   $("#place2").show();
	$('#location_id').on("change", function(){
		$("#place").show();
		$("#place2").hide();
		var id = $('#location_id').val();
		$.ajax({	        
					type: "POST",
					url: base_url+'Showroom/getplace',
					
					data: {'id':id},
					cache: false,
					success: function(result)
					{
							console.log(result);
							$('.get_cat_sub').html("");
							$('.get_cat_sub').html(result);
					}
		});
	})
  });
  /**Add Home Lanaguage translation**/
  $(document).ready(function(){			   
	$("#useradd").click(function(e){
		var data = {};
		  var isValid = true;
		$('input[type="hidden"]').each(function() {           
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val();           
        });
        $('input[type="text"]').each(function() {           
			if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",   
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
			$(this).css({
				"border": "",
				"background": ""
			});
			
			var name = $(this).attr('name');			
			data[name] = $(this).val(); 
			}
        });
		var data_new ={};
		$("textarea").each(function(){
			var name = $(this).attr('name');
			data[name] = $(this).val();
		});
		
		$data = JSON.stringify(data);
		if (isValid == false) {
            e.preventDefault();
		 }
        else {		
		var value =$("#home_reg").serialize();			
		$.ajax({				
			url:base_url+"Hometranslation/insert_home",
			type: 'post',
			dataType: 'json',
			data:JSON.stringify(data),
			success:function(res){
				$(".edituser").show();
				console.log(res);
				if(res==0){
					$(".edituser").focus();
					$(".edituser").html('<p class="error">Error</p>');
					setTimeout(function(){$(".edituser").hide(); }, 3000);
				}
				else if(res==1){
					$(".edituser").focus();
					$(".edituser").html('<p class="success"> Language Saved Successfully</p>');
				}
				else if(res==2){
					$(".edituser").focus();
					$(".edituser").html('<p class="error"> Updated Successfully</p>');
					setTimeout(function(){$(".edituser").hide(); }, 3000);
				}
			}
		});	  
		}		
	});
  
});
/**Edit Home Lanaguage translation**/
$("#useradd1").click(function(e){
	var id = $('#id').val();
	var data = {};
	  var isValid = true;
	$('input[type="hidden"]').each(function() {           
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val();           
        });
    $('input[type="text"]').each(function() {           
		if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",   
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
		$(this).css({
			"border": "",
			"background": ""
		});
	var name = $(this).attr('name');			
	data[name] = $(this).val();
			}	
    });
	$("textarea").each(function(){
			if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",  
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
		$(this).css({
			"border": "",
			"background": ""
		});
			var name = $(this).attr('name');
			data[name] = $(this).val();
			}
		});
  	var data_new ={};	
	data['id'] = id;
	$data = JSON.stringify(data);
		/* change work */
		if (isValid == false) {
            e.preventDefault();
		 }
        else {
		/* change work */	
	var value =$("#home_edit").serialize();	
    $.ajax({				
		url:base_url+"Hometranslation/insert_home",
		type: 'post',
		dataType: 'json',
		data:JSON.stringify(data),
		success:function(res){
			$(".edituser").show();
			console.log(res);
			if(res==0){
				$(".edituser").focus();
				$(".edituser").html('<p class="error">Error</p>');
				setTimeout(function(){$(".edituser").hide(); }, 3000);	
			}
			else if(res==2){
				$(".edituser").focus();
				$(".edituser").html('<p class="error"> Updated Successfully</p>');
				setTimeout(function(){$(".edituser").hide(); }, 3000);
			}
		}
	});
/* change work */	
}
/* change work */
});
/**Add Login Lanaguage translation**/
$(document).ready(function(){			   
	$("#loginadd1").click(function(e){
		var data = {};
		  var isValid = true;
		$('input[type="hidden"]').each(function() {           
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val();           
        });
        $('input[type="text"]').each(function() {           
			if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",
                    
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val(); 
			}
        });
		var data_new ={};
		$("textarea").each(function(){
			var name = $(this).attr('name');
			data[name] = $(this).val();
		});
		$data = JSON.stringify(data);	
		if (isValid == false) {
            e.preventDefault();
		 }
        else {		
		var value =$("#loginadd").serialize();			
		$.ajax({				
			url:base_url+"Logintranslation/insert_login",
			type: 'post',
			dataType: 'json',
			data:JSON.stringify(data),
			success:function(res){
				$(".edituser").show();
				console.log(res);
				if(res==0){
					$(".edituser").focus();
					$(".edituser").html('<p class="error">Error</p>');
					setTimeout(function(){$(".edituser").hide(); }, 3000);
				}
				else if(res==1){
					$(".edituser").focus();
					$(".edituser").html('<p class="success"> Language Saved Successfully</p>');
				}
				else if(res==2){
					$(".edituser").focus();
					$(".edituser").html('<p class="error"> Updated Successfully</p>');
					setTimeout(function(){$(".edituser").hide(); }, 3000);
				}
			}
		});	
		}		
	});
	
});
/**Edit Login Lanaguage translation**/
$("#loginedit1").click(function(e){
	var id = $('#id').val();
	var data = {};
	  var isValid = true;
	$('input[type="hidden"]').each(function() {           
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val();           
        });
    $('input[type="text"]').each(function() {           
		if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red", 
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
		$(this).css({
			"border": "",
			"background": ""
		});
	var name = $(this).attr('name');			
	data[name] = $(this).val();
			}	
    });
	$("textarea").each(function(){
			if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",   
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
		$(this).css({
			"border": "",
			"background": ""
		});
			var name = $(this).attr('name');
			data[name] = $(this).val();
			}
		});
  	var data_new ={};	
	data['id'] = id;
	$data = JSON.stringify(data);
	if (isValid == false) {
            e.preventDefault();
	 }
     else {	
	var value =$("#loginedit").serialize();	
    $.ajax({				
		url:base_url+"Logintranslation/insert_login",
		type: 'post',
		dataType: 'json',
		data:JSON.stringify(data),
		success:function(res){
			$(".edituser").show();
			console.log(res);
			if(res==0){
				$(".edituser").focus();
				$(".edituser").html('<p class="error">Error</p>');
				setTimeout(function(){$(".edituser").hide(); }, 3000);	
			}
			else if(res==2){
				$(".edituser").focus();
				$(".edituser").html('<p class="error"> Updated Successfully</p>');
				setTimeout(function(){$(".edituser").hide(); }, 3000);
			}
		}
	});
	}
});
/**Add Tariff Lanaguage translation**/
$(document).ready(function(){			   
	$("#tariffadd1").click(function(e){
		var data = {};
		  var isValid = true;
		$('input[type="hidden"]').each(function() {           
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val();           
        });
        $('input[type="text"]').each(function() {           
			if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red", 
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val(); 
			}
        });
		var data_new ={};
		$("textarea").each(function(){
			var name = $(this).attr('name');
			data[name] = $(this).val();
		});
		$data = JSON.stringify(data);	
		if (isValid == false) {
            e.preventDefault();
		 }
        else {		
		var value =$("#tariffadd").serialize();			
		$.ajax({				
			url:base_url+"Tarifftranslation/insert_tariff",
			type: 'post',
			dataType: 'json',
			data:JSON.stringify(data),
			success:function(res){
				$(".edituser").show();
				console.log(res);
				if(res==0){
					$(".edituser").focus();
					$(".edituser").html('<p class="error">Error</p>');
					setTimeout(function(){$(".edituser").hide(); }, 3000);
				}
				else if(res==1){
					$(".edituser").focus();
					$(".edituser").html('<p class="success"> Language Saved Successfully</p>');
				}
				else if(res==2){
					$(".edituser").focus();
					$(".edituser").html('<p class="error"> Updated Successfully</p>');
					setTimeout(function(){$(".edituser").hide(); }, 3000);
				}
			}
		});	
		}		
	});
});
/**Edit Tariff Lanaguage translation**/
$(document).ready(function(){	
$("#tariffedit1").click(function(e){
	var id = $('#id').val();
	var data = {};
	  var isValid = true;
	$('input[type="hidden"]').each(function() {           
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val();           
        });
    $('input[type="text"]').each(function() {           
		if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",   
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
		$(this).css({
			"border": "",
			"background": ""
		});
	var name = $(this).attr('name');			
	data[name] = $(this).val();
			}	
    });
	$("textarea").each(function(){
			if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",   
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
		$(this).css({
			"border": "",
			"background": ""
		});
			var name = $(this).attr('name');
			data[name] = $(this).val();
			}
		});
  	var data_new ={};	
	data['id'] = id;
	$data = JSON.stringify(data);	
	if (isValid == false) {
            e.preventDefault();
		 }
        else {	
	var value =$("#tariffedit").serialize();	
    $.ajax({				
		url:base_url+"Tarifftranslation/insert_tariff",
		type: 'post',
		dataType: 'json',
		data:JSON.stringify(data),
		success:function(res){
			$(".edituser").show();
			console.log(res);
			if(res==0){
				$(".edituser").focus();
				$(".edituser").html('<p class="error">Error</p>');
				setTimeout(function(){$(".edituser").hide(); }, 3000);	
			}
			else if(res==2){
				$(".edituser").focus();
				$(".edituser").html('<p class="error"> Updated Successfully</p>');
				setTimeout(function(){$(".edituser").hide(); }, 3000);
			}
		}
	 });
	}
  });
});
/**Add Renter Lanaguage translation**/
$(document).ready(function(){			   
	$("#renteradd1").click(function(e){
		var data = {};
		  var isValid = true;
		$('input[type="hidden"]').each(function() {           
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val();           
        });
        $('input[type="text"]').each(function() {           
			if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",  
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val(); 
			}
        });
		var data_new ={};
		$("textarea").each(function(){
			var name = $(this).attr('name');
			data[name] = $(this).val();
		});
		$data = JSON.stringify(data);
		if (isValid == false) {
            e.preventDefault();
		 }
        else {		
		var value =$("#renteradd").serialize();			
		$.ajax({				
			url:base_url+"Chronologypopuptranslation/insert_chronologypopup",
			type: 'post',
			dataType: 'json',
			data:JSON.stringify(data),
			success:function(res){
				$(".edituser").show();
				console.log(res);
				if(res==0){
					$(".edituser").focus();
					$(".edituser").html('<p class="error">Error</p>');
					setTimeout(function(){$(".edituser").hide(); }, 3000);
				}
				else if(res==1){
					$(".edituser").focus();
					$(".edituser").html('<p class="success"> Language Saved Successfully</p>');
				}
				else if(res==2){
					$(".edituser").focus();
					$(".edituser").html('<p class="error"> Updated Successfully</p>');
					setTimeout(function(){$(".edituser").hide(); }, 3000);
				}
			}
		});	
		}		
	});
});
/**Edit Renter Lanaguage translation**/
$("#renteredit1").click(function(e){
	var id = $('#id').val();
	var data = {};
	  var isValid = true;
	$('input[type="hidden"]').each(function() {           
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val();           
        });
    $('input[type="text"]').each(function() {           
		if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",  
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
		$(this).css({
			"border": "",
			"background": ""
		});
	var name = $(this).attr('name');			
	data[name] = $(this).val();
			}	
    });
	$("textarea").each(function(){
			if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",  
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
		$(this).css({
			"border": "",
			"background": ""
		});
			var name = $(this).attr('name');
			data[name] = $(this).val();
			}
		});
  	var data_new ={};	
	data['id'] = id;
	$data = JSON.stringify(data);
	if (isValid == false) {
            e.preventDefault();
		 }
        else {	
	var value =$("#renteredit").serialize();	
    $.ajax({				
		url:base_url+"Rentertranslation/insert_renter",
		type: 'post',
		dataType: 'json',
		data:JSON.stringify(data),
		success:function(res){
			$(".edituser").show();
			console.log(res);
			if(res==0){
				$(".edituser").focus();
				$(".edituser").html('<p class="error">Error</p>');
				setTimeout(function(){$(".edituser").hide(); }, 3000);	
			}
			else if(res==2){
				$(".edituser").focus();
				$(".edituser").html('<p class="error"> Updated Successfully</p>');
				setTimeout(function(){$(".edituser").hide(); }, 3000);
			}
		}
	});
	}
});
/**Add Commute Lanaguage translation**/
$(document).ready(function(){			   
	$("#commuteadd1").click(function(e){
		var data = {};
		  var isValid = true;
		$('input[type="hidden"]').each(function() {           
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val();           
        });
        $('input[type="text"]').each(function() {           
			if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",  
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val(); 
			}
        });
		var data_new ={};
		$("textarea").each(function(){
			var name = $(this).attr('name');
			data[name] = $(this).val();
		});
		$data = JSON.stringify(data);
		if (isValid == false) {
            e.preventDefault();
		 }
        else {		
		var value =$("#commuteadd").serialize();			
		$.ajax({				
			url:base_url+"Commutetranslation/insert_commute",
			type: 'post',
			dataType: 'json',
			data:JSON.stringify(data),
			success:function(res){
				$(".edituser").show();
				console.log(res);
				if(res==0){
					$(".edituser").focus();
					$(".edituser").html('<p class="error">Error</p>');
					setTimeout(function(){$(".edituser").hide(); }, 3000);
				}
				else if(res==1){
					$(".edituser").focus();
					$(".edituser").html('<p class="success"> Language Saved Successfully</p>');
				}
				else if(res==2){
					$(".edituser").focus();
					$(".edituser").html('<p class="error"> Updated Successfully</p>');
					setTimeout(function(){$(".edituser").hide(); }, 3000);
				}
			}
		});	
	   }		
	});
});
/**Edit Commute Lanaguage translation**/
$(document).ready(function(){
$("#commuteedit1").click(function(e){
	var id = $('#id').val();
	var data = {};
	  var isValid = true;
	$('input[type="hidden"]').each(function() {           
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val();           
        });
    $('input[type="text"]').each(function() {           
		if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red", 
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
		$(this).css({
			"border": "",
			"background": ""
		});
	var name = $(this).attr('name');			
	data[name] = $(this).val();
			}	
    });
	$("textarea").each(function(){
			if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",   
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
		$(this).css({
			"border": "",
			"background": ""
		});
			var name = $(this).attr('name');
			data[name] = $(this).val();
			}
		});
  	var data_new ={};	
	data['id'] = id;
	$data = JSON.stringify(data);	
	if (isValid == false) {
            e.preventDefault();
		 }
        else {	
	var value =$("#commuteedit").serialize();	
    $.ajax({				
		url:base_url+"Commutetranslation/insert_commute",
		type: 'post',
		dataType: 'json',
		data:JSON.stringify(data),
		success:function(res){
			$(".edituser").show();
			console.log(res);
			if(res==0){
				$(".edituser").focus();
				$(".edituser").html('<p class="error">Error</p>');
				setTimeout(function(){$(".edituser").hide(); }, 3000);	
			}
			else if(res==2){
				$(".edituser").focus();
				$(".edituser").html('<p class="error"> Updated Successfully</p>');
				setTimeout(function(){$(".edituser").hide(); }, 3000);
			}
		}
	});
   }
});
});
/**Add Deal Lanaguage translation**/
$(document).ready(function(){			   
	$("#dealadd1").click(function(e){
		var data = {};
		  var isValid = true;
		$('input[type="hidden"]').each(function() {           
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val();           
        });
        $('input[type="text"]').each(function() {           
			if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",  
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val(); 
			}
        });
		var data_new ={};
		$("textarea").each(function(){
			var name = $(this).attr('name');
			data[name] = $(this).val();
		});
		$data = JSON.stringify(data);	
		if (isValid == false) {
            e.preventDefault();
		 }
        else {		
		var value =$("#dealadd").serialize();			
		$.ajax({				
			url:base_url+"Dealtranslation/insert_deal",
			type: 'post',
			dataType: 'json',
			data:JSON.stringify(data),
			success:function(res){
				$(".edituser").show();
				console.log(res);
				if(res==0){
					$(".edituser").focus();
					$(".edituser").html('<p class="error">Error</p>');
					setTimeout(function(){$(".edituser").hide(); }, 3000);
				}
				else if(res==1){
					$(".edituser").focus();
					$(".edituser").html('<p class="success"> Language Saved Successfully</p>');
				}
				else if(res==2){
					$(".edituser").focus();
					$(".edituser").html('<p class="error"> Updated Successfully</p>');
					setTimeout(function(){$(".edituser").hide(); }, 3000);
			   }	
			}
		});
		}		
	});
});
/**Edit Deal Lanaguage translation**/
$(document).ready(function(){	
$("#dealedit1").click(function(e){
	var id = $('#id').val();
	var data = {};
	  var isValid = true;
	$('input[type="hidden"]').each(function() {           
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val();           
        });
    $('input[type="text"]').each(function() {           
		if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red", 
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
		$(this).css({
			"border": "",
			"background": ""
		});
	var name = $(this).attr('name');			
	data[name] = $(this).val();
			}	
    });
	$("textarea").each(function(){
			if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red", 
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
		$(this).css({
			"border": "",
			"background": ""
		});
			var name = $(this).attr('name');
			data[name] = $(this).val();
			}
		});
  	var data_new ={};	
	data['id'] = id;
	$data = JSON.stringify(data);
		if (isValid == false) {
            e.preventDefault();
		 }
        else {	
	var value =$("#dealedit").serialize();	
    $.ajax({				
		url:base_url+"Dealtranslation/insert_deal",
		type: 'post',
		dataType: 'json',
		data:JSON.stringify(data),
		success:function(res){
			$(".edituser").show();
			console.log(res);
			if(res==0){
				$(".edituser").focus();
				$(".edituser").html('<p class="error">Error</p>');
				setTimeout(function(){$(".edituser").hide(); }, 3000);	
			}
			else if(res==2){
				$(".edituser").focus();
				$(".edituser").html('<p class="error"> Updated Successfully</p>');
				setTimeout(function(){$(".edituser").hide(); }, 3000);
			}
		}
	});
	}
});
});
/**Add Offers Lanaguage translation**/
$(document).ready(function(){			   
	$("#offersadd1").click(function(e){
		var data = {};
		  var isValid = true;
		$('input[type="hidden"]').each(function() {           
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val();           
        });
        $('input[type="text"]').each(function() {           
			if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red", 
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val(); 
			}
        });
		var data_new ={};
		$("textarea").each(function(){
			var name = $(this).attr('name');
			data[name] = $(this).val();
		});
		$data = JSON.stringify(data);	
		if (isValid == false) {
            e.preventDefault();
		 }
        else {		
		var value =$("#offersadd").serialize();			
		$.ajax({				
			url:base_url+"Offerstranslation/insert_offer",
			type: 'post',
			dataType: 'json',
			data:JSON.stringify(data),
			success:function(res){
				$(".edituser").show();
				console.log(res);
				if(res==0){
					$(".edituser").focus();
					$(".edituser").html('<p class="error">Error</p>');
					setTimeout(function(){$(".edituser").hide(); }, 3000);
				}
				else if(res==1){
					$(".edituser").focus();
					$(".edituser").html('<p class="success"> Language Saved Successfully</p>');
				}
				else if(res==2){
					$(".edituser").focus();
					$(".edituser").html('<p class="error"> Updated Successfully</p>');
					setTimeout(function(){$(".edituser").hide(); }, 3000);
				}
			}
		});	
		}		
	});
});
/**Edit Offers Lanaguage translation**/
$("#offersedit1").click(function(e){
	var id = $('#id').val();
	var data = {};
	  var isValid = true;
	$('input[type="hidden"]').each(function() {           
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val();           
        });
    $('input[type="text"]').each(function() {           
		if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",  
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
		$(this).css({
			"border": "",
			"background": ""
		});
	var name = $(this).attr('name');			
	data[name] = $(this).val();
			}	
    });
	$("textarea").each(function(){
			if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",  
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
		$(this).css({
			"border": "",
			"background": ""
		});
			var name = $(this).attr('name');
			data[name] = $(this).val();
			}
		});
  	var data_new ={};	
	data['id'] = id;
	$data = JSON.stringify(data);	
	if (isValid == false) {
            e.preventDefault();
	 }
    else {	
	var value =$("#offersedit").serialize();	
    $.ajax({				
		url:base_url+"Offerstranslation/insert_offer",
		type: 'post',
		dataType: 'json',
		data:JSON.stringify(data),
		success:function(res){
			$(".edituser").show();
			console.log(res);
			if(res==0){
				$(".edituser").focus();
				$(".edituser").html('<p class="error">Error</p>');
				setTimeout(function(){$(".edituser").hide(); }, 3000);	
			}
			else if(res==2){
				$(".edituser").focus();
				$(".edituser").html('<p class="error"> Updated Successfully</p>');
				setTimeout(function(){$(".edituser").hide(); }, 3000);
			}
		}
	});
	}
});
/**Add Chronology Lanaguage translation**/
$(document).ready(function(){			   
	$("#chronologyadd").click(function(e){
		var data = {};
		  var isValid = true;
		$('input[type="hidden"]').each(function() {           
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val();           
        });
        $('input[type="text"]').each(function() {           
			if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",   
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val(); 
			}
        });
		var data_new ={};
		$("textarea").each(function(){
			var name = $(this).attr('name');
			data[name] = $(this).val();
		});
		$data = JSON.stringify(data);	
		if (isValid == false) {
            e.preventDefault();
		 }
        else {		
		var value =$("#chronologypopup").serialize();			
		$.ajax({				
			url:base_url+"Chronologypopuptranslation/insert_chronologypopup",
			type: 'post',
			dataType: 'json',
			data:JSON.stringify(data),
			success:function(res){
				$(".edituser").show();
				console.log(res);
				if(res==0){
					$(".edituser").focus();
					$(".edituser").html('<p class="error">Error</p>');
					setTimeout(function(){$(".edituser").hide(); }, 3000);
				}
				else if(res==1){
					$(".edituser").focus();
					$(".edituser").html('<p class="success"> Language Saved Successfully</p>');
				}
				else if(res==2){
					$(".edituser").focus();
					$(".edituser").html('<p class="error"> Updated Successfully</p>');
					setTimeout(function(){$(".edituser").hide(); }, 3000);
				}
			}
		});	
		}		
	});
});
/**Edit Chronology Lanaguage translation**/
$("#chronologyeditpage").click(function(e){
	var id = $('#id').val();
	var data = {};
	  var isValid = true;
	$('input[type="hidden"]').each(function() {           
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val();           
        });
    $('input[type="text"]').each(function() {           
		if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",  
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
		$(this).css({
			"border": "",
			"background": ""
		});
	var name = $(this).attr('name');			
	data[name] = $(this).val();
			}	
    });
	$("textarea").each(function(){
			if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",  
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
		$(this).css({
			"border": "",
			"background": ""
		});
			var name = $(this).attr('name');
			data[name] = $(this).val();
			}
		});
  	var data_new ={};	
	data['id'] = id;
	$data = JSON.stringify(data);	
		if (isValid == false) {
            e.preventDefault();
		 }
        else {	
	var value =$("#offersedit").serialize();	
    $.ajax({				
		url:base_url+"Chronologypopuptranslation/insert_chronologypopup",
		type: 'post',
		dataType: 'json',
		data:JSON.stringify(data),
		success:function(res){
			$(".edituser").show();
			console.log(res);
			if(res==0){
				$(".edituser").focus();
				$(".edituser").html('<p class="error">Error</p>');
				setTimeout(function(){$(".edituser").hide(); }, 3000);	
			}
			else if(res==2){
				$(".edituser").focus();
				$(".edituser").html('<p class="error"> Updated Successfully</p>');
				setTimeout(function(){$(".edituser").hide(); }, 3000);
			}
		}
	});
	}
});
/**Add Coupebooking Lanaguage translation**/
$(document).ready(function(){			   
	$("#coupeadd").click(function(e){
		var data = {};
		  var isValid = true;
		$('input[type="hidden"]').each(function() {           
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val();           
        });
        $('input[type="text"]').each(function() {           
			if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",
                    
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val(); 
			}
        });
		var data_new ={};
		$("textarea").each(function(){
			var name = $(this).attr('name');
			data[name] = $(this).val();
		});
		$data = JSON.stringify(data);
		if (isValid == false) {
            e.preventDefault();
		 }
        else {		
		var value =$("#coupe").serialize();			
		$.ajax({				
			url:base_url+"Coupebookingtranslation/insert_coupebooking",
			type: 'post',
			dataType: 'json',
			data:JSON.stringify(data),
			success:function(res){
				$(".edituser").show();
				console.log(res);
				if(res==0){
					$(".edituser").focus();
					$(".edituser").html('<p class="error">Error</p>');
					setTimeout(function(){$(".edituser").hide(); }, 3000);
				}
				else if(res==1){
					$(".edituser").focus();
					$(".edituser").html('<p class="success"> Language Saved Successfully</p>');
				}
				else if(res==2){
					$(".edituser").focus();
					$(".edituser").html('<p class="error"> Updated Successfully</p>');
					setTimeout(function(){$(".edituser").hide(); }, 3000);
				}
			}
		});
		}		
	});
});
/**Edit Coupe Lanaguage translation**/
$("#coupeedit").click(function(e){
	var id = $('#id').val();
	var data = {};
	  var isValid = true;
	$('input[type="hidden"]').each(function() {           
			$(this).css({
				"border": "",
				"background": ""
			});
			var name = $(this).attr('name');			
			data[name] = $(this).val();           
        });
    $('input[type="text"]').each(function() {           
		if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",
                    
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
		$(this).css({
			"border": "",
			"background": ""
		});
	var name = $(this).attr('name');			
	data[name] = $(this).val();
			}	
    });
	$("textarea").each(function(){
			if ($.trim($(this).val()) == '') {
                isValid = false;
                $(this).css({
                    "border": "1px solid red",    
                });
				$(this).focus();
				return false;
            }
            else {  /* valid */
		$(this).css({
			"border": "",
			"background": ""
		});
			var name = $(this).attr('name');
			data[name] = $(this).val();
			}
		});
  	var data_new ={};	
	data['id'] = id;
	$data = JSON.stringify(data);	
	if (isValid == false) {
            e.preventDefault();
	 }
     else {	
	var value =$("#coupe").serialize();	
    $.ajax({				
	url:base_url+"Coupebookingtranslation/insert_coupebooking",
		type: 'post',
		dataType: 'json',
		data:JSON.stringify(data),
		success:function(res){
			$(".edituser").show();
			console.log(res);
			if(res==0){
				$(".edituser").focus();
				$(".edituser").html('<p class="error">Error</p>');
				setTimeout(function(){$(".edituser").hide(); }, 3000);	
			}
			else if(res==2){
				$(".edituser").focus();
				$(".edituser").html('<p class="error"> Updated Successfully</p>');
				setTimeout(function(){$(".edituser").hide(); }, 3000);
			}
		}
	});
   }
});
/**Car by location**/ 

	function get_append_car(value){
		$("#caredit").hide();
		$("#tariff").hide();
		$("#tariff2").hide();
		$("#car").show();			
		$.ajax({	        
			type: "POST",
			url: base_url+'Carpayments/getcar',
			data: {'id':value},
			cache: false,
			success: function(result)
			{				
				$('.cardiv').html(result);
			}
		});
	}
	function get_append_tariff(value){	
		$("#tariff2").hide();	
	   $.ajax({	        
			type: "POST",
			url: base_url+'Carpayments/gettariff',
			data: {'id':value},
			cache: false,
			success: function(result)
			{				
				$('.tariffdiv').html(result);
			}
		});
	}
	
/**shoowroom by dealer in car directoy module**/
 $(document).ready(function(){ 
    $("#showroom").hide();
	$('#dealerid').on("change", function(){
		$("#showroom").show();
		$("#showroom2").hide();
		var id = $("#dealerid").val();
		$.ajax({	        
					type: "POST",
					url: base_url+'Cardirectory/getshowroom', 
					data: {'id':id},
					cache: false,
					success: function(result)
					{
						console.log(result);
						//$('.get_cat_sub').html("");
						$('.get_cat_sub').html(result);
					}
		});
	})
  });
  
  /**time for alert messages**/
  $(window).bind("load", function() {
  window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove();
    });
}, 4000);
});

 /* Car make by model */
	function get_Carmodelfast(thisvalue,make_id){	
		$(".form-car-make-slow").hide();
		$.ajax({	        
			type: "POST",
			url: base_url+'Cardirectory/get_carmodelfast', 
			data: 'make_id='+make_id,
			cache: false,
			success: function(data){					
				$('.form-car-make-fast').html(data);
			}
		});
	}	
/*========================= 	
	**********
	*********
	******
	*** TECHWARE(PENMANSHIP - RE_EN^TW130) - Common Purpose	
============================*/

	jQuery(document).ready(function ($) {		
		var locationdrum = $('.fix-locdrum').val();	
		if (locationdrum == "") {			
			$('.dk-2.bookingPopup').removeAttr('data-toggle');
			$(".zoom-pop-down").show();
		} else {			
			$(".zoom-pop-down").hide();
		}		
		$(".cit-main").click(function () {
			$(".zoom-pop-down").toggle();
		});
		$(".kickup").click(function () {
			$(".zoom-pop-down").show();
		});
		/* === General From Date Picker  === */
		$(function() {
			var general_today = new Date(); 
			var general_dd = general_today.getDate();
			var general_mm = general_today.getMonth()+1; //January is 0! 
			var general_hours = general_today.getHours(); 
			var general_minutes = general_today.getMinutes();
			var general_yyyy = general_today.getFullYear();
			today_original = general_yyyy+'-'+general_mm+'-'+general_dd+' '+general_hours+':'+general_minutes; 
			$(".form_datetime").datetimepicker({ 
				minuteStep:60, 
				autoclose: true, 
				startDate: today_original, 
				format: 'dd-mm-yyyy HH:ii P'
			});
		});
		/* === Rentee Page Navihgation === */
		$(".rentee_booking_navigation").hide();
		/* === Rentee Page Booking Tab Navihgation === */
		$(".completed-booking-renter").hide();
		$(".cancelled-booking-renter").hide();
		/* === Sub Locations By Main Location === */
		$('.selectpicker.SelectUniversallocation').each(function(){			
			var locationdrumname =$(this).find(':selected').attr('data-loc');	
			$.ajax({
				type: "POST",
				url: base_url+"Humdrum/get_popularlocations", 					    
				data: "lastmsg="+this.value, 
				cache: false,
				success: function(html){															   
					$(".pushPlaces").html(html);
					$('.fix-locdrum').html(locationdrumname);
					$('.fix-locdrum').val(locationdrumname);
					$('.original-bearings').val(this.value);	
				}
			});
		});		
		/* === Glossy Tariff === */
		var tariff_id = $('#glossy_tariff_id').val();
		$('#StyleCityTariffbagA'+tariff_id).addClass("zoom-class-1-active");
		/* === Glossy Commute === */
		var commute_id = $('#glossy_commute_id').val();
		$('#CommuteNavigationFunc'+commute_id).addClass("sdf-2");
		/* === Glossy Coupe Tariff === */
		var coupe_tariff_id = $('#glossy_tariff_car_id').val();
		$('#StyleTariffCar'+coupe_tariff_id).addClass("blc-w-active");
		/* === Countdown Timer - ZERO SETTINGS === */
		function addZero(i) {
			if (i < 10) {
				i = "0" + i;
			}
			return i;
		} 
		/* === Countdown Timer - Hour||Minutes === */		
		var myVarHMT = setInterval(myHMTimer ,1000);		
		function myHMTimer() {
			var d = new Date();
			var x = document.getElementById("timerhourminutes");
			var h = addZero(d.getHours());
			var m = addZero(d.getMinutes());			
			if(x != null){
				x.innerHTML = h + ":" + m ;	
			}						
		}
		/* === Countdown Timer - Seconds === */
		var myVarS = setInterval(mySTimer ,1000);		
		function mySTimer() {
			var d = new Date();
			var x = document.getElementById("timerseconds");			
			var s = addZero(d.getSeconds());			
			if(x != null){
				x.innerHTML = s;	
			}	
		}		
	});
	//Home Page Location Pick Toggler
	function locationpuller(thisvalue){
		$('.dk-2.bookingPopup').attr('data-toggle','modal');	
		var locationdrumname =$(thisvalue).data('locdrumname');
		var locationdrumid =$(thisvalue).data('locdrumid');		
		$('.fix-locdrum').html(locationdrumname);
		$('.fix-locdrum').val(locationdrumname);
		$('.original-bearings').val(locationdrumid);		
		$(".zoom-pop-down").toggle();
		$.ajax({
			type: "POST",
			url: base_url+"Humdrum/get_popularlocations", 					    
			data: "lastmsg="+locationdrumid, 
			cache: false,
			success: function(html){															   
				$(".pushPlaces").html(html);
				$("#kickup").removeClass("kickup");					
			}
		});
	}
	// Search Car-Selection
	function carselection(thisvalue,value){
		$('.row.caramat').removeClass("active-bc");			
		$('#stylecarSelect'+value).addClass("active-bc");
		var locationid =$('#curloc-id').data('location');
		var price =$(thisvalue).data('price');
		var free_km =$(thisvalue).data('freekm');
		var car_image =$(thisvalue).data('image');
		var showroom_lat =$(thisvalue).data('showroomlat');
		var showroom_lon =$(thisvalue).data('showroomlon');
		var seats =$(thisvalue).data('seats');
		var carname =$(thisvalue).data('carname');
		var excess =$(thisvalue).data('excess');
		var showroomaddress =$(thisvalue).data('showroomaddress');
		var category =$(thisvalue).data('category');
		var tariff_id =$(thisvalue).data('tariffid');
		$.ajax({
			type: "POST",
			url: base_url+"Humdrum/append_booking", 					    
			data: "lastmsg="+value+"&price="+price+"&carname="+carname+"&excess="+excess+"&locationid="+locationid+"&car_image="+car_image+"&seats="+seats+"&showroom_lat="+showroom_lat+"&showroom_lon="+showroom_lon+"&free_km="+free_km+"&showroomaddress="+showroomaddress+"&category="+category+"&tariff_id="+tariff_id, 
			cache: false,
			success: function(html){
				$(".row.bookamat").html(html);
				$('html, body').animate({scrollTop:$('.row.bookamat').offset().top}, 'slow');	
			}
		});	
	}
	//Search Tariff Car-Selection	
	function tariffcarselection(thisvalue,value){		
		$('.tariff-amat').removeClass("blc-w-active");		
		$('#StyleTariffCar'+value).addClass("blc-w-active");
		var tariff_id = value;
		var locationid =$('#curloc-id').val();
		var from_date =$('#modified_from_date').val();
		var to_date =$('#modified_to_date').val();
		var total_hours =$('#calculated_modified_total_hours').val();
		$.ajax({
			type: "POST",
			url: base_url+"Humdrum/append_tariff_cars", 					    
			data: "lastmsg="+locationid+"&tariff_id="+tariff_id+"&from_date="+from_date+"&to_date="+to_date+"&total_hours="+total_hours, 
			cache: false,
			success: function(html){
				$(".avail-cars.car-tariff-changes").html(html);								
			}
		});	
	}
	//Deal Cars
	jQuery(document).ready(function ($) {   
		$('.form_deals').submit(function(event) {
			event.preventDefault();
		});
		$('.selectpicker.form-control').on("change", function(event) {
			event.preventDefault();	
			deal_results();	
		});		
	});
	function deal_results() {
		var value = $('.form_deals').serialize();
		$.ajax({
			type: "POST",
			url: base_url+"Deal/filtercars",
			data: value,				
			success: function(html) {								
				$(".append-deal-car-outer").html(html);
				$('html, body').animate({scrollTop:$('.append-deal-car-outer').offset().top}, 'slow');	
			}		
		});
	}	
	//Tariff Rate Puller
	function ratepuller(thisvalue,value){		
		$('.zoom-class-1.cityride-tariff').removeClass("zoom-class-1-active");		
		$('#StyleCityTariffbagA'+value).addClass("zoom-class-1-active");
		var locationid =$('#tariff-bag-location').val();
		var tariff_id = value;
		$.ajax({
			type: "POST",
			url: base_url+"Tariff/tariff_carchange", 					    
			data: "tariff_id="+tariff_id+"&location_id="+locationid, 
			cache: false,
			success: function(html){					
					$(".tariff-inner-2.Change-bag-wise-tariff").html(html);
					$('html, body').animate({scrollTop:$('.tariff-inner-2.Change-bag-wise-tariff').offset().top}, 'slow');	
			}				
		});	
	}
	//Login-Signup-popup
	$(".login-signup-cityride").click(function () {
		var forgotpassword = document.getElementById("myForm-forgotpassword");
		var signup = document.getElementById("myForm-signup");
		var signin = document.getElementById("myForm-signin");
		forgotpassword.reset();
		signup.reset();
		signin.reset();
		$('.inner-login-signin-cityride').removeClass("active");
		$('.inner-login-forgotpassword-cityride').removeClass("active");
		$('.inner-login-signup-cityride').addClass("active");
		$('#login').removeClass("in active");
		$('#forget').removeClass("in active");
		$('#signup').addClass("in active");	
	});	
	//Login-Signin-popup
	$(".login-signin-cityride").click(function () {
		var forgotpassword = document.getElementById("myForm-forgotpassword");
		var signup = document.getElementById("myForm-signup");
		var signin = document.getElementById("myForm-signin");
		forgotpassword.reset();
		signup.reset();
		signin.reset();
		$('.inner-login-signup-cityride').removeClass("active");
		$('.inner-login-forgotpassword-cityride').removeClass("active");
		$('.inner-login-signin-cityride').addClass("active");
		$('#signup').removeClass("in active");
		$('#forget').removeClass("in active");
		$('#login').addClass("in active");	
	});
	// Login-Signup-functionality
	$("#myForm-signup").submit(function(event){
		var clear_field = '';
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: base_url+"Login/signup",			 
			data: { email: $("#signup-email").val(), password: $("#signup-password").val() }, 
			success:function(data){
				console.log(data);
				if(data == 'signup'){					   	
					var showmsg = '<div class="showmsg">Thank you for signup.Click signin to continue.</div>';
					$('.showmsg-popup').html(showmsg).fadeOut(5000);
					$("#signup-email").val('');
					$("#signup-password").val('');
				}else if(data == 'exist'){
					var showmsg = '<div class="showmsg">This email address is already exist.Please enter valid email address.</div>';
					$('.showmsg-popup').html(showmsg).fadeOut(5000);
					$("#signup-email").val('');
					$("#signup-password").val('');
				}else{
					var showmsg = '<div class="showmsg">You may have entered wrong information.Please try again.</div>';
					$('.showmsg-popup').html(showmsg).fadeOut(5000);
					$("#signup-email").val('');
					$("#signup-password").val('');
				}                       								
			},
			error:function(data){
				var showmsg = '<div class="showmsg">Sorry!!You cannot access.Contact administrator.</div>';
				$('.showmsg-popup').html(showmsg).fadeOut(5000);
				$("#signup-email").val('');
				$("#signup-password").val('');
			}	
		});
	});
	// Login-Signin-functionality
	$("#myForm-signin").submit(function(event){
		event.preventDefault();
		$.ajax({
			type: "POST",
			url: base_url+"Login/signin",			 
			data: { email: $("#signin-email").val(), password: $("#signin-password").val() }, 
			success:function(data){
				console.log(data);
				if(data == 'signin'){					   	
					window.location.href = base_url+ "User";									
				}else if(data == 'notexist'){
					var showmsg = '<div class="showmsg">Please enter valid email and password.</div>';
					$('.showmsg-popup').html(showmsg).fadeOut(5000);
					$("#signin-email").val('');
					$("#signin-password").val(''); 
				}else{
					var showmsg = '<div class="showmsg">You may have entered wrong information.Please try again.</div>';
					$('.showmsg-popup').html(showmsg).fadeOut(5000);
					$("#signin-email").val('');
					$("#signin-password").val('');
				}                       								
			},
			error:function(data){
				var showmsg = '<div class="showmsg">Sorry!!You cannot access.Contact administrator.</div>';
				$('.showmsg-popup').html(showmsg).fadeOut(5000);
				$("#signin-email").val('');
				$("#signin-password").val('');
			}				
		});
	});
	//Login-forgotPassword-functionality
	$("#myForm-forgotpassword").submit(function(event){
		event.preventDefault();	 
		$.ajax({
			type: "POST",
            url: base_url+"Login/forget_password",			 
			data: { email: $("#forgot-email").val() }, 
			success:function(data){
				console.log(data);				  
				if(data == 'loggedIn'){					   
					var showmsg = '<div class="showmsg">Your password has been reset successfully! Your new password has been sent to your email address</div>';
					$('.showmsg-popup').html(showmsg).fadeOut(5000);
					$("#forgot-email").val('');
				}else if(data == 'No'){
					var showmsg = '<div class="showmsg">You may have entered wrong information.Please try again.</div>';
					$('.showmsg-popup').html(showmsg).fadeOut(5000);
					$("#forgot-email").val('');	
				}else {
					var showmsg = '<div class="showmsg">You may have entered wrong information.Please try again.</div>';
					$('.showmsg-popup').html(showmsg).fadeOut(5000);
					$("#forgot-email").val('');
				}									
			},
			error:function(data){
				var showmsg = '<div class="showmsg">Sorry!!You cannot access.Contact administrator.</div>';
				$('.showmsg-popup').html(showmsg).fadeOut(5000);
				$("#forgot-email").val('');
			}	
		});
	});
	//Tariff To Booking
	function nextsubmitbooking(thisvalue){	
		var car_id = $('#car-selected-id').val();
		var car_price = $('#car-final-price').val();
		var location_id =$('#curloc-id').val();		
		var nearby_id =$('#popular-location-by-loc').val();
		var excess =$('#excess-price-km').val();
		var from_date =$('#modified_from_date').val();
		var to_date =$('#modified_to_date').val();
		var days =$('#modified_booking_days').val();
		var hours =$('#calculated_modified_total_hours').val();
		var minutes =$('#modified_booking_minutes').val();
		var address =$('#modified_booking_address').val();
		var latitude =$('#modified_booking_latitude').val();
		var longitude =$('#modified_booking_longitude').val();
		var car_name =$('#car-final-name').val();
		var car_image =$('#car-final-image').val();
		var car_seats =$('#car-final-seats').val();
		var showroom_latitude =$('#car-final-lat').val();
		var showroom_longitude =$('#car-final-lon').val();
		var free_km =$('#car-final-freekm').val();	
		var from_time =$('#modified_from_time').val();	
		var to_time =$('#modified_to_time').val();
		var showroom_address =$('#car-final-address').val();
		var category =$('#car-final-category').val();
		var tariff_id =$('#car-final-tariff_id').val();
		var datastring = "car_id="+car_id+"&car_price="+car_price+"&location_id="+location_id+"&nearby_id="+nearby_id+"&excess="+excess+"&from_date="+from_date+"&to_date="+to_date+"&days="+days+"&hours="+hours+"&minutes="+minutes+"&address="+address+"&latitude="+latitude+"&longitude="+longitude+"&free_km="+free_km+"&car_name="+car_name+"&car_image="+car_image+"&car_seats="+car_seats+"&showroom_latitude="+showroom_latitude+"&showroom_longitude="+showroom_longitude+"&from_time="+from_time+"&to_time="+to_time+"&showroom_address="+showroom_address+"&category="+category+"&tariff_id="+tariff_id;
		$.ajax({
			type: "POST",
			url: base_url+"Humdrum/booking", 					    
			data: datastring, 
			cache: false,
			success: function(html){					
				$(".booking_page_container").html(html);				
				setTimeout(function() {	initMap(); }, 100);
			}				
		});	
	}	
	//Common Location Change		
	$('.SelectUniversallocation').on('change', function() {	
		var location_id = this.value;		
		$.ajax({
			type: "POST",
			url: base_url+"Humdrum/location_change", 					    
			data: "lastmsg="+location_id, 
			cache: false,
			success: function(data){
				if(data == 'success'){
					location.reload();	
				}
			}				
		});					
	});
	function SelectUniversallocationByclick(thisvalue,value){		
		var location_id = value;		
		$.ajax({
			type: "POST",
			url: base_url+"Humdrum/location_change", 					    
			data: "lastmsg="+location_id, 
			cache: false,
			success: function(data){
				if(data == 'success'){
					window.location.href = base_url+"Commute";	
				}
			}				
		});	
	}		
	//User Page Navigation			
	$(".welcome_account_navi").click(function () {
		$(".rentee_account_navigation").show();
		$(".rentee_booking_navigation").hide();
	});
	$(".welcome_booking_navi").click(function () {
		$(".rentee_account_navigation").hide();
		$(".rentee_booking_navigation").show();
	});	
	//User Page Booking Navigation
	$(".pending-navi-panel").click(function () {
		$(".pending-booking-renter").show();
		$(".completed-booking-renter").hide();
		$(".cancelled-booking-renter").hide();
	});
	$(".completed-navi-panel").click(function () {
		$(".pending-booking-renter").hide();
		$(".completed-booking-renter").show();
		$(".cancelled-booking-renter").hide();
	});
	$(".cancelled-navi-panel").click(function () {
		$(".pending-booking-renter").hide();
		$(".completed-booking-renter").hide();
		$(".cancelled-booking-renter").show();
	});
	//Commute Page Navigation Tab
	function CommuteNavigationFunc(thisvalue,value){ 
		$('.col-lg-4.col-md-4.sdf-1').removeClass("sdf-2");		
		$('#CommuteNavigationFunc'+value).addClass("sdf-2");
		var from_date = $(thisvalue).data('fromdate');
		var to_date = $(thisvalue).data('todate');	
		$.ajax({
			type: "POST",
			url: base_url+"Commute/append_commute", 					    
			data: "commute_id="+value+"&from_date="+from_date+"&to_date="+to_date, 
			cache: false,
			success: function(html){
				$(".append-commute-car-outer").html(html);
				$('html, body').animate({scrollTop:$('.append-commute-car-outer').offset().top}, 'slow');
			}				
		});	
	}
	//Commute Page - Car Tariff Navigation
	function CommuteCarNaviFrom(thisvalue,value){
		var price = $(thisvalue).data('price');
		var freekm = $(thisvalue).data('freekm'); 
		$('.car-final-price').val(price);
		$('.car-final-freekm').val(freekm);		
		$(thisvalue).removeClass("slc-2");
		$('#CommuteCarNaviTo'+value).addClass("slc-2");
	}
	function CommuteCarNaviTo(thisvalue,value){
		var price = $(thisvalue).data('price');
		var freekm = $(thisvalue).data('freekm'); 
		$('.car-final-price').val(price);
		$('.car-final-freekm').val(freekm);		
		$(thisvalue).removeClass("slc-2");
		$('#CommuteCarNaviFrom'+value).addClass("slc-2");
	}
	// Tariff Car Select Category 
	function tariffselectpicker(thisvalue,value){ 
		var fromtime =$('#kill-fromtime').val();
		var totime =$('#kill-totime').val();
		$.ajax({
			type: "POST",
			url: base_url+"Tariff/order_tariff_cars", 					    
			data: "car_id="+value+"&from_time="+fromtime+"&to_time="+totime, 
			cache: false,
			success: function(html){															   
				$(".append-tar-cars").html(html);				
			}
		});
	}
	$(".fromtime.selectpicker.sel-pick.form_datetime").on('change', function() {	
		var car_id =$('.selectpicker.tariff-select-picker').find(':selected').attr('data-loc');
		var fromtime = this.value;
		var totime =$('#kill-totime').val();			
		$.ajax({
			type: "POST",
			url: base_url+"Tariff/order_tariff_cars", 					    
			data: "car_id="+car_id+"&from_time="+fromtime+"&to_time="+totime, 
			cache: false,
			success: function(html){															   
				$(".append-tar-cars").html(html);				
			}
		});
		/* === General To Date Picker === */
		$.ajax({
			url:base_url+"Tariff/get_fromdatetime",
			type: 'post',			
			data:'from_date='+fromtime,
			success:function(data){								
				$(".to_datetimepicker").datetimepicker({
					minuteStep:60, 
					autoclose: true, 
					startDate:data,
					format: 'dd-mm-yyyy HH:ii P'			
				});
			}			
		});
	});	
	function Todatechangepickertariff(){
		var car_id =$('.selectpicker.tariff-select-picker').find(':selected').attr('data-loc');
		var fromtime = $('#kill-fromtime').val();
		var totime =$('#kill-totime').val();	
		$.ajax({
			type: "POST",
			url: base_url+"Tariff/order_tariff_cars", 					    
			data: "car_id="+car_id+"&from_time="+fromtime+"&to_time="+totime, 
			cache: false,
			success: function(html){															   
				$(".append-tar-cars").html(html);				
			}
		});	
	}
	//Deal Page - Car Tariff Navigation
	function DealCarNaviOne(thisvalue,value){
		$(thisvalue).addClass("slc-change");
		var price = $(thisvalue).data('price');
		var freekm = $(thisvalue).data('freekm'); 
		$('.car-final-price').val(price);
		$('.car-final-freekm').val(freekm);		
		$('#DealCarNaviTwo'+value).removeClass("slc-change");
		$('#DealCarNaviThree'+value).removeClass("slc-change");		
	}
	function DealCarNaviTwo(thisvalue,value){
		$(thisvalue).addClass("slc-change");
		var price = $(thisvalue).data('price');
		var freekm = $(thisvalue).data('freekm');
		$('.car-final-price').val(price);
		$('.car-final-freekm').val(freekm);	
		$('#DealCarNaviOne'+value).removeClass("slc-change");
		$('#DealCarNaviThree'+value).removeClass("slc-change");
	}
	function DealCarNaviThree(thisvalue,value){
		$(thisvalue).addClass("slc-change");
		var price = $(thisvalue).data('price');
		var freekm = $(thisvalue).data('freekm');
		$('.car-final-price').val(price);
		$('.car-final-freekm').val(freekm);	
		$('#DealCarNaviOne'+value).removeClass("slc-change");
		$('#DealCarNaviTwo'+value).removeClass("slc-change");
	}
	//Car Booking Page - LOGIN TAB SETUP
	function ChangeloginSetupsignin(thisvalue){
		$('.sign-ed-in').removeClass("active");
		$('.logg-ed-in').removeClass("active");
		$('.Signin-setup-checker').removeClass("active");	
		$('.Signup-setup-checker').removeClass("active");	
		$('#logg-ed-in').addClass("active");
		$('.Signin-setup-checker').addClass("active");	
	}
	function ChangeloginSetupsignup(thisvalue){		
		$('.sign-ed-in').removeClass("active");
		$('.logg-ed-in').removeClass("active");	
		$('.Signup-setup-checker').removeClass("active");
		$('.Signin-setup-checker').removeClass("active");			
		$('#sign-ed-in').addClass("active");
		$('.Signup-setup-checker').addClass("active");		
	}
	// Car Booking Page - Signin
	function Finalsubmitloginbook(thisvalue){
		var email = $('#signin_book_email').val();
		var password = $('#signin_book_password').val();
		$.ajax({
			type: "POST",
			url: base_url+"Login/signin",			 
			data: "email="+email+"&password="+password,  
			success:function(data){
				console.log(data);
				if(data == 'signin'){
					$('.Login-tab-checker').removeClass("active");
					$('.Payment-tab-checker').removeClass("active");
					$('.Booking-tab-checker').addClass("active");	
					$('#main-nav-login').addClass("disabledbutton");
					$('#main-nav-payment').addClass("disabledbutton");
					$('#main-nav-checkout').addClass("active");
					$('#main-nav-checkout').removeClass("disabledbutton");	
				}else if(data == 'notexist'){
					var showmsg = '<div class="showmsg">Requested email and password not found in database. Please enter valid email.</div>';
					$('.showmsg-popup').html(showmsg);
				}else{
					var showmsg = '<div class="showmsg">You may have entered wrong information.Please try again.</div>';
					$('.showmsg-popup').html(showmsg);
				}                       								
			},
			error:function(data){
				var showmsg = '<div class="showmsg">Sorry!!You cannot access.Contact administrator.</div>';
				$('.showmsg-popup').html(showmsg);
			}				
		});
	}
	// Car Booking Page - Signup
	function Finalsubmitlogupbook(thisvalue){
		var email = $('#signup_book_email').val();
		var password = $('#signup_book_password').val();
		$.ajax({
			type: "POST",
			url: base_url+"Login/signup",			 
			data: "email="+email+"&password="+password,  
			success:function(data){
				console.log(data);
				if(data == 'signup'){					   	
					var showmsg = '<div class="showmsg">Thank you for signup.Click signin to continue.</div>';
					$('.showmsg-popup').html(showmsg);								
				}else if(data == 'exist'){
					var showmsg = '<div class="showmsg">This email address is already exist.Please enter valid email address.</div>';
					$('.showmsg-popup').html(showmsg);
				}else{
					var showmsg = '<div class="showmsg">You may have entered wrong information.Please try again.</div>';
					$('.showmsg-popup').html(showmsg);
				}                       								
			},
			error:function(data){
				var showmsg = '<div class="showmsg">Sorry!!You cannot access.Contact administrator.</div>';
				$('.showmsg-popup').html(showmsg);
			}	
		});
	}
	// Check Coupon 
	function Couponchecker(thisvalue){
		var coupon = $('#coupon_car_promo').val();
		var tariff = $('#car_calc_price').val();
		var refund = $('#car_calc_refund').val(); 
		var category = $('#car_calc_category').val();	
		$.ajax({
			type: "POST",
			url: base_url+"Humdrum/Couponcheck",			 
			data: "coupon="+coupon+"&category="+category,  
			success:function(data){ 
				console.log(data);
				if(data){										
					var total_price = Math.round(tariff / data);
					var refund_total = Math.round(refund+total_price);
					var showmsg = '<div class="showmsg"><h6>Coupon Price Applied.</h6></div>';	
					$('.reservation_amount').val(refund_total);	
					$('.price_changer').html(total_price);
					$('.total_price_changer').html(refund_total);
					$('.showmsg-popup').html(showmsg);																
				}else{
					var showmsg = '<div class="showmsg"><h6>No Offers Available.</h6></div>';
					$('.showmsg-popup').html(showmsg);
				}                     								
			},
			error:function(data){
				var showmsg = '<div class="showmsg"><h6>Sorry!!You cannot access.Contact administrator.</h6></div>';
				$('.showmsg-popup').html(showmsg);
			}	
		});
	}
	// Reservation - Pre Page
	function reservationsubmit(thisvalue){
		var car_id = $('#reservation_car_id').val();
		var tariff_id = $('#reservation_tariff_id').val();
		var location_id = $('#reservation_location_id').val();
		var sub_location_id = $('#reservation_nearby_id').val();
		var from_date = $('#reservation_from_date').val();
		var to_date = $('#reservation_to_date').val();
		var from_time = $('#reservation_from_time').val();
		var to_time = $('#reservation_to_time').val();
		var total_date = $('#reservation_total_date').val();
		var from_full_date = $('#reservation_from_full_date').val();
		var to_full_date = $('#reservation_to_full_date').val();
		var amount = $('#reservation_amount').val();
		var datastring = "listing_id="+car_id+"&tariff_id="+tariff_id+"&location_id="+location_id+"&sub_location_id="+sub_location_id+"&from_date="+from_date+"&to_date="+to_date+"&from_time="+from_time+"&to_time="+to_time+"&total_date="+total_date+"&from_full_date="+from_full_date+"&to_full_date="+to_full_date+"&amount="+amount;
		$.ajax({
			type: "POST",
			url: base_url+"Humdrum/Reservation", 					    
			data: datastring, 
			cache: false,
			success: function(data){															   
				if(data == 'success'){										
					$('.Login-tab-checker').removeClass("active");		
					$('.Booking-tab-checker').removeClass("active");
					$('.Payment-tab-checker').addClass("active");	
					$('#main-nav-login').addClass("disabledbutton");
					$('#main-nav-checkout').addClass("disabledbutton");
					$('#main-nav-payment').addClass("active");
					$('#main-nav-payment').removeClass("disabledbutton");						
				}else{
					var showmsg = '<div class="showmsg"><h6>Something Went Wrong.</h6></div>';
					$('.showmsg-popup').html(showmsg);
				} 				
			}
		});		
	}
	//Deal To Booking
	function nextsubmitbookingDeal(thisvalue,car_id){			
		var car_price = $('#car-final-price'+car_id).val();
		var location_id =$('#curloc-id'+car_id).val();		
		var nearby_id =$('#popular-location-by-loc'+car_id).val();
		var excess =$('#excess-price-km'+car_id).val();
		var from_date =$('#modified_from_date'+car_id).val();
		var to_date =$('#modified_to_date'+car_id).val();
		var days =$('#modified_booking_days'+car_id).val();
		var hours =$('#calculated_modified_total_hours'+car_id).val();
		var minutes =$('#modified_booking_minutes'+car_id).val();
		var address =$('#modified_booking_address'+car_id).val();
		var latitude =$('#modified_booking_latitude'+car_id).val();
		var longitude =$('#modified_booking_longitude'+car_id).val();
		var car_name =$('#car-final-name'+car_id).val();
		var car_image =$('#car-final-image'+car_id).val();
		var car_seats =$('#car-final-seats'+car_id).val();
		var showroom_latitude =$('#car-final-lat'+car_id).val();
		var showroom_longitude =$('#car-final-lon'+car_id).val();
		var free_km =$('#car-final-freekm'+car_id).val();	
		var from_time =$('#modified_from_time'+car_id).val();	
		var to_time =$('#modified_to_time'+car_id).val();
		var showroom_address =$('#car-final-address'+car_id).val();
		var category =$('#car-final-category'+car_id).val();
		var tariff_id =$('#car-final-tariff_id'+car_id).val();
		var datastring = "car_id="+car_id+"&car_price="+car_price+"&location_id="+location_id+"&nearby_id="+nearby_id+"&excess="+excess+"&from_date="+from_date+"&to_date="+to_date+"&days="+days+"&hours="+hours+"&minutes="+minutes+"&address="+address+"&latitude="+latitude+"&longitude="+longitude+"&free_km="+free_km+"&car_name="+car_name+"&car_image="+car_image+"&car_seats="+car_seats+"&showroom_latitude="+showroom_latitude+"&showroom_longitude="+showroom_longitude+"&from_time="+from_time+"&to_time="+to_time+"&showroom_address="+showroom_address+"&category="+category+"&tariff_id="+tariff_id;
		$.ajax({
			type: "POST",
			url: base_url+"Deal/booking", 					    
			data: datastring, 
			cache: false,
			success: function(html){											
				if(html == 'exist'){
					alert('Sorry! Offer for this car is expired.');
				}else{
					$(".deal-page-container").html(html);
					setTimeout(function() {	initMap(); }, 100);
				}						
			}				
		});	
	}
	// Commute To Booking
	function nextsubmitbookingCommute(thisvalue){
		var car_id = $('#car-selected-id').val();
		var car_price = $('#car-final-price').val();
		var location_id =$('#curloc-id').val();		
		var nearby_id =$('#popular-location-by-loc').val();
		var excess =$('#excess-price-km').val();
		var from_date =$('#modified_from_date').val();
		var to_date =$('#modified_to_date').val();
		var days =$('#modified_booking_days').val();
		var hours =$('#calculated_modified_total_hours').val();
		var minutes =$('#modified_booking_minutes').val();
		var address =$('#modified_booking_address').val();
		var latitude =$('#modified_booking_latitude').val();
		var longitude =$('#modified_booking_longitude').val();
		var car_name =$('#car-final-name').val();
		var car_image =$('#car-final-image').val();
		var car_seats =$('#car-final-seats').val();
		var showroom_latitude =$('#car-final-lat').val();
		var showroom_longitude =$('#car-final-lon').val();
		var free_km =$('#car-final-freekm').val();	
		var from_time =$('#modified_from_time').val();	
		var to_time =$('#modified_to_time').val();
		var showroom_address =$('#car-final-address').val();
		var category =$('#car-final-category').val();
		var tariff_id =$('#car-final-tariff_id').val();
		var datastring = "car_id="+car_id+"&car_price="+car_price+"&location_id="+location_id+"&nearby_id="+nearby_id+"&excess="+excess+"&from_date="+from_date+"&to_date="+to_date+"&days="+days+"&hours="+hours+"&minutes="+minutes+"&address="+address+"&latitude="+latitude+"&longitude="+longitude+"&free_km="+free_km+"&car_name="+car_name+"&car_image="+car_image+"&car_seats="+car_seats+"&showroom_latitude="+showroom_latitude+"&showroom_longitude="+showroom_longitude+"&from_time="+from_time+"&to_time="+to_time+"&showroom_address="+showroom_address+"&category="+category+"&tariff_id="+tariff_id;
		$.ajax({
			type: "POST",
			url: base_url+"Humdrum/booking", 					    
			data: datastring, 
			cache: false,
			success: function(html){							
				$(".commute-page-container").html(html);				
				setTimeout(function() {	initMap(); }, 100);
			}				
		});	
	}
	// Append Popular locations
	function AppendpopularonTextbar(thisvalue){ 
		var popularplace = $(thisvalue).data('address');
		$('#AutocompleteSearchText').val(popularplace);	
	}
	// Append Airport Locations
	function AirportAppendText(thisvalue){
		var popularplace = 'Airport';
		$('#AutocompleteSearchText').val(popularplace);
	}
	// Rentee - Picture Change
	$('#rentee_image_push_front').on('change', function() { 
		$('form#rentee_image_post_front').submit();		
	});
	$('#rentee_image_push_back').on('change', function() { 
		$('form#rentee_image_post_back').submit();		
	});	
	
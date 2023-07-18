/*========================= 	
	**********
	*********
	******
	*** TECHWARE(PENMANSHIP - RE_EN^TW130) - Calendar	
============================*/
	jQuery(document).ready(function ($) {		
		time_agenda();
		//popup();				
		/* === Pre Load Time  === */
		var time =$(".slider-handle.min-slider-handle.round").attr('aria-valuetext');
		$('.from_eventual_time').val(time);
		var time_asst =$(".range-main-slider.fromchrono .slider-handle.min-slider-handle.round").attr('aria-valuenow');	
		$('.from_eventual_asst').val(time_asst);
	});
	
	/* === Booking Time Selection === */
	function time_agenda(){		
		var bcChange = function () {			
			$(".slider-handle").addClass("sl-hand-highlight");
			var date =$(".acty-2.enter-fromdate").data('fromdate');	
			var month =$(".acty-1.enter-frommonth").data('frommonth');
			var time =$(".range-main-slider.fromchrono .slider-handle.min-slider-handle.round").attr('aria-valuetext');
			var time_asst =$(".range-main-slider.fromchrono .slider-handle.min-slider-handle.round").attr('aria-valuenow');
			$('.from_eventual_asst').val(time_asst);
			$('.from_eventual_month').val(month);
			$('.from_eventual_date').val(date);
			$('.from_eventual_time').val(time);
			var to_month =$(".acty-1.enter-tomonth").data('tomonth');
			var to_date =$(".acty-2.enter-todate").data('todate');
			var to_time =$(".range-main-slider.tochrono .slider-handle.min-slider-handle.round").attr('aria-valuetext');
			$('.to_eventual_month').val(to_month);
			$('.to_eventual_date').val(to_date);
			$('.to_eventual_time').val(to_time);	
			
		};
		/* === Slider Selection === */
		if ($('#ex1').length) {
		  $('#ex1').slider({
		/* === Time Picker === */		
			formatter: function (value) {
				$("#num_ppl").val(value);
				$(".slider-handle").removeClass("sl-hand-highlight");
				var hours1 = Math.floor(value / 60);
				var minutes1 = value - (hours1 * 60);			
				if (hours1.length == 1) hours1 = '0' + hours1;
					if (minutes1.length == 1) minutes1 = '0' + minutes1;
						if (minutes1 == 0) minutes1 = '00';
							if (hours1 >= 12) {
								if (hours1 == 12) {
									hours1 = hours1;
									minutes1 = minutes1 + " PM";
								} else {
									hours1 = hours1 - 12;
									minutes1 = minutes1 + " PM";
								}
							} else {
								hours1 = hours1;
								minutes1 = minutes1 + " AM";
							}
								if (hours1 == 0) {
									hours1 = 12;
									minutes1 = minutes1;
								}
				return 'Time:' + hours1 + ':' + minutes1;
			}
			}).on('slide', bcChange)
				.data('slider');
		}

		if ($('#ex2').length) {
			$('#ex2').slider({
				formatter: function (value) {
				$("#num_ppl").val(value);
				$(".slider-handle").removeClass("sl-hand-highlight");
				var hours1 = Math.floor(value / 60);
				var minutes1 = value - (hours1 * 60);			
				if (hours1.length == 1) hours1 = '0' + hours1;
					if (minutes1.length == 1) minutes1 = '0' + minutes1;
						if (minutes1 == 0) minutes1 = '00';
							if (hours1 >= 12) {
								if (hours1 == 12) {
									hours1 = hours1;
									minutes1 = minutes1 + " PM";
								} else {
									hours1 = hours1 - 12;
									minutes1 = minutes1 + " PM";
								}
							} else {
								hours1 = hours1;
								minutes1 = minutes1 + " AM";
							}
								if (hours1 == 0) {
									hours1 = 12;
									minutes1 = minutes1;
								}
				return 'Time:' + hours1 + ':' + minutes1;
			}
			}).on('slide', bcChange)
				.data('slider');
		}			
	}
	/* === Booking Date Selection ===*/	
	function date_agenda(){
		$('.content-ul-ride-main .carousel[data-type="multi"] .item').each(function () {
			var next = $(this).next();
			if (!next.length) {
				next = $(this).siblings(':first');
			}
			next.children(':first-child').clone().appendTo($(this));
			for (var i = 0; i < 2; i++) {
				next = next.next();
				if (!next.length) {
					next = $(this).siblings(':first');
				}
				next.children(':first-child').clone().appendTo($(this));
			}
		});
	}
	/* === Booking Date's Month Picker ===*/	
	function getmonthdiary(thisvalue,value){									
				var month =$(thisvalue).data('frommonth');					
				 $.ajax({
                       type: "POST",
                       url: base_url+"Chronology/getFmonthagenda", 					    
                       data: "lastmsg="+value, 
                       cache: false,
                       success: function(html){															   
									$(".month_agenda").html(html);									
									date_agenda();
									time_agenda();
									var date =$(".acty-2.enter-fromdate").data('fromdate');	
									var time =$(".range-main-slider.fromchrono .slider-handle.min-slider-handle.round").attr('aria-valuetext');
									var time_asst =$(".range-main-slider.fromchrono .slider-handle.min-slider-handle.round").attr('aria-valuenow');
									$('.from_eventual_asst').val(time_asst);
									$('.from_eventual_month').val(month);
									$('.from_eventual_date').val(date);
									$('.from_eventual_time').val(time);										
                     }
                 });
			}
	/* === From^Date Picker ===*/		
	function getdatediary(thisvalue,value){
				var date =$(thisvalue).data('fromdate');	
				$.ajax({
                       type: "POST",
                       url: base_url+"Chronology/getFdateagenda", 					    
                       data: "lastmsg="+value, 
                       cache: false,
                       success: function(html){															   
									$(".month_agenda").html(html);
									date_agenda();
									time_agenda();
									var month =$(".acty-1.enter-frommonth").data('frommonth');	
									var time =$(".range-main-slider.fromchrono .slider-handle.min-slider-handle.round").attr('aria-valuetext');
									var time_asst =$(".range-main-slider.fromchrono .slider-handle.min-slider-handle.round").attr('aria-valuenow');
									$('.from_eventual_month').val(month);
									$('.from_eventual_date').val(date);
									$('.from_eventual_time').val(time);	
									$('.from_eventual_asst').val(time_asst);	
                     }
                 });
	}
	/* === Booking Calendar Popup ===*/	
	function popup(){		
		$(".ride-add-pop ul li").click(function(){
			$(".ride-add-pop ul li").removeClass('pop-c-1-active');
			$(this).addClass('pop-c-1-active');
			id = $(this).attr('id');
			$(".cnt-rides").addClass('hidden');
			$("."+id).removeClass('hidden');
		});		
	}
	/* === From^Month Picker ===*/	
	function FrommonthNext(){
		var month = $('#month_prev').val();
		var date = $('#date_prev').val();
		var time = $('#time_prev').val();
		var asst = $('#time_asst_prev').val();	
		$(".ride-add-pop ul li").removeClass('pop-c-1-active');
		$('#cnt-ride-2').addClass('pop-c-1-active');
		id = $('#cnt-ride-2').attr('id');
		$(".cnt-rides").addClass('hidden');
		$("."+id).removeClass('hidden');
		$.ajax({
			type: "POST",
			url: base_url+"Chronology/getprevagenda", 					    
			data: "month="+month+"&date="+date+"&time="+time+"&timeasst="+asst, 
			cache: false,
			success: function(html){															   
				$(".next_month_agenda").html(html);
				date_agenda();
				time_agenda();
				var to_date =$(".acty-2.enter-todate").data('todate');	
				var to_month =$(".acty-1.enter-tomonth").data('tomonth');
				var to_time =$(".range-main-slider.tochrono .slider-handle.min-slider-handle.round").attr('aria-valuetext');
				$('.to_eventual_month').val(to_month);
				$('.to_eventual_date').val(to_date);
				$('.to_eventual_time').val(to_time);		
			}
		});
	}
	/* === To^Month Picker ===*/
	function getfacingmonthdiary(thisvalue,value){
		var month =$(".acty-1.enter-frommonth").data('frommonth');
		var to_month =$(thisvalue).data('tomonth');
		var date =$(".acty-2.enter-fromdate").data('fromdate');				
		var time = $('#time_prev').val();
		var asst = $('#time_asst_prev').val();
		$.ajax({
			type: "POST",
			url: base_url+"Chronology/getTmonthagenda", 					    
			data: "lastmsg="+value+"&month="+month+"&date="+date+"&time="+time+"&timeasst="+asst, 
			cache: false,
			success: function(html){															   
				$(".next_month_agenda").html(html);									
				date_agenda();
				time_agenda();
				var to_date =$(".acty-2.enter-todate").data('todate');
				var to_time =$(".range-main-slider.tochrono .slider-handle.min-slider-handle.round").attr('aria-valuetext');	
				$('.to_eventual_month').val(to_month);
				$('.to_eventual_date').val(to_date);
				$('.to_eventual_time').val(to_time);									
			}
		});
	}
	/* === To^Date Picker ===*/
	function getfacingdatediary(thisvalue,value){
		var to_date =$(thisvalue).data('todate');
		var date =$(".acty-2.enter-fromdate").data('fromdate');
		var month =$(".acty-1.enter-frommonth").data('frommonth');
		var time = $('#time_prev').val();
		var asst = $('#time_asst_prev').val();	
		$.ajax({
			type: "POST",
			url: base_url+"Chronology/getTdateagenda", 					    
			data: "lastmsg="+value+"&month="+month+"&date="+date+"&time="+time+"&timeasst="+asst, 
			cache: false,
			success: function(html){															   
				$(".next_month_agenda").html(html);
				date_agenda();
				time_agenda();
				var to_month =$(".acty-1.enter-tomonth").data('tomonth');	
				var to_time =$(".range-main-slider.tochrono .slider-handle.min-slider-handle.round").attr('aria-valuetext');
				$('.to_eventual_month').val(to_month);
				$('.to_eventual_date').val(to_date);
				$('.to_eventual_time').val(to_time);											
			}
		});
	}
	/* === Next Page Picker ===*/
	function TomonthNext(){
		var month = $('#month_prev').val();
		var date = $('#date_prev').val();
		var time = $('#time_prev').val();
		var to_date =$('#date_next').val();	
		var to_month =$('#month_next').val();
		var to_time =$('#time_next').val();	
		$('.from_eventual_month_org').val(month);
		$('.from_eventual_date_org').val(date);
		$('.from_eventual_time_org').val(time);	
		$('.to_eventual_month_org').val(to_month);
		$('.to_eventual_date_org').val(to_date);
		$('.to_eventual_time_org').val(to_time);
		$(".ride-add-pop ul li").removeClass('pop-c-1-active');
		$('#cnt-ride-3').addClass('pop-c-1-active');
		id = $('#cnt-ride-3').attr('id');
		$(".cnt-rides").addClass('hidden');
		$("."+id).removeClass('hidden');		
	}	
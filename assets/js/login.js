/*========================= 	
	**********
	*********
	******
	*** TECHWARE(PENMANSHIP - RE_EN^TW130) - Login Script	
============================*/
	jQuery(document).ready(function ($) {
		/* --- ==== Signup Script ==== --- */
		$("#enroll_rentee").submit(function(event){
			event.preventDefault();			  
			$.ajax({
					type: "POST",
					url: base_url+"Login/signup",				 
					data: {						
							email: $("#enroll_email").val(),
							password: $("#enroll_password").val(),				
							}, 
					success:function(data){					
						if(data == 'loggedIn'){						   
							var error = '<div class="enroll_success">Successfully Enrolled.</div>';
							$('.renteememo').html(error);							
						}else if(data == 'No'){
							var error = '<div class="enroll_error">Sorry you have entered wrong information </div>';
							$('.renteememo').html(error);							
						}else{
							var error = '<div class="enroll_error">Sorry you have entered wrong information </div>';
							$('.renteememo').html(error);							
						}															
					},
					error: function(data) {				                 
						var error = '<div class="errormsgup">Sorry you have entered wrong information. </div>';
						$('.errormsgup').html(error);						
					}	   						
				});
			});
		
		/* --- ==== Signin Script ==== --- */		
		$("#register_rentee").submit(function(event){
			event.preventDefault();	 
			$.ajax({
				type: "POST",
				url: base_url+"Login/signin",					 
				data: {
						username: $("#register_email").val(),
						password: $("#register_password").val()
						}, 
				success:function(data){						   
					if(data == 'loggedIn'){
						document.location.reload();						
					}else if(data == 'No'){
						var error = '<div class="enroll_error">Sorry you have entered wrong information </div>';
						$('.renteememo').html(error);						
					}else{
						var error = '<div class="enroll_error">Sorry you have entered wrong information </div>';
						$('.renteememo').html(error);						
					}
				}						
			});
		});
		/* --- ==== Forgot Password Script ==== --- */
		$("#fgtForm").submit(function(event){
			event.preventDefault();	 
			$.ajax({
				type: "POST",
				url: base_url+"Login/forget_password",			 
				data: {
					email: $("#forgot_email").val()
					}, 
				success:function(data){                    
					if(data == 'loggedIn'){					   
						var error = '<div class="enroll_success">Successfully Sent </div>';
						$('.renteememo').html(error);						
					}else if(data == 'No'){
						var error = '<div class="enroll_error">Sorry you have entered wrong information </div>';
						$('.renteememo').html(error);						
					}else {
						var error = '<div class="enroll_error">Sorry you have entered wrong information </div>';
						$('.renteememo').html(error);						
					}				                         							
				}						
			});
		});
				
	});
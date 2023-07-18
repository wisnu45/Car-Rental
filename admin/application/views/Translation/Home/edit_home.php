<?php $id = $this->session->userdata('admin');  ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Home Translation 
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Hometranslation/view_home"> Home Translation </a></li>
         <li class="active">Edit Home Translation</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <!-- left column -->
		 
         <div class="col-md-12">
            <?php
               if($this->session->flashdata('message')) {
               $message = $this->session->flashdata('message');
               ?>
            <div class="alert alert-<?php echo $message['class']; ?>">
               <button class="close" data-dismiss="alert" type="button">×</button>
               <?php echo $message['message']; ?>
            </div>
            <?php
               }
               ?>
         </div>
		 <?php 	
				$final_lang = '';
				$textFile = $language_name;
				$location = '../application/language/'.$textFile.'/'.'';
				$lang_directory = directory_map($location, FALSE);	
				if(is_bool($lang_directory ) === false):	
					if(in_array('home_lang.php',$lang_directory)):				
						$final_lang = 'home_lang';
					else:
						$this->load->view('error_trans');
						exit();
					endif;
				else:
					$this->load->view('error_trans');
					exit();
				endif;			
				if($final_lang):	
					$extension = ".php";       					
					include '../application/language/'.''.$textFile.'/'.$final_lang.$extension;
				endif;
				?>
	<form role="form"  method="post" id="home_edit">
		<input type="hidden" name="created_by" value="<?php echo $id; ?>">
		<input type="hidden" name="created_date" value="<?php echo date('Y-m-d  H:i:s'); ?>" >
	    <input  type="hidden" name="lang['commute_lang']" value="commute_lang" >
	    <input  type="hidden" name="lang['login_lang']" value="login_lang">
	    <input  type="hidden" name="lang['tariff_lang']" value="tariff_lang">
	    <input  type="hidden" name="lang['deal_lang']" value="deal_lang">
	    <input  type="hidden" name="lang['offers_lang']" value="offers_lang">
	    <input  type="hidden" name="lang['chronologypopup_lang']" value="chronologypopup_lang">
	    <input  type="hidden" name="lang['coupebooking_lang']" value="coupebooking_lang">
	    <input  type="hidden" name="lang['renter_lang']" value="renter_lang">
         <div class="col-md-12">
            <!-- general form elements -->						 
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit General Home Details</h3>
				  <div class="edituser" tabindex='1'></div>
               </div>
               <!-- /.box-header -->
               <!-- form start -->               
			   
			    <div class="box-body">                 
                     <div class="col-md-12">
					 <input  name="id"  id="id" class="form-control  required regcom sample" value="<?php echo $textFile; ?>" type="hidden">
					 	<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Language Name</label>
                             <input class="form-control  required regcom sample" placeholder="Language Name" name="lang['language']"  type="text" value="<?php if(!empty($lang['language'])): echo $lang['language']; endif;?>" >
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
                            
					  <input class="form-control  required regcom sample"   placeholder="Page Name" value="home_lang" name="lang['page_name']"  type="hidden">
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">WEB NAME</label>
                             <input class="form-control  required regcom sample" required placeholder="Web Name" value="<?php if(!empty($lang['webname'])): echo $lang['webname']; endif;?>" name="lang['webname']"  type="text"   required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
					  
					  
					   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Tariffs</label>
                             <input class="form-control  required regcom sample" placeholder="Tariffs" name="lang['tarrif']"   type="text" value="<?php if(!empty($lang['tarrif'])): echo $lang['tarrif']; endif;?>">
                             <span class="glyphicon  form-control-feedback"></span>
                       </div>
					   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Mobile App</label>
                            <input type="text" name="lang['mobileapp']" placeholder="Mobile App" class="form-control required regcom" value="<?php if(!empty($lang['mobileapp'])): echo $lang['mobileapp']; endif;?>">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Partnerwithus</label>
                            <input type="text" name="lang['partnerwithus']" placeholder="Partnerwithus" class="form-control required regcom" value="<?php if(!empty($lang['partnerwithus'])): echo $lang['partnerwithus']; endif;?>" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Signup</label>
                            <input type="text" name="lang['signup']" placeholder="Signup" class="form-control required regcom" value="<?php if(!empty($lang['signup'])): echo $lang['signup']; endif;?>">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Login</label>
                            <input type="text" name="lang['login']" placeholder="Login" class="form-control required regcom" value="<?php if(!empty($lang['login'])): echo $lang['login']; endif;?>" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">DRIVE IN THE CITY &</label>
                            <input type="text" name="lang['home_slide_A1']" value="<?php if(!empty($lang['home_slide_A1'])): echo $lang['home_slide_A1']; endif;?>"  placeholder="DRIVE IN THE CITY &" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">OUTSTATION</label>
                            <input type="text" name="lang['home_slide_A2']" value="<?php if(!empty($lang['home_slide_A2'])): echo $lang['home_slide_A2']; endif;?>" placeholder="OUTSTATION" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">When do you need a CityRide?</label>
                            <input type="text" name="lang['home_slide_A3']"  value="<?php if(!empty($lang['home_slide_A3'])): echo $lang['home_slide_A3']; endif;?>" placeholder="When do you need a CityRide?" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Rent a Self-Drive car in</label>
                            <input type="text" name="lang['home_slide_A4']" value="<?php if(!empty($lang['home_slide_A4'])): echo $lang['home_slide_A4']; endif;?>" placeholder="Rent a Self-Drive car in" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">SELECT YOUR CITY</label>
                            <input type="text" name="lang['home_slide_A5']" value="<?php if(!empty($lang['home_slide_A5'])): echo $lang['home_slide_A5']; endif;?>" placeholder="SELECT YOUR CITY" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">CITYRIDE COMMUTE </label>
                            <input type="text" name="lang['home_slide_A6']" value="<?php if(!empty($lang['home_slide_A6'])): echo $lang['home_slide_A6']; endif;?>" placeholder="CITYRIDE COMMUTE" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">DEAL SHACK </label>
                            <input type="text" name="lang['home_slide_A7']" value="<?php if(!empty($lang['home_slide_A7'])): echo $lang['home_slide_A7']; endif;?>" placeholder="DEAL SHACK" class="form-control required regcom" required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">OFFERS</label>
                            <input type="text" name="lang['home_slide_A8']" value="<?php if(!empty($lang['home_slide_A8'])): echo $lang['home_slide_A8']; endif;?>" placeholder="OFFERS" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
<!-- --SLIDE 2-- -->	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">THE CITYRIDE ADVANTAGE</label>
                            <input type="text" name="lang['home_slide_B1']" value="<?php if(!empty($lang['home_slide_B1'])): echo $lang['home_slide_B1']; endif;?>" placeholder="THE CITYRIDE ADVANTAGE" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">The CityRide Adavantege Subtitle</label>
							<input type="text" name="lang['home_slide_B2']" value="<?php if(!empty($lang['home_slide_B2'])): echo $lang['home_slide_B2']; endif;?>" placeholder="The CityRide Adavantege Subtitle" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 	
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Fuel Cost Included</label>
                            <input type="text" name="lang['home_slide_B3']" value="<?php if(!empty($lang['home_slide_B3'])): echo $lang['home_slide_B3']; endif;?>" placeholder="Fuel Cost Included" class="form-control required regcom"  required="">
  						    <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Fuel Cost Included Subtitle</label>
                            <textarea name="lang['home_slide_B4']"  class="form-control required regcom"  placeholder="Fuel Cost Included Subtitle" required=""><?php if(!empty($lang['home_slide_B4'])): echo $lang['home_slide_B4']; endif;?>						
							</textarea>
  						    <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                             <label for="exampleInputEmail1">No Hidden Charges</label>
                             <input type="text" name="lang['home_slide_B5']" value="<?php if(!empty($lang['home_slide_B5'])): echo $lang['home_slide_B5']; endif;?>" placeholder="No Hidden Charges" class="form-control required regcom"  required="">
							 <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                             <label for="exampleInputEmail1">No Hidden Charges Subtitle</label>
                             <textarea name="lang['home_slide_B6']" class="form-control required regcom"  placeholder="No Hidden Charges Subtitle" required=""><?php if(!empty($lang['home_slide_B6'])): echo $lang['home_slide_B6']; endif;?>					
							 </textarea>
							 <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Flexi Pricing Packages</label>
                            <input type="text" name="lang['home_slide_B7']" value="<?php if(!empty($lang['home_slide_B7'])): echo $lang['home_slide_B7']; endif;?>" placeholder="Flexi Pricing Packages" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
					      <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Flexi Pricing Packages Subtitle</label>
                            <textarea name="lang['home_slide_B8']"  class="form-control required regcom"  placeholder="Flexi Pricing Packages Subtitle" required=""><?php if(!empty($lang['home_slide_B8'])): echo $lang['home_slide_B8']; endif;?>						
							</textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Go Anywhere</label>
                            <input type="text" name="lang['home_slide_B9']" value="<?php if(!empty($lang['home_slide_B9'])): echo $lang['home_slide_B9']; endif;?>" placeholder="Go Anywhere" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Go Anywhere Subtitle</label>
                            <textarea name="lang['home_slide_B10']"  class="form-control required regcom"  placeholder="Go Anywhere Subtitle" required=""><?php if(!empty($lang['home_slide_B10'])): echo $lang['home_slide_B10']; endif;?>					
							</textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">24x7 Roadside Assistance</label>
                            <input type="text" name="lang['home_slide_B11']" value="<?php if(!empty($lang['home_slide_B11'])): echo $lang['home_slide_B11']; endif;?>" placeholder="24x7 Roadside Assistance" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">24x7 Roadside Assistance Subtitle</label>
							<textarea name="lang['home_slide_B12']" class="form-control required regcom"  placeholder="24x7 Roadside Assistance Subtitle" required=""><?php if(!empty($lang['home_slide_B12'])): echo $lang['home_slide_B12']; endif;?>						
							</textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Damage Insurance</label>
                            <input type="text" name="lang['home_slide_B13']" value="<?php if(!empty($lang['home_slide_B13'])): echo $lang['home_slide_B13']; endif;?>" placeholder="Damage Insurance" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Damage Insurance Subtitle</label>
                            <textarea name="lang['home_slide_B14']"  class="form-control required regcom"  placeholder="Damage Insurance Subtitle" required=""><?php if(!empty($lang['home_slide_B14'])): echo $lang['home_slide_B14']; endif;?>						
							</textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 

	<!-- --SLIDE 3-- -->
					     <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">CITYRIDE FLEXI PRICING</label>
                            <input type="text" name="lang['home_slide_C1']" value="<?php if(!empty($lang['home_slide_C1'])): echo $lang['home_slide_C1']; endif;?>"  placeholder="CITYRIDE FLEXI PRICING" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">CityRide Flexi Pricing Subtitle</label>
                            <textarea name="lang['home_slide_C2']"   class="form-control required regcom"  placeholder="CityRide Flexi Pricing Subtitle" required=""><?php if(!empty($lang['home_slide_C2'])): echo $lang['home_slide_C2']; endif;?>						
							</textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">KMS/DAY</label>
                            <input type="text" name="lang['home_slide_C3']" value="<?php if(!empty($lang['home_slide_C3'])): echo $lang['home_slide_C3']; endif;?>" placeholder="KMS/DAY" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Fuel Included</label>
                            <input type="text" name="lang['home_slide_C4']" value="<?php if(!empty($lang['home_slide_C4'])): echo $lang['home_slide_C4']; endif;?>" placeholder="Fuel Included" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">5 kms/hour</label>
                            <input type="text" name="lang['home_slide_C5']" value="<?php if(!empty($lang['home_slide_C5'])): echo $lang['home_slide_C5']; endif;?>" placeholder="5 kms/hour" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">~25% Cheaper Total Cost</label>
                            <input type="text" name="lang['home_slide_C6']" value="<?php if(!empty($lang['home_slide_C6'])): echo $lang['home_slide_C6']; endif;?>" placeholder="~25% Cheaper Total Cost" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">IDEAL FOR</label>
                            <input type="text" name="lang['home_slide_C7']" value="<?php if(!empty($lang['home_slide_C7'])): echo $lang['home_slide_C7']; endif;?>" placeholder="IDEAL FOR" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Long Outstation Trips </label>
                            <input type="text" name="lang['home_slide_C8']" value="<?php if(!empty($lang['home_slide_C8'])): echo $lang['home_slide_C8']; endif;?>" placeholder="Long Outstation Trips " class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Multiday Bookings </label>
                            <input type="text" name="lang['home_slide_C9']" value="<?php if(!empty($lang['home_slide_C9'])): echo $lang['home_slide_C9']; endif;?>" placeholder="Multiday Bookings " class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Office Commute</label>
                            <input type="text" name="lang['home_slide_C10']" value="<?php if(!empty($lang['home_slide_C10'])): echo $lang['home_slide_C10']; endif;?>" placeholder="Office Commute" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
	<!-- --SLIDE 4-- -->	 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">SUPERMILERS CLUB</label>
                            <input type="text" name="lang['home_slide_D5']" value="<?php if(!empty($lang['home_slide_D5'])): echo $lang['home_slide_D5']; endif;?>" placeholder="SUPERMILERS CLUB" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>  
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Supermilers Club Subtitle</label>
                             <textarea name="lang['home_slide_D6']"  class="form-control required regcom"  placeholder="Supermilers Club Subtitle" required=""><?php if(!empty($lang['home_slide_D6'])): echo $lang['home_slide_D6']; endif;?>					
							 </textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>  
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">ZERO SECURITY DEPOSIT</label>
                            <input type="text" name="lang['home_slide_D7']" value="<?php if(!empty($lang['home_slide_D7'])): echo $lang['home_slide_D7']; endif;?>" placeholder="ZERO SECURITY DEPOSIT" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>  
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Zero Security Deposit Subtitle</label>
                             <textarea name="lang['home_slide_D8']"  class="form-control required regcom"  placeholder="Zero Security Deposit Subtitle" required=""><?php if(!empty($lang['home_slide_D8'])): echo $lang['home_slide_D8']; endif;?>						
							</textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>  
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">EARN Z POINTS</label>
                            <input type="text" name="lang['home_slide_D9_over']" value="<?php if(!empty($lang['home_slide_D9_over'])): echo $lang['home_slide_D9_over']; endif;?>" placeholder="EARN Z POINTS" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>  
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Earn Z Points Subtitle</label>
                            <textarea name="lang['home_slide_D10']"  class="form-control required regcom"  placeholder="Earn Z Points Subtitle" required=""><?php if(!empty($lang['home_slide_B10'])): echo $lang['home_slide_B10']; endif;?>					
							</textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>  
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">PRIORITY CALL CENTER SUPPORT </label>
                            <input type="text" name="lang['home_slide_D11']" value="<?php if(!empty($lang['home_slide_D11'])): echo $lang['home_slide_D11']; endif;?>" placeholder="PRIORITY CALL CENTER SUPPORT" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>  
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">PRIORITY CALL CENTER SUPPORT  Subtitle</label>
                            <textarea name="lang['home_slide_D12']" class="form-control required regcom"  placeholder="PRIORITY CALL CENTER SUPPORT Subtitle" required=""><?php if(!empty($lang['home_slide_D12'])): echo $lang['home_slide_D12']; endif;?>						
							</textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                         </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">SUPERMILER PRIVILEGES </label>
                            <input type="text" name="lang['home_slide_D13']" value="<?php if(!empty($lang['home_slide_D13'])): echo $lang['home_slide_D13']; endif;?>" placeholder="SUPERMILER PRIVILEGES" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>                          
                         </div> 		
<!-- --SLIDE 5-- -->
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">A CAR FOR EVERY NEED </label>
                            <input type="text" name="lang['home_slide_E1']" value="<?php if(!empty($lang['home_slide_E1'])): echo $lang['home_slide_E1']; endif;?>" placeholder="A CAR FOR EVERY NEED" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">A CAR FOR EVERY NEED Subtitle</label>
                            <textarea name="lang['home_slide_E2']"  class="form-control required regcom"  placeholder="A CAR FOR EVERY NEED Subtitle" required=""><?php if(!empty($lang['home_slide_E2'])): echo $lang['home_slide_E2']; endif;?>					
							</textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Price Starting at ₹ 195/hr</label>
                            <input type="text" name="lang['home_slide_E3']" value="<?php if(!empty($lang['home_slide_E3'])): echo $lang['home_slide_E3']; endif;?>" placeholder="Price Starting at ₹ 195/hr" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">(Fuel free!)CARS AVAILABLE:  MERCEDES A CLASS,MERCEDES GLA, AUDI Q3</label>
                            <input type="text" name="lang['home_slide_E4']" value="<?php if(!empty($lang['home_slide_E4'])): echo $lang['home_slide_E4']; endif;?>" placeholder="(Fuel free!)CARS AVAILABLE:  MERCEDES A CLASS,MERCEDES GLA, AUDI Q3" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">A quick drive to sunrise point </label>
                            <input type="text" name="lang['home_slide_E5']" value="<?php if(!empty($lang['home_slide_E5'])): echo $lang['home_slide_E5']; endif;?>" placeholder="A quick drive to sunrise point" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>

<!-- --SLIDE 6-- -->
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">HOW CITYRIDE WORKS </label>
                            <input type="text" name="lang['home_slide_F1']" value="<?php if(!empty($lang['home_slide_F1'])): echo $lang['home_slide_F1']; endif;?>" placeholder="HOW CITY RIDE WORKS" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">HOW CITYRIDE WORKS subtitle </label>
                            <textarea name="lang['home_slide_F2']"  class="form-control required regcom"  placeholder="HOW CITYRIDE WORKS subtitle" required=""><?php if(!empty($lang['home_slide_F2'])): echo $lang['home_slide_F2']; endif;?>						
							</textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">UNLOCK</label>
                            <input type="text" name="lang['home_slide_F3']" value="<?php if(!empty($lang['home_slide_F3'])): echo $lang['home_slide_F3']; endif;?>" placeholder="UNLOCK" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">UNLOCK Subtitle</label>
                            <textarea name="lang['home_slide_F4']"  class="form-control required regcom"  placeholder="UNLOCK Subtitle" required=""><?php if(!empty($lang['home_slide_F4'])): echo $lang['home_slide_F4']; endif;?>						
							</textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">CITYRIDE</label>
                            <input type="text" name="lang['home_slide_F5']" value="<?php if(!empty($lang['home_slide_F5'])): echo $lang['home_slide_F5']; endif;?>" placeholder="CITYRIDE" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">CITYRIDE Subtitle</label>
                            <textarea name="lang['home_slide_F6']"  class="form-control required regcom"  placeholder="CITYRIDE Subtitle" required="">	<?php if(!empty($lang['home_slide_F6'])): echo $lang['home_slide_F6']; endif;?>				
							</textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">RETURN</label>
                            <input type="text" name="lang['home_slide_F7']" value="<?php if(!empty($lang['home_slide_F7'])): echo $lang['home_slide_F7']; endif;?>" placeholder="RETURN" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">RETURN Subtitle</label>
                            <textarea name="lang['home_slide_F8']"  class="form-control required regcom"  placeholder="RETURN Subtitle" required=""><?php if(!empty($lang['home_slide_F8'])): echo $lang['home_slide_F8']; endif;?>						
							</textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
	 <!-- --SLIDE 7-- -->
	 					 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">CITYRIDE ON THE GO</label>
                            <input type="text" name="lang['home_slide_F9']" value="<?php if(!empty($lang['home_slide_F9'])): echo $lang['home_slide_F9']; endif;?>" placeholder="CITYRIDE ON THE GO" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">CITYRIDE ON THE GO Subtitle</label>
                            <textarea name="lang['home_slide_F10']"  class="form-control required regcom"  placeholder="CITYRIDE ON THE GO Subtitle" required="">	<?php if(!empty($lang['home_slide_F10'])): echo $lang['home_slide_F10']; endif;?>			
							</textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">3,800+</label>
                            <input type="text" name="lang['home_slide_F11']" value="<?php if(!empty($lang['home_slide_F11'])): echo $lang['home_slide_F11']; endif;?>" placeholder="3,800+" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">3,800+ Subtitle</label>
                            <input type="text" name="lang['home_slide_F12']" value="<?php if(!empty($lang['home_slide_F12'])): echo $lang['home_slide_F12']; endif;?>" placeholder="3,800+ Subtitle" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">12,00,000+</label>
                            <input type="text" name="lang['home_slide_F13']" value="<?php if(!empty($lang['home_slide_F13'])): echo $lang['home_slide_F13']; endif;?>"placeholder="12,00,000+" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">12,00,000+ Subtitle</label>
                            <input type="text" name="lang['home_slide_F14']" value="<?php if(!empty($lang['home_slide_F14'])): echo $lang['home_slide_F14']; endif;?>"  placeholder="12,00,000+ Subtitle" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">15,00,00,000+</label>
                            <input type="text" name="lang['home_slide_F15']"  value="<?php if(!empty($lang['home_slide_F15'])): echo $lang['home_slide_F15']; endif;?>" placeholder="15,00,00,000+" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">15,00,00,000+ Subtitle</label>
                            <input type="text" name="lang['home_slide_F16']"  value="<?php if(!empty($lang['home_slide_F16'])): echo $lang['home_slide_F16']; endif;?>" placeholder="15,00,00,000+ Subtitle" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">2,200+</label>
                            <input type="text" name="lang['home_slide_F17']"  value="<?php if(!empty($lang['home_slide_F17'])): echo $lang['home_slide_F17']; endif;?>" placeholder="15,00,00,000+" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">2,200+ Subtitle</label>
                            <input type="text" name="lang['home_slide_F18']"  value="<?php if(!empty($lang['home_slide_F18'])): echo $lang['home_slide_F18']; endif;?>" placeholder="2,200+ Subtitle" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>

    <!-- --SLIDE 7-- -->
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">HAPPY CUSTOMERS</label>
                            <input type="text" name="lang['home_slide_G1']" value="<?php if(!empty($lang['home_slide_G1'])): echo $lang['home_slide_G1']; endif;?>" placeholder="HAPPY CUSTOMERS" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">HAPPY CUSTOMERS Subtitle</label>
                            <textarea name="lang['home_slide_G2']"  class="form-control required regcom"  placeholder="HAPPY CUSTOMERS Subtitle" required=""><?php if(!empty($lang['home_slide_G2'])): echo $lang['home_slide_G2']; endif;?>					
							</textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 
	   <!-- --SLIDE 8-- -->	 
	   					<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Cities</label>
                            <input type="text" name="lang['home_slide_H1']" value="<?php if(!empty($lang['home_slide_H1'])): echo $lang['home_slide_H1']; endif;?>" placeholder="Cities" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Car Rental </label>
                            <input type="text" name="lang['home_slide_H2']" value="<?php if(!empty($lang['home_slide_H2'])): echo $lang['home_slide_H2']; endif;?>"  placeholder="Car Rental" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>

						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">How It Works?</label>
                            <input type="text" name="lang['home_slide_H3']" value="<?php if(!empty($lang['home_slide_H3'])): echo $lang['home_slide_H3']; endif;?>" placeholder="How It Works?" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">How Cityride Works</label>
                            <input type="text" name="lang['home_slide_H4']" value="<?php if(!empty($lang['home_slide_H4'])): echo $lang['home_slide_H4']; endif;?>" placeholder="How Cityride Works" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Policies</label>
                            <input type="text" name="lang['home_slide_H5']" value="<?php if(!empty($lang['home_slide_H5'])): echo $lang['home_slide_H5']; endif;?>" placeholder="Policies" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Cityride in Safety</label>
                            <input type="text" name="lang['home_slide_H6']" value="<?php if(!empty($lang['home_slide_H6'])): echo $lang['home_slide_H6']; endif;?>" placeholder="Cityride in Safety" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Going Outstation?</label>
                            <input type="text" name="lang['home_slide_H7']" value="<?php if(!empty($lang['home_slide_H7'])): echo $lang['home_slide_H7']; endif;?>" placeholder="Going Outstation?" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">FAQs</label>
                            <input type="text" name="lang['home_slide_H8']" value="<?php if(!empty($lang['home_slide_H8'])): echo $lang['home_slide_H8']; endif;?>" placeholder="FAQs" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">About Us</label>
                            <input type="text" name="lang['home_slide_H9']"  value="<?php if(!empty($lang['home_slide_H9'])): echo $lang['home_slide_H9']; endif;?>" placeholder="About Us" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Cityride Team</label>
                            <input type="text" name="lang['home_slide_H10']" value="<?php if(!empty($lang['home_slide_H10'])): echo $lang['home_slide_H10']; endif;?>" placeholder="Cityride Team" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">CAP</label>
                            <input type="text" name="lang['home_slide_H11']"  value="<?php if(!empty($lang['home_slide_H11'])): echo $lang['home_slide_H11']; endif;?>"placeholder="CAP" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Careers @ Cityride</label>
                            <input type="text" name="lang['home_slide_H12']" value="<?php if(!empty($lang['home_slide_H12'])): echo $lang['home_slide_H12']; endif;?>"placeholder="Careers @ Cityride" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Cityride Blog</label>
                            <input type="text" name="lang['home_slide_H13']" value="<?php if(!empty($lang['home_slide_H13'])): echo $lang['home_slide_H13']; endif;?>"placeholder="Cityride Blog" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Locations and Cars</label>
                            <input type="text" name="lang['home_slide_H14']" value="<?php if(!empty($lang['home_slide_H14'])): echo $lang['home_slide_H14']; endif;?>" placeholder="Locations and Cars" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Let's keep in touch</label>
                            <input type="text" name="lang['home_slide_H15']" value="<?php if(!empty($lang['home_slide_H15'])): echo $lang['home_slide_H15']; endif;?>" placeholder="Let's keep in touch" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Help and Support 7th Floor, Tower-B, </label>
                            <input type="text" name="lang['home_slide_H16']" value="<?php if(!empty($lang['home_slide_H16'])): echo $lang['home_slide_H16']; endif;?>" placeholder="Help and Support 7th Floor, Tower-B," class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Diamond District, 150, HAL Airport</label>
                            <input type="text" name="lang['home_slide_H17']" value="<?php if(!empty($lang['home_slide_H17'])): echo $lang['home_slide_H17']; endif;?>" placeholder="Diamond District, 150, HAL Airport" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Road, Kodihalli, Bangalore – 560008 </label>
                            <input type="text" name="lang['home_slide_H18']" value="<?php if(!empty($lang['home_slide_H18'])): echo $lang['home_slide_H18']; endif;?>" placeholder="Road, Kodihalli, Bangalore – 560008" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">© Copyright © 2015-2016 Techware Solution. All rights reserved. </label>
                            <input type="text" name="lang['home_slide_H19']" value="<?php if(!empty($lang['home_slide_H19'])): echo $lang['home_slide_H19']; endif;?>" placeholder="© Copyright © 2015-2016 Techware Solution. All rights reserved. " class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Alert Message User: Updated successfully </label>
                            <input type="text" name="lang['home_slide_alert1']" value="<?php if(!empty($lang['home_slide_alert1'])): echo $lang['home_slide_alert1']; endif;?>" placeholder="Updated successfully" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Alert Message User: Error </label>
                            <input type="text" name="lang['home_slide_alert2']" value="<?php if(!empty($lang['home_slide_alert2'])): echo $lang['home_slide_alert2']; endif;?>" placeholder=" Error" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
				 </div>
			</div>
			<div class="box">			
			   <div class="form-group has-feedback">                                       
                    <input type="button" class="btn btn-primary" value="Submit"   id="useradd1">
                     <button type="reset" class="btn btn-primary">Reset </button>
               </div> 
            </div>	
            <!-- /.box -->
         </div>
		 </form>
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
	<script>
	
	base_url = "<?php echo base_url(); ?>";
	config_url = "<?php echo base_url(); ?>";
	
	</script>

    <script type="text/javascript">

</script>
	 
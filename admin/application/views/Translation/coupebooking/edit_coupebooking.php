<?php $id = $this->session->userdata('admin');  ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Coupebooking Translation 
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Coupebookingtranslation/view_coupebooking"> Chronology Translation </a></li>
         <li class="active">Edit Chronology Translation</li>
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
					if(in_array('coupebooking_lang.php',$lang_directory)):				
						$final_lang = 'coupebooking_lang';
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
	 <form role="form"  method="post" id="coupe">
		<input type="hidden" name="created_by" value="<?php echo $id; ?>">
		<input type="hidden" name="created_date" value="<?php echo date('Y-m-d  H:i:s'); ?>" >
		<input  type="hidden" name="lang['home_lang']" value="home_lang">
	  <input  type="hidden" name="lang['commute_lang']" value="commute_lang">
	  <input  type="hidden" name="lang['login_lang']" value="login_lang">
	  <input  type="hidden" name="lang['tariff_lang']" value="tariff_lang">
	  <input  type="hidden" name="lang['deal_lang']" value="deal_lang">
	  <input  type="hidden" name="lang['offers_lang']" value="offers_lang">
	  <input  type="hidden" name="lang['chronologypopup_lang']" value="chronologypopup_lang">
	  
	  <input  type="hidden" name="lang['renter_lang']" value="renter_lang">
		 <div class="col-md-12">
            <!-- general form elements -->						 
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit GeneralCoupebooking page Details</h3>
				  <div class="edituser" tabindex='1'></div>
               </div>
               <!-- /.box-header -->
               <!-- form start -->               
			 
			    <div class="box-body">  
                    <div class="col-md-12">
					 <input  name="id"  id="id" class="form-control  required regcom sample" value="<?php echo $textFile; ?>" type="hidden">
					 	<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Language Name</label>
                             <input class="form-control  required regcom sample" placeholder="Language Name" name="lang['language']" value="<?php echo $lang['language'];?>" data-parsley-trigger="change"	data-parsley-minlength="3" data-parsley-pattern="^[a-zA-Z\  \/]+$"type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<input class="form-control  required regcom sample"   placeholder="Page Name" value="coupebooking_lang" name="lang['page_name']"  type="hidden">
                       
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Date and time for your trip</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_A1']" value="<?php if(!empty($lang['coupe_slide_A1'])): echo $lang['coupe_slide_A1']; endif;?>"placeholder="Date and time for your trip"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Find cars at</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_A2']" value="<?php if(!empty($lang['coupe_slide_A2'])): echo $lang['coupe_slide_A2']; endif;?>" placeholder="Find cars at"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Choose a free km package</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_A3']" value="<?php if(!empty($lang['coupe_slide_A3'])): echo $lang['coupe_slide_A3']; endif;?>"placeholder="Choose a free km package"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">START TRIP</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_A4']" value="<?php if(!empty($lang['coupe_slide_A4'])): echo $lang['coupe_slide_A4']; endif;?>"placeholder="START TRIP"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">END TRIP </label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_A5']" value="<?php if(!empty($lang['coupe_slide_A5'])): echo $lang['coupe_slide_A5']; endif;?>" placeholder="END TRIP"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">DURATION</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_A6']" value="<?php if(!empty($lang['coupe_slide_A6'])): echo $lang['coupe_slide_A6']; endif;?>" placeholder="DURATION"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">YOUR LOCATION IS</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_A7']" value="<?php if(!empty($lang['coupe_slide_A7'])): echo $lang['coupe_slide_A7']; endif;?>" placeholder="YOUR LOCATION IS"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">YOU GET FIRST</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_A8']" value="<?php if(!empty($lang['coupe_slide_A8'])): echo $lang['coupe_slide_A8']; endif;?>" placeholder="START TRIP"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Available Cars</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B1']" value="<?php if(!empty($lang['coupe_slide_B1'])): echo $lang['coupe_slide_B1']; endif;?>" placeholder="Available Cars"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">NEAREST LOCATIONS</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B2']" value="<?php if(!empty($lang['coupe_slide_B2'])): echo $lang['coupe_slide_B2']; endif;?>" placeholder="NEAREST LOCATIONS"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">BOOK NOW</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B3']" value="<?php if(!empty($lang['coupe_slide_B3'])): echo $lang['coupe_slide_B3']; endif;?>" placeholder="BOOK NOW"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">DAYS</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B4']" value="<?php if(!empty($lang['coupe_slide_B4'])): echo $lang['coupe_slide_B4']; endif;?>" placeholder="DAYS"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">HOURS</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B5']" value="<?php if(!empty($lang['coupe_slide_B5'])): echo $lang['coupe_slide_B5']; endif;?>" placeholder="HOURS"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">MINUTES</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B6']" value="<?php if(!empty($lang['coupe_slide_B6'])): echo $lang['coupe_slide_B6']; endif;?>" placeholder="MINUTES"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">kms FREE</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B7']" value="<?php if(!empty($lang['coupe_slide_B7'])): echo $lang['coupe_slide_B7']; endif;?>" placeholder="kms FREE"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">seats</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B8']" value="<?php if(!empty($lang['coupe_slide_B8'])): echo $lang['coupe_slide_B8']; endif;?>" placeholder="seats"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Speed</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B9']" value="<?php if(!empty($lang['coupe_slide_B9'])): echo $lang['coupe_slide_B9']; endif;?>" placeholder="Speed"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">NEAREST LOCATIONS</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B10']" value="<?php if(!empty($lang['coupe_slide_B10'])): echo $lang['coupe_slide_B10']; endif;?>" placeholder="NEAREST LOCATIONS"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Excess</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B11']" value="<?php if(!empty($lang['coupe_slide_B11'])): echo $lang['coupe_slide_B11']; endif;?>" placeholder="Excess"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Per/Km</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B12']" value="<?php if(!empty($lang['coupe_slide_B12'])): echo $lang['coupe_slide_B12']; endif;?>" placeholder="Per/Km"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Login/Signup</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A1']"  value="<?php if(!empty($lang['checkout_slide_A1'])): echo $lang['checkout_slide_A1']; endif;?>"placeholder="Login/Signup"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Checkout</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A2']" value="<?php if(!empty($lang['checkout_slide_A2'])): echo $lang['checkout_slide_A2']; endif;?>" placeholder="Checkout"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Finished</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A3']" value="<?php if(!empty($lang['checkout_slide_A3'])): echo $lang['checkout_slide_A3']; endif;?>"placeholder="Finished"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Login</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A4']" value="<?php if(!empty($lang['checkout_slide_A4'])): echo $lang['checkout_slide_A4']; endif;?>"placeholder="Login"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Signup</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A5']" value="<?php if(!empty($lang['checkout_slide_A5'])): echo $lang['checkout_slide_A5']; endif;?>"placeholder="Signup"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Sign in with facebook </label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A6']" value="<?php if(!empty($lang['checkout_slide_A6'])): echo $lang['checkout_slide_A6']; endif;?>"placeholder="Sign in with facebook"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Sign in with Google+</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A7']" value="<?php if(!empty($lang['checkout_slide_A7'])): echo $lang['checkout_slide_A7']; endif;?>"placeholder="Sign in with Google+"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> New to cityride ? Sign up</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A8']" value="<?php if(!empty($lang['checkout_slide_A8'])): echo $lang['checkout_slide_A8']; endif;?>"placeholder="New to cityride ? Sign up"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Email</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A9']" value="<?php if(!empty($lang['checkout_slide_A9'])): echo $lang['checkout_slide_A9']; endif;?>"placeholder="Email"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Password</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A10']" value="<?php if(!empty($lang['checkout_slide_A10'])): echo $lang['checkout_slide_A10']; endif;?>"placeholder="Password"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Already have an account ? Login</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A11']" value="<?php if(!empty($lang['checkout_slide_A11'])): echo $lang['checkout_slide_A11']; endif;?>"placeholder="Already have an account ? Login"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Sign up with facebook</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A12']" value="<?php if(!empty($lang['checkout_slide_A12'])): echo $lang['checkout_slide_A12']; endif;?>" placeholder="Sign up with facebook"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Sign up with Google+</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A13']" value="<?php if(!empty($lang['checkout_slide_A13'])): echo $lang['checkout_slide_A13']; endif;?>" placeholder="Sign up with Google+"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> SUMMARY</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A14']" value="<?php if(!empty($lang['checkout_slide_A14'])): echo $lang['checkout_slide_A14']; endif;?>" placeholder="SUMMARY"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">seater</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A15']" value="<?php if(!empty($lang['checkout_slide_A15'])): echo $lang['checkout_slide_A15']; endif;?>" placeholder="seater"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">day</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A17']" value="<?php if(!empty($lang['checkout_slide_A17'])): echo $lang['checkout_slide_A17']; endif;?>" placeholder="day"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">hours</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A18']" value="<?php if(!empty($lang['checkout_slide_A18'])): echo $lang['checkout_slide_A18']; endif;?>" placeholder="hours"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> minutes</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A19']" value="<?php if(!empty($lang['checkout_slide_A19'])): echo $lang['checkout_slide_A19']; endif;?>" placeholder="minutes"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Tariff </label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A20']" value="<?php if(!empty($lang['checkout_slide_A20'])): echo $lang['checkout_slide_A20']; endif;?>" placeholder="Tariff "   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Refundable Deposit (?) </label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A21']" value="<?php if(!empty($lang['checkout_slide_A21'])): echo $lang['checkout_slide_A21']; endif;?>" placeholder="Refundable Deposit (?) "   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> PAYABLE AMOUNT ? </label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A22']" value="<?php if(!empty($lang['checkout_slide_A22'])): echo $lang['checkout_slide_A22']; endif;?>" placeholder="PAYABLE AMOUNT ? "   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Free Kms</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A23']" value="<?php if(!empty($lang['checkout_slide_A23'])): echo $lang['checkout_slide_A23']; endif;?>" placeholder="Free Kms"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">KMS</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A24']" value="<?php if(!empty($lang['checkout_slide_A24'])): echo $lang['checkout_slide_A24']; endif;?>" placeholder="KMS"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Excess Kms</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A25']" value="<?php if(!empty($lang['checkout_slide_A25'])): echo $lang['checkout_slide_A25']; endif;?>" placeholder="Excess Kms"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> /KM</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A26']" value="<?php if(!empty($lang['checkout_slide_A26'])): echo $lang['checkout_slide_A26']; endif;?>" placeholder=" /KM"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">RESERVATION CHECKOUT</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A27']" value="<?php if(!empty($lang['checkout_slide_A27'])): echo $lang['checkout_slide_A27']; endif;?>" placeholder="RESERVATION CHECKOUT"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Tariff Amount</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A28']" value="<?php if(!empty($lang['checkout_slide_A28'])): echo $lang['checkout_slide_A28']; endif;?>" placeholder="Tariff Amount"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Enter Promo</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A29']" value="<?php if(!empty($lang['checkout_slide_A29'])): echo $lang['checkout_slide_A29']; endif;?>" placeholder="Enter Promo"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Apply</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A30']" value="<?php if(!empty($lang['checkout_slide_A30'])): echo $lang['checkout_slide_A30']; endif;?>" placeholder="Apply"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Refundable Deposit</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A31']" value="<?php if(!empty($lang['checkout_slide_A31'])): echo $lang['checkout_slide_A31']; endif;?>" placeholder="Refundable Deposit"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Total Payable Amount</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A32']" value="<?php if(!empty($lang['checkout_slide_A32'])): echo $lang['checkout_slide_A32']; endif;?>" placeholder="Total Payable Amount"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">CHECKOUT</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A33']" value="<?php if(!empty($lang['checkout_slide_A33'])): echo $lang['checkout_slide_A33']; endif;?>" placeholder="CHECKOUT"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Final Checkout</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A34']" value="<?php if(!empty($lang['checkout_slide_A34'])): echo $lang['checkout_slide_A34']; endif;?>" placeholder="Final Checkout"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Successfully Reserved. Please check your email.</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A35']" value="<?php if(!empty($lang['checkout_slide_A35'])): echo $lang['checkout_slide_A35']; endif;?>" placeholder="Successfully Reserved. Please check your email."   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Click here. To Proceed.</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A36']" value="<?php if(!empty($lang['checkout_slide_A36'])): echo $lang['checkout_slide_A36']; endif;?>" placeholder="Click here. To Proceed."   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
				 </div>
			</div>
            <!-- /.box -->
         </div>
				   <div class="col-md-12">
					  <div class="form-group has-feedback">                                       
                            <input type="button" class="btn btn-primary" value="Submit"   id="coupeedit">
                             <button type="reset" class="btn btn-primary">Reset </button>
                       </div> 
				   </div>
	   </div>
   </form>
     
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
</div>
	<script>
	
	base_url = "<?php echo base_url(); ?>";
	config_url = "<?php echo base_url(); ?>";
	
	</script>

    <script type="text/javascript">

</script>
	 
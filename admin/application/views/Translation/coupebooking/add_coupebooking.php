<?php $id = $this->session->userdata('admin');  ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add coupebooking Translation 
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Coupebookingtranslation/view_coupebooking"> coupebooking Translation </a></li>
         <li class="active">Add coupebooking Translation</li>
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
	<form role="form"  method="post" id="coupe" data-parsley-validate="" class="validate">
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
                  <h3 class="box-title">Add General coupebooking page Details</h3>
				  <div class="edituser" tabindex='1'></div>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
                <div class="box-body">                 
                     <div class="col-md-12">
					 	<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Language Name</label>
                             <input class="form-control  required regcom sample" placeholder="Language Name" data-parsley-trigger="change"	data-parsley-minlength="3" data-parsley-pattern="^[a-zA-Z\  \/]+$"name="lang['language']"  type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<input class="form-control  required regcom sample"   placeholder="Page Name" value="coupebooking_lang" name="lang['page_name']"  type="hidden">
					    
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Date and time for your trip</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_A1']" placeholder="Date and time for your trip"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Find cars at</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_A2']" placeholder="Find cars at"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Choose a free km package</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_A3']" placeholder="Choose a free km package"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">START TRIP</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_A4']" placeholder="START TRIP"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">END TRIP </label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_A5']" placeholder="END TRIP"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">DURATION</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_A6']" placeholder="DURATION"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">YOUR LOCATION IS</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_A7']" placeholder="YOUR LOCATION IS"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">YOU GET FIRST</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_A8']" placeholder="START TRIP"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Available Cars</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B1']" placeholder="Available Cars"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">NEAREST LOCATIONS</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B2']" placeholder="NEAREST LOCATIONS"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>

						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">BOOK NOW</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B3']" placeholder="BOOK NOW"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">DAYS</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B4']" placeholder="DAYS"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">HOURS</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B5']" placeholder="HOURS"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">MINUTES</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B6']" placeholder="MINUTES"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">kms FREE</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B7']" placeholder="kms FREE"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">seats</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B8']" placeholder="seats"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Speed</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B9']" placeholder="Speed"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">NEAREST LOCATIONS</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B10']" placeholder="NEAREST LOCATIONS"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Excess</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B11']" placeholder="Excess"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Per/Km</label>
                             <input class="form-control  required regcom sample" name="lang['coupe_slide_B12']" placeholder="Per/Km"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Login/Signup</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A1']" placeholder="Login/Signup"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Checkout</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A2']" placeholder="Checkout"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Finished</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A3']" placeholder="Finished"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Login</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A4']" placeholder="Login"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Signup</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A5']" placeholder="Signup"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Sign in with facebook </label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A6']" placeholder="Sign in with facebook"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Sign in with Google+</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A7']" placeholder="Sign in with Google+"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> New to cityride ? Sign up</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A8']" placeholder="New to cityride ? Sign up"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Email</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A9']" placeholder="Email"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Password</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A10']" placeholder="Password"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Already have an account ? Login</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A11']" placeholder="Already have an account ? Login"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Sign up with facebook</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A12']" placeholder="Sign up with facebook"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Sign up with Google+</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A13']" placeholder="Sign up with Google+"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> SUMMARY</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A14']" placeholder="SUMMARY"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">seater</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A15']" placeholder="seater"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">day</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A17']" placeholder="day"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">hours</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A18']" placeholder="hours"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> minutes</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A19']" placeholder="minutes"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Tariff </label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A20']" placeholder="Tariff "   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Refundable Deposit (?) </label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A21']" placeholder="Refundable Deposit (?) "   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> PAYABLE AMOUNT ? </label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A22']" placeholder="PAYABLE AMOUNT ? "   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Free Kms</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A23']" placeholder="Free Kms"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">KMS</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A24']" placeholder="KMS"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Excess Kms</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A25']" placeholder="Excess Kms"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> /KM</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A26']" placeholder=" /KM"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">RESERVATION CHECKOUT</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A27']" placeholder="RESERVATION CHECKOUT"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Tariff Amount</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A28']" placeholder="Tariff Amount"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Enter Promo</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A29']" placeholder="Enter Promo"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Apply</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A30']" placeholder="Apply"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Refundable Deposit</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A31']" placeholder="Refundable Deposit"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Total Payable Amount</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A32']" placeholder="Total Payable Amount"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">CHECKOUT</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A33']" placeholder="CHECKOUT"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Final Checkout</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A34']" placeholder="Final Checkout"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Successfully Reserved. Please check your email.</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A35']" placeholder="Successfully Reserved. Please check your email."   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Click here. To Proceed.</label>
                             <input class="form-control  required regcom sample" name="lang['checkout_slide_A36']" placeholder="Click here. To Proceed."   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
				    </div>
			  </div>				   
		   </div>
			<div class="box">
				 <div class="box-body">
				   <div class="col-md-12">
					 <div class="form-group has-feedback">                                       
                            <input type="button" class="btn btn-primary" value="Submit"  name="Save" id="coupeadd">
                            <button type="reset" class="btn btn-primary">Reset </button>
                        </div> 
				   </div>
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


	 
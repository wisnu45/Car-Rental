<?php $id = $this->session->userdata('admin');  ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Renter Translation 
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Rentertranslation/view_renter"> Renter Translation </a></li>
         <li class="active">Add Renter Translation</li>
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
	 <form role="form"  method="post" id="renteradd" data-parsley-validate="" class="validate">
	    <input type="hidden" name="created_by" value="<?php echo $id; ?>">
	    <input type="hidden" name="created_date" value="<?php echo date('Y-m-d  H:i:s'); ?>" >
	    <input  type="hidden" name="lang['home_lang']" value="home_lang">
	    <input  type="hidden" name="lang['commute_lang']" value="commute_lang">
	    <input  type="hidden" name="lang['login_lang']" value="login_lang">
	    <input  type="hidden" name="lang['tariff_lang']" value="tariff_lang">
	    <input  type="hidden" name="lang['deal_lang']" value="deal_lang">
	    <input  type="hidden" name="lang['offers_lang']" value="offers_lang">
	    <input  type="hidden" name="lang['chronologypopup_lang']" value="chronologypopup_lang">
	    <input  type="hidden" name="lang['coupebooking_lang']" value="coupebooking_lang">
        <div class="col-md-12">
            <!-- general form elements -->						 
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Add General Renter page Details</h3>
				  <div class="edituser" tabindex='1'></div>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
                <div class="box-body">                 
                     <div class="col-md-12">
					 	<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Language Name</label>
                             <input class="form-control  required regcom sample" placeholder="Language Name" name="lang['language']"  type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<input class="form-control  required regcom sample"   placeholder="Page Name" value="renter_lang" name="lang['page_name']"  type="hidden">
				<!-------Home page------->
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">PENDING BOOKINGS </label>
                             <input class="form-control  required regcom sample" name="lang['renter_page1_slide_A1']" placeholder="PENDING BOOKINGS"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">COMPLETED BOOKINGS</label>
                            <input type="text" name="lang['renter_page1_slide_A2']" placeholder="COMPLETED BOOKINGS" class="form-control required regcom" required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">CANCELLED BOOKINGS</label>
                            <input type="text" name="lang['renter_page1_slide_A3']" placeholder="CANCELLED BOOKINGS" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Credits Balance</label>
                            <input type="text" name="lang['renter_page1_slide_B1']" placeholder="Credits Balance" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Link to PayTM Wallet while </label>
                            <input type="text" name="lang['renter_page1_slide_B2']" placeholder="Link to PayTM Wallet while " class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Riding for faster refunds!</label>
                            <input type="text" name="lang['renter_page1_slide_B3']" placeholder="Riding for faster refunds!" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">My Bookings</label>
                            <input type="text" name="lang['renter_page1_slide_B4']" placeholder="My Bookings" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Account</label>
                            <input type="text" name="lang['renter_page2_slide_A1']" placeholder="Account" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Account Details</label>
                            <input type="text" name="lang['renter_page2_slide_A2']" placeholder="Account Details" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Mobile</label>
                            <input type="text" name="lang['renter_page2_slide_A3']" placeholder="Mobile" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Change Password</label>
                            <input type="text" name="lang['renter_page2_slide_A4']" placeholder="Change Password" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Personal Details</label>
                            <input type="text" name="lang['renter_page2_slide_B1']" placeholder="Personal Details" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="lang['renter_page2_slide_B2']" placeholder="Name" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Date of Birth</label>
                            <input type="text" name="lang['renter_page2_slide_B3']" placeholder="Date of Birth" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Gender</label>
                            <input type="text" name="lang['renter_page2_slide_B4']" placeholder="Gender" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Location Details</label>
                            <input type="text" name="lang['renter_page2_slide_C1']" placeholder="Location Details" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" name="lang['renter_page2_slide_C2']" placeholder="Address" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">seater</label>
                            <input type="text" name="lang['renter_page2_slide_C3']" placeholder="seater" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">to</label>
                            <input type="text" name="lang['renter_page2_slide_C4']" placeholder="to" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">days</label>
                            <input type="text" name="lang['renter_page2_slide_C5']" placeholder="days" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">hours</label>
                            <input type="text" name="lang['renter_page2_slide_C6']" placeholder="hours" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">email</label>
                            <input type="text" name="lang['renter_page2_slide_C7']" placeholder="email" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">driving license</label>
                            <input type="text" name="lang['renter_page2_slide_C8']" placeholder="driving license" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">check</label>
                            <input type="text" name="lang['renter_page2_slide_C9']" placeholder="credit balance" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">My bookings</label>
                            <input type="text" name="lang['renter_page2_slide_C10']" placeholder="My bookings" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Update</label>
                            <input type="text" name="lang['renter_page2_slide_C11']" placeholder="Update" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> credit balance</label>
                            <input type="text" name="lang['renter_page2_slide_C12']" placeholder="credit balance" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
							<div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Male</label>
                            <input type="text" name="lang['renter_page2_slide_C13']" placeholder="Male" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Female</label>
                            <input type="text" name="lang['renter_page2_slide_C14']" placeholder="Female" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					</div>
			  </div>				   
		    </div>
			<div class="box">
			 <div class="box-body">
			   <div class="col-md-12">
				 <div class="form-group has-feedback">                                       
						<input type="button" class="btn btn-primary" value="Submit"  name="Save" id="renteradd1">
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
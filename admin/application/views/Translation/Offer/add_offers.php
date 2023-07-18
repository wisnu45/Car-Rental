<?php $id = $this->session->userdata('admin');  ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Offers Translation 
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Offerstranslation/view_offer"> Offers Translation </a></li>
         <li class="active">Add Offers Translation</li>
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
	<form role="form"  method="post" id="offersadd" data-parsley-validate="" class="validate">
	   <input type="hidden" name="created_by" value="<?php echo $id; ?>">
	   <input type="hidden" name="created_date" value="<?php echo date('Y-m-d  H:i:s'); ?>" >
	    <input  type="hidden" name="lang['home_lang']" value="home_lang">
	  <input  type="hidden" name="lang['commute_lang']" value="commute_lang">
	  <input  type="hidden" name="lang['login_lang']" value="login_lang">
	  <input  type="hidden" name="lang['tariff_lang']" value="tariff_lang">
	  <input  type="hidden" name="lang['deal_lang']" value="deal_lang">

	  <input  type="hidden" name="lang['chronologypopup_lang']" value="chronologypopup_lang">
	  <input  type="hidden" name="lang['coupebooking_lang']" value="coupebooking_lang">
	  <input  type="hidden" name="lang['renter_lang']" value="renter_lang">
         <div class="col-md-12">
            <!-- general form elements -->						 
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Add General Offers page Details</h3>
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
						<input   placeholder="Page Name" value="offers_lang" name="lang['page_name']"  type="hidden">
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">OFFERS FOR</label>
                             <input  name="lang['offers_slide_A1']" placeholder="OFFERS FOR"  class="form-control  required regcom sample" type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">DRIVE MORE, SAVE MORE</label>
                            <input type="text" name="lang['offers_slide_B1']" placeholder="DRIVE MORE, SAVE MORE" class="form-control required regcom" required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">FLAT OF ON DAYS AND LONGER TRIPS</label>
                            <input type="text" name="lang['offers_slide_B2']" placeholder="FLAT OF ON DAYS AND LONGER TRIPS" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">GET</label>
                            <input type="text" name="lang['offers_slide_C1']" placeholder="GET" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                        </div> 
					 	<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">% OFF</label>
                            <input type="text" name="lang['offers_slide_C2']" placeholder="% OFF" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">EXCLUSIVELY FOR </label>
                            <input type="text" name="lang['offers_slide_C3']" placeholder="EXCLUSIVELY FOR " class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> CUSTOMERS</label>
                            <input type="text" name="lang['offers_slide_C4']" placeholder="CUSTOMERS" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">More Details</label>
                            <input type="text" name="lang['offers_slide_C5']" placeholder="More Details" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
				    </div>
			  </div>				   
		   </div>
		   <div class="box">
				 <div class="box-header with-border">
                  <h3 class="box-title">Offers details</h3>
				</div>
				 <div class="box-body">
				   <div class="col-md-12">
					  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Applicable on Monday to Thursday booking. Maximum Discount of Rs</label>
                            <input type="text" name="lang['offers_slide_D1']" placeholder="Applicable on Monday to Thursday booking. Maximum Discount of Rs" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>				   
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Validity</label>
                            <input type="text" name="lang['offers_slide_D2']" placeholder="Validity" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					    
			   			<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Minimum billing is for 4 hours. All bookings between 1 to 3 hours will be billed at 4 hours.</label>
                            <input type="text" name="lang['offers_slide_D4']" placeholder="Minimum billing is for 4 hours. All bookings between 1 to 3 hours will be billed at 4 hours." class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Valid on first booking.</label>
                            <input type="text" name="lang['offers_slide_D7']" placeholder="Valid on first booking." class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">will be charged at time of booking Only valid on bookings made through Zoomcar website and iOS/Android app. Discount applicable only on original reservation charges (not applicable on excess Km, late return fee, or other fees/charges) Applicable only on Indusind Bank Debit and Credit Cards</label>
                            <textarea name="lang['home_slide_D9']" class="form-control required regcom"  required="">						
							</textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">HOW TO AVAIL</label>
                            <input type="text" name="lang['offers_slide_D10']" placeholder="HOW TO AVAIL" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Use Promocode</label>
                            <input type="text" name="lang['offers_slide_D11']" placeholder="Use Promocode" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Book now</label>
                            <input type="text" name="lang['offers_slide_D12']" placeholder="Book now" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">PLEASE NOTE</label>
                            <input type="text" name="lang['offers_slide_D13']" placeholder="PLEASE NOTE" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Discount will not be applicable on any of these days </label>
                            <input type="text" name="lang['offers_slide_D14']" placeholder="Discount will not be applicable on any of these days " class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Terms & Conditions</label>
                            <input type="text" name="lang['offers_slide_D15']" placeholder="Terms & Conditions" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Exclusive offer for</label>
                            <input type="text" name="lang['offers_slide_D16']" placeholder="Exclusive offer for" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
				  </div>
                
            </div>
				 <div class="form-group has-feedback">                                       
                        <input type="button" class="btn btn-primary" value="Submit"  name="Save" id="offersadd1">
                        <button type="reset" class="btn btn-primary">Reset </button>
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


	 
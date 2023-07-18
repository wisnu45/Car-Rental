<?php $id = $this->session->userdata('admin');  ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Renter Translation 
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Rentertranslation/view_renter"> Renter Translation </a></li>
         <li class="active">Edit Renter Translation</li>
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
					if(in_array('renter_lang.php',$lang_directory)):				
						$final_lang = 'renter_lang';
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
	 <form role="form"  method="post" id="renteredit">
		<input type="hidden" name="created_by" value="<?php echo $id; ?>">
		<input type="hidden" name="created_date" value="<?php echo date('Y-m-d  H:i:s'); ?>" >
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
                  <h3 class="box-title">Edit General Renter page Details</h3>
				  <div class="edituser" tabindex='1'></div>
               </div>
               <!-- /.box-header -->
               <!-- form start -->               
			    <div class="box-body">  
                    <div class="col-md-12">
					 <input  name="id"  id="id" class="form-control  required regcom sample" value="<?php echo $textFile; ?>" type="hidden">
					 	<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Language Name</label>
                             <input class="form-control  required regcom sample" placeholder="Language Name" name="lang['language']" value="<?php echo $lang['language'];?>" type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<input class="form-control  required regcom sample"   placeholder="Page Name" value="renter_lang" name="lang['page_name']"  type="hidden">
				<!-------Home page------->
                       
                        <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">PENDING BOOKINGS </label>
                             <input class="form-control  required regcom sample" name="lang['renter_page1_slide_A1']" value="<?php if(!empty($lang['renter_page1_slide_A1'])): echo $lang['renter_page1_slide_A1']; endif;?>" placeholder="PENDING BOOKINGS"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">COMPLETED BOOKINGS</label>
                            <input type="text" name="lang['renter_page1_slide_A2']" placeholder="COMPLETED BOOKINGS" value="<?php if(!empty($lang['renter_page1_slide_A2'])): echo $lang['renter_page1_slide_A2']; endif;?>" class="form-control required regcom" required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">CANCELLED BOOKINGS</label>
                            <input type="text" name="lang['renter_page1_slide_A3']" placeholder="CANCELLED BOOKINGS" value="<?php if(!empty($lang['renter_page1_slide_A3'])): echo $lang['renter_page1_slide_A3']; endif;?>" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Credits Balance</label>
                            <input type="text" name="lang['renter_page1_slide_B1']" placeholder="Credits Balance" value="<?php if(!empty($lang['renter_page1_slide_B1'])): echo $lang['renter_page1_slide_B1']; endif;?>" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Link to PayTM Wallet while </label>
                            <input type="text" name="lang['renter_page1_slide_B2']" value="<?php if(!empty($lang['renter_page1_slide_B2'])): echo $lang['renter_page1_slide_B2']; endif;?>" placeholder="Link to PayTM Wallet while " class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Riding for faster refunds!</label>
                            <input type="text" name="lang['renter_page1_slide_B3']" value="<?php if(!empty($lang['renter_page1_slide_B3'])): echo $lang['renter_page1_slide_B3']; endif;?>" placeholder="Riding for faster refunds!" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">My Bookings</label>
                            <input type="text" name="lang['renter_page1_slide_B4']" value="<?php if(!empty($lang['renter_page1_slide_B4'])): echo $lang['renter_page1_slide_B4']; endif;?>" placeholder="My Bookings" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 




						  
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Account</label>
                            <input type="text" name="lang['renter_page2_slide_A1']" value="<?php if(!empty($lang['renter_page2_slide_A1'])): echo $lang['renter_page2_slide_A1']; endif;?>" placeholder="Account" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Account Details</label>
                            <input type="text" name="lang['renter_page2_slide_A2']" value="<?php if(!empty($lang['renter_page2_slide_A2'])): echo $lang['renter_page2_slide_A2']; endif;?>" placeholder="Account Details" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Mobile</label>
                            <input type="text" name="lang['renter_page2_slide_A3']" value="<?php if(!empty($lang['renter_page2_slide_A3'])): echo $lang['renter_page2_slide_A3']; endif;?>" placeholder="Mobile" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Change Password</label>
                            <input type="text" name="lang['renter_page2_slide_A4']" value="<?php if(!empty($lang['renter_page2_slide_A4'])): echo $lang['renter_page2_slide_A4']; endif;?>" placeholder="Change Password" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Personal Details</label>
                            <input type="text" name="lang['renter_page2_slide_B1']" value="<?php if(!empty($lang['renter_page2_slide_B1'])): echo $lang['renter_page2_slide_B1']; endif;?>" placeholder="Personal Details" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Name</label>
                            <input type="text" name="lang['renter_page2_slide_B2']" value="<?php if(!empty($lang['renter_page2_slide_B2'])): echo $lang['renter_page2_slide_B2']; endif;?>" placeholder="Name" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Date of Birth</label>
                            <input type="text" name="lang['renter_page2_slide_B3']" value="<?php if(!empty($lang['renter_page2_slide_B3'])): echo $lang['renter_page2_slide_B3']; endif;?>" placeholder="Date of Birth" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Gender</label>
                            <input type="text" name="lang['renter_page2_slide_B4']" value="<?php if(!empty($lang['renter_page2_slide_B4'])): echo $lang['renter_page2_slide_B4']; endif;?>" placeholder="Gender" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Location Details</label>
                            <input type="text" name="lang['renter_page2_slide_C1']" value="<?php if(!empty($lang['renter_page2_slide_C1'])): echo $lang['renter_page2_slide_C1']; endif;?>" placeholder="Location Details" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" name="lang['renter_page2_slide_C2']" value="<?php if(!empty($lang['renter_page2_slide_C2'])): echo $lang['renter_page2_slide_C2']; endif;?>" placeholder="Address" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">seater</label>
                            <input type="text" name="lang['renter_page2_slide_C3']" value="<?php if(!empty($lang['renter_page2_slide_C3'])): echo $lang['renter_page2_slide_C3']; endif;?>" placeholder="seater" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">to</label>
                            <input type="text" name="lang['renter_page2_slide_C4']" value="<?php if(!empty($lang['renter_page2_slide_C4'])): echo $lang['renter_page2_slide_C4']; endif;?>" placeholder="to" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">days</label>
                            <input type="text" name="lang['renter_page2_slide_C5']" value="<?php if(!empty($lang['renter_page2_slide_C5'])): echo $lang['renter_page2_slide_C5']; endif;?>" placeholder="days" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">hours</label>
                            <input type="text" name="lang['renter_page2_slide_C6']" value="<?php if(!empty($lang['renter_page2_slide_C6'])): echo $lang['renter_page2_slide_C6']; endif;?>" placeholder="hours" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">email</label>
                            <input type="text" name="lang['renter_page2_slide_C7']" value="<?php if(!empty($lang['renter_page2_slide_C7'])): echo $lang['renter_page2_slide_C7']; endif;?>" placeholder="email" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> driving license</label>
                            <input type="text" name="lang['renter_page2_slide_C8']" value="<?php if(!empty($lang['renter_page2_slide_C8'])): echo $lang['renter_page2_slide_C8']; endif;?>" placeholder=" driving license" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Check</label>
                            <input type="text" name="lang['renter_page2_slide_C9']" value="<?php if(!empty($lang['renter_page2_slide_C9'])): echo $lang['renter_page2_slide_C9']; endif;?>" placeholder="check " class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">My bookings</label>
                            <input type="text" name="lang['renter_page2_slide_C10']" value="<?php if(!empty($lang['renter_page2_slide_C10'])): echo $lang['renter_page2_slide_C10']; endif;?>" placeholder="My bookings" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Update</label>
                            <input type="text" name="lang['renter_page2_slide_C11']" value="<?php if(!empty($lang['renter_page2_slide_C11'])): echo $lang['renter_page2_slide_C11']; endif;?>" placeholder="Update" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> credit balance</label>
                            <input type="text" name="lang['renter_page2_slide_C12']" value="<?php if(!empty($lang['renter_page2_slide_C12'])): echo $lang['renter_page2_slide_C12']; endif;?>" placeholder=" credit balance" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Male</label>
                            <input type="text" name="lang['renter_page2_slide_C13']" value="<?php if(!empty($lang['renter_page2_slide_C13'])): echo $lang['renter_page2_slide_C13']; endif;?>" placeholder="Male" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Female</label>
                            <input type="text" name="lang['renter_page2_slide_C14']" value="<?php if(!empty($lang['renter_page2_slide_C14'])): echo $lang['renter_page2_slide_C14']; endif;?>" placeholder="Female" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  
				 </div>
			</div>

            <!-- /.box -->
         </div>
				   <div class="col-md-12">
					  <div class="form-group has-feedback">                                       
                            <input type="button" class="btn btn-primary" value="Submit"   id="renteredit1">
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
	 
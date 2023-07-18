<?php $id = $this->session->userdata('admin');  ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Login Translation 
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Logintranslation/view_login"> Login Translation </a></li>
         <li class="active">Add Login Translation</li>
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
	<form role="form"  method="post" id="loginadd" data-parsley-validate="" class="validate">
	 <input type="hidden" name="created_by" value="<?php echo $id; ?>">
	 <input type="hidden" name="created_date" value="<?php echo date('Y-m-d  H:i:s'); ?>" >
	  <input  type="hidden" name="lang['home_lang']" value="home_lang"  >
	  <input  type="hidden" name="lang['commute_lang']" value="commute_lang" >
	
	  <input  type="hidden" name="lang['tariff_lang']" value="tariff_lang" >
	  <input  type="hidden" name="lang['deal_lang']" value="deal_lang" >
	  <input  type="hidden" name="lang['offers_lang']" value="offers_lang" >
	  <input  type="hidden" name="lang['chronologypopup_lang']" value="chronologypopup_lang" >
	  <input  type="hidden" name="lang['coupebooking_lang']" value="coupebooking_lang" >
	  <input  type="hidden" name="lang['renter_lang']" value="renter_lang" >
         <div class="col-md-12">
            <!-- general form elements -->						 
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Add General Loginpage Details</h3>
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
						<input class="form-control  required regcom sample"   placeholder="Page Name" value="login_lang" name="lang['page_name']"  type="hidden">
				<!-------Home page------->
                       
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Sign Up</label>
                             <input class="form-control  required regcom sample" name="lang['login_slide_A']" placeholder="Sign Up"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Signin</label>
                            <input type="text" name="lang['login_slide_B']" placeholder="Signin" class="form-control required regcom" required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Forget Password</label>
                            <input type="text" name="lang['login_slide_C']" placeholder="Forget Password" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Sign in with facebook </label>
                            <input type="text" name="lang['login_slide_D']" placeholder="Sign in with facebook " class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Sign in with Google+ </label>
                            <input type="text" name="lang['login_slide_E']" placeholder="Sign in with Google+ " class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="lang['login_slide_F']" placeholder="Email" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="text" name="lang['login_slide_G']" placeholder="Password" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Remember me</label>
                            <input type="text" name="lang['login_slide_J']" placeholder="Remember me" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Submit</label>
                            <input type="text" name="lang['login_slide_K']" placeholder="Submit" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Sign in with facebook</label>
                            <input type="text" name="lang['login_slide_L']" placeholder="Sign in with facebook" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Sign in with Google+</label>
                            <input type="text" name="lang['login_slide_M']" placeholder="Sign in with Google+" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Let's go for a Ride</label>
                            <input type="text" name="lang['login_slide_N']" placeholder="Let's go for a Ride" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Let's go for a Ride Subtitle one</label>
                            <input type="text" name="lang['login_slide_O']" placeholder="Let's go for a Ride Subtitle one" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Let's go for a Ride Subtitle two</label>
                            <input type="text" name="lang['login_slide_P']" placeholder="Let's go for a Ride Subtitle two" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Let's go for a Ride Subtitle Three</label>
                            <input type="text" name="lang['login_slide_Q']" placeholder="Let's go for a Ride Subtitle Three" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">User</label>
                            <input type="text" name="lang['login_slide_User']" placeholder="User" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Logout</label>
                            <input type="text" name="lang['login_slide_Logout']" placeholder="Logout" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 
				    </div>
			  </div>				   
		   </div>
			<div class="box">
				 <div class="box-body">
				   <div class="col-md-12">
					 <div class="form-group has-feedback">                                       
                            <input type="button" class="btn btn-primary" value="Submit"  name="Save" id="loginadd1">
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


	 
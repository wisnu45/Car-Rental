<?php $id = $this->session->userdata('admin');  ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Login Translation 
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Logintranslation/view_login"> Login Translation </a></li>
         <li class="active">Edit Login Translation</li>
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
					if(in_array('login_lang.php',$lang_directory)):				
						$final_lang = 'login_lang';
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
		 <form role="form"  method="post" id="loginedit">
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
                  <h3 class="box-title">Edit General Login page Details</h3>
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
						<input class="form-control  required regcom sample"   placeholder="Page Name" value="login_lang" name="lang['page_name']"  type="hidden">
				<!-------Home page------->
                       
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Sign Up</label>
                             <input class="form-control  required regcom sample" name="lang['login_slide_A']" value="<?php if(!empty($lang['login_slide_A'])): echo $lang['login_slide_A']; endif;?>"  placeholder="Sign Up"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Signin</label>
                            <input type="text" name="lang['login_slide_B']" value="<?php if(!empty($lang['login_slide_B'])): echo $lang['login_slide_B']; endif;?>"  placeholder="Signin" class="form-control required regcom" required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Forget Password</label>
                            <input type="text" name="lang['login_slide_C']"  value="<?php if(!empty($lang['login_slide_C'])): echo $lang['login_slide_C']; endif;?>" placeholder="Forget Password" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Sign in with facebook </label>
                            <input type="text" name="lang['login_slide_D']"  value="<?php if(!empty($lang['login_slide_D'])): echo $lang['login_slide_D']; endif;?>" placeholder="Sign in with facebook " class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Sign in with Google+</label>
                            <input type="text" name="lang['login_slide_E']" value="<?php if(!empty($lang['login_slide_E'])): echo $lang['login_slide_E']; endif;?>" placeholder="Sign in with Google+" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" name="lang['login_slide_F']" value="<?php if(!empty($lang['login_slide_F'])): echo $lang['login_slide_F']; endif;?>" placeholder="Email" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Password</label>
                            <input type="text" name="lang['login_slide_G']" value="<?php if(!empty($lang['login_slide_G'])): echo $lang['login_slide_G']; endif;?>" placeholder="Password" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Remember me</label>
                            <input type="text" name="lang['login_slide_J']" value="<?php if(!empty($lang['login_slide_J'])): echo $lang['login_slide_J']; endif;?>" placeholder="Remember me" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Submit</label>
                            <input type="text" name="lang['login_slide_K']" value="<?php if(!empty($lang['login_slide_K'])): echo $lang['login_slide_K']; endif;?>" placeholder="Submit" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Sign in with facebook</label>
                            <input type="text" name="lang['login_slide_L']" value="<?php if(!empty($lang['login_slide_L'])): echo $lang['login_slide_L']; endif;?>" placeholder="Sign in with facebook" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Sign in with Google+</label>
                            <input type="text" name="lang['login_slide_M']" value="<?php if(!empty($lang['login_slide_M'])): echo $lang['login_slide_M']; endif;?>" placeholder="Sign in with Google+" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 

						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Let's go for a Ride</label>
                            <input type="text" name="lang['login_slide_N']" value="<?php if(!empty($lang['login_slide_N'])): echo $lang['login_slide_N']; endif;?>" placeholder="Let's go for a Ride" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Let's go for a Ride Subtitle one</label>
                            <input type="text" name="lang['login_slide_O']" value="<?php if(!empty($lang['login_slide_O'])): echo $lang['login_slide_O']; endif;?>" placeholder="Let's go for a Ride Subtitle one" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Let's go for a Ride Subtitle two</label>
                            <input type="text" name="lang['login_slide_P']" value="<?php if(!empty($lang['login_slide_P'])): echo $lang['login_slide_P']; endif;?>" placeholder="Let's go for a Ride Subtitle two" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Let's go for a Ride Subtitle Three</label>
                            <input type="text" name="lang['login_slide_Q']"  value="<?php if(!empty($lang['login_slide_Q'])): echo $lang['login_slide_Q']; endif;?>" placeholder="Let's go for a Ride Subtitle Three" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">User</label>
                            <input type="text" name="lang['login_slide_User']" value="<?php if(!empty($lang['login_slide_User'])): echo $lang['login_slide_User']; endif;?>" placeholder="User" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Logout</label>
                            <input type="text" name="lang['login_slide_Logout']" value="<?php if(!empty($lang['login_slide_Logout'])): echo $lang['login_slide_Logout']; endif;?>"placeholder="Logout" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
				  
				 </div>
			</div>
            <!-- /.box -->
         </div>
		 <div class="form-group has-feedback">                                       
                 <input type="button" class="btn btn-primary" value="Submit"   id="loginedit1">
                    <button type="reset" class="btn btn-primary">Reset </button>
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
	 
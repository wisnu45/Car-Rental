<?php $id = $this->session->userdata('admin');  ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Chronology Translation 
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Chronologypopuptranslation/view_chronologypopup"> Chronology Translation </a></li>
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
					if(in_array('chronologypopup_lang.php',$lang_directory)):				
						$final_lang = 'chronologypopup_lang';
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
	 <form role="form"  method="post" id="chronologypopup">
		<input type="hidden" name="created_by" value="<?php echo $id; ?>">
		<input type="hidden" name="created_date" value="<?php echo date('Y-m-d  H:i:s'); ?>" >
			  <input  type="hidden" name="lang['home_lang']" value="home_lang">
	  <input  type="hidden" name="lang['commute_lang']" value="commute_lang">
	  <input  type="hidden" name="lang['login_lang']" value="login_lang">
	  <input  type="hidden" name="lang['tariff_lang']" value="tariff_lang">
	  <input  type="hidden" name="lang['deal_lang']" value="deal_lang">
	  <input  type="hidden" name="lang['offers_lang']" value="offers_lang">
	 
	  <input  type="hidden" name="lang['coupebooking_lang']" value="coupebooking_lang">
	  <input  type="hidden" name="lang['renter_lang']" value="renter_lang">
		 <div class="col-md-12">
            <!-- general form elements -->						 
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit General Chronology page Details</h3>
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
						<input class="form-control  required regcom sample"   placeholder="Page Name" value="chronologypopup_lang" name="lang['page_name']"  type="hidden">
                       
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Select Start Time</label>
                             <input class="form-control  required regcom sample" value="<?php if(!empty($lang['chronologypopup1_slide_A1'])): echo $lang['chronologypopup1_slide_A1']; endif;?>" name="lang['chronologypopup1_slide_A1']" placeholder="Select Start Time"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Select End Time</label>
                            <input type="text" name="lang['chronologypopup1_slide_A2']" value="<?php if(!empty($lang['chronologypopup1_slide_A2'])): echo $lang['chronologypopup1_slide_A2']; endif;?>" placeholder="Select End Time" class="form-control required regcom" required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Select Pickup Type</label>
                            <input type="text" name="lang['chronologypopup1_slide_A3']" value="<?php if(!empty($lang['chronologypopup1_slide_A3'])): echo $lang['chronologypopup1_slide_A3']; endif;?>" placeholder="Select Pickup Type" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">From when do you need a </label>
                            <input type="text" name="lang['chronologypopup1_slide_B1']" value="<?php if(!empty($lang['chronologypopup1_slide_B1'])): echo $lang['chronologypopup1_slide_B1']; endif;?>" placeholder="From when do you need a" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
							 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">To when do you need a  </label>
                            <input type="text" name="lang['chronologypopup1_slide_B2']" value="<?php if(!empty($lang['chronologypopup1_slide_B2'])): echo $lang['chronologypopup1_slide_B2']; endif;?>" placeholder="To when do you need a" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">SELECT MONTH </label>
                            <input type="text" name="lang['chronologypopup1_slide_C1']" value="<?php if(!empty($lang['chronologypopup1_slide_C1'])): echo $lang['chronologypopup1_slide_C1']; endif;?>" placeholder="SELECT MONTH" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">SELECT DATE</label>
                            <input type="text" name="lang['chronologypopup1_slide_C2']" value="<?php if(!empty($lang['chronologypopup1_slide_C2'])): echo $lang['chronologypopup1_slide_C2']; endif;?>" placeholder="SELECT DATE" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">NEXT</label>
                            <input type="text" name="lang['chronologypopup1_slide_C3']" value="<?php if(!empty($lang['chronologypopup1_slide_C3'])): echo $lang['chronologypopup1_slide_C3']; endif;?>" placeholder="NEXT" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Tell us your location in </label>
                            <input type="text" name="lang['chronologypopup3_slide_B1']" value="<?php if(!empty($lang['chronologypopup3_slide_B1'])): echo $lang['chronologypopup3_slide_B1']; endif;?>" placeholder="Tell us your location in" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Type in your Location </label>
                            <input type="text" name="lang['chronologypopup3_slide_C1']" value="<?php if(!empty($lang['chronologypopup3_slide_C1'])): echo $lang['chronologypopup3_slide_C1']; endif;?>" placeholder="Type in your Location" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Locate me</label>
                            <input type="text" name="lang['chronologypopup3_slide_C2']" value="<?php if(!empty($lang['chronologypopup3_slide_C2'])): echo $lang['chronologypopup3_slide_C2']; endif;?>" placeholder="Locate me" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Show map</label>
                            <input type="text" name="lang['chronologypopup3_slide_C3']" value="<?php if(!empty($lang['chronologypopup3_slide_C3'])): echo $lang['chronologypopup3_slide_C3']; endif;?>" placeholder="Show map" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">POPULAR LOCATIONS</label>
                            <input type="text" name="lang['chronologypopup3_slide_C4']" value="<?php if(!empty($lang['chronologypopup3_slide_C4'])): echo $lang['chronologypopup3_slide_C4']; endif;?>" placeholder="POPULAR LOCATIONS" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">NEED CITYRIDE AT AIRPORT</label>
                            <input type="text" name="lang['chronologypopup3_slide_C5']" value="<?php if(!empty($lang['chronologypopup3_slide_C5'])): echo $lang['chronologypopup3_slide_C5']; endif;?>" placeholder="NEED CITYRIDE AT AIRPORT" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Terminal</label>
                            <input type="text" name="lang['chronologypopup3_slide_C6']" value="<?php if(!empty($lang['chronologypopup3_slide_C6'])): echo $lang['chronologypopup3_slide_C6']; endif;?>" placeholder="Terminal" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Done</label>
                            <input type="text" name="lang['chronologypopup3_slide_C7']" value="<?php if(!empty($lang['chronologypopup3_slide_C7'])): echo $lang['chronologypopup3_slide_C7']; endif;?>" placeholder="Done" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Airport</label>
                            <input type="text" name="lang['chronologypopup3_slide_C8']" value="<?php if(!empty($lang['chronologypopup3_slide_C8'])): echo $lang['chronologypopup3_slide_C8']; endif;?>"placeholder="Airport" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
				 </div>
			</div>

            <!-- /.box -->
         </div>
				   <div class="col-md-12">
					  <div class="form-group has-feedback">                                       
                            <input type="button" class="btn btn-primary" value="Submit"   id="chronologyeditpage">
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
	 
<?php $id = $this->session->userdata('admin');  ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Commute Translation 
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Commutetranslation/view_commute"> Commute Translation </a></li>
         <li class="active">Edit Commute Translation</li>
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
					if(in_array('commute_lang.php',$lang_directory)):				
						$final_lang = 'commute_lang';
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
	<form role="form"  method="post" id="commuteedit">
		<input type="hidden" name="created_by" value="<?php echo $id; ?>">
		<input type="hidden" name="created_date" value="<?php echo date('Y-m-d  H:i:s'); ?>" >
			 <input  type="hidden" name="lang['home_lang']" >
	
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
                  <h3 class="box-title">Edit General Commute page Details</h3>
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
						<input class="form-control  required regcom sample"   placeholder="Page Name" value="commute_lang" name="lang['page_name']"  type="hidden">
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">No peak hour cab blues</label>
                             <input  name="lang['commute_slide_A1']"  value="<?php if(!empty($lang['commute_slide_A1'])): echo $lang['commute_slide_A1']; endif;?>" placeholder="No peak hour cab blues"  class="form-control required regcom sample" type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Weather won't ruin your ride</label>
                             <input class="form-control  required regcom sample" name="lang['commute_slide_A2']" value="<?php if(!empty($lang['commute_slide_A2'])): echo $lang['commute_slide_A2']; endif;?>"placeholder="Weather won't ruin your ride"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Car pool to add fun & lower costs </label>
                             <input class="form-control  required regcom sample" name="lang['commute_slide_A3']" value="<?php if(!empty($lang['commute_slide_A3'])): echo $lang['commute_slide_A3']; endif;?>"placeholder="Car pool to add fun & lower costs "   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Do more with weeks </label>
                             <input class="form-control  required regcom sample" name="lang['commute_slide_A4']" value="<?php if(!empty($lang['commute_slide_A4'])): echo $lang['commute_slide_A4']; endif;?>" placeholder="Do more with weeks"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">To</label>
                            <input type="text" name="lang['commute_slide_B']"   value="<?php if(!empty($lang['commute_slide_B'])): echo $lang['commute_slide_B']; endif;?>" placeholder="To" class="form-control required regcom" required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					   
						    <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Seater</label>
								<input type="text" name="lang['commute_slide_D']" value="<?php if(!empty($lang['commute_slide_D'])): echo $lang['commute_slide_D']; endif;?>" placeholder="Seater" class="form-control"  required="" >
								<span class="glyphicon  form-control-feedback"></span>
							  </div> 
							  <div class="form-group has-feedback">
								<label for="exampleInputEmail1">KMS</label>
								<input type="text" name="lang['commute_slide_E']" value="<?php if(!empty($lang['commute_slide_E'])): echo $lang['commute_slide_E']; endif;?>" placeholder="KMS" class="form-control"  required="" >
								<span class="glyphicon  form-control-feedback"></span>
							  </div>
							  <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Book Now</label>
								<input type="text" name="lang['commute_slide_F']" value="<?php if(!empty($lang['commute_slide_F'])): echo $lang['commute_slide_F']; endif;?>" placeholder="Book Now" class="form-control"  required="" >
								<span class="glyphicon  form-control-feedback"></span>
							  </div> 
				 </div>
			</div>
            <!-- /.box -->
           </div>
		    <div class="form-group has-feedback">                                       
                 <input type="button" class="btn btn-primary" value="Submit"   id="commuteedit1">
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
	 
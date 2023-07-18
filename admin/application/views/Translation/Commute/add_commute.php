<?php $id = $this->session->userdata('admin');  ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Commute Translation 
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Commutetranslation/view_commute"> Commute Translation </a></li>
         <li class="active">Add Commute Translation</li>
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
		<form role="form"  method="post" id="commuteadd" data-parsley-validate="" class="validate">
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
					  <h3 class="box-title">Add General Commute page Details</h3>
					  <div class="edituser" tabindex='1'></div>
				   </div>
				   <!-- /.box-header -->
				   <!-- form start -->
					<div class="box-body">                 
						 <div class="col-md-12">
							<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Language Name</label>
								 <input class="form-control  required " placeholder="Language Name" name="lang['language']"  type="text"  required="">
								 <span class="glyphicon  form-control-feedback"></span>
							</div>
							<input  placeholder="Page Name" value="commute_lang" name="lang['page_name']"  type="hidden">
							<div class="form-group has-feedback">
								<label for="exampleInputEmail1">No peak hour cab blues</label>
								 <input class="form-control  required " name="lang['commute_slide_A1']" placeholder="No peak hour cab blues"   type="text"  required="">
								 <span class="glyphicon  form-control-feedback"></span>
							</div>
							 <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Weather won't ruin your ride</label>
								 <input class="form-control  required " name="lang['commute_slide_A2']" placeholder="Weather won't ruin your ride"   type="text"  required="">
								 <span class="glyphicon  form-control-feedback"></span>
							</div>
							 <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Car pool to add fun & lower costs </label>
								 <input class="form-control  required " name="lang['commute_slide_A3']" placeholder="Car pool to add fun & lower costs "   type="text"  required="">
								 <span class="glyphicon  form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Do more with weeks </label>
								 <input class="form-control  required " name="lang['commute_slide_A4']" placeholder="Do more with weeks"   type="text"  required="">
								 <span class="glyphicon  form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<label for="exampleInputEmail1">To</label>
								<input type="text" name="lang['commute_slide_B']" placeholder="To" class="form-control " required="">
								<span class="glyphicon  form-control-feedback"></span>
							  </div>
							 
							  <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Seater</label>
								<input type="text" name="lang['commute_slide_D']" placeholder="Seater" class="form-control"  required="" >
								<span class="glyphicon  form-control-feedback"></span>
							  </div> 
							  <div class="form-group has-feedback">
								<label for="exampleInputEmail1">KMS</label>
								<input type="text" name="lang['commute_slide_E']" placeholder="KMS" class="form-control"  required="" >
								<span class="glyphicon  form-control-feedback"></span>
							  </div> 
							   <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Book Now</label>
								<input type="text" name="lang['commute_slide_F']" placeholder="Book Now" class="form-control"  required="" >
								<span class="glyphicon  form-control-feedback"></span>
							  </div> 
						</div>
					</div>				   
				</div>
			</div>
			<div class="box-body">
				<div class="col-md-12">
					<div class="form-group has-feedback">                                       
						<input type="button" class="btn btn-primary" value="Submit"  name="Save" id="commuteadd1">
						<button type="reset" class="btn btn-primary">Reset </button>
					</div> 
				</div>
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


	 
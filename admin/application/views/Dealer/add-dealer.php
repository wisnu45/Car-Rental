<?php $id = $this->session->userdata('admin'); ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Dealer
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Dealer/view"> Dealer </a></li>
         <li class="active">Add Dealer</li>
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
         <div class="col-md-12">
            <!-- general form elements -->
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Add Dealer</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate"  enctype="multipart/form-data">
				<!-- === hidden field === --->
					<input type="hidden" name="created_by" value="<?php echo $id; ?>">
					<input type="hidden" name="created_on" value="<?php echo date('Y-m-d  H:i:s'); ?>" >					
                  <div class="box-body">                 
                     <div class="col-md-6">
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">First Name</label>
							<input type="text" class="form-control " name="first_name" data-parsley-trigger="change"	data-parsley-minlength="3" data-parsley-pattern="^[a-zA-Z\  \/]+$"  required="" placeholder="First Name">
							<span class="glyphicon  form-control-feedback"></span>
                         </div>						 
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">Last Name</label>
							<input type="text" class="form-control required" name="last_name" placeholder="Last Name" data-parsley-trigger="change"	data-parsley-minlength="3" data-parsley-pattern="^[a-zA-Z\  \/]+$"  required="">
							<span class="glyphicon  form-control-feedback"></span>
					    </div>								   
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">Email</label>
							<input type="email" class="form-control required" data-parsley-trigger="change"	data-parsley-minlength="2"   required="" name="email"  placeholder="Email">
							<span class="glyphicon  form-control-feedback"></span>
                        </div> 						  					    
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">Phone</label>
							<input type="text" class="form-control required" data-parsley-trigger="keyup" data-parsley-type="digits" data-parsley-minlength="10" data-parsley-maxlength="15" data-parsley-pattern="^[0-9]+$" required="" name="phone"  placeholder="Phone">
							<span class="glyphicon  form-control-feedback"></span>
                        </div> 	  
					<div id="test2"> 
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">Address</label>
							<input type="text" class="form-control autocomplete" name="address"  placeholder="Address" data-parsley-trigger="change" required ="">
							<span class="glyphicon  form-control-feedback"></span>
					    </div>	
							<input type="hidden" class="locality" name="city" >
							<input type="hidden" class="field administrative_area_level_1" name="state"  disabled="true" >		
							<input type="hidden" class="field country"   disabled="true"  name="country"  >		
							<input type="hidden" class="field postal_code"  disabled="true" name="zip"  >
						    <input type="hidden" id="lat" name="latitude"  >
					        <input type="hidden" id="lon" name="longitude"  >
					</div>				                     
				</div>
				 <div class="col-md-6">	 
					  <div class="form-group has-feedback">
                          <label for="exampleInputEmail1">Website</label>
                          <input type="website" class="form-control required"  required="" name="website"  placeholder="Website">
                          <span class="glyphicon  form-control-feedback"></span>
					   </div> 
					   <div class="form-group has-feedback">
                          <label for="exampleInputEmail1">Company</label>
                          <input type="text" class="form-control required"  required="" name="company"  placeholder="Company">
                          <span class="glyphicon  form-control-feedback"></span>
					  </div> 
							   
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">About Me</label>
							<textarea  name="about_me" placeholder="About Me" required="" class="form-control required"></textarea>  
							<span class="glyphicon  form-control-feedback"></span>
						</div>							   
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">Comments</label>
							<textarea  name="comments" placeholder="Comments" required="" class="form-control required"></textarea>  
							<span class="glyphicon  form-control-feedback"></span>
						</div>							
						<div class="form-group has-feedback">
							<label>Profile Picture</label>
							<input name="profile_picture" accept="image/*" type="file" required="">
						</div>	
				   </div>
				  </div>
				  <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </form>
            </div>
            <!-- /.box -->
         </div>
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
<body onload="initialize()">
<?php $id = $this->session->userdata('admin'); ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        Add Rentee
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Renter/view">  Rentee </a></li>
         <li class="active">Add Rentee </li>
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
						  <h3 class="box-title">Rentee</h3>
					   </div>
					   <!-- /.box-header -->
					   <!-- form start -->
					<form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
						<input type="hidden" name="created_by" value="<?php echo $id; ?>">
						<input type="hidden" name="created_on" value="<?php echo date('Y-m-d  H:i:s'); ?>" >
						  <div class="box-body">                 
							  <div class="col-md-6">
								  <div class="form-group has-feedback">
										<label for="exampleInputEmail1">Name On Your Driving License</label>
										<input type="text" class="form-control required" data-parsley-trigger="change"	data-parsley-minlength="4" data-parsley-pattern="^[a-zA-Z\  \/]+$"  required="" name="rentee"  placeholder="Name">
										<span class="glyphicon  form-control-feedback"></span>
									</div>
									<div class="form-group has-feedback">
										<label for="exampleInputEmail1">Your Driving License Number</label>
										<input type="text" class="form-control required" required="" name="license_number"  placeholder="License Number">
										<span class="glyphicon  form-control-feedback"></span>
									</div>
									<div class="form-group has-feedback">
										<label for="exampleInputEmail1">Gender</label>
										<select type="text" class="form-control" required="" name="gender">
											<option value="male"> Male </option>
											<option value="female">Female </option>
										</select>
										<span class="glyphicon  form-control-feedback"></span>
									</div>																		   		
									<div class="form-group has-feedback">
										<label for="exampleInputEmail1">Email</label>
										<input type="email" class="form-control required" required="" name="email"  placeholder="Email">
										<span class="glyphicon  form-control-feedback"></span>
									</div>				
									<div class="form-group has-feedback">
										<label for="exampleInputEmail1">Password</label>
										<input type="password" class="form-control required" data-parsley-trigger="change" data-parsley-minlength="6" required="" name="password"  placeholder="Password" data-parsley-pattern="((?=.*\d)(?=.*[A-Z])(?=.*\W).{6,15})">
										<b>I.Password Must Contain Atleast One Digit,One Uppercase Character And One Special Symbol.</b></br>
										<b>II.Password Length Min 6 - Max 15 Characters.</b>
										<span class="glyphicon  form-control-feedback"></span>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group has-feedback">
										<label for="exampleInputEmail1">Date Of Birth</label>
										<input type="text" class="form-control required datepicker1" required="" data-parsley-trigger="change" id="datepicker1" name="dob"  placeholder="Date Of Birth">
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
										 <input type="text" class="form-control autocomplete" data-parsley-trigger="change"  data-parsley-minlength="4" required="" name="address"   placeholder="Address">
										 <span class="glyphicon  form-control-feedback"></span>
									 </div>
										<input type="hidden" class="locality" name="city"  placeholder="City"  required ="">				   							
										<input type="hidden" class="field administrative_area_level_1" name="state" >							
										<input type="hidden" class=" field country"   name="country" >							
										<input type="hidden"  class=" field postal_code"  name="zip"  >			
										<input type="hidden"   id="lat"   name="latitude"  >
										<input type="hidden"  id="lon" name="longitude"  >
								 </div>
									<div class="form-group has-feedback">
										<label for="exampleInputEmail1">About Me </label>
										<textarea  name="aboutme" placeholder="About Me" data-parsley-trigger="change"  data-parsley-minlength="2" required="" class="form-control required"></textarea>  
										<span class="glyphicon  form-control-feedback"></span>
									 </div>   
									<div class="form-group has-feedback">
										<label>Profile Picture</label>
										<input name="profile_picture" accept="image/*" type="file" required="">
									`</div>
								</div>	
							</div><!-- /.box-body -->
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
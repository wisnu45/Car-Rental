<div class="content-wrapper">
	   <!-- Content Header (Page header) -->
	   <section class="content-header">
		  <h1>
			Edit Rentee Details
		  </h1>
		  <ol class="breadcrumb">
			 <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
			 <li><a href="<?php echo base_url(); ?>Renter/view"> Rentee</a></li>
			 <li class="active">Edit Rentee </li>
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
								  <h3 class="box-title">Renter</h3>
							   </div>
							   <!-- /.box-header -->
							   <!-- form start -->
							   <form role="form" action="" method="post"  data-parsley-validate=""  enctype="multipart/form-data">
								  <div class="box-body">
									 <div class="col-md-6">
										<div class="form-group has-feedback">
											<label for="exampleInputEmail1">Name On Your Driving License</label>
											<input type="text" class="form-control required"  
											data-parsley-trigger="change" data-parsley-minlength="4" data-parsley-pattern="^[a-zA-Z\  \/]+$"  required="" value="<?php echo $data->rentee; ?>" name="rentee"  placeholder="Name">
											<span class="glyphicon  form-control-feedback"></span>
										</div>
										<div class="form-group has-feedback">
											<label for="exampleInputEmail1">Your Driving License Number</label>
											<input type="text" class="form-control required" required="" name="license_number"  value="<?php echo $data->license_number; ?>" placeholder="License Number">
											<span class="glyphicon  form-control-feedback"></span>
										</div>
										<div class="form-group has-feedback">
											<label for="exampleInputEmail1">Gender</label>
											<select type="text" class="form-control" required="" name="gender">
												<option value="male" <?php if($data->gender == 'male'){?> Selected ="selected"<?php } ?>> Male </option>
												<option value="female" <?php if($data->gender == 'female'){?> Selected ="selected"<?php } ?>>Female </option>
											</select>
											<span class="glyphicon  form-control-feedback"></span>
										</div>
										<div class="form-group has-feedback">
											<label for="exampleInputEmail1">Date Of Birth</label>
											<input type="text" class="form-control " required="" value="<?php echo $data->dob;?>" name="dob"  id="datepicker1">
											<span class="glyphicon  form-control-feedback"></span>
										</div>		
									<div class="form-group has-feedback">
										<label for="exampleInputEmail1">About Me </label>
										<textarea  name="aboutme" placeholder="About Me" data-parsley-trigger="change"  data-parsley-minlength="2" required="" class="form-control required" ><?php echo $data->aboutme; ?></textarea><span class="glyphicon  form-control-feedback"></span>
									</div> 									 
								</div>
								<div class="col-md-6">
									<div class="form-group has-feedback">
										<label for="exampleInputEmail1">Phone</label>
										<input type="text" class="form-control required" value="<?php echo $data->phone;?>" data-parsley-trigger="keyup" data-parsley-type="digits" data-parsley-minlength="10" data-parsley-maxlength="15" data-parsley-pattern="^[0-9]+$" required="" name="phone"  placeholder="Phone">
										<span class="glyphicon  form-control-feedback"></span>
									</div>	
									 <div id="test2">									
										<div class="form-group has-feedback">
											<label for="exampleInputEmail1">Address</label> 
                                           <input type="text" class="form-control autocomplete " name="address" value="<?php echo $data->address; ?>" placeholder="Address"  required ="">
											<span class="glyphicon  form-control-feedback"></span>
										</div>		
										
											<input type="hidden" class="locality " name="city" value="<?php echo $data->city; ?>" placeholder="City" >							
											<input type="hidden" class="field administrative_area_level_1" name="state" value="<?php echo $data->state; ?>">									
											<input type="hidden" class="field country"  value="<?php echo $data->country; ?>"name="country"  >								   
										    <input type="hidden" class="field postal_code" value="<?php echo $data->zip; ?>" name="zip"  >
											<input type="hidden" id="lat" name="latitude" value="<?php echo $data->latitude; ?>" >
											<input type="hidden" id="lon" name="longitude" value="<?php echo $data->longitude; ?>">						      
									   </div>				
										<div class="form-group has-feedback">
										   <label>Profile Picture</label>
										   <input name="profile_picture" accept="image/*" type="file" ">
										   <img src="<?php echo base_url().$data->profile_picture; ?>" width="100px" height="100px" alt="Picture Not Found"/>
										</div>	
									</div>								 
								</div>
								<!-- /.box-body -->
								<div class="box-footer">
									<button type="submit"  name="acknowledgement1" value="acknowledgement1" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>					
				</div>
			<!-- /.box -->                      
			</div>	
	<!-- /.row -->
	</section>
	<!-- /.content -->
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
				 <div class="col-md-6">
					<!-- general form elements -->
					<div class="box">
					    <div class="box-header with-border">
							<h3 class="box-title">Change Email</h3>
					    </div>
					   <!-- /.box-header -->
					   <!-- form start -->
					   <form role="form" action="" method="post"  data-parsley-validate="" class="validate" >
						  <div class="box-body">
							 <div class="col-md-12">
								<div class="form-group has-feedback">
									<label for="exampleInputEmail1">Email</label>
									<input type="email" class="form-control required" data-parsley-trigger="change"	value="<?php echo $data->email; ?>"data-parsley-minlength="4"   required="" name="email"  placeholder="Email">
									<span class="glyphicon  form-control-feedback"></span>
								</div>															   						  
							   </div>
						   </div>
						  <div class="box-footer">
							<button type="submit" class="btn btn-primary" name="acknowledgement2" value="acknowledgement2">Submit</button>
						  </div>
						  </form>
					 </div>
			<!-- /.box -->           
				</div>
			 <div class="col-md-6">
			<!-- general form elements -->
					<div class="box">
					   <div class="box-header with-border">
						  <h3 class="box-title">Change Password</h3>
					   </div>
					   <!-- /.box-header -->
						<form role="form" action="" method="post"  data-parsley-validate="" class="validate" >
							<div class="box-body">
								<div class="col-md-12">						   		
									<div class="form-group has-feedback">
										<label for="exampleInputEmail1">Password</label>
										<input type="password" class="form-control required" data-parsley-trigger="change" data-parsley-minlength="6" required=""  data-parsley-pattern="((?=.*\d)(?=.*[A-Z])(?=.*\W).{6,15})"name="password"  placeholder="Password">
										<span class="glyphicon  form-control-feedback"></span>
										<b>I.Password Must Contain Atleast One Digit,One Uppercase Character And One Special Symbol.</b></br>
										<b>II.Password Length Min 6 - Max 15 Characters.</b>
									</div>	
								</div>
							</div>
						<!-- /.box-body -->
						<div class="box-footer">
							<button type="submit" class="btn btn-primary" name="acknowledgement3" value="acknowledgement3">Submit</button>
						</div>	
					</form>
				 </div>
			   </div>
			</div>
		<!-- /.row -->
   </section>
</div>
<body onload="initialize()">
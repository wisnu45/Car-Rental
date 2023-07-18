<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Dealer
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Dealer/view"> Dealer </a></li>
         <li class="active">Edit Dealer</li>
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
                  <h3 class="box-title">Edit Dealer</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">		
                  <div class="box-body">                 
                     <div class="col-md-6">
						<div class="form-group has-feedback">
								<label for="exampleInputEmail1">First Name</label>
								<input type="text" class="form-control required" name="first_name" value="<?php echo $data->first_name;?>"data-parsley-trigger="change"	data-parsley-minlength="3" data-parsley-pattern="^[a-zA-Z\  \/]+$"  required="" placeholder="First Name">
								<span class="glyphicon  form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Last Name</label>
								<input type="text" class="form-control required" name="last_name" data-parsley-trigger="change"	data-parsley-minlength="3" data-parsley-pattern="^[a-zA-Z\  \/]+$"  required=""value="<?php echo $data->last_name;?>" placeholder="Last Name" >
								<span class="glyphicon  form-control-feedback"></span>
						</div>		
						<div class="form-group has-feedback">
								 <label for="exampleInputEmail1">Website</label>
								 <input type="website" class="form-control required"  required="" name="website" value="<?php echo $data->website;?>" placeholder="Website">
								 <span class="glyphicon  form-control-feedback"></span>
						 </div> 
						 <div class="form-group has-feedback">
									<label for="exampleInputEmail1">Company</label>
									<input type="text" class="form-control required"  required="" name="company" value="<?php echo $data->company;?>"  placeholder="Company">
									<span class="glyphicon  form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Phone</label>
								<input type="text" class="form-control required" value="<?php echo $data->phone;?>" data-parsley-trigger="keyup" data-parsley-type="digits" data-parsley-minlength="10" data-parsley-maxlength="15" data-parsley-pattern="^[0-9]+$" required="" name="phone"  placeholder="Phone">
								<span class="glyphicon  form-control-feedback"></span>
						</div> 
					 <div id="test2"> 
						<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Address</label>
								<input type="text" class="form-control required autocomplete" name="address" value="<?php echo $data->address;?>"  
								data-parsley-trigger="change"  data-parsley-minlength="2" required="" placeholder="Address">
								<span class="glyphicon  form-control-feedback"></span>
						</div>
							<input type="hidden" class="locality" name="city" value="<?php echo $data->city;?>">
							<input type="hidden" class="field administrative_area_level_1" name="state"  disabled="true" value="<?php echo $data->state;?>" >
							<input type="hidden" class="field country"   disabled="true" value="<?php echo $data->country;?>" name="country"  >
							<input type="hidden" class="field postal_code" disabled="true" value="<?php echo $data->zip;?>" name="zip"  >
							<input type="hidden" id="lat" name="latitude"  value="<?php echo $data->latitude; ?>" >
							<input type="hidden" id="lon" name="longitude" value="<?php echo $data->longitude;?>">
					  </div>	
				   </div>
				   <div class="col-md-6">
						 <div class="form-group has-feedback">
							  <label for="exampleInputEmail1">About Me</label>
							  <textarea  name="about_me" placeholder="About Me" required=""class="form-control required" ><?php echo $data->about_me;?></textarea>  
							  <span class="glyphicon  form-control-feedback"></span>
						 </div>		
						  <div class="form-group has-feedback">
							   <label for="exampleInputEmail1">Comments</label>
								<textarea  name="comments" placeholder="Comments" required="" class="form-control required" ><?php echo $data->comments;?></textarea>  
							   <span class="glyphicon  form-control-feedback"></span>
						 </div>
						  <div class="form-group has-feedback">
							   <label>Profile Picture</label>
							   <input name="profile_picture" accept="image/*" type="file" >
							   <img src="<?php echo base_url().$data->profile_picture; ?>" width="100px" height="100px" alt="Picture Not Found"/>
						 </div>	
					  </div>
				  </div>
				  	<div class="box-footer">
						<button type="submit" name="acknowledgement1" value="acknowledgement1" class="btn btn-primary">Submit</button>
					</div>
               </form>
            </div>
         </div>
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
				 <div class="col-md-12">
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
			</div>
		<!-- /.row -->
   </section>
</div>   
<body onload="initialize()">
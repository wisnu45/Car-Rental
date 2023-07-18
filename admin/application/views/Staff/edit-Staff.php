<?php $usertype = $this->session->userdata('logged_in')['user_type']; 
$role= get_role($usertype);
?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Edit Staff
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Staff/view">  Staff </a></li>
         <li class="active">Edit Staff </li>
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
                  <h3 class="box-title">Edit Staff</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">		
                  <div class="box-body">                 
                     <div class="col-md-12">
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">First Name</label>
							<input type="text" class="form-control required"  required="" name="first_name" value="<?php echo $data->first_name; ?>" placeholder="First Name" data-parsley-minlength="3" data-parsley-pattern="^[a-zA-Z\  \/]+$">
							<span class="glyphicon  form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
							 <label for="exampleInputEmail1">Last Name</label>
							 <input type="text" class="form-control required"  required="" name="last_name" value="<?php echo $data->last_name; ?>"  placeholder="Last Name" data-parsley-minlength="3" data-parsley-pattern="^[a-zA-Z\  \/]+$">
							 <span class="glyphicon  form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
							<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Username</label>
								<input type="text" class="form-control required" data-parsley-trigger="change"	value="<?php echo $data->username; ?>"data-parsley-minlength="4"   required="" name="username"  placeholder="username">
								<span class="glyphicon  form-control-feedback"></span>
							</div>	
						</div>
						<?php 
						if($role->rolename == 'Admin'){?>
						<div class="form-group has-feedback">
							<label>Choose Role</label>
							<select class="form-control" style="width: 100%;" name="user_type" >
							<?php foreach($role_details as $single_role){ ?>
								<option <?php if($usertype == $single_role->id){ ?> disabled="disabled" <?php } ?> value="<?php echo $single_role->id;?>"<?php if ($single_role->id == $data->user_type){ ?>
								selected = "selected" <?php } ?>><?php echo $single_role->rolename;?></option>	
							<?php } ?>
							</select>
						</div>
						<?php }
						else if($role->rolename == 'Manager'){	
						?>
						<div class="form-group has-feedback">
							<label>Choose Role</label>
							<select class="form-control" style="width: 100%;" name="user_type" >
							<?php foreach($role_details as $single_role){ ?>
								<option <?php if(($usertype == $single_role->id) || ($single_role->id == get_role_id('Admin')->id)){ ?> disabled="disabled" <?php }else{ ?> value="<?php echo $single_role->id;?>"<?php } ?><?php if ($single_role->id == $data->user_type){ ?>
								selected = "selected" <?php } ?>><?php echo $single_role->rolename;?></option>	
							<?php } ?>
							</select>
						</div>
						<?php } ?>
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">Profile Picture</label>
							<input name="profile_picture" class="" accept="image/*" type="file" > 
							<img src="<?php echo base_url().$data->profile_picture; ?>" width="100px" height="100px" alt="Picture Not Found"/>
					   </div> 
					<input type="hidden" name="status" value="<?php echo $data->status;?>" >					   
				   </div>
				</div>               
			<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" name="staff_general" value="staff_general" class="btn btn-primary">Update</button>
				</div>
               </form>
            </div>
            <!-- /.box -->
         </div>
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
    <section class="content">
			  <div class="row">
				 <!-- left column -->
				 <div class="col-md-12">
				 			      <div class="box-header with-border">
							<h3 class="box-title">Authentication</h3>
					    </div>
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
							<label for="exampleInputEmail1">Email</label>
							<input type="email" class="form-control required"  required="" name="email" value="<?php echo $data->email; ?>" placeholder="Email">
							<span class="glyphicon  form-control-feedback"></span>					   						  
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
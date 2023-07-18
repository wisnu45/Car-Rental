<?php $usertype = $this->session->userdata('logged_in')['user_type']; 
$role= get_role($usertype);
?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        Add Staff
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Staff/view">Staff</a></li>
         <li class="active"> Add Staff </li>
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
			<!-- form start -->
			<form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
			<!-- general form elements -->
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Authentication</h3>
               </div>
               <!-- /.box-header -->
				<div class="box-body">
					<div class="col-md-12">
						<input type="hidden" name="created_date" value="<?php echo date('Y-m-d H:i:s A'); ?>" >
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">User Name</label>
							<input type="text" class="form-control required"  required="" name="username"  placeholder="User Name">
							<span class="glyphicon  form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">Password</label>
							<input type="password" class="form-control required"  required="" name="password"  placeholder="Password" data-parsley-trigger="change" data-parsley-minlength="6" data-parsley-pattern="((?=.*\d)(?=.*[A-Z])(?=.*\W).{6,15})">
							<b>I.Password Must Contain Atleast One Digit,One Uppercase Character And One Special Symbol.	</b></br>
							<b>II.Password Length Min 6 - Max 15 Characters.</b>
							<span class="glyphicon  form-control-feedback"></span>
						</div>
					</div>					
				</div>            
               <div class="box-header with-border">
                  <h3 class="box-title">General Elements</h3>
               </div>
               <!-- /.box-header -->               
				<input type="hidden" name="created_date" value="<?php echo date('Y-m-d H:i:s A'); ?>" >
				<div class="box-body">
					<div class="col-md-12">
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">First Name</label>
							<input type="text" class="form-control required"  data-parsley-minlength="3" data-parsley-pattern="^[a-zA-Z\  \/]+$" required="" name="first_name"  placeholder="First Name">
							<span class="glyphicon  form-control-feedback"></span>
						</div>
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">Last Name</label>
							<input type="text" class="form-control required"  data-parsley-minlength="3" data-parsley-pattern="^[a-zA-Z\  \/]+$"  required="" name="last_name"  placeholder="Last Name">
							<span class="glyphicon  form-control-feedback"></span>
						</div>						
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">Email</label>
							<input type="text" class="form-control required" required="" name="email"  placeholder="Email">
							<span class="glyphicon  form-control-feedback"></span>
						</div>		
						<?php 
						
						if($role->rolename == 'Admin'){?>
						<div class="form-group has-feedback">
							<label>Choose Role</label>
							<select class="form-control" style="width: 100%;" name="user_type" >
							<?php foreach($role_details as $single_role){ ?>
								<option <?php if($usertype == $single_role->id){ ?> disabled="disabled" <?php }else{ ?> value="<?php echo $single_role->id;?>" <?php } ?>><?php echo $single_role->rolename;?></option>	
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
								<option <?php if(($usertype == $single_role->id) || ($single_role->id == get_role_id('Admin')->id)){ ?> disabled="disabled" <?php }else{ ?> value="<?php echo $single_role->id;?>"<?php } ?>><?php echo $single_role->rolename;?></option>	
							<?php } ?>
							</select>
						</div>
						<?php } ?>
						
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">Profile Picture</label>
							<input name="profile_picture" class="" accept="image/*" type="file" required="" > 
						</div>	
						<input type="hidden" name="status" value="0" >
					</div>
				</div>
				<!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Submit</button>
				</div>	
			</div>
			</form>
		<!-- /.box -->			
		</div>
	</div>
	<!-- /.row -->
   </section>
   <!-- /.content -->
</div>
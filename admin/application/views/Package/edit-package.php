<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Package
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Package/view">Package </a></li>
         <li class="active">Edit Package</li>
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
                  <h3 class="box-title">Edit Package</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">		
                  <div class="box-body">                 
                     <div class="col-md-12">
					      <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Package Name</label>
								<input type="text" class="form-control required"  value="<?php echo $data->package_name; ?>"	 data-parsley-trigger="change"  data-parsley-minlength="2" data-parsley-pattern="^[a-zA-Z\  \/]+$"  required="" name="package_name"  placeholder="Package Name">
								<span class="glyphicon  form-control-feedback"></span>
                          </div> 
						   <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Price</label>
								<input type="text" class="form-control required"  	value="<?php echo $data->price; ?>" data-parsley-trigger="keyup"  data-parsley-minlength="1" data-parsley-pattern="^[0-9/.]+$"  required=""  name="price"  placeholder="Price">
								<span class="glyphicon  form-control-feedback"></span>
                          </div>  
						  <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Period</label>
								<input type="text" class="form-control required" name="period" value="<?php echo $data->period; ?>"data-parsley-trigger="keyup"  data-parsley-minlength="2"  data-parsley-pattern="^[a-z\0-9\/]+$" required="" placeholder="Period">
								<b>Examples:1 day, 10 days, 1 month, 10 months, 1 year, 10 years<b>
                          </div>
                  <!-- /.box-body -->
				   </div>
				   <div class="col-md-6">
				   </div>
				  </div>
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
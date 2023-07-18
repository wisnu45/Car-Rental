<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Duration
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Duration/add">Duration </a></li>
         <li class="active">Edit Duration</li>
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
                  <h3 class="box-title">Edit Duration</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">		
                  <div class="box-body">                 
                     <div class="col-md-12">
					      <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Duration Name</label>
								<input type="text" class="form-control required"  value="<?php echo $data->name; ?>"	 data-parsley-trigger="change"  data-parsley-minlength="2"   required="" name="name"  placeholder="Duration Name">
								<span class="glyphicon  form-control-feedback"></span>
                          </div> 
						   <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Total Duration</label>
								<input type="text" class="form-control required"  	value="<?php echo $data->total_duration; ?>" data-parsley-trigger="keyup"  data-parsley-minlength="1" data-parsley-pattern="^[a-zA-Z\0-9 \/]+$"  required=""  name="total_duration"  placeholder="Total Duration">
								<span class="glyphicon  form-control-feedback"></span>
                          </div>  
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
<?php $id = $this->session->userdata('admin'); ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Commute 
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Commute/view">Commute  </a></li>
         <li class="active">Add Commute </li>
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
                  <h3 class="box-title">Add Commute </h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate=""  >		
				  <input type="hidden" name="created_by" value="<?php echo $id; ?>">
				  <input type="hidden" name="created_on" value="<?php echo date('Y-m-d  H:i:s'); ?>" >
				 <div class="box-body">                 
                     <div class="col-md-12">
					    <div class="form-group has-feedback">
                            <label>Choose Commute</label>
					        <select class="form-control" style="width: 100%;" name="commute_id" required="">
								<option value="" disabled selected>Select your Option</option>
								   <?php
									foreach($commute as $data){	
								   ?>
						<option value="<?php echo $data->id;?>"><?php echo $data->name;?></option>
								   <?php
								  }
								   ?>
                            </select>
                        </div> 
					    <div class="form-group has-feedback">
                            <label>Choose Car</label>
					        <select class="form-control" style="width: 100%;" name="listing_id" required="" >
								<option value="" disabled selected>Select your Option</option>
								   <?php
									foreach($car as $data){	
								   ?>
						<option value="<?php echo $data->id;?>"><?php echo $data->car_name;?></option>
								   <?php
								  }
								   ?>
                            </select>
                        </div>
						   <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Package1 Limit/km</label>
								<input type="text" class="form-control required"   data-parsley-trigger="keyup"  data-parsley-minlength="1" data-parsley-pattern="^[0-9/.]+$" required="" name="limit_start_km"  placeholder="Package1 Limit km">
								<span class="glyphicon  form-control-feedback"></span>
                           </div> 
						    <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Package1 Limit Price</label>
								<input type="text" class="form-control required"  data-parsley-trigger="keyup"  data-parsley-minlength="1" data-parsley-pattern="^[0-9/.]+$" required="" name="limit_start_price" placeholder="Package1 Limit Price">
								<span class="glyphicon  form-control-feedback"></span>
                           </div> 
						    <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Package2 Limit/km</label>
								<input type="text" class="form-control required"  data-parsley-trigger="keyup"  data-parsley-minlength="1" data-parsley-pattern="^[0-9/.]+$" required="" name="limit_end_km" placeholder="Package2 Limit km">
								<span class="glyphicon  form-control-feedback"></span>
                           </div> 
						   <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Package2 Limit Price</label>
								<input type="text" class="form-control required"  data-parsley-trigger="keyup"  data-parsley-minlength="1" data-parsley-pattern="^[0-9/.]+$" required="" name="limit_end_price"  placeholder="Package2 Limit Price">
								<span class="glyphicon  form-control-feedback"></span>
                           </div> 
                  <!-- /.box-body -->
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
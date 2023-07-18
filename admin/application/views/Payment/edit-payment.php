<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Package
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Payment/add">Package </a></li>
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
                            <label>Choose Dealer</label>
					        <select class="form-control" style="width: 100%;" name="dealer_id" >
							 <option value="" disabled selected>Select your Option</option>
								   <?php
									foreach($dealer as $dealer){	
								   ?>
						<option value="<?php echo $dealer->id;?>"<?php if ($dealer->id == $data->dealer_id){ ?>
						selected = "selected" <?php } ?>><?php echo $dealer->first_name;?></option>
								   <?php
								  }
								   ?>
                            </select>
                        </div>
					    <div class="form-group has-feedback">
                            <label>Choose Package</label>
					        <select class="form-control" style="width: 100%;" name="package_id" >
							  <option value="" disabled selected>Select your Option</option>
								   <?php
									foreach($package as $pack){	
								   ?>
						<option value="<?php echo $pack->id;?>"<?php if ($pack->id == $data->package_id){ ?>
						selected = "selected" <?php } ?>><?php echo $pack->package_name;?>&nbsp(Period-<?php echo $pack->period;?>)&nbsp(Price<?php echo $pack->price;?>)</option>
								   <?php
								  }
								   ?>
                            </select>
                        </div> 
					<input type="hidden"  value="<?php echo date('Y-m-d  H:i:s'); ?>" name="payment_date">
					<input type="hidden"  value="completed" name="payment_status" >	  
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
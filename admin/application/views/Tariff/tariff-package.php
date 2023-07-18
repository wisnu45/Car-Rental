<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Tariff 
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Tariff/view"> Tariff  </a></li>
         <li class="active">Add Tariff </li>
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
                  <h3 class="box-title">Add Tariff </h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate=""  >		
				 <div class="box-body">                 
                     <div class="col-md-12">
					    <div class="form-group has-feedback">
                            <label>Choose Tarrif</label>
					        <select class="form-control" style="width: 100%;" name="tariff_id" required="" >
							<option value="" disabled selected>Select your Option</option>
								   <?php
									foreach($tariff as $data){	
								   ?>
						<option value="<?php echo $data->id;?>"><?php echo $data->name;?></option>
								   <?php
								  }
								   ?>
                            </select>
                        </div> 
					    <div class="form-group has-feedback">
                            <label>Choose Car</label>
					        <select class="form-control" style="width: 100%;" name="listing_id" required="">
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
								<label for="exampleInputEmail1">Price_normal</label>
								<input type="text" class="form-control required"  data-parsley-trigger="keyup"  data-parsley-minlength="1" data-parsley-pattern="^[0-9/.]+$"   required="" name="price_normal"  placeholder="Price Normal">
								<span class="glyphicon  form-control-feedback"></span>
                           </div> 
						    <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Price_weekend</label>
								<input type="text" class="form-control required"  data-parsley-trigger="keyup"  data-parsley-minlength="1" data-parsley-pattern="^[0-9/.]+$"   required="" name="price_weekend"  placeholder="Price Weekend">
								<span class="glyphicon  form-control-feedback"></span>
                           </div> 
						    <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Price_peak</label>
								<input type="text" class="form-control required"  data-parsley-trigger="keyup"  data-parsley-minlength="1" data-parsley-pattern="^[0-9/.]+$"   required="" name="price_peak"  placeholder="Price Peak">
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
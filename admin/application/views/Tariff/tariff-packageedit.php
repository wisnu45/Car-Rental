<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Tariff Package
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Tariff/view">Tariff Package </a></li>
         <li class="active">Edit Tariff Package</li>
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
                  <h3 class="box-title">Edit Tariff Package</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate=""  >		
				 <div class="box-body">                 
                     <div class="col-md-12">
					    <div class="form-group has-feedback">
                            <label>Choose Tarrif</label>
					        <select class="form-control" style="width: 100%;" name="tariff_id" >
								   <?php
									foreach($tariff as $data1){	
								   ?>
						<option value="<?php echo $data1->id;?>"<?php if ($data1->id == $data->tariff_id){ ?>
						selected = "selected" <?php } ?>><?php echo $data1->name;?></option>
								   <?php
								  }
								   ?>
                            </select>
                        </div> 
					    <div class="form-group has-feedback">
                            <label>Choose Car</label>
					        <select class="form-control" style="width: 100%;" name="listing_id" >
								   <?php
									foreach($car as $data1){	
								   ?>
						<option value="<?php echo $data1->id;?>"<?php if ($data1->id == $data->listing_id){ ?>
						selected = "selected" <?php } ?>><?php echo $data1->car_name;?></option>
								   <?php
								  }
								   ?>
                            </select>
                        </div>
						   <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Price_normal</label>
								<input type="text" class="form-control required"  data-parsley-trigger="keyup"  data-parsley-minlength="1" data-parsley-pattern="^[0-9/.]+$" required="" name="price_normal" value="<?php echo $data->price_normal;?>" placeholder="Price Normal">
								<span class="glyphicon  form-control-feedback"></span>
                           </div> 
						    <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Price_weekend</label>
								<input type="text" class="form-control required"  data-parsley-trigger="keyup"  data-parsley-minlength="1" data-parsley-pattern="^[0-9/.]+$" required="" name="price_weekend" value="<?php echo $data->price_weekend;?>" placeholder="Price Weekend">
								<span class="glyphicon  form-control-feedback"></span>
                           </div> 
						    <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Price_peak</label>
								<input type="text" class="form-control required"  data-parsley-trigger="keyup"  data-parsley-minlength="1" data-parsley-pattern="^[0-9/.]+$" required="" name="price_peak" value="<?php echo $data->price_peak;?>" placeholder="Price Peak">
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
<?php $id = $this->session->userdata('admin'); ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        Edit Deal
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-language" aria-hidden="true"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Deal/view">Deal </a></li>
         <li class="active">Edit Deal </li>
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
						  <h3 class="box-title">Edit Deal</h3>
					   </div>
					   <!-- /.box-header -->
					   <!-- form start -->
					   <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
							<div class="box-body">
						  <div class="col-md-6">
							 <div class="form-group has-feedback">
								<label>Choose Car</label>
								<select class="form-control" style="width: 100%;" name="listing_id" >
									   <?php
										foreach($car as $car){	
									   ?>
							        <option value="<?php echo $car->id;?>"<?php if ($car->id == $data->listing_id){ ?>
								  selected = "selected" <?php } ?>><?php echo $car->car_name;?>-(<?php echo $car->make;?>-<?php echo $car->model;?>)</option>
									   <?php
									  }
									   ?>
								</select>
							</div>
		
							   <div class="form-group has-feedback ">
									<label for="exampleInputEmail1">From date</label>
									<input type="date" class="form-control required  datetimepicker1" id="from_datetimepicker"  data-parsley-trigger="change" data-parsley-minlength="2"  required="" name="from_date" value="<?php echo $data->from_date.' '.$data->from_time;?>" placeholder="From Date">
									<span class="glyphicon  form-control-feedback"></span>
								</div>																		   		

								 <div class="form-group has-feedback">
									<label for="exampleInputEmail1">Original Price Normal</label>
									<input type="text" class="form-control required"  data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-pattern="^[0-9  \/.]+$" required="" name="original_price_normal"  value="<?php echo $data->original_price_normal;?>"placeholder="Original Price Normal">
									<span class="glyphicon  form-control-feedback"></span>
								 </div> 								
								<div class="form-group has-feedback">
									<label for="exampleInputEmail1">Offer Price Normal</label>
									<input type="text" class="form-control required"  data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-pattern="^[a-zA-Z\0-9  \/%]+$" required="" name="offer_price_normal"  value="<?php echo $data->offer_price_normal;?>" placeholder="Offer Price Normal">
									<span class="glyphicon  form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback">
									<label for="exampleInputEmail1">Free Km Normal</label>
									<input type="text" class="form-control required"  data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-pattern="^[a-zA-Z\0-9\  \/.]+$" required="" name="free_km_normal"  placeholder="Free Km Normal" value="<?php echo $data->free_km_normal;?>">
									<span class="glyphicon  form-control-feedback"></span>
								</div>	
								 <div class="form-group has-feedback">
									<label for="exampleInputEmail1">Percentage</label>
									<input type="text" class="form-control required"  data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-pattern="^[a-zA-Z\0-9  \/%/.]+$" required="" name="percentage"  placeholder="Percentage" value="<?php echo $data->percentage;?>">
									<span class="glyphicon  form-control-feedback"></span>
								 </div> 										
						  <!-- /.box-body -->
							</div>
							<div class="col-md-6">
							   <div class="form-group has-feedback">
								<label>Duration</label>
								<select class="form-control" style="width: 100%;" name="duration_id" >
									   <?php
										foreach($duration as $car){	
									   ?>
							        <option value="<?php echo $car->id;?>"><?php echo $car->name;?>-<?php echo $car->total_duration;?></option>
									   <?php
									  }
									   ?>
								</select>
							    </div>
								 <div class="form-group has-feedback">
									<label for="exampleInputEmail1">To Date</label>
									<input type="time" class="form-control required  to_datetimepicker"   data-parsley-trigger="change" data-parsley-minlength="2"  required="" name="to_date"  value="<?php echo $data->to_date.' '.$data->to_time;?>" placeholder="To Date">
									<span class="glyphicon  form-control-feedback"></span>
								</div> 

 								 <div class="form-group has-feedback">
									<label for="exampleInputEmail1">Original Price Special</label>
									<input type="text" class="form-control required"  data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-pattern="^[0-9  \/]+$" required="" name="original_price_special"  value="<?php echo $data->original_price_special;?>" placeholder="Orginal Price Special">
									<span class="glyphicon  form-control-feedback"></span>
								 </div> 								
								<div class="form-group has-feedback">
									<label for="exampleInputEmail1">Offer Price Special</label>
									<input type="text" class="form-control required"  data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-pattern="^[a-zA-Z\0-9  \/%]+$" required="" name="offer_price_special"  value="<?php echo $data->offer_price_special;?>" placeholder="Offer Price Special">
									<span class="glyphicon  form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback">
									<label for="exampleInputEmail1">Free Km Special</label>
									<input type="text" class="form-control required"  data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-pattern="^[0-9\  \/.]+$" required="" name="free_km_special"  value="<?php echo $data->free_km_special;?>" placeholder="Free Km Special">
									<span class="glyphicon  form-control-feedback"></span>
								</div>	
							 	 <div class="form-group has-feedback">
									<label for="exampleInputEmail1">Original Price Super</label>
									<input type="text" class="form-control required"  data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-pattern="^[0-9  \/]+$" required="" name="original_price_super"  value="<?php echo $data->original_price_super;?>"  placeholder="Original Price Super" >
									<span class="glyphicon  form-control-feedback"></span>
								 </div> 								
								<div class="form-group has-feedback">
									<label for="exampleInputEmail1">Offer Price Super</label>
									<input type="text" class="form-control required"  data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-pattern="^[a-zA-Z\0-9  \/%]+$" required="" name="offer_price_super"  value="<?php echo $data->offer_price_super;?>" placeholder="Offer Price Super">
									<span class="glyphicon  form-control-feedback"></span>
								</div>
								<div class="form-group has-feedback">
									<label for="exampleInputEmail1">Free Km Super</label>
									<input type="text" class="form-control required"  data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-pattern="^[a-zA-Z\0-9\  \/.]+$" required="" name="free_km_super"  value="<?php echo $data->free_km_super;?>" placeholder="Free Km Super">
									<span class="glyphicon  form-control-feedback"></span>
								</div>	
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
   <!-- second form-->
</div>
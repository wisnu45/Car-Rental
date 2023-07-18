<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit City Ride Booking
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Carpayments/view"> Booking Details</a></li>
         <li class="active">Edit Booking</li>
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
                  <h3 class="box-title">Edit Booking</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">		
                  <div class="box-body">                 
                      <div class="col-md-12">
					 <div class="col-md-6">
					 	<div class="form-group has-feedback">
							<label for="exampleInputEmail1">From Date</label>
							<input type="text" class="form-control required  datetimepicker1"  id="from_datetimepicker" value="<?php echo $data->from_full_date ;?>" data-parsley-trigger="keyup"   data-parsley-minlength="1"   required="" name="from_date"  placeholder="From Date">
							<span class="glyphicon  form-control-feedback"></span>
                        </div>
				   		 <div id="todate" class="form-group has-feedback">
								<label for="exampleInputEmail1">To Date</label>
								<input type="text" class="form-control required to_datetimepicker"  value="<?php echo $data->to_full_date;?>" data-parsley-trigger="keyup"   data-parsley-minlength="1"   required="" name="to_date"  placeholder="To Date">
								<span class="glyphicon  form-control-feedback"></span>
                         </div>											 
					    <div class="form-group has-feedback">
                            <label>Choose Renter</label>
					        <select class="form-control" style="width: 100%;" name="renter_id" required="" >
							<option value="" disabled selected>Select your option</option>
								   <?php
										foreach($renter as $renter1){	
								   ?>
								<option value="<?php echo $renter1->id;?>"<?php if ($renter1->id == $data->renter_id){ ?>
								selected = "selected" <?php } ?>><?php echo $renter1->rentee;?></option>
								   <?php
										}
								   ?>
                            </select>
                        </div>
						<div class="form-group has-feedback">
						   <label>Choose Location</label>
					        <select class="form-control" style="width: 100%;" name="location_id" id="location_id" required="">
							<option value="" disabled selected>Select your option</option>
								   <?php
								   if(isset($data->location_id) && !empty($data->location_id)):
									foreach($location as $location1){	
								   ?>
						<option onclick="get_append_car(<?php echo $location1->id;?>)" value="<?php echo $location1->id;?>"<?php if ($location1->id == $data->location_id){ ?>
								selected = "selected" <?php } ?>><?php echo $location1->name;?></option>
								   <?php
								  }
								  endif;
								   ?>
                            </select>
                          </div>						
					</div>
						 <div class="col-md-6">
							 <div class="form-group has-feedback" id="place2">
                           <label>Choose Place</label>
					        <select class="form-control" style="width: 100%;" name="sub_location_id" required="">
							  <option value="" disabled selected>Select your option</option>
								   <?php
									foreach($place as $data1){	
								   ?>
						      <option value="<?php echo $data1->id;?>"<?php if ($data1->id == $data->sub_location_id){ ?>
						      selected = "selected" <?php } ?>><?php echo $data1->short_address ;?></option>
								   <?php
								  }
								   ?>
                            </select>
                          </div>
						 <div id="place" class="form-group has-feedback">
                            <label>Choose Place</label>
					        <select class="form-control get_cat_sub" style="width: 100%;"  name="sub_location_id" >
                            </select>
                         </div>
	
	
	
	
	
	
	
	
					    <div class="form-group has-feedback" id="caredit">
                            <label>Choose Car</label>
					        <select class="form-control" style="width: 100%;" name="listing_id"  >
							 <option value="" disabled selected>Select your option</option>
								   <?php
									foreach($car as $car1){	
								   ?>
					        	<option onClick="get_append_tariff(<?php echo $car1->id;?>)" value="<?php echo $car1->id;?>"<?php if ($car1->id == $data->listing_id){ ?>
								selected = "selected" <?php } ?>><?php echo $car1->car_name;?></option>
								   <?php
								  }
								   ?>
                            </select>
                        </div>						
						<div class="cardiv"></div>
						 <div class="form-group has-feedback" id="tariff2">
                            <label>Choose Tarrif</label>
					        <select class="form-control" style="width: 100%;" name="tariff_id" >
								   <?php
										foreach($tariff as $tariff1){	
								   ?>
								<option value="<?php echo $tariff1->id;?>"<?php if ($tariff1->id == $data->tariff_id){ ?>
								selected = "selected" <?php } ?>><?php echo $tariff1->name;?>&nbsp(Free Km-<?php echo $tariff1->free_km;?>)&nbsp(Price-<?php echo $tariff1->price_normal;?>)</option>
								   <?php
										}
								   ?>
                            </select>
                     </div>
						<div class="tariffdiv" ></div>
						<input type="hidden"  value="<?php echo $data->status;?>" name="status" >
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
</div>
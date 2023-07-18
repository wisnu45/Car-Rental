<?php $id = $this->session->userdata('admin'); ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Car Directory
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Cardirectory/view"> Car Directory </a></li>
         <li class="active">Add Car Directory</li>
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
                  <h3 class="box-title">Add Car Directory</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">		
                  <input type="hidden" name="created_by" value="<?php echo $id; ?>">
				  <input type="hidden" name="created_on" value="<?php echo date('Y-m-d  H:i:s'); ?>" >
				  <div class="box-body">                 
                     <div class="col-md-6">
					    <div class="form-group has-feedback">
                            <label>Choose Dealer</label>
					         <select class="form-control" style="width: 100%;" name="dealer_id" id="dealerid" required="" >
							 <option value="" disabled selected>Select your Option</option>
							   <?php
									foreach($dealer as $dealer){	
								 ?>
								<option value="<?php echo $dealer->id;?>"><?php echo $dealer->first_name;?></option>
								  <?php
								  }
								  ?>
                             </select>
                          </div> 
					      <div id="showroom" class="form-group has-feedback">
								<label>Choose Showroom</label>
								<select class="form-control get_cat_sub" style="width: 100%;" id="" name="showroom_id" >
								</select>
						   </div>
						   <div class="form-group has-feedback">
							   <label for="exampleInputEmail1">Car Name</label>
							   <input type="text" class="form-control required" data-parsley-trigger="change" data-parsley-minlength="3" required="" name="car_name"  placeholder="Car Name">
							   <span class="glyphicon  form-control-feedback"></span>
						    </div> 
							<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Model Year</label>
								<input type="text" class="form-control required"  data-parsley-trigger="change"	data-parsley-minlength="4"  required="" name="model_year"  placeholder="Model Year">
								<span class="glyphicon  form-control-feedback"></span>
							</div> 
							<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Stock</label>
								<input type="text" class="form-control required" data-parsley-trigger="change" data-parsley-pattern="^[0-9]+$" name="stock"  required="" placeholder="Stock">
								<span class="glyphicon  form-control-feedback"></span>
							</div>
							<div class="form-group has-feedback">
								<label for="exampleInputEmail1">VIN</label>
								<input type="text" class="form-control required" name="vin"  placeholder="VIN" data-parsley-trigger="keyup"  data-parsley-minlength="4"  data-parsley-pattern="^[a-zA-Z\0-9 \/]+$" required="">
								<span class="glyphicon  form-control-feedback"></span>
							</div>	
						   <div class="form-group has-feedback">
							  <label>Make</label>
								  <select class="form-control" style="width: 100%;" name="make" required="">
								   <option value="" disabled selected>Select your Option</option>
									<?php
									foreach($make as $data){	
									?>
									<option onclick="get_Carmodelfast(this,<?php echo $data->id;?>)" value="<?php echo $data->id;?>"><?php echo $data->name;?></option>
									<?php
										}
									?>
								  </select>
						   </div>
						   <div class="form-car-make-fast">
						  </div>
							<div class="form-group has-feedback">
							  <label>Category</label>
								<select class="form-control" style="width: 100%;" name="category" required="" >
								 <option value="" disabled selected>Select your Option</option>
								<?php
									foreach($category as $data){	
								?>
									<option value="<?php echo $data->id;?>"><?php echo $data->name;?></option>
								<?php
									  }
								 ?>
								</select>
						   </div>	
							<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Condition</label> 
								  <select class="form-control required" name="condition" required="">
								      <option value="" disabled selected>Select your Option</option>
									   <option value="New">New</option>
									   <option value="Used">Used</option>
								  </select>
							</div>
							<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Torque</label>
								<input type="text" id="Inputcity" class="form-control required" name="torque"  required="" placeholder="Torque">
								<span class="glyphicon  form-control-feedback"></span>
							</div>	
						   <div class="form-group has-feedback">
								<label>Interior Color</label>
								<select class="form-control" style="width: 100%;" name="interior_color" required="">
								 <option value="" disabled selected>Select your Option</option>
									<?php
										foreach($color as $data){				
									?>
									<option value="<?php echo $data->id;?>"><?php echo $data->color_name;?></option>
									<?php
										}
									?>
								</select>
							</div>	
								<div class="form-group has-feedback">
									<label>Exterior Color</label>
										<select class="form-control" style="width: 100%;" name="exterior_color"  required="">
										 <option value="" disabled selected>Select your Option</option>
											<?php
												foreach($color as $data){	
											?>
											<option value="<?php echo $data->id;?>"><?php echo $data->color_name;?></option>
											<?php
												}
											?>
									</select>
								</div>	
								<div class="form-group has-feedback">
									<label for="exampleInputEmail1">	Engine</label>
									<input type="text" id="Inputcity" class="form-control required" name="engine" data-parsley-trigger="keyup" data-parsley-minlength="4" required="" placeholder="Engine" >
									<span class="glyphicon  form-control-feedback"></span>
								</div>	
								<div class="form-group has-feedback">
									<label for="exampleInputEmail1">Drive train</label>
									<input type="text" id="Inputcity" class="form-control required" name="drive_train"  required=""  placeholder="Drive train" >
									<span class="glyphicon  form-control-feedback"></span>
								</div>
					</div>
				   <div class="col-md-6">
				        <div class="form-group has-feedback ">
							<label for="exampleInputEmail1">Doors</label>
							<input type="number" id="Inputcity" class="form-control required" name="doors"  data-parsley-trigger="change" data-parsley-pattern="^[0-9\  \/]+$" placeholder="Doors" required="">
							<span class="glyphicon  form-control-feedback"></span>
					    </div>
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">Transmission</label> 
							<select class="form-control required" name="transmission" required="">
								<option value="" disabled selected>Select your Option</option>
								<option value="Automatic">Automatic</option>
								<option value="Manual">Manual</option>
								<option value="Tiptronic">Tiptronic</option>
							</select>
						 </div>	
						<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Top speed</label>
								<input type="text" class="form-control required" data-parsley-trigger="change"	
								data-parsley-pattern="^[0-9]+$" required="" name="top_speed"  placeholder="Top speed">
								<span class="glyphicon  form-control-feedback"></span>
						</div> 
					      <div class="form-group has-feedback">
                           <label>Fuel Type</label>
					        <select class="form-control" style="width: 100%;" name="fuel_type" required="">
								<option value="" disabled selected>Select your Option</option>
								   <?php
									foreach($fuel as $data){	
								   ?>
								<option value="<?php echo $data->id;?>"><?php echo $data->name;?></option>
								   <?php
								  }
								   ?>
                            </select>
                           </div>	
							<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Odo Meter</label>
								<input type="text"  class="form-control required" name="odometer" data-parsley-trigger="keyup"   data-parsley-minlength="1"  data-parsley-pattern="^[a-zA-Z\0-9 \/]+$"  required="" placeholder="Odo Meter">
								<span class="glyphicon  form-control-feedback"></span>
							</div>							   
							<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Horse Power</label>
								<input type="text" class="form-control required" data-parsley-trigger="keyup"   data-parsley-minlength="2"  required="" name="horse_power"  placeholder="Horse Power">
								<span class="glyphicon  form-control-feedback"></span>
							</div> 
							<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Touring Capacity</label>
								<input type="text" class="form-control required"  required="" name="touring_capacity"  placeholder="Touring Capacity">
								<span class="glyphicon  form-control-feedback"></span>
							</div> 
							<div class="form-group has-feedback">
							   <label>Insurance Type</label>
									<select class="form-control" style="width: 100%;" name="insurance" required="">
									 <option value="" disabled selected>Select your Option</option>
									   <?php
										foreach($insurance as $data7){	
									   ?>
										<option value="<?php echo $data7->id;?>"><?php echo $data7->name;?></option>
									   <?php
										}
									   ?>
								</select>
							</div>	
						   <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Price/km</label>
								<input type="text" class="form-control required" data-parsley-trigger="keyup" data-parsley-minlength="2"  data-parsley-pattern="^[0-9/.]+$"  required="" name="price_km"  placeholder="Price/km">
								<span class="glyphicon  form-control-feedback"></span>
                            </div>
							<div class="form-group">
								<label>Car features</label>
								  <select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="car_features[]"  placeholder="Car features" required="">
									<?php	   
										foreach($features as $feature){
									?>
									<option value="<?php echo $feature->id;?>" ><?php echo $feature->name;?></option>			  
									<?php
										}
									?>
								 </select>
							</div>	
							<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Seats </label>
								<input type="text" class="form-control required"  required="" name="seats" data-parsley-pattern="^[0-9]+$" placeholder="Seats ">
								<span class="glyphicon  form-control-feedback"></span>
                            </div>
							<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Listing title</label>
								<input type="text" class="form-control required"  required="" name="listing_title"  placeholder="Listing title">
								<span class="glyphicon  form-control-feedback"></span>
                            </div>
					    	<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Car Description</label>
								<textarea  name="car_description" placeholder="Car Description" required="" class="form-control required"></textarea>  
								<span class="glyphicon  form-control-feedback"></span>
                            </div>
							<div class="form-group has-feedback">
								<label>Main Image</label>
								<input name="main_image" accept="image/*" type="file" required="">
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
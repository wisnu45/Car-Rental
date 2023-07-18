<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Car Directory
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Cardirectory/view"> Car Directory </a></li>
         <li class="active">Edit Car Directory</li>
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
                  <h3 class="box-title">Edit Car Directory</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">		
                  <div class="box-body">                 
                     <div class="col-md-6">
					    <div class="form-group has-feedback">
                            <label>Choose Dealer</label>
					        <select class="form-control" style="width: 100%;" name="dealer_id" id="dealerid" >
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
					     <div class="form-group has-feedback" id="showroom2">
                            <label>Choose Showroom</label>
					        <select class="form-control" style="width: 100%;" name="showroom_id" >
								   <?php
										foreach($showroom as $showroom){	
								   ?>
								<option value="<?php echo $showroom->id;?>"<?php if ($showroom->id == $data->showroom_id){ ?>
								selected = "selected" <?php } ?>><?php echo $showroom->name;?></option>
								   <?php
									}
								   ?>
                            </select>
                         </div>
						   <div id="showroom" class="form-group has-feedback">
								<label>Choose Showroom</label>
								<select class="form-control get_cat_sub" style="width: 100%;"  name="showroom_id" >
								</select>
						   </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Car Name</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change"	data-parsley-minlength="3" required="" name="car_name" value="<?php echo $data->car_name ?>" placeholder="Car Name">
                            <span class="glyphicon  form-control-feedback"></span>
                        </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Model Year</label>
                            <input type="text" class="form-control required"  data-parsley-trigger="change"	data-parsley-minlength="4"  required="" name="model_year" value="<?php echo $data->model_year; ?>" placeholder="Model Year">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Stock</label>
                            <input type="text" class="form-control required" name="stock"  data-parsley-trigger="change" data-parsley-pattern="^[0-9]+$"  value="<?php echo $data->stock; ?>" required="" placeholder="Stock">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
							<label for="exampleInputEmail1">VIN</label>
							<input type="text" class="form-control required" name="vin" value="<?php echo $data->vin;?>" placeholder="VIN"data-parsley-trigger="keyup"  data-parsley-minlength="4"  data-parsley-pattern="^[a-zA-Z\0-9 \/]+$" required="">
							<span class="glyphicon  form-control-feedback"></span>
					     </div>		
				         <div class="form-group has-feedback">
                            <label>Make</label>
								<select class="form-control" style="width: 100%;" name="make" >
								   <?php
										foreach($make as $data1){	
								   ?>
									<option onclick="get_Carmodelfast(this,<?php echo $data1->id;?>)" value="<?php echo $data1->id;?>"<?php if ($data1->id == $data->make){ ?>
									selected = "selected" <?php } ?>><?php echo $data1->name;?></option>
								   <?php
										}
								   ?>
                            </select>
                         </div>
						 <div class="form-car-make-slow">
					     <div class="form-group has-feedback">
                            <label>Model</label>
					        <select class="form-control" style="width: 100%;" name="model" >
								   <?php
									foreach($model as $data2){	
								   ?>
								<option value="<?php echo $data2->id;?>"<?php if ($data2->id == $data->model){ ?>
								selected = "selected" <?php } ?>><?php echo $data2->name;?></option>
								   <?php
								  }
								   ?>
                            </select>
                         </div></div>
						  <div class="form-car-make-fast">
						  </div>
						 <div class="form-group has-feedback">
                            <label>Category</label>
					        <select class="form-control" style="width: 100%;" name="category" >
								   <?php
									foreach($category as $data3){	
								   ?>
									<option value="<?php echo $data3->id;?>"<?php if ($data3->id == $data->category){ ?>
									selected = "selected" <?php } ?>><?php echo $data3->name;?></option>
								   <?php
										}
								   ?>
                            </select>
						 </div>	 
                         <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Condition</label> 
								<select class="form-control required" name="condition">
								<option <?php if ($data->condition == 'New' ) echo 'selected' ; ?> value="New">New</option>
								<option <?php if ($data->condition == 'Used' ) echo 'selected' ; ?> value="Used">Used</option>
							</select>
						  </div>	
						   <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Torque</label>
								<input type="text" i class="form-control required" name="torque"  required="" placeholder="Torque" value="<?php echo $data->torque; ?>" >
								<span class="glyphicon  form-control-feedback"></span>
						   </div>	
							<div class="form-group has-feedback">
								<label>Interior Color</label>
								<select class="form-control" style="width: 100%;" name="interior_color" >
								   <?php
										foreach($color as $data4){	
								   ?>
									<option value="<?php echo $data4->id;?>"<?php if ($data4->id == $data->interior_color){ ?>
									selected = "selected" <?php } ?>><?php echo $data4->color_name;?></option>
								   <?php
										}
								   ?>
								</select>
							</div>	
							 <div class="form-group has-feedback">
								<label>Exterior Color</label>
									<select class="form-control" style="width: 100%;" name="exterior_color" >
									   <?php
											foreach($color as $data4){	
										 ?>
										<option value="<?php echo $data4->id;?>"<?php if ($data4->id == $data->exterior_color){ ?>
										selected = "selected" <?php } ?>><?php echo $data4->color_name;?></option>
										 <?php
										  }
										 ?>
									</select>
							 </div>	
                           <div class="form-group has-feedback">
								<label for="exampleInputEmail1">	Engine</label>
								<input type="text"  class="form-control required"  data-parsley-trigger="change" data-parsley-minlength="4" value="<?php echo $data->engine; ?>" name="engine" required="" placeholder="Engine" >
								<span class="glyphicon  form-control-feedback"></span>
						   </div>	
                          <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Drive train</label>
								<input type="text" class="form-control required" name="drive_train"   value="<?php echo $data->drive_train; ?>" required=""  placeholder="Drive train" >
								<span class="glyphicon  form-control-feedback"></span>
						   </div>
				   </div>
				   <div class="col-md-6">
				        <div class="form-group has-feedback">
							<label for="exampleInputEmail1">Doors</label>
						    <input type="number"  class="form-control required" name="doors" value="<?php echo $data->doors; ?>" data-parsley-trigger="keyup" data-parsley-type="digits"    data-parsley-minlength="1"  data-parsley-pattern="^[0-9]+$"placeholder="Doors" required="">
						    <span class="glyphicon  form-control-feedback"></span>
						 </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Transmission</label> 
								<select class="form-control required" name="transmission">
									<option <?php if ($data->transmission == 'Automatic' ) echo 'selected' ; ?> value="Automatic">Automatic</option>
									<option <?php if ($data->transmission == 'Manual' ) echo 'selected' ; ?> value="Manual">Manual</option>
									<option <?php if ($data->transmission == 'Tiptronic' ) echo 'selected' ; ?> value="Tiptronic">Tiptronic</option>
								</select>
						 </div>	
				       	 <div class="form-group has-feedback">
							  <label for="exampleInputEmail1">Top speed</label>
							  <input type="text" class="form-control required" data-parsley-trigger="change" value="<?php echo $data->top_speed; ?>" data-parsley-pattern="^[a-zA-Z\0-9 \/]+$" required="" name="top_speed"  placeholder="Top speed">
							  <span class="glyphicon  form-control-feedback"></span>
                          </div> 
					     <div class="form-group has-feedback">
                            <label>Fuel Type</label>
					        <select class="form-control" style="width: 100%;" name="fuel_type" >
								   <?php
										foreach($fuel as $data6){	
								   ?>
								<option value="<?php echo $data6->id;?>"<?php if ($data6->id == $data->fuel_type){ ?>
								selected = "selected" <?php } ?>><?php echo $data6->name;?></option>
								   <?php
										}
								   ?>
                            </select>
						</div>	
						 <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Odo Meter</label>
								<input type="text" class="form-control required" name="odometer" data-parsley-trigger="keyup"   data-parsley-minlength="1"  data-parsley-pattern="^[a-zA-Z\0-9 \/]+$" required="" placeholder="Odo Meter" value="<?php echo $data->odometer; ?>" >
								<span class="glyphicon  form-control-feedback"></span>
						   </div>
                         <div class="form-group has-feedback">
							  <label for="exampleInputEmail1">Horse Power</label>
								<input type="text" class="form-control required" data-parsley-trigger="keyup"   data-parsley-minlength="2"   value="<?php echo $data->horse_power; ?>"required="" name="horse_power"  placeholder="Horse Power">
								<span class="glyphicon  form-control-feedback"></span>
                         </div> 
						  <div class="form-group has-feedback">
                              <label for="exampleInputEmail1">Touring Capacity</label>
                              <input type="text" class="form-control required"  required="" name="touring_capacity"  value="<?php echo $data->touring_capacity; ?>" placeholder="Touring Capacity">
                              <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						<div class="form-group has-feedback">
                            <label>Insurance Type</label>
								<select class="form-control" style="width: 100%;" name="insurance" >
								   <?php
										foreach($insurance as $data7){	
								   ?>
									<option value="<?php echo $data7->id;?>"<?php if ($data7->id == $data->insurance){ ?>
									selected = "selected" <?php } ?>><?php echo $data7->name;?></option>
								   <?php
										}
								   ?>
								</select>
						</div>	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Price/km</label>
                            <input type="text" class="form-control required" data-parsley-trigger="keyup" data-parsley-minlength="2"  data-parsley-pattern="^[0-9/.]+$"  value="<?php echo $data->price_km; ?>"required="" name="price_km"  placeholder="Price/km">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group">
							<label>Car features</label>
							<select class="form-control select2 js-example-basic-multiple"  multiple="multiple" style="width: 100%;" name="car_features[]"  required="">
							   <?php	   
							        $arry_select = explode(",", $data->car_features);
									foreach($features as $feature){
								?>
							<option value="<?php echo $feature->id;?>"<?php if (in_array($feature->id, $arry_select))
					      echo 'selected';  ?> ><?php echo $feature->name;?></option>			  
								 <?php
									  }
								  ?>
							</select>
						 </div>	
						<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Seats </label>
								<input type="text" class="form-control required"  required="" data-parsley-pattern="^[0-9]+$" name="seats" value="<?php echo $data->seats;?>" placeholder="Seats">
								<span class="glyphicon  form-control-feedback"></span>
                            </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Listing title</label>
                            <input type="text" class="form-control required"  required="" name="listing_title" value="<?php echo $data->listing_title; ?>" placeholder="Listing title">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Car Description</label>
                      	    <textarea  name="car_description" placeholder="Car Description" required="" class="form-control required"><?php echo $data->car_description; ?></textarea>  
                            <span class="glyphicon  form-control-feedback"></span>
                         </div>
						 <div class="form-group has-feedback">
						   <label>Main Image</label>
						   <input name="main_image" accept="image/*" type="file" >
						   <img src="<?php echo base_url().$data->main_image; ?>" width="100px" height="100px" alt="Picture Not Found"/>
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
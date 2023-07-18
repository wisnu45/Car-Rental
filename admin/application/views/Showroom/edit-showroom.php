<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Showroom
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Showroom/view"> Showroom </a></li>
         <li class="active">Edit Showroom</li>
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
                  <h3 class="box-title">Edit Showroom</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">		
                  <div class="box-body">                 
                     <div class="col-md-6">
					 	 <div class="form-group has-feedback">
                           <label>Choose Dealer</label>
					        <select class="form-control" style="width: 100%;" name="dealer_id" >
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
							<label for="exampleInputEmail1">Showroom Name</label>
							<input type="text" class="form-control required" data-parsley-trigger="change" value="<?php echo $data->name;?>"	 data-parsley-minlength="2"   required="" name="name"  placeholder="Showroom Name">
							<span class="glyphicon  form-control-feedback"></span>
                        </div> 
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">Email</label>
							<input type="email" class="form-control required"  data-parsley-trigger="change"	  data-parsley-minlength="2"  required="" value="<?php echo $data->email;?>" name="email"  placeholder="Email">
							<span class="glyphicon  form-control-feedback"></span>
                        </div> 	  
					 <div id="test2"> 
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">Address</label>
							<input type="text" class="form-control required autocomplete" name="address" value="<?php echo $data->address;?>"	data-parsley-trigger="change"   required="" placeholder="Address">
							<span class="glyphicon  form-control-feedback"></span>
						 </div>
							<input type="hidden" class="form-control required locality " name="city"  value="<?php echo $data->city ?>" r>
							<input type="hidden" class="form-control required field administrative_area_level_1" name="state"  disabled="true"  value="<?php echo $data->state; ?>">
							<input type="hidden" class="form-control required field country"  disabled="true" name="country"   value="<?php echo $data->country; ?>">
							<input type="hidden" class="form-control required field postal_code" disabled="true" name="zip"   value="<?php echo $data->zip; ?>">
							<input type="hidden" class="form-control required "  id="lat"   name="latitude" value="<?php echo $data->latitude; ?>" >
							<input type="hidden" class="form-control required " id="lon" name="longitude"  value="<?php echo $data->longitude; ?>">	
					 </div>
				 	     <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Phone</label>
								<input type="text" id="Inputcity" data-parsley-trigger="keyup" data-parsley-type="digits" data-parsley-minlength="10" data-parsley-maxlength="15" data-parsley-pattern="^[0-9]+$" required="" class="form-control required" name="phone" value="<?php echo $data->phone;?>"	 placeholder="Phone">
								<span class="glyphicon  form-control-feedback"></span>
						  </div>
                  <!-- /.box-body -->
				   </div>
				   <div class="col-md-6">
					 	 <div class="form-group has-feedback">
                           <label>Choose Location</label>
					        <select class="form-control" style="width: 100%;" id="location_id" name="location_id" >
								   <?php
									foreach($location as $data1){	
								   ?>
						<option value="<?php echo $data1->id;?>"<?php if ($data1->id == $data->location_id){ ?>
						selected = "selected" <?php } ?>><?php echo $data1->name;?></option>
								   <?php
								  }
								   ?>
                            </select>
                          </div>
						 <div class="form-group has-feedback" id="place2">
                           <label>Choose Place</label>
					        <select class="form-control" style="width: 100%;" name="sub_location_id" >
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
						
						   <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Tax</label>
								<input type="text" class="form-control required" name="tax"  value="<?php echo $data->tax;?>" required=""  placeholder="Tax">
								<span class="glyphicon  form-control-feedback"></span>
						   </div>		   
				       	   <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Website</label>
								<input type="text" class="form-control required" value="<?php echo $data->website;?>"	required="" name="website" required=""  placeholder="Website">
								<span class="glyphicon  form-control-feedback"></span>
                           </div> 
						   <div class="form-group has-feedback">
								<label>Company Logo</label>
								<input name="logo" accept="image/*" type="file" >
								<img src="<?php echo base_url().$data->logo; ?>" width="100px" height="100px" alt="Picture Not Found"/>
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
  <body onload="initialize()">
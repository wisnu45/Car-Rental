<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        Edit Popular Location
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Location/add"> Popular Location</a></li>
         <li class="active">Edit Popular Location </li>
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
                  <h3 class="box-title">Edit Popular location</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
                  <div class="box-body">
                     <div class="col-md-12">
					    <div class="form-group has-feedback">
                            <label>Choose Location</label>
					        <select class="form-control" style="width: 100%;" name="location_id" required="" >
							<option value="" disabled selected>Select your Location</option>
						   <?php
									foreach($location as $city1){	
								 ?>
								<option value="<?php echo $city1->id;?>"<?php if ($city1->id == $data1->location_id){ ?>
								selected = "selected" <?php } ?>><?php echo $city1->name;?></option>
								  <?php
								  }
								  ?>
                            </select>
                        </div>
						<div id="test2"> 
							<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Popular Location</label>
								<input type="text" class="form-control autocomplete"  name="address" placeholder="Popular Location" data-parsley-trigger="change" required ="" value="<?php echo $data1->address;?>">
								<span class="glyphicon  form-control-feedback"></span>
							</div>	
								<input type="hidden" class="locality" name="city"   value="<?php echo $data1->city;?>">
								
								<input type="hidden"  disabled="true">
								<input type="hidden"  class="field postal_code"  disabled="true" name="zip"  value="<?php echo $data1->zip;?>" placeholder="Zip">
								<input type="hidden"  id="lat"  name="latitude" value="<?php echo $data1->latitude;?>" >
								<input type="hidden"  id="lon" name="longitude"  value="<?php echo $data1->longitude;?>" >
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
<body onload="initialize()">
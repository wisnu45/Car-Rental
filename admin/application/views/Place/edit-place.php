<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        Edit Location
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Place/add"> Location</a></li>
         <li class="active">EditLocation </li>
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
                  <h3 class="box-title">  Location Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
                  <div class="box-body">                 
                     <div class="col-md-12">
					      <div id="test2">
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Locations</label>
                            <input type="text" class="form-control required autocomplete"   required="" value="<?php echo $data->name; ?>" name="address"  placeholder="Locations">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <input type="hidden" class="form-control required locality" name="city" value="<?php if(isset($data->city) && !empty($data->city)): echo $data->city; endif; ?>" placeholder="City"  required ="">
								<input type="hidden" class="form-control required " name="state" value="<?php if(isset($data->state) && !empty($data->state)): echo $data->state; endif;?>" disabled="true" required="" placeholder="State">		
								<input type="hidden" class="form-control required "  data-parsley-trigger="change" disabled="true" required=""   placeholder="Country">					
								<input type="hidden"  class="form-control  field postal_code" value="<?php if(isset($data->zip) && !empty($data->zip)): echo $data->zip; endif; ?>" disabled="true" name="zip"  placeholder="Zip">
								<input type="hidden"  name="latitude" class="form-control required " value="<?php if(isset($data->latitude) && !empty($data->latitude)): echo $data->latitude; endif; ?>" id="lat"    >
								<input type="hidden"  name="longitude" class="form-control required " value="<?php if(isset($data->longitude) && !empty($data->longitude)): echo $data->longitude; endif;?>" id="lon"   >
						</div> 
						    <div class="form-group has-feedback">
								<label> Image</label>
								<input name="picture" accept="image/*" type="file" >
								<img src="<?php echo base_url().$data->picture; ?>" width="100px" height="100px" alt="Picture Not Found"/>
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
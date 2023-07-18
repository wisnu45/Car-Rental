<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit  Offers Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-language" aria-hidden="true"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Discount/view"> Offers </a></li>
         <li class="active">Edit  Offers</li>
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
                  <h3 class="box-title">Edit  Offers Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
                  <div class="box-body">                 
                     <div class="col-md-12">
					 	<div class="form-group has-feedback">
								<label>Choose Car Category</label>
								<select class="form-control" style="width: 100%;" name="category_id" >
								   <?php
										foreach($category as $category){	
								   ?>
									<option value="<?php echo $category->id;?>"<?php if ($category->id == $data->category_id){ ?>
								selected = "selected" <?php } ?>><?php echo $category->name;?></option>
								   <?php
										}
								   ?>
								</select>
						 </div>
						 <div class="form-group has-feedback">
								<label>Choose Location</label>
								<select class="form-control" style="width: 100%;" name="location_id" >
								   <?php
										foreach($location as $location){	
								   ?>
									<option value="<?php echo $location->id;?>"<?php if ($location->id == $data->location_id){ ?>
								selected = "selected" <?php } ?>><?php echo $location->name;?></option>
								   <?php
										}
								   ?>
								</select>
						 </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Coupon Name</label>
                            <input type="text" class="form-control required" value="<?php echo $data->coupon_for; ?>" data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-pattern="^[a-zA-Z\0-9  \/]+$" required="" name="coupon_for"  placeholder="Coupon Name">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
					   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Coupon Code</label>
                            <input type="text" class="form-control required" value="<?php echo $data->coupon_code; ?>" required="" name="coupon_code"  placeholder="Coupon Code">
                            <span class="glyphicon  form-control-feedback"></span>
                        </div> 
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Percentage</label>
                            <input type="text" class="form-control required" value="<?php echo $data->percentage;?>" data-parsley-trigger="change" data-parsley-minlength="2" data-parsley-pattern="^[a-zA-Z\0-9  \/]+$" required="" name="percentage"  placeholder="Percentage">
                            <span class="glyphicon  form-control-feedback"></span>
                        </div> 
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Expiry Date</label>
                            <input type="date" class="form-control required datetimepicker1"  value="<?php echo $data->expiry_date; ?>" data-parsley-trigger="change" data-parsley-minlength="2"  required="" name="expiry_date"  placeholder="Expiry Date">
                            <span class="glyphicon  form-control-feedback"></span>
                        </div> 
						 <div class="form-group has-feedback">
							 <label>Image</label>
							 <input name="image" accept="image/*" type="file" >
							<img src="<?php echo base_url().$data->image; ?>" width="100px" height="100px" alt="Picture Not Found"/>
						 </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                       </div>
				     </div>
				  </div>
			   </div>	  
			</div>
               </form>
            </div>
            <!-- /.box -->
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
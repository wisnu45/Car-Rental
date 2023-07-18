<div class="row">
    <div class="col-md-6">
        <div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">View Car Directory Details</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
					<i class="fa fa-minus"></i>
					</button>
				</div>
			</div>
            <div class="box-body">
                 <dl>
				  	  <dt>Dealer Name</dt>
                      <dd><?php echo $data['cardetailsfirst']->first_name; ?></dd> 
				  	  <dt>Car Name</dt>
                      <dd><?php echo $data['car_listing']->car_name; ?></dd> 
					  <dt>Showroom Name</dt>
                      <dd><?php echo $data['cardetailsfirst']->name; ?></dd>  
					  <dt>Model Year</dt>
                      <dd><?php echo $data['car_listing']->model_year; ?></dd>  
					  <dt>Stock</dt>
                      <dd><?php echo $data['car_listing']->stock; ?></dd> 
					  <dt>VIN</dt>
                      <dd><?php echo $data['car_listing']->vin; ?></dd> 
					  <dt>Make</dt>
                      <dd><?php echo $data['cardetailsfirst']->make_name; ?></dd> 
 	                  <dt>Model</dt>
                      <dd><?php echo $data['cardetailsfirst']->model_name; ?></dd> 
					  <dt>Category</dt>
                      <dd><?php echo $data['cardetailsfirst']->category_name; ?></dd> 
					  <dt>Condition</dt>
                      <dd><?php echo $data['car_listing']->condition; ?></dd>
					  <dt>Odometer</dt>
                      <dd><?php echo $data['car_listing']->odometer; ?></dd> 
					  <dt>Torque</dt>
                      <dd><?php echo $data['car_listing']->torque; ?></dd> 
					  <dt>Interior Color</dt>
                      <dd><?php echo $data['cardetailssecond']->interior_color; ?></dd> 
                      <dt>Exterior Color</dt>
                      <dd><?php echo $data['cardetailssecond']->exterior_color; ?></dd> 
					  <dt>Engine</dt>
                      <dd><?php echo $data['car_listing']->engine; ?></dd> 
					  <dt>Drive Train</dt>
                      <dd><?php echo $data['car_listing']->drive_train; ?></dd> 
					  <dt>Doors</dt>
					  <dd><?php echo $data['car_listing']->doors; ?></dd> 
					  <dt>Transmission</dt>
                      <dd><?php echo $data['car_listing']->transmission; ?></dd> 

                 
				 </dl>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
     </div><!-- ./col -->
      <div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				 <h3 class="box-title">View Car Directory Details</h3>
				  <div class="box-tools pull-right">
					<button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
					<i class="fa fa-minus"></i>
					</button>
				  </div>
			</div>
			<div class="box-body">
                  <dl>	
					<dt>Status</dt>
					  <?php if($data['car_listing']->status == '1')
						{
						echo "Active";
						}
						else
						{ 
						echo "Inactive"; 
						}
					  ?>
                     <dd><?php //echo $data->status; ?></dd> 	  
					 <dt>Top speed</dt>
                     <dd><?php echo $data['car_listing']->top_speed; ?></dd> 
					 <dt>Fuel Type</dt>
                     <dd><?php echo $data['cardetailssecond']->fuel; ?></dd> 
					 <dt>Horse Power</dt>
                     <dd><?php echo $data['car_listing']->horse_power; ?></dd>  
					 <dt>Touring Capcity</dt>
                     <dd><?php echo $data['car_listing']->touring_capacity; ?></dd> 
					 <dt>Price/km</dt>
                     <dd><?php echo $data['car_listing']->price_km; ?></dd> 
					 <dt>Insurance</dt>
                     <dd><?php echo $data['cardetailssecond']->insurance; ?></dd> 
					 <dt>Car Features</dt>
                     <dd><?php echo $data['cardetailssecond']->feature; ?></dd> 
					 <dt>Seats</dt>
                     <dd><?php echo $data['car_listing']->seats; ?></dd> 
					 <dt>Listing</dt>
                     <dd><?php echo $data['car_listing']->listing_title; ?></dd> 
					 <dt>Car Description</dt>
                     <dd><?php echo $data['car_listing']->car_description; ?></dd> 
					 <dt>From Date</dt>
                     <dd><?php echo $data['car_listing']->from_date; ?></dd> 
					 <dt>To Date</dt>
                     <dd><?php echo $data['car_listing']->to_date; ?></dd> 
					  <dt>Created On</dt>
                     <dd><?php echo $data['car_listing']->created_on; ?></dd> 
					  <dt>Created By</dt>
                     <dd><?php echo $data['cardetailssecond']->rolename; ?></dd> 
					  <dt>Main Image</dt>
                      <dd><img src="<?php echo base_url().$data['car_listing']->main_image; ?>" width="100px" height="100px"/></dd> 
				 </dl>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- ./col -->
</div>  	 
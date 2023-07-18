<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
			 <h3 class="box-title">View Showroom Details</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
					<i class="fa fa-minus"></i>
					</button>
				</div>
		    </div>
             <div class="box-body">
                  <dl>
					 <dt>Dealership Name</dt>
                      <dd><?php echo $data->first_name; ?></dd>  
					  <dt>Showroom Name</dt>
                      <dd><?php echo $data->name; ?></dd>
					  <dt>Email</dt>
                      <dd><?php echo $data->email; ?></dd>   
					  <dt>Address</dt>
                      <dd><?php echo $data->address; ?></dd>  
					  <dt>Short Address</dt>
                      <dd><?php echo $data->short_address; ?></dd> 
					  <dt>City</dt>
                      <dd><?php echo $data->city; ?></dd> 
					  <dt>State</dt>
                      <dd><?php echo $data->state; ?></dd> 
 	                  <dt>Country</dt>
                      <dd><?php echo $data->country; ?></dd> 
					  <dt>Zip</dt>
                      <dd><?php echo $data->zip; ?></dd> 
					  <dt>Phone</dt>
                      <dd><?php echo $data->phone; ?></dd>					  				
                  </dl>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
      </div><!-- ./col -->
      <div class="col-md-6">
			<div class="box box-primary">
               <div class="box-header with-border">
				<h3 class="box-title">View Showroom Details</h3>
					<div class="box-tools pull-right">
						<button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
						<i class="fa fa-minus"></i>
						</button>
					</div>
				</div>
                <div class="box-body">
                  <dl>	
					  <dt>Location</dt>
                      <dd><?php echo $data->locationname; ?></dd> 
					  <dt>Place</dt>
                      <dd><?php echo $data->address; ?></dd> 
					  <dt>Tax</dt>
                      <dd><?php echo $data->tax; ?></dd> 
					  <dt>Website</dt>
                      <dd><?php echo $data->website; ?></dd> 
					  <dt>Logo</dt>
                      <dd> <img src="<?php echo base_url().$data->logo; ?>" width="100px" height="100px"/></dd> 
                  </dl>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
	</div><!-- ./col -->
</div>  	 
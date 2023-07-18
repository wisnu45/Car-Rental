<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">View Dealer Details</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
					<i class="fa fa-minus"></i>
					</button>
				</div>
			</div>
             <div class="box-body">
                  <dl>
					 <dt>First Name</dt>
                      <dd><?php echo $data->first_name; ?></dd>  
					  <dt>Last Name</dt>
                      <dd><?php echo $data->last_name; ?></dd>  
					  <dt>Email</dt>
                      <dd><?php echo $data->email; ?></dd> 
					  <dt>Website</dt>
                      <dd><?php echo $data->website; ?></dd> 
					  <dt>Company</dt>
                      <dd><?php echo $data->company; ?></dd> 
 	                  <dt>Address</dt>
                      <dd><?php echo $data->address; ?></dd> 
					  <dt>Short Address</dt>
                      <dd><?php echo $data->short_address; ?></dd> 
					  <dt>Phone</dt>
                      <dd><?php echo $data->phone; ?></dd> 
					  <dt>City</dt>
                      <dd><?php echo $data->city; ?></dd> 
					  <dt>State</dt>
                      <dd><?php echo $data->state; ?></dd>
					  <dt>Country</dt>
                      <dd><?php echo $data->country; ?></dd> 
					  <dt>Zip</dt>
                      <dd><?php echo $data->zip; ?></dd> 
					  <dt>About Me</dt>
                      <dd><?php echo $data->about_me; ?></dd> 
                  </dl>
              </div><!-- /.box-body -->
          </div><!-- /.box -->
     </div><!-- ./col -->
      <div class="col-md-6">
		<div class="box box-primary">
           <div class="box-header with-border">
				<h3 class="box-title">View Dealership Details</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
					<i class="fa fa-minus"></i>
				</button>
				</div>
		   </div>
                <div class="box-body">
                  <dl>	
					  <dt>Comments</dt>
                      <dd><?php echo $data->comments; ?></dd> 
					  <dt>Status</dt>
					  <?php if($data->status == '1')
						{
						echo "Active";
						}else
						{ 
						echo "Inactive"; 
						}
						?>  
					   <dt>Created By</dt>
                      <dd><?php echo $data->rolename; ?></dd> 
					   <dt>Created On</dt>
                      <dd><?php echo $data->created_on; ?></dd> 
					   <dt>Profile Image</dt>
                      <dd> <img src="<?php echo base_url().$data->profile_picture; ?>" width="100px" height="100px"/></dd> 
                  </dl>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
	</div><!-- ./col -->
</div>  
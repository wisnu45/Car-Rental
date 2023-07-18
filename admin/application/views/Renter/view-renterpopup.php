<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">View Rentee Details</h3>
				 <div class="box-tools pull-right">
					<button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
					<i class="fa fa-minus"></i>
					</button>
				 </div>
			</div>
            <div class="box-body">
				<dl>
					<dt>Rentee</dt>
					<dd><?php echo $data->rentee; ?></dd>
					<dt>License Number</dt>
					<dd><?php echo $data->license_number; ?></dd>
					<dt>Gender</dt>
					<dd><?php echo $data->gender; ?></dd>  
					<dt>Date Of Birth</dt>
					<dd><?php echo $data->dob; ?></dd>  
					<dt>Email</dt>
					<dd><?php echo $data->email; ?></dd>                       
					<dt>Address</dt>
					<dd><?php echo $data->address; ?></dd> 
					<dt>Short Address</dt>
					<dd><?php echo $data->short_address; ?></dd> 
					<dt>Profile Picture</dt>
					<dd><img src="<?php echo base_url().$data->profile_picture; ?>" width="100px" height="100px"/></dd>				  
                 </dl>
			</div><!-- /.box-body -->    
		</div><!-- /.box -->
	</div><!-- ./col -->            
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">View Rentee Details</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
					<i class="fa fa-minus"></i>
					</button>
				</div>
			</div>
			<div class="box-body">
				<dl>	                  
				<dt>Status</dt>
				<?php if($data->status == '1')
						{
							echo "Active";
						}else{ 
							echo "Inactive"; 
						} 
				?>					                   				  
				<dt>City</dt>
                <dd><?php echo $data->city; ?></dd> 
                <dt>State</dt>
                <dd><?php echo $data->state; ?></dd> 
				<dt>Country</dt>
                <dd><?php echo $data->country; ?></dd> 
				<dt>Zip</dt>
                <dd><?php echo $data->zip; ?></dd> 
				<dt>Created On</dt>
                <dd><?php echo $data->created_on; ?></dd> 
				<dt>Created by</dt>
                <dd><?php echo $data->rolename; ?></dd> 				
				<dt>About me</dt>
				<dd><?php echo $data->aboutme; ?></dd> 	
			   </dl>
			</div><!-- /.box-body -->
		</div><!-- /.box -->
	</div><!-- ./col -->
</div>  	 
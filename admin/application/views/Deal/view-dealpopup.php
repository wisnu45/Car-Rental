<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
			 <h3 class="box-title">View Deal Details</h3>
				<div class="box-tools pull-right">
					<button class="btn btn-info btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
					<i class="fa fa-minus"></i>
					</button>
				</div>
		    </div>
             <div class="box-body">
                  <dl>
					 <dt>Car Name</dt>
                      <dd><?php echo $data->car_name; ?></dd>  
					  <dt>From Date</dt>
                      <dd><?php echo $data->from_date; ?></dd>   
					  <dt>From Time</dt>
                      <dd><?php echo $data->from_time; ?></dd>  
					  <dt>To Date</dt>
                      <dd><?php echo $data->to_date; ?></dd> 
					  <dt>To Time</dt>
                      <dd><?php echo $data->to_time; ?></dd> 
					  <dt>Time Difference</dt>
					  <?php 
					  $str=$data->time_diff;
					  $diff=explode(":",$str);
					  $d=$diff[0];
					  $h=$diff[1];
					  $m=$diff[2];
					  $timediff="$d"."Day(s)"."$h"."Hour(s)"."$m"."Minute";
					  ?>
                      <dd><?php echo $timediff; ?></dd> 
					  <dt>Percentage</dt>
                      <dd><?php echo $data->percentage; ?></dd>	
					  <dt>Duration</dt>
                      <dd><?php echo $data->name; ?></dd> 	
 	                  <dt>Orginal Price Normal</dt>
                      <dd><?php echo $data->original_price_normal; ?></dd> 
					  <dt>Offer Price Normal</dt>
                      <dd><?php echo $data->offer_price_normal; ?></dd> 
					  <dt>Free Km Normal</dt>
                      <dd><?php echo $data->free_km_normal; ?></dd>						  
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
					  <dt>Orginal Price Special</dt>
                      <dd><?php echo $data->original_price_special; ?></dd> 
					  <dt>Offer Price Special</dt>
                      <dd><?php echo $data->offer_price_special; ?></dd> 
					  <dt>Free Km Special</dt>
                      <dd><?php echo $data->free_km_special; ?></dd>	
					  <dt>Orginal Price Super</dt>
                      <dd><?php echo $data->original_price_super; ?></dd> 
					  <dt>Offer Price Super</dt>
                      <dd><?php echo $data->offer_price_super; ?></dd> 
					  <dt>Free Km Super</dt>
                      <dd><?php echo $data->free_km_super; ?></dd>	
					  <dt>Created By</dt>
                      <dd><?php echo $data->rolename; ?></dd> 
                      <dt>Created On</dt>
                      <dd><?php echo $data->created_on; ?></dd>  

                  </dl>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
	</div><!-- ./col -->
</div>  	 
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
                      <dd><?php echo $data->first_name; ?></dd>  
					  <dt>Package Name</dt>
                      <dd><?php echo $data->package_name; ?></dd>  
					  <dt>Confirmed Date</dt>
                      <dd><?php echo $data->confirmed_date; ?></dd> 
					  <dt>Payment Date</dt>
                      <dd><?php echo $data->payment_date; ?></dd> 
					  <dt>TXN</dt>
                      <dd><?php echo $data->txn_id; ?></dd>  
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
					  <dt>Currency Code</dt>
                      <dd><?php echo $data->currency_code; ?></dd> 
					  <dt>Payment Gross</dt>
                      <dd><?php echo $data->payment_gross; ?></dd> 
					  <dt>Payment Status</dt>
                      <dd><?php echo $data->payment_status; ?></dd>
					  <dt>End Date</dt>
                      <dd><?php echo $data->end_date; ?></dd> 
					  <dt>Status</dt>
					  <?php if($data->status == '1')
						{
						echo "Active";
						}
						else
						{ 
						echo "Inactive"; 
						}
						?>
                      <dd><?php //echo $data->status; ?></dd> 
                  </dl>
                </div><!-- /.box-body -->
            </div><!-- /.box -->
     </div><!-- ./col -->
</div>   
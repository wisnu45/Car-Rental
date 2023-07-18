<div class="content-wrapper" >
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        City Ride Booking Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li class="active"> View Booking Details</li>
      </ol>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
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
         <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">View  City Ride Booking Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
						   <th>Car Name</th>  
						   <th>Rentee</th> 
						   <th>Tariff</th> 	
						   <th>Location</th>  
						   <th>Amount</th> 				   
						   <th>From Date</th>  
						   <th>To Date</th> 
						   <th>Total Hour</th>
						   <th>Status</th>  			   
                           <th width="">Action</th>
                        </tr>
                     </thead> 
                     <tbody>
                        <?php 
                           foreach($data as $cpayment) {	
                       ?>
                        <tr>
						   <td class="hidden"><?php echo $cpayment->id; ?></td>
						   <td class="center"><?php echo $cpayment->car_name; ?></td>   
						   <td class="center"><?php echo $cpayment->rentee; ?></td>
						   <td class="center"><?php echo $cpayment->tariff; ?></td>
						   <td class="center"><?php echo $cpayment->location; ?></td>
						   <td class="center"><?php echo $cpayment->amount; ?></td>
						   <td class="center"><?php echo $cpayment->from_date; ?></td>
						   <td class="center"><?php echo $cpayment->to_date; ?></td>
						  <?php $str = $cpayment->total_date;
						   $res=explode("-",$str);
						   $day=$res[0];
						   $hr=$res[1];
						   $m=$res[2];
						   ?>
						   <td class="center"><?php echo $day."days".$hr ."hour".$m."minutes"?></td>
						   <td><span class="center label  <?php if($cpayment->status == '1')
							{
							echo "label-warning";
							}else if($cpayment->status == '2')
							{ 
							echo "label-success"; 
							}else if($cpayment->status == '3')
							{
							echo "label-danger";	
							}else if($cpayment->status == '4')
							{
							echo "label-warning";	
							}else{
							echo "label-danger";	
							}
							?>"><?php if($cpayment->status == '1')
							{
							echo "Pending";
							}else if($cpayment->status == '2')
							{ 
							echo "Completed"; 
							}else if($cpayment->status == '3')
							{ 
							echo "Cancelled"; 
							}else if($cpayment->status == '4')
							{ 
							echo "Online"; 
							}else 
							{ 
							echo "Abondened"; 
							}
							?></span> 				                                                                                            
                            <td class="center">	                         	  
								<a class="btn btn-sm btn-primary"   href="<?php echo base_url();?>Carpayments/edit/<?php echo $cpayment->id; ?>">   <i class="fa fa-fw fa-edit"></i>Edit</a>
								<a class="btn btn-sm btn-danger"    href="<?php echo base_url();?>Carpayments/deletecpayment/<?php echo $cpayment->id; ?>/<?php echo $cpayment->car_id; ?>" onClick="return doconfirm()"><i class="fa fa-fw fa-trash"></i>Delete</a>	
								<?php if(($cpayment->status != '2') && ($cpayment->status != '3')&& ($cpayment->status != '4')): ?>
								<a class="btn btn-sm label-warning" href="<?php echo base_url();?>Carpayments/online/<?php echo $cpayment->id; ?>"><i class="fa fa-folder-open"></i>online</a>	
								<a class="btn btn-sm label-success" href="<?php echo base_url();?>Carpayments/active/<?php echo $cpayment->id; ?>/<?php echo $cpayment->car_id; ?>"><i class="fa fa-folder-o"></i>Complete</a>
								<a class="btn btn-sm label-warning" href="<?php echo base_url();?>Carpayments/disable/<?php echo $cpayment->id; ?>/<?php echo $cpayment->car_id; ?>"><i class="fa fa-folder-open"></i>Cancel</a>			 									
								<?php endif; ?>								
								 
								<?php if($cpayment->status == '4'): ?>
								<a class="btn btn-sm label-warning" href="<?php echo base_url();?>Carpayments/disable/<?php echo $cpayment->id; ?>/<?php echo $cpayment->car_id; ?>"><i class="fa fa-folder-open"></i>Cancel</a>			 	
								<a class="btn btn-sm label-success" href="<?php echo base_url();?>Carpayments/active/<?php echo $cpayment->id; ?>/<?php echo $cpayment->car_id; ?>"><i class="fa fa-folder-o"></i>Complete</a>	
								<?php endif; ?>
                            </td>
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th class="hidden">ID</th>
						   <th>Car Name</th>  
						   <th>Rentee</th> 
						   <th>Tariff</th> 	
						   <th>Location</th>  
						   <th>Amount</th> 				   
						   <th>From Date</th>  
						   <th>To Date</th> 
						    <th>Total Hour</th>
						   <th>Status</th>   						   
                           <th width="">Action</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
<div class="modal fade modal-wide" id="popup-paymentModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">View  City Ride Booking Details</h4>
         </div>
         <div class="modal-paymentbody">
         </div>
         <div class="business_info">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
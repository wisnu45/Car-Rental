<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
          Dealer Package
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Payment/add">Package </a></li>
         <li class="active">Add Dealer Package</li>
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
                  <h3 class="box-title">Add Dealer Package</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">		
                  <div class="box-body">                 
                     <div class="col-md-12">
					    <div class="form-group has-feedback">
                            <label>Choose Dealer</label>
					        <select class="form-control" style="width: 100%;" name="dealer_id" required="">
							 <option value="" disabled selected>Select your Option</option>
								   <?php
										foreach($dealer as $dealer){	
								   ?>
								<option value="<?php echo $dealer->id;?>"><?php echo $dealer->first_name;?></option>
								   <?php
										}
								   ?>
                            </select>
                        </div>
					    <div class="form-group has-feedback">
                            <label>Choose Package</label>
					        <select class="form-control" style="width: 100%;" name="package_id" required="" >
							 <option value="" disabled selected>Select your Option</option>
								   <?php
										foreach($package as $pack){	
								   ?>
									<option value="<?php echo $pack->id;?>"><?php echo $pack->package_name;?>&nbsp(Period-<?php echo $pack->period;?>)&nbsp(Price<?php echo $pack->price;?>)</option>
								   <?php
										}
								   ?>
                            </select>
                        </div>
					<input type="hidden"  value="<?php echo date('Y-m-d  H:i:s'); ?>" name="payment_date">
					<input type="hidden"  value="completed" name="payment_status" >
				   </div>
				  </div>
				  <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </form>
            </div>
            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">View Dealer Package Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
						   <th>Dealer Name</th>   
                           <th>Package Name</th>    
						   <th>Package Period</th> 						   
                           <th>Payment Date</th>
                           <th>Payment Status</th>	
						   <th>Expiry Date</th>						   
                           <th width="">Action</th>
                        </tr>
                     </thead> 
                     <tbody>
                        <?php
                           foreach($data as $payment) {	
                   ?>
                        <tr>
                           <td class="hidden"><?php echo $payment->id; ?></td>
                           <td class="center"><?php echo $payment->first_name; ?></td>
                           <td class="center"><?php echo $payment->package_name; ?></td>
						   <td class="center"><?php echo $payment->period; ?></td>
						   <td class="center"><?php echo $payment->payment_date; ?></td>
						   <td class="center"><?php echo $payment->payment_status; ?></td>
			               <td class="center"><?php echo $payment->expiry_date; ?></td> 					   
                           <td class="center">	                         	  
                            <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Payment/edit/<?php echo $payment->id; ?>"> <i class="fa fa-fw fa-edit"></i>Edit</a>
						    <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Payment/deletepayment/<?php echo $payment->id; ?>" onClick="return doconfirm()"><i class="fa fa-fw fa-trash"></i>Delete</a>	
						   </td>
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th class="hidden">ID</th>
						   <th>Dealer Name</th>   
                           <th>Package Name</th> 
						   <th>Package Period</th> 							   
                           <th>Payment Date</th>
                           <th>Payment Status</th>	
						   <th>Expiry Date</th>							   
                           <th width="">Action</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
      <!-- /.row -->
   
   <!-- /.content -->
			</div>
		</div>
	</section>
</div>
<div class="content-wrapper" >
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Offer Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li class="active">View Offer Details</li>
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
                  <h3 class="box-title">View Offer Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
						   <th>Category</th>
						   <th>Coupons Name</th>  
						   <th>Coupons Code</th>   
						   <th>Percentage</th>  
						   <th>Expiry Date</th>  						   
                           <th width="">Action</th>
                        </tr>
                     </thead> 
                     <tbody>
                        <?php
                           foreach($data as $discount) {	
                        ?>
                        <tr>
                           <td class="hidden"><?php echo $discount->id; ?></td> 
						   <td class="center"><?php echo $discount->name; ?></td> 						   
                           <td class="center"><?php echo $discount->coupon_for; ?></td> 
						   <td class="center"><?php echo $discount->coupon_code; ?></td>  
						   <td class="center"><?php echo $discount->percentage; ?></td>  
						   <td class="center"><?php echo $discount->expiry_date; ?></td> 						   
 				           <td><span class="center label  <?php if($discount->status == '1')
							{
							echo "label-success";
							}else
							{ 
							echo "label-warning"; 
							}
							?>"><?php if($discount->status == '1')
							{
							echo "Active";
							}else
							{ 
							echo "Inactive"; 
							}
							?></td></span> 	                                                                                
                           <td class="center">	                         
                              <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Discount/edit/<?php echo $discount->id; ?>"> <i class="fa fa-fw fa-edit"></i>Edit</a>
							  <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Discount/deletediscount/<?php echo $discount->id; ?>" onClick="return doconfirm()"> <i class="fa fa-fw fa-trash"></i>Delete</a>	 
							   <?php if( $discount->status){?>
                              <a class="btn btn-sm label-warning" href="<?php echo base_url();?>Discount/disable/<?php echo $discount->id; ?>">  <i class="fa fa-folder-open"></i> Inactive</a>           
                              <?php
                                 }    
                                 else
                                 {
                                 ?>
                              <a class="btn btn-sm label-success" href="<?php echo base_url();?>Discount/active/<?php echo $discount->id; ?>"> <i class="fa fa-folder-o"></i> Active </a>
                              <?php
                                 }
                                 ?>
                           </td>
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th class="hidden">ID</th>
						   <th>Category</th>
						   <th>Coupons Name</th>  
						   <th>Coupons Code</th>   
						   <th>Percentage</th>   
						   <th>Expiry Date</th> 						   
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
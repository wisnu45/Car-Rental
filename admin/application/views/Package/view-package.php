<?php $id = $this->session->userdata('admin'); ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Package
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Package/view">Package </a></li>
         <li class="active">Add Package</li>
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
                  <h3 class="box-title">Add Package</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate=""  >		
                 	<input type="hidden" name="created_by" value="<?php echo $id; ?>">
					<input type="hidden" name="created_on" value="<?php echo date('Y-m-d  H:i:s'); ?>" >
				 <div class="box-body">                 
                     <div class="col-md-12">
					      <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Package Name</label>
								<input type="text" class="form-control required" data-parsley-trigger="change"	data-parsley-minlength="2" data-parsley-pattern="^[a-zA-Z\  \/]+$"  required="" name="package_name"  placeholder="Package Name">
								<span class="glyphicon  form-control-feedback"></span>
                           </div> 
						   <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Price</label>
								<input type="text" class="form-control required"  data-parsley-trigger="keyup"  data-parsley-minlength="1" data-parsley-pattern="^[0-9/.]+$"   required="" name="price"  placeholder="Price">
								<span class="glyphicon  form-control-feedback"></span>
                           </div> 
						  <div class="form-group has-feedback"> <label for="exampleInputEmail1">Period</label>
								<input type="text" class="form-control required" name="period"   data-parsley-trigger="keyup"  data-parsley-minlength="1"  data-parsley-pattern="^[a-z\0-9\/]+$" required=""  placeholder="Period">
								<b>Examples:1 day, 10 days, 1 month, 10 months, 1 year, 10 years<b>
                          </div>
                  <!-- /.box-body -->
				     </div>
				  </div>
				   <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </form>
            </div>
   <!-- Main content -->
 
         <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">View Package Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
				  <?php if(isset($data) && !empty($data)){ ?>
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
						   <th>Package Name</th>   
                           <th>Price</th>                                                                                                                                    
                           <th>Period</th>  
                           <th>Status</th>    						   
                           <th width="">Action</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php                           
						   foreach($data as $package) {	
                      ?>
                        <tr>
                           <td class="hidden"><?php echo $package->id; ?></td>
                           <td class="center"><?php echo $package->package_name; ?></td>
                           <td class="center"><?php echo $package->price; ?></td>
						   <td class="center"><?php echo $package->period; ?></td>	
							<td><span class="center label  <?php if($package->status == '1')
							{
							echo "label-success";
							}else
							{ 
							echo "label-warning"; 
							}
							?>"><?php if($package->status == '1')
							{
							echo "Active";
							}else
							{ 
							echo "Inactive"; 
							}
							?></td></span> 				                                                                                            
                           <td class="center">	                         	  	
								<a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Package/edit/<?php echo $package->id; ?>"> <i class="fa fa-fw fa-edit"></i>Edit</a>
								<a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Package/deletepackage/<?php echo $package->id; ?>" onClick="return doconfirm()"> <i class="fa fa-fw fa-trash"></i>Delete</a>	
								 <?php if( $package->status){?>
								<a class="btn btn-sm label-warning" href="<?php echo base_url();?>Package/disable/<?php echo $package->id; ?>">  <i class="fa fa-folder-open"></i> Inactive </a>           
								 <?php
									 }
									 else
									 {
								 ?>
								 <a class="btn btn-sm label-success" href="<?php echo base_url();?>Package/active/<?php echo $package->id; ?>"> <i class="fa fa-folder-o"></i> Active </a>
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
						   <th>Package Name</th>   
                           <th>Price</th>                                                                                                                                    
                           <th>Period</th>  
                           <th>Status</th>    						   
                           <th width="">Action</th>
                        </tr>
                     </tfoot>
					 <?php }else{ ?>
						<h3> No Results Found! </h3> 
						<?php  } ?>
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
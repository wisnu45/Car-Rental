<div class="content-wrapper" >
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Dealers Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li class="active">View Dealers Details</li>
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
                  <h3 class="box-title">View Dealers Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
						   <th>First Name</th>   
                           <th>Last Name</th>                                                                                                                                    
                           <th>Email</th>  
                           <th>Status</th>    						   
                           <th width="">Action</th>
                        </tr>
                     </thead> 
                     <tbody>
                        <?php
                           foreach($data as $dealership) {	
						?>
                        <tr>
                           <td class="hidden"><?php echo $dealership->id; ?></td>
                           <td class="center"><?php echo $dealership->first_name; ?></td>
                           <td class="center"><?php echo $dealership->last_name; ?></td>
						   <td class="center"><?php echo $dealership->email; ?></td>		
							<td><span class="center label  <?php if($dealership->status == '1')
							{
							echo "label-success";
							}else
							{ 
							echo "label-warning"; 
							}
							?>"><?php if($dealership->status == '1')
							{
							echo "Active";
							}else
							{ 
							echo "Inactive"; 
							}
							?></span> 				                                                                                            
                           <td class="center">	                         	  
								<a class="btn btn-sm bg-olive show-dealer"   href="javascript:void(0);"  data-id="<?php echo $dealership->id; ?>"> <i class="fa fa-fw fa-eye"></i> View </a>	
								<a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Dealer/edit/<?php echo $dealership->id; ?>"><i class="fa fa-fw fa-edit"></i>Edit</a>
								<a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Dealer/deletedealer/<?php echo $dealership->id; ?>" onClick="return doconfirm()"> <i class="fa fa-fw fa-trash"></i>Delete</a>	
								 <?php if( $dealership->status){?>
								<a class="btn btn-sm label-warning" href="<?php echo base_url();?>Dealer/disable/<?php echo $dealership->id; ?>"> <i class="fa fa-folder-open"></i> Inactive </a>           
								 <?php
									 }
									 else
									 {
								 ?>
							    <a class="btn btn-sm label-success" href="<?php echo base_url();?>Dealer/active/<?php echo $dealership->id; ?>"> <i class="fa fa-folder-o"></i> Active </a>
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
							<th>First Name</th>   
                           <th>Last Name</th>                                                                                                                                    
                           <th>Email</th>  
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
<div class="modal fade modal-wide" id="popup-dealerModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">View Dealer Details</h4>
         </div>
         <div class="modal-dealerbody">
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
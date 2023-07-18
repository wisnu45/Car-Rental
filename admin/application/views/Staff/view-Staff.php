<div class="content-wrapper" >
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        View Staff Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li class="active"> Staff Details</li>
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
					  <h3 class="box-title">View Staff Details</h3>
				   </div>
				   <!-- /.box-header -->
					<div class="box-body">
						<table id="" class="table table-bordered table-striped datatable">
							<thead>
								<tr>
								   <th class="hidden">ID</th>
								    <th>Username</th>
									<th>First Name</th>   
									<th>Last Name</th>
									<th>Email</th>	
									<th>Role</th>							
									<th>Status</th>    						   
								   <th width="">Action</th>
								</tr>
							</thead> 
							<tbody>
							<?php
								 foreach($data as $city) {				   
							?>
								<tr>
									<td class="hidden"><?php echo $city->id; ?></td>   
									<td class="center"><?php echo $city->username; ?></td>									
									<td class="center"><?php echo $city->first_name; ?></td>
									<td class="center"><?php echo $city->last_name; ?></td>
									<td class="center"><?php echo $city->email; ?></td>
									<?php if( $city->id !='1'){ ?>
										<td class="center"><?php echo $city->rolename; ?></td>
									<?php }else{ ?>
										<td class="center"><?php echo 'Super admin'; ?></td>
									<?php } ?>
									<td>
										<span class="center label <?php if($city->status == '1'){ echo "label-success"; } else { echo "label-warning"; } ?>">
											<?php if($city->status == '1'){ echo "Active"; } else{ echo "Inactive";} ?>
										</span>
									</td>          
									<td class="center">	                         
										<a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Staff/edit/<?php echo $city->id; ?>"> <i class="fa fa-fw fa-edit"></i>Edit</a>
										<?php if( $city->id !='1'){?>
										<a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Staff/deletestaff/<?php echo $city->id; ?>" onClick="return doconfirm()">  <i class="fa fa-fw fa-trash"></i>Delete</a>	
										<?php  } ?> 
										<?php 
										if( $city->id !='1'){
											if( $city->status){
											?>
												<a class="btn btn-sm label-warning" href="<?php echo base_url();?>Staff/disable/<?php echo $city->id; ?>"> <i class="fa fa-folder-open"></i>Inactive </a>           
											<?php
											}else
											{
											?>
												<a class="btn btn-sm label-success" href="<?php echo base_url();?>Staff/active/<?php echo $city->id; ?>"> <i class="fa fa-folder-o"></i> Active </a>
										<?php
											} 
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
									<th>Username</th>
									<th>First Name</th>   
									<th>Last Name</th>
									<th>Email</th>  
									<th>Role</th>	
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
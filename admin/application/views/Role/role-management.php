<div class="content-wrapper" >
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
       Role Managament Deatils
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         
         <li class="active">View  Role Managament Details</li>
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
		  <div>
			<a href="<?php echo base_url(); ?>Staff/add"><button class="btn add-new" type="button"><b><i class="fa fa-fw fa-plus"></i> Add New</b></button></a>
		   </div>
            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">Role Managament Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                            <th class="hidden">ID</th>
						    <th>Username</th> 
							<th>Role</th>                          
							<th width="">Action</th>
                        </tr>
                     </thead> 
                     <tbody>
                        <?php
                           foreach($data as $role) {
						?>
                        <tr>
                           <td class="hidden"><?php echo $role->id; ?></td>
						   <td class="center"><?php echo $role->first_name; ?></td>
                           <td class="center"><?php echo $role->rolename;?></td>                                                             
                           <td class="center">	                        
                              <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Role/role_management?role=<?php echo $role->id1; ?>">
                              <i class="fa fa-fw fa-edit"></i>Change Capabilities</a> 
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
							<th>Role</th>                           
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
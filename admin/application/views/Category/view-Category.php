<?php $id = $this->session->userdata('admin'); ?>
<div class="content-wrapper" >
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
       Category Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Category/add">Category </a></li>
         <li class="active">Add Category </li>
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
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Category</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
                  <input type="hidden" name="created_by" value="<?php echo $id; ?>">
				  <input type="hidden" name="created_on" value="<?php echo date('Y-m-d  H:i:s'); ?>" >
				  <div class="box-body">
                     <div class="col-md-12">
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">Category Type</label>
							<input type="text" class="form-control required"  data-parsley-trigger="change"	data-parsley-minlength="4"  required="" name="name" data-parsley-pattern="^[a-zA-Z\  \/]+$"  placeholder="Category Type">
							<span class="glyphicon  form-control-feedback"></span>
						</div>
						<div class="form-group">
							   <label>Image</label>
							   <input name="image" accept="image/*" type="file" required="">
						 </div>	
					  </div>
				  </div>
				   <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </form>
            </div>
            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">View Category Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
						   <th>Category Type</th>   						   
                           <th width="">Action</th>
                        </tr>
                     </thead> 
                     <tbody>
                        <?php
                           foreach($data as $city) {	   
                           ?>
                        <tr>
                           <td class="hidden"><?php echo $city->id; ?></td>                                       
                           <td class="center"><?php echo $city->name; ?></td> 
						   <td class="center"><img src="<?php echo base_url().$city->image; ?>" width="100px" height="100px"/></td> 						   
                           <td class="center">	                         
                              <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Category/edit/<?php echo $city->id; ?>"><i class="fa fa-fw fa-edit"></i>Edit</a>
							  <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Category/deletecategory/<?php echo $city->id; ?>" onClick="return doconfirm()"> <i class="fa fa-fw fa-trash"></i>Delete</a>	 
                           </td>
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                            <th class="hidden">ID</th>
							 <th>Model</th>   					   
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
<?php $id = $this->session->userdata('admin'); ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Tarif Package
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-language" aria-hidden="true"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Tariff/add"> Tarif </a></li>
         <li class="active">Add  Tarif</li>
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
                  <h3 class="box-title"> Add Tarif Package</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
                  <input type="hidden" name="created_by" value="<?php echo $id; ?>">
				  <input type="hidden" name="created_on" value="<?php echo date('Y-m-d  H:i:s'); ?>" >
				  <div class="box-body">                 
                     <div class="col-md-12">
					      <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Tarif Name</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change" data-parsley-minlength="2"  data-parsley-maxlength="6" required="" name="name"  placeholder="Name">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Free Km</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change" data-parsley-minlength="2"   required="" name="free_km"  placeholder="Free Km">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
				   </div>
				</div>
			</div>
           <div class="box">
               <div class="box-header">
                  <h3 class="box-title">View Tarif Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
						   <th>Name</th>   
							<th>Free Km</th>    						   
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
							<td class="center"><?php echo $city->free_km; ?></td> 						   
                           <td class="center">	                         
                              <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Tariff/edit/<?php echo $city->id; ?>">
                              <i class="fa fa-fw fa-edit"></i>Edit</a>
							  <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Tariff/deletetariff/<?php echo $city->id; ?>" onClick="return doconfirm()">
                              <i class="fa fa-fw fa-trash"></i>Delete</a>	
                           </td>
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                            <th class="hidden">ID</th>
							 <th>Name</th>  
							 <th>Free Km</th> 							 
                           <th width="">Action</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
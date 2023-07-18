<?php $id = $this->session->userdata('admin'); ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Commute Package
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-language" aria-hidden="true"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Commute/add"> Commute</a></li>
         <li class="active">Add  Commute</li>
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
                  <h3 class="box-title"> Add Commute Package</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
                  <input type="hidden" name="created_by" value="<?php echo $id; ?>">
				  <input type="hidden" name="created_on" value="<?php echo date('Y-m-d  H:i:s'); ?>" >
				  <div class="box-body">                 
                     <div class="col-md-12">
					      <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Commute Name</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change" data-parsley-minlength="2"   required="" name="name"  placeholder="Name">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> </div>
						<div class="col-md-6">
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">From Date</label>
                            <input type="text" class="form-control required datetimepicker1" id="from_datetimepicker" data-parsley-trigger="change" data-parsley-minlength="2"   required="" name="from_date"  placeholder="From Date">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						</div>
                  <!-- /.box-body -->
						<div class="col-md-6">
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">To Date</label>
                            <input type="text" class="form-control required to_datetimepicker"     required="" name="to_date"  placeholder="To Date">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
					</div>
				</div>
			    <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
			</form>
           <div class="box">
               <div class="box-header">
                  <h3 class="box-title">View Commute Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
						    <th>Name</th>   
							<th>From Date</th>  
							<th>From Time</th> 
							<th>To Date</th> 
							<th>To Time</th>							
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
						   <td class="center"><?php echo $city->from_date; ?></td> 	
						   <td class="center"><?php echo $city->from_time; ?></td> 
						   <td class="center"><?php echo $city->to_date; ?></td> 	
						   <td class="center"><?php echo $city->to_time; ?></td> 						   
                           <td class="center">	                         
                              <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Commute/edit/<?php echo $city->id; ?>">
                              <i class="fa fa-fw fa-edit"></i>Edit</a>
							  <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Commute/deletecommute/<?php echo $city->id; ?>" onClick="return doconfirm()">
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
							<th>From Date</th>  
							<th>From Time</th> 
							<th>To Date</th> 
							<th>To Time</th>									 
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
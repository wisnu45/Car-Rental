<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add Model Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-language" aria-hidden="true"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Model/addmodel"> Model </a></li>
         <li class="active">Add  Model</li>
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
                  <h3 class="box-title"> Add Model Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
                  <div class="box-body">                 
                     <div class="col-md-12">
					       <div class="form-group has-feedback">
							  <label>Make</label>
								  <select class="form-control" style="width: 100%;" name="make_id" required="">
								   <option value="" disabled selected>Select your Option</option>
									<?php
									foreach($make as $datanew){	
									?>
									<option  value="<?php echo $datanew->id;?>"><?php echo $datanew->name;?></option>
									<?php
										}
									?>
								  </select>
						   </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> Model</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change" data-parsley-minlength="2"  data-parsley-pattern="^[a-zA-Z\0-9 \/]+$" required="" name="name"  placeholder="Model">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 	
                  <!-- /.box-body -->
				      </div>
			    	</div>
				     <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
				</form>
			</div>	
           <div class="box">
               <div class="box-header">
                  <h3 class="box-title">View Model Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
						   <th> Make</th>  
						   <th> Model</th>     						   
                           <th width="">Action</th>
                        </tr>
                     </thead> 
                     <tbody>
                        <?php
                           foreach($data as $city) {						   
                           ?>
                        <tr>
                           <td class="hidden"><?php echo $city->id; ?></td>  
						    <td class="center"><?php echo $city->make; ?></td>
                           <td class="center"><?php echo $city->name; ?></td>                                                                             
                           <td class="center">	                         
                              <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Model/edit/<?php echo $city->id; ?>">
                              <i class="fa fa-fw fa-edit"></i>Edit</a>
							  <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Model/deletemodel/<?php echo $city->id; ?>" onClick="return doconfirm()">
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
							<th>Make</th> 
							 <th>Model</th>      						   
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
<?php $id = $this->session->userdata('admin'); ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        Popular location
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-language" aria-hidden="true"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Location/add">Popular location </a></li>
         <li class="active">Add Popular location</li>
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
                  <h3 class="box-title"> Add Popular location</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
			   		<input type="hidden" name="created_by" value="<?php echo $id; ?>">
					<input type="hidden" name="created_on" value="<?php echo date('Y-m-d  H:i:s'); ?>" >
                  <div class="box-body">                 
                     <div class="col-md-12">
					    <div class="form-group has-feedback">
                            <label>Choose Location</label>
					        <select class="form-control required" style="width: 100%;" name="location_id" required="" id="location_id">
							<option value="" disabled selected>Select your Location</option>
								   <?php
									foreach($location as $data1){	
								   ?>
						<option value="<?php echo $data1->id;?>"><?php echo $data1->name;?></option>
								   <?php
								  }
								   ?>
                            </select>
                        </div>

						<div id="test2"> 
							<div class="form-group has-feedback">
								<label for="exampleInputEmail1">Popular Location</label>
								<input type="text" class="form-control required autocomplete"  name="address" placeholder="Popular Location" data-parsley-trigger="change" required ="">
								<span class="glyphicon  form-control-feedback"></span>
							</div>	
								<input type="hidden" class=" required locality" name="city"  placeholder="City"  >
								<input type="hidden" class=" required " name="state"  disabled="true"  placeholder="State">		
								<input type="hidden" class=" required "  data-parsley-trigger="change" disabled="true"   placeholder="Country">					
								<input type="hidden"  class="  field postal_code"  disabled="true" name="zip"  placeholder="Zip">
								<input type="hidden"  id="lat"  name="latitude"  >
								<input type="hidden"  id="lon"  name="longitude" >
						</div>	
                  <!-- /.box-body -->
				   </div>
				</div>
				   <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
				  </form>
			</div>
            <!-- /.box -->  
      <!-- /.row -->
	       <div class="box">
               <div class="box-header">
                  <h3 class="box-title">View Popular location</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
							<th>Location</th>
							<th>Address</th>
							<th>Short Address</th> 							
                            <th width="">Action</th>
                        </tr>
                     </thead> 
                     <tbody>
                        <?php
                           foreach($value as $list) {	   
                           ?>
                        <tr>
                           <td class="hidden"><?php echo $list->id; ?></td>                
                           <td class="center"><?php echo $list->name; ?></td>
						   <td  width="40%" class="center"><?php echo $list->address; ?></td>
						   <td class="center"><?php echo $list->short_address; ?></td>
                           <td class="center">	                         
                              <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Location/edit/<?php echo $list->id; ?>">
                              <i class="fa fa-fw fa-edit"></i>Edit</a>
							  <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Location/deletelocation/<?php echo $list->id; ?>" onClick="return doconfirm()">
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
							<th>Location</th>
							<th>Address</th>
							<th>Short Address</th>							
                           <th width="">Action</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
   </section>
   <!-- /.content -->
</div>
  <body onload="initialize()">
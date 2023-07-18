<?php $id = $this->session->userdata('admin'); ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
       Car Gallery
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Cardirectory/gallery">Car Gallery</a></li>
         <li class="active">Add Car Gallery</li>
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
                  <h3 class="box-title">Add Car Gallery</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">		
                 	<input type="hidden" name="created_by" value="<?php echo $id; ?>">
					<input type="hidden" name="created_on" value="<?php echo date('d-m-Y  H:i:s'); ?>" >

				 <div class="box-body">                 
                     <div class="col-md-12"> 
					<div class="form-group" id="" >
                       <label>Select Car Name</label>
                         <select class="form-control "  style="width: 100%;" name="listing_id">

							   <?php
							   //print_r($category);
							  foreach($list as $carlist){

							   ?>
							<option value="<?php echo $carlist->id;?>"><?php echo $carlist->car_name;?></option>
						   <?php
						  }
						   ?>
						</select>
					</div>
						   <div class="form-group has-feedback">
						   <label>Picture</label>
						   <input name="picture[]" accept="image/*" type="file" required="" multiple/>
						  <!-- <img  width="100px" height="100px" alt="Picture Not Found"/>-->
						   </div>	
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
				   </div>
				  </div>
               </form>
            </div>
            <!-- /.box -->
			 <div class="col-xs-12">
            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">View Car Gallery Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
	                        <th>Car Name</th>
							<th>Toatal Images</th>
                            <th>Action</th>
                        </tr>
                     </thead>
					 
                     <tbody>
                        <?php
                           foreach($data as $gallery) {			 
                           ?>
                        <tr>
                           <td class="hidden"><?php echo $gallery->id1; ?></td>	
                           <td class="center"><?php echo $gallery->car_name; ?></td>
                           <td class="center"><?php echo $gallery->total_images; ?></td>
                           <td class="center">	
						       <a class="btn btn-primary btn-sm view-gallery" href="<?php echo base_url(); ?>Cardirectory/view_cargallery/<?php echo $gallery->id1; ?>" >  <i class="glyphicon glyphicon-picture icon-white"></i> View Gallery  </a>
                           </td>
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th class="hidden">ID</th>
	                        <th>Car Name</th>
							<th>Toatal Images</th>
                           <th>Action</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
		   </div><!-- close second div-->
         </div>
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
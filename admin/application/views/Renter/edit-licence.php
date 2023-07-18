<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Renter Licence
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-language" aria-hidden="true"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Renter/license">Renter Licence </a></li>
         <li class="active">Edit  Renter </li>
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
                  <h3 class="box-title"> Renter Licence</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
                  <div class="box-body">                 
                     <div class="col-md-12">		 
					    <div class="form-group has-feedback">
                           <label>Rentee Name</label>
					        <select class="form-control" style="width: 100%;" name="renter_id" >
								   <?php
									foreach($rentee as $data1){	
								   ?>
						    <option value="<?php echo $data1->id;?>"<?php if ($data1->id == $data->renter_id){ ?>
						    selected = "selected" <?php } ?>><?php echo $data1->rentee;?></option>
								   <?php
								  }
								   ?>
                            </select>
                        </div>			  
						 <div class="form-group has-feedback">
						   <label>Image</label>
						   <input name="license" accept="image/*" type="file">
						   <img src="<?php echo base_url().$data->license; ?>" width="100px" height="100px" alt="Picture Not Found"/>
						 </div>		
						 <input type="hidden" name="status" value="1">
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
				   </div>	   
				  </div>
				</form>
			</div>
          <!-- /.box -->
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
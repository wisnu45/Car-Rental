<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Tarif
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Tariff/add">Tarif </a></li>
         <li class="active">Edit Tarif</li>
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
                  <h3 class="box-title">Edit Tarif</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">		
                  <div class="box-body">                 
                     <div class="col-md-12">
					      <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Tarif Name</label>
								<input type="text" class="form-control required"  value="<?php echo $data->name; ?>"	 data-parsley-trigger="change"  data-parsley-minlength="2"  data-parsley-maxlength="6"  required="" name="name"  placeholder="Name">
								<span class="glyphicon  form-control-feedback"></span>
                          </div> 
						   <div class="form-group has-feedback">
								<label for="exampleInputEmail1">Free Km</label>
								<input type="text" class="form-control required"  	value="<?php echo $data->free_km; ?>" data-parsley-trigger="keyup"  data-parsley-minlength="1" data-parsley-pattern="^[0-9/.]+$"  required=""  name="free_km"  placeholder="free km">
								<span class="glyphicon  form-control-feedback"></span>
                          </div>  

                  <!-- /.box-body -->
				   </div>
				   <div class="col-md-6">
				   </div>
				  </div>
				    <div class="box-footer">
                     <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
               </form>
            </div>
            <!-- /.box -->
         </div>
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
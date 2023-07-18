<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Edit Model
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Model/addmodel"> Model </a></li>
         <li class="active">Model </li>
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
                  <h3 class="box-title">Model</h3>
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
									<option  value="<?php echo $datanew->id;?>" <?php if ($datanew->id == $data->make_id){ ?>
								selected = "selected" <?php } ?>><?php echo $datanew->name;?></option>
									<?php
										}
									?>
								  </select>
						   </div>
				<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Model Name</label>
                            <input type="text" class="form-control required"   required="" value="<?php echo $data->name; ?>"name="name"  placeholder="City">
                            <span class="glyphicon  form-control-feedback"></span>
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
         </div>
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
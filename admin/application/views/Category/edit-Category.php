<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
      Edit Category
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-male"></i>Home</a></li>
         <li><a href="<?php echo base_url();?>Category/add">Category</a></li>
         <li class="active">Edit Category </li>
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
                  <h3 class="box-title">Category</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
				  <div class="box-body">
                     <div class="col-md-12">
						<div class="form-group has-feedback">
							<label for="exampleInputEmail1">Category Type</label>
							<input type="text" class="form-control required" name="name" value="<?php echo $data->name;?>" data-parsley-trigger="change"	data-parsley-minlength="4"  required=""  data-parsley-pattern="^[a-zA-Z\  \/]+$"  placeholder="Category Type">
							<span class="glyphicon  form-control-feedback"></span>
						</div>
						<div class="form-group">
							   <label>Image</label>
							   <input name="image" accept="image/*" type="file">
							   <img src="<?php echo base_url().$data->image; ?>" width="100px" height="100px" alt="Picture Not Found"/>
						 </div>	
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
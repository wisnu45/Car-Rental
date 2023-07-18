<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Add FAQ Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-language" aria-hidden="true"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>FAQ/view"> FAQ </a></li>
         <li class="active">Add  FAQ</li>
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
                  <h3 class="box-title"> Add FAQ Details</h3>
               </div>
               <!-- /.box-header -->
               <!-- form start -->
               <form role="form" action="" method="post"  data-parsley-validate="" class="validate" enctype="multipart/form-data">
                  <div class="box-body">                 
                     <div class="col-md-12">
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Question</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change" data-parsley-minlength="2"  required="" name="question"  placeholder="Question">
                            <span class="glyphicon  form-control-feedback"></span>
                        </div> 
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Answer</label>
                             <textarea  name="answer" placeholder="Answer" class="form-control required" required=""
                             data-parsley-trigger="change" data-parsley-minlength="2"  ></textarea>  
                            <span class="glyphicon  form-control-feedback"></span>
                        </div> 
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Position</label>
                            <input type="text" class="form-control required" data-parsley-trigger="change" data-parsley-minlength="1"  data-parsley-pattern="^[0-9\  \/]+$" required="" name="position"  placeholder="Position">
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
            <!-- /.box -->
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
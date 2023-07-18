
<div class="content-wrapper" >
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        View Commute Translation
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li class="active">View Commute Translation Details</li>
      </ol>
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="row">
         <div class="col-xs-12">
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
         <div class="col-xs-12">
			<ol class="breadcrumb">
				<li><a href="<?php echo base_url(); ?>Commutetranslation/add_commute"><button class="btn add-new" type="button"><b><i class="fa fa-fw fa-plus"></i> Add Commute</b></button></a>
			</ol>

            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">View Commute Page Translation Details</h3>
               </div>

               <!-- /.box-header -->
               <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th>Languages </th>                                                                     
                           <th>Action</th>
                        </tr>
                     </thead> 
                     <tbody>
                        <?php
                           foreach($final_lang as $langname) {			 
                           ?>
                        <tr>
                           <td class="center"><?php echo $langname; ?></td>                       				  
							<td class="center">
							<a href="<?php echo base_url();?>Commutetranslation/edit_commute/<?php echo $langname;?>">
							<i class="fa fa-pencil-square-o"></i>
							</a>&nbsp;&nbsp;
							<a href="<?php echo base_url();?>Commutetranslation/commute_delete/<?php echo $langname;?>" onClick="return doconfirm()"  class="delete">
							<i class="fa fa-trash-o "></i>
							</a>
							</td> 						                             
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                             <th>Languages </th>                                                                     
                           <th>Action</th>
                        </tr>
                     </tfoot>
                  </table>
               </div>
               <!-- /.box-body -->
            </div>
            <!-- /.box -->
         </div>
         <!-- /.col -->
      </div>
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
<script>
	
	base_url = "<?php echo base_url(); ?>";
	config_url = "<?php echo base_url(); ?>";
	


    </script>
 
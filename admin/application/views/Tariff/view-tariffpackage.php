<div class="content-wrapper" >
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
        Tariff Package Details
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li class="active">View Tariff Details</li>
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
            <!-- /.box -->
            <div class="box">
               <div class="box-header">
                  <h3 class="box-title">View Tariff Package Details</h3>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                  <table id="" class="table table-bordered table-striped datatable">
                     <thead>
                        <tr>
                           <th class="hidden">ID</th>
						   <th>Tariff Name</th>   
                           <th>Car Name</th>                                                                                                                                    
                           <th>Price Normal</th>  
						   <th>Price Weekend</th> 
						   <th>Price Peak</th>   						   
                           <th width="">Action</th>
                        </tr>
                     </thead> 
                     <tbody>
                      <?php
                           foreach($data as $dealer) {	
                       ?>
                        <tr>
                           <td class="hidden"><?php echo $dealer->id; ?></td>
                           <td class="center"><?php echo $dealer->name; ?></td>
                           <td class="center"><?php echo $dealer->car_name; ?></td>
						   <td class="center"><?php echo $dealer->price_normal; ?></td>	
						   <td class="center"><?php echo $dealer->price_weekend; ?></td>
						   <td class="center"><?php echo $dealer->price_peak; ?></td>                                                                            
                           <td class="center">	                           
							  <a class="btn btn-sm btn-primary" href="<?php echo base_url();?>Tariff/editpackage/<?php echo $dealer->id; ?>"> <i class="fa fa-fw fa-edit"></i>Edit</a>
							  <a class="btn btn-sm btn-danger" href="<?php echo base_url();?>Tariff/deletepackage/<?php echo $dealer->id; ?>" onClick="return doconfirm()"><i class="fa fa-fw fa-trash"></i>Delete</a>	
                           </td>
                        </tr>
                        <?php
                           }
                           ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <th class="hidden">ID</th>
						   <th>Tariff Name</th>   
                           <th>Car Name</th>                                                                                                                                    
                           <th>Price Normal</th>  
						   <th>Price Weekend</th> 
						   <th>Price Peak</th>     						   
                           <th width="">Action</th>
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
<?php $id = $this->session->userdata('admin');  ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Tariff Translation 
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Tarifftranslation/view_tariff"> Tariff Translation </a></li>
         <li class="active">Edit Tariff Translation</li>
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
		 <?php 
				$final_lang = '';
				$textFile = $language_name;
				$location = '../application/language/'.$textFile.'/'.'';
				$lang_directory = directory_map($location, FALSE);	
				if(is_bool($lang_directory ) === false):	
					if(in_array('tariff_lang.php',$lang_directory)):				
						$final_lang = 'tariff_lang';
					else:
						$this->load->view('error_trans');
						exit();
					endif;
				else:
					$this->load->view('error_trans');
					exit();
				endif;			
				if($final_lang):	
					$extension = ".php";       					
					include '../application/language/'.''.$textFile.'/'.$final_lang.$extension;
				endif;
				?>
	 <form role="form"  method="post" id="tariffedit">
		<input type="hidden" name="created_by" value="<?php echo $id; ?>">
		<input type="hidden" name="created_date" value="<?php echo date('Y-m-d  H:i:s'); ?>" >
			  <input  type="hidden" name="lang['home_lang']" value="home_lang">
	  <input  type="hidden" name="lang['commute_lang']" value="commute_lang">
	  <input  type="hidden" name="lang['login_lang']" value="login_lang">
	
	  <input  type="hidden" name="lang['deal_lang']" value="deal_lang">
	  <input  type="hidden" name="lang['offers_lang']" value="offers_lang">
	  <input  type="hidden" name="lang['chronologypopup_lang']" value="chronologypopup_lang">
	  <input  type="hidden" name="lang['coupebooking_lang']" value="coupebooking_lang">
	  <input  type="hidden" name="lang['renter_lang']" value="renter_lang">
		 <div class="col-md-12">
            <!-- general form elements -->						 
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit General Tariff page Details</h3>
				  <div class="edituser" tabindex='1'></div>
               </div>
               <!-- /.box-header -->
               <!-- form start -->               
			 
			    <div class="box-body">  
                    <div class="col-md-12">
					 <input  name="id"  id="id" class="form-control  required regcom sample" value="<?php echo $textFile; ?>" type="hidden">
					 	<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Language Name</label>
                             <input class="form-control  required regcom sample" placeholder="Language Name" name="lang['language']" value="<?php echo $lang['language'];?>" type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<input class="form-control  required regcom sample"   placeholder="Page Name" value="tariff_lang" name="lang['page_name']"  type="hidden">
				<!-------Home page------->
                       
					   
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Mon-Sun</label>
                            <input type="text" name="lang['tariff_slide_B1']" value="<?php if(!empty($lang['tariff_slide_B1'])): echo $lang['tariff_slide_B1']; endif;?>"  placeholder="Mon-Sun" class="form-control required regcom" required="">
                            <span class="glyphicon  form-control-feedback"></span>
                        </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Special</label>
                            <input type="text" name="lang['tariff_slide_B2']"  value="<?php if(!empty($lang['tariff_slide_B2'])): echo $lang['tariff_slide_B2']; endif;?>" placeholder="Special" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                        </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Peak Season ?</label>
                            <input type="text" name="lang['tariff_slide_B3']"  value="<?php if(!empty($lang['tariff_slide_B3'])): echo $lang['tariff_slide_B3']; endif;?>" placeholder="Peak Season ?" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                        </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">TARIFF CALCULATOR</label>
                            <input type="text" name="lang['tariff_slide_C1']" value="<?php if(!empty($lang['tariff_slide_C1'])): echo $lang['tariff_slide_C1']; endif;?>" placeholder="TARIFF CALCULATOR" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Select a car</label>
                            <input type="text" name="lang['tariff_slide_C2']" value="<?php if(!empty($lang['tariff_slide_C2'])): echo $lang['tariff_slide_C2']; endif;?>" placeholder="Select a car" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div> 	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">From Date</label>
                            <input type="text" name="lang['tariff_slide_C3']" value="<?php if(!empty($lang['tariff_slide_C3'])): echo $lang['tariff_slide_C3']; endif;?>" placeholder="From Date" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div> 	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">To Date</label>
                            <input type="text" name="lang['tariff_slide_C4']" value="<?php if(!empty($lang['tariff_slide_C4'])): echo $lang['tariff_slide_C4']; endif;?>" placeholder="To Date" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 	
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">All prices include free fuel </label>
                            <input type="text" name="lang['tariff_slide_C5']" value="<?php if(!empty($lang['tariff_slide_C5'])): echo $lang['tariff_slide_C5']; endif;?>" placeholder="All prices include free fuel" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Check Availability</label>
                            <input type="text" name="lang['tariff_slide_C6']" value="<?php if(!empty($lang['tariff_slide_C6'])): echo $lang['tariff_slide_C6']; endif;?>" placeholder="Check Availability" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                         </div> 

					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">FEATURES</label>
                            <input type="text" name="lang['tariff_slide_C7']" value="<?php if(!empty($lang['tariff_slide_C7'])): echo $lang['tariff_slide_C7']; endif;?>" placeholder="FEATURES" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Prices Include Free Fuel</label>
                            <input type="text" name="lang['tariff_slide_C8']" value="<?php if(!empty($lang['tariff_slide_C8'])): echo $lang['tariff_slide_C8']; endif;?>" placeholder="Prices Include Free Fuel" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 

						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Insurance & Tax Included</label>
                            <input type="text" name="lang['tariff_slide_C9']" value="<?php if(!empty($lang['tariff_slide_C9'])): echo $lang['tariff_slide_C9']; endif;?>" placeholder="Insurance & Tax Included" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div> 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Free Kms/Hr</label>
                            <input type="text" name="lang['tariff_slide_C10']" value="<?php if(!empty($lang['tariff_slide_C10'])): echo $lang['tariff_slide_C10']; endif;?>" placeholder="Free Kms/Hr" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Refundable Deposit</label>
                            <input type="text" name="lang['tariff_slide_C11']" value="<?php if(!empty($lang['tariff_slide_C11'])): echo $lang['tariff_slide_C11']; endif;?>" placeholder="Refundable Deposit" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Free Km for every hour</label>
                            <input type="text" name="lang['tariff_slide_C12']" value="<?php if(!empty($lang['tariff_slide_C12'])): echo $lang['tariff_slide_C12']; endif;?>" placeholder="Free Km for every hour" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">NIL</label>
                            <input type="text" name="lang['tariff_slide_C13']" value="<?php if(!empty($lang['tariff_slide_C13'])): echo $lang['tariff_slide_C13']; endif;?>" placeholder="NIL" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Minimum billing & hours</label>
                            <input type="text" name="lang['tariff_slide_C14']" value="<?php if(!empty($lang['tariff_slide_C14'])): echo $lang['tariff_slide_C14']; endif;?>" placeholder="Minimum billing & hours" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Assurance</label>
                            <input type="text" name="lang['tariff_slide_C15']" value="<?php if(!empty($lang['tariff_slide_C15'])): echo $lang['tariff_slide_C15']; endif;?>" placeholder="Assurance" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">seater</label>
                            <input type="text" name="lang['tariff_slide_C16']" value="<?php if(!empty($lang['tariff_slide_C16'])): echo $lang['tariff_slide_C16']; endif;?>" placeholder="seater" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">/hr</label>
                            <input type="text" name="lang['tariff_slide_C17']" value="<?php if(!empty($lang['tariff_slide_C17'])): echo $lang['tariff_slide_C17']; endif;?>" placeholder="/hr" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">per excess km</label>
                            <input type="text" name="lang['tariff_slide_C18']" value="<?php if(!empty($lang['tariff_slide_C18'])): echo $lang['tariff_slide_C18']; endif;?>" placeholder="per excess km" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Km Free</label>
                            <input type="text" name="lang['tariff_slide_C19']" value="<?php if(!empty($lang['tariff_slide_C19'])): echo $lang['tariff_slide_C19']; endif;?>" placeholder="Km Free" class="form-control required regcom"  required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
				 </div>
			</div>

            <!-- /.box -->
         </div>
				   <div class="col-md-12">
					  <div class="form-group has-feedback">                                       
                            <input type="button" class="btn btn-primary" value="Submit"   id="tariffedit1">
                             <button type="reset" class="btn btn-primary">Reset </button>
                       </div> 
				   </div>
	   </div>
   </form>
     
      <!-- /.row -->
   </section>
   <!-- /.content -->
</div>
</div>
	<script>
	
	base_url = "<?php echo base_url(); ?>";
	config_url = "<?php echo base_url(); ?>";
	
	</script>

    <script type="text/javascript">

</script>
	 
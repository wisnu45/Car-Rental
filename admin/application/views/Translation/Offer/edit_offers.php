<?php $id = $this->session->userdata('admin');  ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
      <h1>
         Edit Offers Translation 
      </h1>
      <ol class="breadcrumb">
         <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-user-md"></i>Home</a></li>
         <li><a href="<?php echo base_url(); ?>Offerstranslation/view_offer"> Offers Translation </a></li>
         <li class="active">Edit Offers Translation</li>
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
					if(in_array('offers_lang.php',$lang_directory)):				
						$final_lang = 'offers_lang';
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
	 <form role="form"  method="post" id="Offersedit">
		<input type="hidden" name="created_by" value="<?php echo $id; ?>">
		<input type="hidden" name="created_date" value="<?php echo date('Y-m-d  H:i:s'); ?>" >
	    <input  type="hidden" name="lang['home_lang']" value="home_lang">
	    <input  type="hidden" name="lang['commute_lang']" value="commute_lang">
	    <input  type="hidden" name="lang['login_lang']" value="login_lang">
	    <input  type="hidden" name="lang['tariff_lang']" value="tariff_lang">
	    <input  type="hidden" name="lang['deal_lang']" value="deal_lang">
	    <input  type="hidden" name="lang['chronologypopup_lang']" value="chronologypopup_lang">
	    <input  type="hidden" name="lang['coupebooking_lang']" value="coupebooking_lang">
	    <input  type="hidden" name="lang['renter_lang']" value="renter_lang">
		<div class="col-md-12">
            <!-- general form elements -->						 
            <div class="box">
               <div class="box-header with-border">
                  <h3 class="box-title">Edit General Offers page Details</h3>
				  <div class="edituser" tabindex='1'></div>
               </div>
               <!-- /.box-header -->
               <!-- form start -->               
                <div class="box-body">                 
                     <div class="col-md-12">
					 <input  name="id"  id="id" class="form-control  required regcom sample" value="<?php echo $textFile; ?>" type="hidden">
					 	<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Language Name</label>
                             <input name="lang['language']" value="<?php echo $lang['language'];?>" class="form-control  required regcom sample" placeholder="Language Name"   type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
						<input  placeholder="Page Name" value="offers_lang" name="lang['page_name']"  type="hidden">
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">OFFERS FOR</label>
                             <input  name="lang['offers_slide_A1']" value="<?php if(!empty($lang['offers_slide_A1'])): echo $lang['offers_slide_A1']; endif;?>" placeholder="OFFERS FOR"  class="form-control  required regcom sample" type="text"  required="">
                             <span class="glyphicon  form-control-feedback"></span>
                        </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">DRIVE MORE, SAVE MORE</label>
                            <input type="text" name="lang['offers_slide_B1']" value="<?php if(!empty($lang['offers_slide_B1'])): echo $lang['offers_slide_B1']; endif;?>" placeholder="DRIVE MORE, SAVE MORE" class="form-control required regcom" required="">
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">FLAT OF ON DAYS AND LONGER TRIPS</label>
                            <input type="text" name="lang['offers_slide_B2']"value="<?php if(!empty($lang['offers_slide_B2'])): echo $lang['offers_slide_B2']; endif;?>"  placeholder="FLAT OF ON DAYS AND LONGER TRIPS" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">GET</label>
                            <input type="text" name="lang['offers_slide_C1']" value="<?php if(!empty($lang['offers_slide_C1'])): echo $lang['offers_slide_C1']; endif;?>" placeholder="GET" class="form-control required regcom"  required="" >
                            <span class="glyphicon  form-control-feedback"></span>
                        </div> 
					 	<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">% OFF</label>
                            <input type="text" name="lang['offers_slide_C2']" value="<?php if(!empty($lang['offers_slide_C2'])): echo $lang['offers_slide_C2']; endif;?>" placeholder="% OFF" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">EXCLUSIVELY FOR </label>
                            <input type="text" name="lang['offers_slide_C3']" value="<?php if(!empty($lang['offers_slide_C3'])): echo $lang['offers_slide_C3']; endif;?>" placeholder="EXCLUSIVELY FOR " class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1"> COUSTOMRS</label>
                            <input type="text" name="lang['offers_slide_C4']" value="<?php if(!empty($lang['offers_slide_C4'])): echo $lang['offers_slide_C4']; endif;?>" placeholder="COUSTOMRS" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						 <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">More Details</label>
                            <input type="text" name="lang['offers_slide_C5']" value="<?php if(!empty($lang['offers_slide_C5'])): echo $lang['offers_slide_C5']; endif;?>" placeholder="More Details" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
				    </div>
			  </div>				   
		   </div>
		   <div class="box">
			   <div class="box-header with-border">
                  <h3 class="box-title">Offers details</h3>
				</div>
				 <div class="box-body">
				   <div class="col-md-12">
					  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Applicable on Monday to Thursday booking. Maximum Discount of Rs</label>
                            <input type="text" name="lang['offers_slide_D1']" value="<?php if(!empty($lang['offers_slide_D1'])): echo $lang['offers_slide_D1']; endif;?>" placeholder="Applicable on Monday to Thursday booking. Maximum Discount of Rs" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>				   
					    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Validity</label>
                            <input type="text" name="lang['offers_slide_D2']" value="<?php if(!empty($lang['offers_slide_D2'])): echo $lang['offers_slide_D2']; endif;?>" placeholder="Validity" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
					   
			   			<div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Minimum billing is for</label>
                            <input type="text" name="lang['offers_slide_D4']" value="<?php if(!empty($lang['offers_slide_D4'])): echo $lang['offers_slide_D4']; endif;?>" placeholder="Minimum billing is for" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Valid on first booking.</label>
                            <input type="text" name="lang['offers_slide_D7']" value="<?php if(!empty($lang['offers_slide_D7'])): echo $lang['offers_slide_D7']; endif;?>" placeholder="Valid on first booking." class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						 
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">will be charged at time of booking Only valid on bookings made through Zoomcar website and iOS/Android app. Discount applicable only on original reservation charges (not applicable on excess Km, late return fee, or other fees/charges) Applicable only on Indusind Bank Debit and Credit Cards</label>
                            <textarea name="lang['home_slide_D9']"  class="form-control required regcom"  required=""><?php if(!empty($lang['home_slide_D9'])): echo $lang['home_slide_D9']; endif;?>						
							</textarea>
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">HOW TO AVAIL</label>
                            <input type="text" name="lang['offers_slide_D10']" value="<?php if(!empty($lang['offers_slide_D10'])): echo $lang['offers_slide_D10']; endif;?>"  placeholder="HOW TO AVAIL" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Use Promocode</label>
                            <input type="text" name="lang['offers_slide_D11']" value="<?php if(!empty($lang['offers_slide_D11'])): echo $lang['offers_slide_D11']; endif;?>" placeholder="Use Promocode" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Book now</label>
                            <input type="text" name="lang['offers_slide_D12']" value="<?php if(!empty($lang['offers_slide_D12'])): echo $lang['offers_slide_D12']; endif;?>" placeholder="Book now" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">PLEASE NOTE</label>
                            <input type="text" name="lang['offers_slide_D13']" value="<?php if(!empty($lang['offers_slide_D13'])): echo $lang['offers_slide_D13']; endif;?>" placeholder="PLEASE NOTE" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						  <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Discount will not be applicable on any of these days </label>
                            <input type="text" name="lang['offers_slide_D14']" value="<?php if(!empty($lang['offers_slide_D14'])): echo $lang['offers_slide_D14']; endif;?>" placeholder="Discount will not be applicable on any of these days " class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						   <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Terms & Conditions</label>
                            <input type="text" name="lang['offers_slide_D15']"  value="<?php if(!empty($lang['offers_slide_D15'])): echo $lang['offers_slide_D15']; endif;?>" placeholder="Terms & Conditions" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
						    <div class="form-group has-feedback">
                            <label for="exampleInputEmail1">Exclusive offer for</label>
                            <input type="text" name="lang['offers_slide_D16']" value="<?php if(!empty($lang['offers_slide_D16'])): echo $lang['offers_slide_D16']; endif;?>" placeholder="Exclusive offer for" class="form-control required regcom" >
                            <span class="glyphicon  form-control-feedback"></span>
                          </div>
				  </div>
            </div>
            <!-- /.box -->
         </div>
		   <div class="col-md-12">
			  <div class="form-group has-feedback">                                       
					<input type="button" class="btn btn-primary" value="Submit"   id="offersedit1">
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
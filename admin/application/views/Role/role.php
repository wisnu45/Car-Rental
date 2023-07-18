<?php $id = $this->session->userdata('id');  
$admin_id = get_role_id('Admin')->id;
$manager_id = get_role_id('Manager')->id;
?>
<?php if(!isset($_GET['role'])){ 
redirect('error_404');
 } ?>
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1 class="add_promocode">
           Role Capabilties
          </h1>
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>Welcome/"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo base_url();?>Role/role">Role</a></li>
            <li class="active">Add Role Capabilties</li>
          </ol>
        </section>
        <!-- Main content -->
		<div class="col-lg-12">
			<div class="box-header with-border">
				<h3 class="box-title"></h3>
				<div class="result-role"></div>
				<div class="adminuser1"></div>
				<!-- /.box-header -->
				<!-- form start -->
				<form method="post" class="form parsley-form col-sm-12" data-validate="parsley">
					<input type="hidden" id="conceiveID" name="created_by" value="<?php echo $id; ?>">						
					<div style="width:100%; float:left; clear:both; margin-bottom:25px">
						<div class="pull-left">
							<div class="btn-group" style="clear:both">
								<input type="hidden" value="<?php if(isset($_GET['role'])){ echo $_GET['role'];} ?>" id="get_role_id"/>
									<?php
								
										foreach($roles as $role)
										{

									 ?> 
										  <div class="hiderole" ><button class="btn btn-default <?php if(isset($_GET['role'])) { if($_GET['role']== $role->id) { echo "active";}} ?>" type="hidden" style="text-transform:capitalize" onClick="location.href='<?php echo base_url();?>Role/role_management?role=<?php echo  $role->id;?>'"><?php echo $role->rolename;echo $role->first_name;?></button></div>
									 <?php
									}
									   ?> 
								</div>
						</div>
						<?php
							if(!isset($_GET['role']) || ($_GET['role']== "1") ) {
						 ?>
							<div class="col-sm-12">
								<div class="jumbotron admin-page role_style">
									<p> All page are accessible </p>
									 <?php
										$d = $_GET['role'];
										$role_id= $this->db->query("select * from admin_role_permission where role_id ='$d' ");
										$r=$role_id->result();
										if($r) {
											foreach($role_id->result_array() as $result){
											$str = rtrim($result['page_id'],',');
											$p = explode(',', $str);
									 ?>
									<div class="col-sm-12 role_dropbox">
									   <div class="col-sm-4">
										 <label>Staff Managment</label>
										 <div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("57", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="57"> View Staff Details/Edit</label></div>
										 <div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("55", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="55"> Add Staff</label></div>
									
										 <label>Dealer Managment</label>
										  <div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("17", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="17,18,19">  View Dealer/Edit Dealer</label></div>
										  <div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("16", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="16"> Add Dealer</label></div>
										  <div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("41", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled"value="41,42,43,44"> View/Add/Edit Package Details</label></div>

																			
										  <label>User Managment</label>
										  <div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("45", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="45,46,47,48"> View/Add/Edit Renter</label></div>
										  <div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("62", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="62,63"> View/Add Renter Licence Package</label></div>
										  <div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("60", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="60,61"> View/Add Renter Cojockeys Package</label></div>
									 
										  <label>Showroom Managment</label>
										  <div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("51", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="52,53,54"> View Showroom</label></div>
										  <div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("53", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="51"> Add Showroom</label></div>
									  
										  <label>Car Directory Management</label>
										  <div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("6", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="3,4,7"> View Car Directory/Edit</label></div>
										  <div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("3", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="3"> Add  Car Directory</label></div>
										  <div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("5", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="5,8"> Add  Car Gallery/View</label></div>
										  
										  <label>System Configuration</label>
										   <div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("50", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="50"> Add  System Configuration</label></div>
										
										   <label>Role Management</label>
										   <div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("58", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="58"> Add Role Permission</label></div>

									  </div> 
									<div class="col-sm-4">

											<label>Manage Offers</label>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("21", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="21,22"> View Coupons Details/Edit</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("20", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="20"> Add Coupons</label></div>
											
											<label>Manage Deal</label>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("68", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="67,68,69"> View Deal/Edit</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("66", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="66"> Add Deal Details</label></div>
											
											<label>Manage Tariff </label>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("82", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="82"> Add Tariff</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("84", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="83,84"> View/Edit Tariff </label></div>
											
											<label>Manage Commute</label>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("87", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="87"> Add Commute</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("89", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="88,89"> View/Edit Commute  </label></div>
										  
											<label>Manage Language Transaltion</label>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("92", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="72,91,92"> View/Add Home Language/Edit</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("90", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="93,94">View/Add Login Language/Edit</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("120", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="120,121,122">View/Add Tariff Language/Edit</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("102", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="100,101,102">View/Add Commute Language/Edit</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("110", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="108,109,110">View/Add Deal Language/Edit</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("119", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="117,118,119">View/Add Offer Language/Edit</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("99", $p)) { echo "checked";} ?> type="checkbox"  disabled="disabled" value="97,98,99">View/Add Chronology Language/Edit</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("105", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="103,104,105">View/Add CoupeBooking Language/Edit</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("127", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="125,126,127">View/Add Renter Language/Edit</label></div>


										</div> 
										<div class="col-sm-4">
											<label>Manage Car Booking</label>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("74", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="73,74,75"> View Booking Details/Edit</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("72", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="72"> Book a CityRide</label></div>
											
											<label>FAQ Managment</label>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("25", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="25"> View FAQ Details</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("23", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled" value="23"> Add FAQ </label></div>

										
										</div> 
										<div class="col-sm-4">

											<label>Additional Features</label>

											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("35", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled"value="35,36"> View Add/Edit Model/</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("33", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled"value="33,34"> View/Add/Edit Make</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("14", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled"value="14,15"> View/Add/Edit Color</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("26", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled"value="26,27"> View/Add/Edit Feature</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("28", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled"value="28,29"> View/Add/Edit Feul Type</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("31", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled"value="31,32"> View/Add/Edit Insurence</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("9", $p))  { echo "checked";} ?> type="checkbox" disabled="disabled"value="9,10">  View/Add/Edit Category</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("65", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled"value="64,65"> View/Add/Edit Popular Location</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("70", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled"value="70,71"> View/Add/Edit Role</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("75", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled"value="75,76"> View/Add/Edit Popular Place</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("78", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled"value="78,79"> View/Add/Edit Duration</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("39", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled"value="38,39"> View/Add/Edit Dealers Pacakge</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("80", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled"value="80,81"> View/Add/Edit Tariff Pacakge</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("85", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled"value="85,86"> View/Add/Edit Commute Pacakge</label></div>
											<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("123", $p)) { echo "checked";} ?> type="checkbox" disabled="disabled"value="123,124"> View/Add/Edit Car Offer Pacakge</label></div>
										</div> 
									</div> <?php } } ?>
								</div>
							</div>
							<?php
							 }else {
							$d = $_GET['role'];
							$check_role = $this->db->query("select * from admin where id ='$d' ");
							$role_docket = $check_role->row();
							if(!$role_docket) {
								$this->load->view('error_trans');
							}else{
							$role_id= $this->db->query("select * from admin_role_permission where role_id ='$d' ");
							$r=$role_id->result();
							if($r) {
								foreach($role_id->result_array() as $result){
									$str = rtrim($result['page_id'],',');
									$p = explode(',', $str);
							?>
							<div class="col-sm-12 admin-roleman role_dropbox">
								<!--<label>Default</label>-->
								<!--<div class="checkbox"><label><input  class="role_checkbox" type="checkbox" checked disabled value="1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21">Basic User Needs</label></div>-->
								<div class="col-sm-4">
								<?php if($result['role_id'] == $admin_id || $result['role_id'] == $manager_id ) {?>
									<label><br>Staff Managment</label>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("56", $p)) { echo "checked";} ?> type="checkbox" value="57"> View Staff Details/Edit</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("55", $p)) { echo "checked";} ?> type="checkbox" value="55"> Add Staff</label></div>
								<?php }
									else{ ?>
									<label><br>Staff Managment</label>
									<div class="checkbox"><label><input class="role_checkbox"  disabled="disabled" type="checkbox" value="57"> View Staff Details/Edit</label></div>
									<div class="checkbox"><label><input class="role_checkbox"  disabled="disabled" type="checkbox" value="55"> Add Staff</label></div>
									 <?php } ?>
									<label>Dealer Managemnt</label>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("16", $p)) { echo "checked";} ?> type="checkbox" value="17,18,19">  View Dealer/Edit Dealer</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("17", $p)) { echo "checked";} ?> type="checkbox" value="16"> Add Dealer</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("41", $p)) { echo "checked";} ?> type="checkbox" value="41,42,43,44"> View/Add/Edit Dealer Package</label></div>
									<label>User Management</label>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("45", $p)) { echo "checked";} ?> type="checkbox" value="45,46,47,48"> View/Add/Renter/Edit</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("62", $p)) { echo "checked";} ?> type="checkbox" value="62,63"> Add /Edit Renter License</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("60", $p)) { echo "checked";} ?> type="checkbox" value="60,61"> Add /Edit Renter Co-Jockeys</label></div>
									
									<label>Showroom Managment</label>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("51", $p)) { echo "checked";} ?> type="checkbox" value="52,53,54"> View Showroom</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("53", $p)) { echo "checked";} ?> type="checkbox" value="51"> Add Showroom</label></div>
									
									<label>Car Directory</label>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("3", $p)) { echo "checked";} ?> type="checkbox" value="3,4,7"> View Car Directory/Edit</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("6", $p)) { echo "checked";} ?> type="checkbox" value="3"> Add  Car Directory</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("5", $p)) { echo "checked";} ?> type="checkbox" value="5,8"> Add  Car Gallery/View</label></div>
								</div>
								<div class="col-sm-4">
									
									<label><br>Manage Offers</label>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("21", $p)) { echo "checked";} ?> type="checkbox" value="21,22"> View Coupons Details/Edit</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("20", $p)) { echo "checked";} ?> type="checkbox" value="20"> Add Coupons</label></div>
																	
									<label>Deal Management</label>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("68", $p)) { echo "checked";} ?> type="checkbox" value="67,68,69"> View/Edit Deal</label></div> 
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("66", $p)) { echo "checked";} ?> type="checkbox" value="66"> Add Deal</label></div> 
								
									<label>Manage Tariff </label>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("82", $p)) { echo "checked";} ?> type="checkbox"  value="82"> Add Tariff</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("84", $p)) { echo "checked";} ?> type="checkbox"  value=",83,84"> View/Edit Tariff </label></div>
													
									<label>Manage Commute</label>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("85", $p)) { echo "checked";} ?> type="checkbox"  value="85,86"> Add Commute</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("89", $p)) { echo "checked";} ?> type="checkbox"  value="87,88,89"> View/Add/Edit Commute  </label></div>
									
									<label>Manage Car Booking</label>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("74", $p)) { echo "checked";} ?> type="checkbox" value="73,74,75"> View Booking/Edit</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("72", $p)) { echo "checked";} ?> type="checkbox" value="72"> Book a CityRide</label></div>

									<label>FAQ Managment</label>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("24", $p)) { echo "checked";} ?> type="checkbox" value="10"> View FAQ Details</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("23", $p)) { echo "checked";} ?> type="checkbox" value="58"> Add FAQ </label></div>
									
									<label>System Configuration</label>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("50", $p)) { echo "checked";} ?> type="checkbox" value="50"> Add  System Configuration</label></div> 
								</div>
								<div class="col-sm-4">
									<label><br>Manage Language Transaltion</label>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("92", $p)) { echo "checked";} ?>  type="checkbox" value="72,91,92"> View/Add Home Language/Edit</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("90", $p)) { echo "checked";} ?>  type="checkbox" value="93,94">View/Add Login Language/Edit</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("122", $p)) { echo "checked";} ?> type="checkbox" value="120,121,122">View/Add Tariff Language/Edit</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("102", $p)) { echo "checked";} ?> type="checkbox" value="100,101,102">View/Add Commute Language/Edit</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("110", $p)) { echo "checked";} ?> type="checkbox" value="108,109,110">View/Add Deal Language/Edit</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("119", $p)) { echo "checked";} ?> type="checkbox" value="117,118,119">View/Add Offer Language/Edit</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("99", $p)) { echo "checked";} ?>  type="checkbox" value="97,98,99">View/Add Chronology Language/Edit</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("105", $p)) { echo "checked";} ?> type="checkbox" value="103,104,105">View/Add CoupeBooking Language/Edit</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("127", $p)) { echo "checked";} ?> type="checkbox" value="125,126,127">View/Add Renter Language/Edit</label></div>

									<label>Additional Features</label>

									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("35", $p)) { echo "checked";} ?> type="checkbox" value="35,36"> View/Add/Edit Model</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("33", $p)) { echo "checked";} ?> type="checkbox" value="33,34"> View/Add/Edit Make</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("14", $p)) { echo "checked";} ?> type="checkbox" value="14,15"> View/Add/Edit Color</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("26", $p)) { echo "checked";} ?> type="checkbox" value="26,27"> View/Add/Edit Feature</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("28", $p)) { echo "checked";} ?> type="checkbox" value="28,29"> View/Add/Edit Feul Type</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("31", $p)) { echo "checked";} ?> type="checkbox" value="31,32"> View/Add/Edit Insurence</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("9", $p))  { echo "checked";} ?> type="checkbox" value="9,10">  View/Add/Edit Category</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("65", $p)) { echo "checked";} ?> type="checkbox" value="64,65"> View/Add/Edit Popular Location</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("70", $p)) { echo "checked";} ?> type="checkbox" value="70,71"> View/Add/Edit Role</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("75", $p)) { echo "checked";} ?> type="checkbox" value="75,76"> View/Add/Edit Popular Place</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("78", $p)) { echo "checked";} ?> type="checkbox" value="78,79"> View/Add/Edit Duration</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("39", $p)) { echo "checked";} ?> type="checkbox" value="38,39"> View/Add/Edit Dealers Pacakge</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("80", $p)) { echo "checked";} ?> type="checkbox" value="80,81"> View/Add/Edit Tariff Pacakge</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("85", $p)) { echo "checked";} ?> type="checkbox" value="85,86"> View/Add/Edit Commute Pacakge</label></div>
									<div class="checkbox"><label><input class="role_checkbox" <?php if(in_array("123", $p)) { echo "checked";} ?>type="checkbox"value="123,124"> View/Add/Edit Car Offer Pacakge</label></div>
								

								</div>
								<div class="col-sm-12">
									<input type="hidden" name="role_permission" class="role_permission1" id="role_permission" value="<?php echo $result['page_id']; ?>"/>
									<input class="btn btn-primary btn-secondary role-sub role_submit"  type="button" name="role" id="submit" value="Submit"/>
								</div>
							</div>
						</div>
						<?php
							}
						} else {
						?>
						<div class="col-sm-12 role_dropbox">
						<!--<label>Default</label>-->
					  <!--  <div class="checkbox"><label><input  class="role_checkbox" type="checkbox" checked disabled value="1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21">Basic User Needs</label></div>-->
							<div class="col-sm-4">
								<label><br>Dealer Managment</label>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="17,18,19">View Dealer/Edit Dealer </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="16">Add Dealer  </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="41,42,43,44"> View Package Details/Edit</label></div>
							</div> 
							<div class="col-sm-4">
								<label><br>Showroom Managment</label>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="52,53,54">View Showroom/Edit Showroom </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="51">Add Showroom  </label></div>
							</div> 
							<div class="col-sm-4">
								<label><br>User Managment</label>
								<div class="checkbox"><label><input class="role_checkbox"  type="checkbox" value="45,46,47,48"> View/Add/Edit Renter</label></div>
								<div class="checkbox"><label><input class="role_checkbox"  type="checkbox" value="62,63"> Add /Edit Renter License</label></div>
								<div class="checkbox"><label><input class="role_checkbox"  type="checkbox" value="60,61"> Add /Edit Renter Co-Jockeys</label></div>
							</div> 
							<div class="col-sm-4">
								<label><br>FAQ Managment</label>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="24,25">View FAQ Details/Edit  </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="23">Add FAQ </label></div>
								<label><br>Manage Offers</label>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="21,22">View Coupons Details/Edit  </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="20">Add Coupons </label></div>
								<label><br>Manage Deal </label>
								<div class="checkbox"><label><input class="role_checkbox"type="checkbox" value="67,68,69">View Locations/Edit </label></div>
								<div class="checkbox"><label><input class="role_checkbox"type="checkbox" value="66">Add Locations  </label></div>
								<label><br>Manage Commute</label>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="85,86">View Commute/Add/Edit </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="87,88,89">View/Add/Edit Commute Package</label></div>
								<label><br>Manage Tariff</label>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="82">View Tariff/Add/Edit </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="83,84">View/Add/Edit Tariff Package</label></div>

							</div> 
							<div class="col-sm-4">

								<label><br>Staff Managment</label>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="56,57">View Staff Details/Edit  </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="55">Add Staff </label></div>
								<label><br>Car Directory Management</label>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="4,6,7">View Car Directory/Edit </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="3">Add Car Directory  </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="5,8">Add Car Gallery/View Car Gallery  </label></div>

								<label><br>Manage Language Translation</label>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="91,92">View Language/Edit </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="90">Add Language  </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox"  value="120,121,122">View/Add Tariff Language/Edit</label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox"  value="100,101,102">View/Add Commute Language/Edit</label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox"  value="108,109,110">View/Add Deal Language/Edit</label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox"  value="117,118,119">View/Add Offer Language/Edit</label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox"  value="97,98,99">View/Add Chronology Language/Edit</label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox"  value="103,104,105">View/Add CoupeBooking Language/Edit</label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox"  value="125,126,127">View/Add Renter Language/Edit</label></div>
								<label><br>System Configuration</label>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="50">Add System Configuration  </label></div>
							</div> 
							<div class="col-sm-4">


								
								<label><br>Manage Car booking</label>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="73,74,75">View Booking/Edit </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="72">Book a CityRide </label></div>
								<label><br>Additional Features</label>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="35,36"> View/Add/Edit Model </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="33,34"> View/Add/Edit Make </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="14,15"> View/Add/Edit Color </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="26,27"> View/Add/Edit Feature </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="28,29"> View/Add/Edit Feul Type </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="31,32"> View/Add/Edit Insurence </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="9,10">  View/Add/Edit Category </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="64,65"> View/Add/Edit Popular Place </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="70,71"> View/Add/Edit Role </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="75,76"> View/Add/Edit Popular Place </label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="78,79"> View/Add/Edit Duration</label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="38,39"> View/Add/Edit Dealers Pacakge</label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="80,81"> View/Add/Edit Tariff Pacakge</label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox" value="85,86"> View/Add/Edit Commute Pacakge</label></div>
								<div class="checkbox"><label><input class="role_checkbox" type="checkbox"value="123,124">View/Add/Edit Car Offer Pacakge</label></div>
							</div> 
					   </div> 
						<div class="col-sm-4">
							<div class="col-sm-12"><br>
								<div class="col-sm-4">
									<input type="hidden" name="role_permission" class="role_permission1" id="role_permissionc" value="59"/>
									<input class="btn  btn-primary  btn-secondary role-sub role_submit"  type="button" name="role" id="submit" value="Submit"/>
								</div>
							</div>
						</div>
						<?php 
							}
						}
					}
						?>
					</form>
				</div>  
	   </div>
</div><!-- /.content-wrapper -->
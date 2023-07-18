<?php 
$id = $this->session->userdata('logged_in')['id'];	  
$profile_picture = get_picture($id);
$settings = get_homesettings(); 
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar cusom_sidebar">
	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">
		<!-- Sidebar user panel -->
		<div class="user-panel">
			<div class="pull-left image">
				<?php if($profile_picture->profile_picture != NULL){ ?>
                  <img src="<?php echo base_url().$profile_picture->profile_picture; ?>" class="img-circle" alt="User Image">
				<?php }else{ ?>
					<img src="<?php echo base_url(); ?>assets/images/user_avatar.jpg" class="img-circle" alt="User Image">
				<?php } ?>				
            </div>
            <div class="pull-left info">
              <p><?php echo $profile_picture->first_name; ?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
		</div>
          <!-- search form -->
		<!-- <form method="post" class="sidebar-form">
			<div class="input-group">
				<input type="text" name="q" class="form-control" placeholder="Search...">
				<span class="input-group-btn">
					<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
				</span>
            </div>
		</form> -->
		<!-- /.search form -->
		<!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu">
		<?php
			$user2 = $this->session->userdata('permission');
		    $id = $user2;
		    $page_name = array();
		    $rows = $this->db->query(" SELECT * FROM `admin_role_permission` WHERE page_id='$id' ")->row();
			$page_name = explode(',', $user2);
		?>
		<li class="header">MAIN NAVIGATION</li>
			<li class="treeview">
				<a href="<?php echo base_url(); ?>welcome">
				<i class="fa fa-dashboard"></i>
				<span>Dashboard</span>
				</a>
			</li>
			<?php
			if( in_array('55',$page_name) || in_array('56',$page_name) || in_array('57',$page_name))
			{
			?>	
			<li class="treeview">
				<a href="#">
					<i class="fa fa-male"></i>
					<span>Staff Management</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>			  
				<ul class="treeview-menu">
					<?php if( in_array('55',$page_name) )
					{
					?>
						<li><a href="<?php echo base_url(); ?>Staff/add"><i class="fa fa-circle-o text-aqua"></i> Add Staff</a></li>
					<?php } 				
					if( in_array('56',$page_name) || in_array('57',$page_name))
					{
					?>
						<li><a href="<?php echo base_url(); ?>Staff/view"><i class="fa fa-circle-o text-aqua"></i> View Staff</a></li>
				</ul>
			</li> 
			<?php } } ?>
			<?php
			if( in_array('16',$page_name) || in_array('18',$page_name) || in_array('19',$page_name) ||in_array('41',$page_name) || 
				in_array('42',$page_name) || in_array('43',$page_name) || in_array('44',$page_name))
			{
			?>
			<li class="treeview">
				<a href="#">
					<i class="fa  fa-mars-stroke"></i>
					<span>Dealer Management</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>			  
				<ul class="treeview-menu">
					<?php if( in_array('16',$page_name) )
					{
					?>
						<li><a href="<?php echo base_url(); ?>Dealer/add"><i class="fa fa-circle-o text-aqua"></i> Add Dealer</a></li>
					<?php } 				
					if( in_array('18',$page_name) || in_array('17',$page_name) || in_array('19',$page_name))
					{
					?>
						<li><a href="<?php echo base_url(); ?>Dealer/view"><i class="fa fa-circle-o text-aqua"></i> View Dealer</a></li>
					<?php } 
					if( in_array('41',$page_name) ||in_array('42',$page_name) || in_array('43',$page_name) || in_array('44',$page_name) )
					{
					?>
						<li><a href="<?php echo base_url(); ?>Payment/add"><i class="fa fa-circle-o text-aqua"></i> Add Dealer Package</a></li>     						
				  <?php  } }?>			
				</ul>
			</li>  
			<?php
			if( in_array('45',$page_name) || in_array('47',$page_name) || in_array('46',$page_name) || in_array('48',$page_name))
			{
			?>
			<li class="treeview">
				<a href="#">
					<i class="fa  fa-users"></i>
					<span>User Management</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>			  
				<ul class="treeview-menu">
					<?php if( in_array('45',$page_name) )
					{
					?>
						<li><a href="<?php echo base_url(); ?>Renter/add"><i class="fa fa-circle-o text-aqua"></i> Add Rentee</a></li>
					<?php } 
					if( in_array('47',$page_name) || in_array('46',$page_name) || in_array('48',$page_name))
					{
						?>
						<li><a href="<?php echo base_url(); ?>Renter/view"><i class="fa fa-circle-o text-aqua"></i> View Rentee</a></li>
					<?php } 			  
					if( in_array('62',$page_name) || in_array('63',$page_name))
					{
					?>
						<li><a href="<?php echo base_url(); ?>Renter/license"><i class="fa fa-circle-o text-aqua"></i> Add Rentee Licence</a></li>
					<?php }
					if( in_array('60',$page_name) || in_array('61',$page_name))
					{
					?>
						<li><a href="<?php echo base_url(); ?>Renter/co_jockeys"><i class="fa fa-circle-o text-aqua"></i> Add Rentee Co-Jockeys</a></li>
					<?php } ?>
				  </ul>
			</li>
			<?php } ?>
			<?php
			if( in_array('51',$page_name) || in_array('52',$page_name) || in_array('53',$page_name) || in_array('54',$page_name))
			{
			?>		
			<li class="treeview">
				<a href="#">
					<i class="fa fa-building-o"></i>
					<span>Showroom Management</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>			  
				<ul class="treeview-menu">
					<?php if( in_array('51',$page_name) )
					{
					?>
						<li><a href="<?php echo base_url(); ?>Showroom/add"><i class="fa fa-circle-o text-aqua"></i> Add Showroom</a></li>
					<?php } 				
					if( in_array('52',$page_name) || in_array('53',$page_name) || in_array('54',$page_name))
					{
						?>
						<li><a href="<?php echo base_url(); ?>Showroom/view"><i class="fa fa-circle-o text-aqua"></i> View Showroom</a></li>
				</ul>
			</li>
			<?php } } ?>	
			<?php			
			 if( in_array('3',$page_name) || in_array('4',$page_name) || in_array('7',$page_name) || in_array('6',$page_name)|| in_array('5',$page_name)|| in_array('8',$page_name))
			{
			?>			
			<li class="treeview">
				<a href="#">
					<i class="fa fa-automobile"></i>
					<span>Car Directory Managment</span>
					<i class="fa fa-angle-left pull-right"></i>
				</a>			  
				<ul class="treeview-menu">
					<?php if( in_array('3',$page_name) )
					{
					?>
						<li><a href="<?php echo base_url(); ?>Cardirectory/add"><i class="fa fa-circle-o text-aqua"></i> Add Car</a></li>
					 <?php } 				
					if( in_array('4',$page_name) || in_array('6',$page_name) || in_array('7',$page_name))
					{
						?>
						<li><a href="<?php echo base_url(); ?>Cardirectory/view"><i class="fa fa-circle-o text-aqua"></i> View Car</a></li>
					 <?php } 				
					if( in_array('5',$page_name) || in_array('8',$page_name))
					{
						?>
						<li><a href="<?php echo base_url(); ?>Cardirectory/gallery"><i class="fa fa-circle-o text-aqua"></i>Add Car Gallery</a></li>
				</ul>
			</li>
			<?php } } ?>
			
				<?php
			    if( in_array('80',$page_name) || in_array('81',$page_name) || in_array('82',$page_name) || in_array('83',$page_name) || in_array('84',$page_name))
				{
			    ?>
				<li class="treeview">
					<a href="#">
						<i class="fa  fa-github-square"></i>
						<span>Manage Tarif </span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>			  
					<ul class="treeview-menu">
						<?php  if( in_array('82',$page_name))
						{
						?>
							<li><a href="<?php echo base_url(); ?>Tariff/addpackage"><i class="fa fa-circle-o text-aqua"></i> Add Tarrif </a></li>
						<?php }
						if( in_array('83',$page_name) || in_array('84',$page_name))
						{
						?>
							<li><a href="<?php echo base_url(); ?>Tariff/view"><i class="fa fa-circle-o text-aqua"></i> View Tarrif </a></li>              
						<?php } if( in_array('80',$page_name) || in_array('81',$page_name)){
						?>
							<li><a href="<?php echo base_url(); ?>Tariff/add"><i class="fa fa-circle-o text-aqua"></i> Add Tarrif Package</a></li>
						<?php } ?>
					
					
					</ul>
				</li> 
				<?php } ?>	
				
			<?php
			 if( in_array('72',$page_name) || in_array('73',$page_name) || in_array('74',$page_name)|| in_array('75',$page_name))
				 {
			  ?>
				<li class="treeview">
					<a href="#">
						<i class="fa  fa-cc-discover "></i>
						<span>Manage Car Booking</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>			  
					<ul class="treeview-menu">
						<?php if( in_array('72',$page_name) )
						{
						?>
							<li><a href="<?php echo base_url(); ?>Carpayments/add"><i class="fa fa-circle-o text-aqua"></i>Booking a City Ride</a></li>
						<?php } 				
						if( in_array('73',$page_name) || in_array('74',$page_name)|| in_array('75',$page_name))
						{
						?>
							<li><a href="<?php echo base_url(); ?>Carpayments/view"><i class="fa fa-circle-o text-aqua"></i>View Booking Details</a></li>
					</ul>
				</li>   
				<?php } } ?>
				 <?php
				 if( in_array('20',$page_name) || in_array('21',$page_name) || in_array('22',$page_name))
					 {
				 ?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-credit-card"></i>
						<span>Manage Offers</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>			  
					<ul class="treeview-menu">
						<?php if( in_array('20',$page_name) )
						{
						?>
							<li><a href="<?php echo base_url(); ?>Discount/add"><i class="fa fa-circle-o text-aqua"></i> Add Offers</a></li>
						<?php } 				
						if( in_array('21',$page_name) || in_array('22',$page_name))
						{
							?>
							<li><a href="<?php echo base_url(); ?>Discount/view"><i class="fa fa-circle-o text-aqua"></i>View Offers</a></li>
					</ul>
				</li>   
				<?php } } ?>
				<?php
				if( in_array('66',$page_name) || in_array('67',$page_name) || in_array('68',$page_name) || in_array('69',$page_name))
				{
				?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-cc-diners-club"></i>
						<span>Manage Deal</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>			  
					<ul class="treeview-menu">
						 <?php if( in_array('66',$page_name))
						  {
						 ?>
							<li><a href="<?php echo base_url(); ?>Deal/add"><i class="fa fa-circle-o text-aqua"></i> Add Deal</a></li>
						 <?php } 					
						   if( in_array('67',$page_name) || in_array('68',$page_name)|| in_array('69',$page_name))
						  {
						  ?>
							<li><a href="<?php echo base_url(); ?>Deal/view"><i class="fa fa-circle-o text-aqua"></i> View Deal</a></li>
					</ul>
				</li> 
				<?php } }?>	
 
				<?php
				if( in_array('85',$page_name) || in_array('86',$page_name) || in_array('87',$page_name)|| in_array('88',$page_name)|| in_array('89',$page_name))
				{
				?> 
				<li class="treeview">
					<a href="#">
						<i class="fa fa-tripadvisor"></i>
						<span>Manage Commute </span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>			  
					<ul class="treeview-menu">				
						<?php  if( in_array('87',$page_name))
						 {
						?>
							<li><a href="<?php echo base_url(); ?>Commute/addpackage"><i class="fa fa-circle-o text-aqua"></i> Add Commute </a></li>
						<?php }
						 if( in_array('88',$page_name) || in_array('89',$page_name))
						 {
						?>
							<li><a href="<?php echo base_url(); ?>Commute/view"><i class="fa fa-circle-o text-aqua"></i> View Commute </a></li>
						 <?php }if( in_array('85',$page_name)|| in_array('86',$page_name)){
						?>
							<li><a href="<?php echo base_url(); ?>Commute/add"><i class="fa fa-circle-o text-aqua"></i> Add Commute Package</a></li>
						<?php } ?>
					
					
					</ul>
				</li> 	
				<?php } ?>	
				<?php
				if( in_array('75',$page_name) || in_array('76',$page_name) || in_array('77',$page_name) || in_array('70',$page_name)|| in_array('71',$page_name)|| in_array('35',$page_name)|| in_array('36',$page_name)|| 
				in_array('33',$page_name)|| in_array('34',$page_name)|| in_array('9',$page_name)|| in_array('10',$page_name) || in_array('14',$page_name)|| in_array('15',$page_name) || in_array('26',$page_name) || in_array('27',$page_name)
				|| in_array('28',$page_name)|| in_array('29',$page_name)||in_array('31',$page_name)|| in_array('32',$page_name)|| in_array('64',$page_name)||in_array('65',$page_name)||in_array('78',$page_name)||in_array('79',$page_name)||
				in_array('38',$page_name)||in_array('39',$page_name)||in_array('40',$page_name)
				)
				{
				?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-globe"></i>
						<span>Additional Features</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>			  
					<ul class="treeview-menu">
						 <?php  
						 if( in_array('75',$page_name) || in_array('76',$page_name) || in_array('77',$page_name)){
						 ?>
							<li><a href="<?php echo base_url(); ?>Place/add"><i class="fa fa-circle-o text-aqua"></i>Add Locations</a></li>
						<?php }
						if( in_array('70',$page_name) || in_array('71',$page_name)){
						 ?>
							<li><a href="<?php echo base_url(); ?>Role/add"><i class="fa fa-circle-o text-aqua"></i> Add Role</a></li>
						<?php  
						}
						if( in_array('35',$page_name) || in_array('36',$page_name)){
						?>
							<li><a href="<?php echo base_url(); ?>Model/addmodel"><i class="fa fa-circle-o text-aqua"></i> Add Model</a></li>			
						<?php } 
						if( in_array('33',$page_name) || in_array('34',$page_name)){
						?>
							<li><a href="<?php echo base_url(); ?>Make/addmake"><i class="fa fa-circle-o text-aqua"></i> Add Make</a></li>				
						<?php } 
						if( in_array('9',$page_name) || in_array('10',$page_name)){
						?>
							<li><a href="<?php echo base_url(); ?>Category/add"><i class="fa fa-circle-o text-aqua"></i> Add Category</a></li>			     
						<?php } 				
						if( in_array('14',$page_name) || in_array('15',$page_name)){
						?>
							<li><a href="<?php echo base_url(); ?>Color/addcolor"><i class="fa fa-circle-o text-aqua"></i> Add color</a></li>			    
						<?php } 				
						if( in_array('26',$page_name) || in_array('27',$page_name)){
						?>
							<li><a href="<?php echo base_url(); ?>Feature/addfeature"><i class="fa fa-circle-o text-aqua"></i> Add Features</a></li>				
						<?php } 				
						if( in_array('28',$page_name) || in_array('29',$page_name)){
						?>
							<li><a href="<?php echo base_url(); ?>Fuel/add"><i class="fa fa-circle-o text-aqua"></i> Add Fuel Type</a></li>				
						<?php } 				
						if( in_array('31',$page_name) || in_array('32',$page_name)){
						?> 
							<li><a href="<?php echo base_url(); ?>Insurance/add"><i class="fa fa-circle-o text-aqua"></i> Add Insurance</a></li>
						<?php } 				
						if( in_array('64',$page_name) || in_array('65',$page_name)){
						?> 
							<li><a href="<?php echo base_url();?>Location/add"><i class="fa fa-circle-o text-aqua"></i>Add Popular Location  </a></li>
						<?php }			  
						if( in_array('78',$page_name) || in_array('79',$page_name)){
						?>
							<li><a href="<?php echo base_url();?>Duration/add"><i class="fa fa-circle-o text-aqua"></i>Add Duration  </a></li>
						<?php }
						if( in_array('38',$page_name) || in_array('39',$page_name) || in_array('40',$page_name)){
						?>
							<li><a href="<?php echo base_url(); ?>Package/view"><i class="fa fa-circle-o text-aqua"></i>Add  Package</a></li>
						<?php } ?>	


						<?php if( in_array('123',$page_name)|| in_array('124',$page_name)){
						?>
							<!--<li><a href="<?php echo base_url(); ?>Caroffer/add"><i class="fa fa-circle-o text-aqua"></i> Add Car Offer</a></li>-->
						<?php } ?>				  
					</ul>
				</li> 
				<?php } ?>	 
				<?php
				if( in_array('90',$page_name) || in_array('91',$page_name) || in_array('92',$page_name))
				{
				?>
				<li class="treeview">
					<a href="#">
						<i class="fa  fa-print"></i>
						<span>Language Translation</span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>			  
					<ul class="treeview-menu">    
						  <?php  
						   if( in_array('90',$page_name) || in_array('91',$page_name)|| in_array('92',$page_name)){
							?>
						  <li><a href="<?php echo base_url(); ?>Hometranslation/view_home"><i class="fa fa-circle-o text-aqua"></i> Home Page</a></li>
						  <?php } 
						  if( in_array('93',$page_name) || in_array('94',$page_name)|| in_array('95',$page_name)){
						  ?>
							<li><a href="<?php echo base_url(); ?>Logintranslation/view_login"><i class="fa fa-circle-o text-aqua"></i> Login Page</a></li>
						   <?php }          
						  if( in_array('120',$page_name) || in_array('121',$page_name)|| in_array('122',$page_name)){
						   ?>
							<li><a href="<?php echo base_url(); ?>Tarifftranslation/view_tariff"><i class="fa fa-circle-o text-aqua"></i> Tariff Page</a></li>
						  <?php }          
						  if( in_array('100',$page_name) || in_array('101',$page_name)|| in_array('102',$page_name)) {
						   ?>
						   <li><a href="<?php echo base_url(); ?>Commutetranslation/view_commute"><i class="fa fa-circle-o text-aqua"></i> Commute Page</a></li>
						   <?php }
						   if( in_array('108',$page_name) || in_array('109',$page_name)|| in_array('110',$page_name)) {
						   ?>
						  <li><a href="<?php echo base_url(); ?>Dealtranslation/view_deal"><i class="fa fa-circle-o text-aqua"></i> Deal Page</a></li>
						  <?php }
						   if( in_array('117',$page_name) || in_array('118',$page_name)|| in_array('119',$page_name)) {
						   ?>
						  <li><a href="<?php echo base_url(); ?>Offerstranslation/view_offer"><i class="fa fa-circle-o text-aqua"></i> Offer Page</a></li>
						 <?php }
						   if( in_array('97',$page_name) || in_array('98',$page_name) || in_array('99',$page_name)) {
						   ?>
						  <li><a href="<?php echo base_url(); ?>Chronologypopuptranslation/view_chronologypopup"><i class="fa fa-circle-o text-aqua"></i> Chronology Page</a></li>
						 <?php }
						   if( in_array('103',$page_name) || in_array('104',$page_name)|| in_array('105',$page_name)) {
						   ?>
						  <li><a href="<?php echo base_url(); ?>Coupebookingtranslation/view_coupebooking"><i class="fa fa-circle-o text-aqua"></i> CoupeBooking Page</a></li>
						   <?php }
						   if( in_array('125',$page_name) || in_array('126',$page_name)|| in_array('127',$page_name)) {
						   ?>
						  <li><a href="<?php echo base_url(); ?>Rentertranslation/view_renter"><i class="fa fa-circle-o text-aqua"></i> Renter Page</a></li>
					</ul>
				</li> 
				<?php } }?>	 
				<?php  
				if( in_array('23',$page_name) || in_array('24',$page_name) || in_array('25',$page_name))
				{
				?>
				<li class="treeview">
					<a href="#">
						<i class="fa fa-question"></i>
						<span>FAQ </span>
						<i class="fa fa-angle-left pull-right"></i>
					</a>			  
					<ul class="treeview-menu">
						<?php if( in_array('23',$page_name) ){
						 ?>
							<li><a href="<?php echo base_url(); ?>FAQ/add"><i class="fa fa-circle-o text-aqua"></i> Add FAQ</a></li>
					    <?php } 				
						if( in_array('24',$page_name) || in_array('25',$page_name)) {
						?>
							<li><a href="<?php echo base_url(); ?>FAQ/view"><i class="fa fa-circle-o text-aqua"></i> View FAQ</a></li>
					</ul>
				</li> 
				<?php } }  ?>
			<?php			
			if( in_array('58',$page_name) || in_array('96',$page_name))
			{
			?>
				<li>
					<a href="<?php echo base_url();?>Role/role"><i class="fa fa-user"></i><span>Role Management</span><span class="fa fa-angle-left pull-right"></span></a>
				</li>
			<?php } ?>	  			  
			<?php  
			if( in_array('50',$page_name) ){		
			?>
				<li>
					 <a href="<?php echo base_url(); ?>Settings_ctrl/view_settings"><i class="fa fa-wrench" aria-hidden="true"></i><span>System Configuration</span></a>
				</li>
			<?php  }?>			  
		</ul>
	</section>
        <!-- /.sidebar -->
</aside>
 <?php
	$id = $this->session->userdata('logged_in')['id'];	  
	$profile_picture = get_picture($id);
	$settings = get_homesettings(); ?>
    <header class="main-header custom_head">
        <!-- Logo -->
	<a href="<?php echo base_url(); ?>Welcome" class="logo" >        
     <!-- logo for regular state and mobile devices -->
		<span class="logo-lg"><img src="<?php echo base_url();?><?php echo $settings->logo; ?>" </span>
    </a>
        <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
       <!-- Sidebar toggle button-->
		<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">                      </a>
        <div class="navbar-custom-menu">
			<ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
				<li class="dropdown user user-menu">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
					<?php if($profile_picture->profile_picture != NULL){ ?>
					  <img src="<?php echo base_url().$profile_picture->profile_picture; ?>" class="user-image" alt="User Image">
					<?php }else{ ?>
					  <img src="<?php echo base_url(); ?>assets/images/user_avatar.jpg" class="user-image" alt="User Image">
					<?php } ?>
					  <span class="hidden-xs"><?php echo $profile_picture->first_name; ?></span>
					</a>
					<ul class="dropdown-menu">
					  <!-- User image -->
						<li class="user-header">
						  <?php if($profile_picture->profile_picture != NULL){ ?>
							<img src="<?php echo base_url().$profile_picture->profile_picture; ?>" class="img-circle" alt="User Image">                    
						  <?php }else{ ?>
							<img src="<?php echo base_url(); ?>assets/images/user_avatar.jpg" class="img-circle" alt="User Image">                    
						  <?php } ?>
						</li>
					  <!-- Menu Body -->
					  <!-- Menu Footer-->
					  <li class="user-footer">
						  <div class="pull-left">
							  <a href="<?php echo base_url(); ?>Welcome/admin" class="btn btn-default btn-flat">Profile</a>
						  </div>
						   <div class="pull-right">
							  <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat">Sign out</a>
						   </div>
					  </li>
					</ul>
				</li>
            </ul>
          </div>
	</nav>
</header>
<style>
.logo-lg img{
	width: 50% !important;
}
</style>
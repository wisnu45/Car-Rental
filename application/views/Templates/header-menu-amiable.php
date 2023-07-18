<?php $location = $this->session->userdata('location'); ?>
<!--navbar-inner-->
<div class="container-fluid">
    <div class="nav-inner-sub">
        <div class="container">
            <div class="col-lg-12">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                    <select class="selectpicker SelectUniversallocation" data-style="btn-info">
						<?php if(!isset($location) && empty($location)): ?>
								<option ><?php echo "Select City"; ?></option>
							<?php foreach($selectlocations as $single_loc): ?>								
								<option   value="<?php echo $single_loc->id; ?>" data-loc="<?php echo $single_loc->name; ?>"><?php echo $single_loc->name; ?></option>
							<?php endforeach; ?>
						<?php else:?>
							<?php foreach($selectlocations as $single_loc): ?>
								<option  value="<?php echo $single_loc->id; ?>" <?php if($single_loc->id == $location):?> Selected <?php endif;?> data-loc="<?php echo $single_loc->name; ?>"><?php echo $single_loc->name; ?></option>
							<?php endforeach; ?>
						<?php endif;?>
                    </select>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-8">
                    <ul>
                        <!-- <li><a href="javascript:void(0);"><img src="<?php echo base_url(); ?>assets/img/tariff/1.png" /> </a></li> -->
                        <!-- <li><a href="javascript:void(0);"><img src="<?php echo base_url(); ?>assets/img/tariff/2.png" /></a> </li>                        -->
                        <li><a href="<?php echo base_url(); ?>Offers"><img src="<?php echo base_url(); ?>assets/img/tariff/4.png" /> <span><?php if($this->lang->line('home_slide_A8')): ?><?php echo $this->lang->line('home_slide_A8'); else: ?>OFFERS<?php endif; ?></span></a> </li>
				<?php if($this->session->userdata('frontend_logged_in')): ?>
					<?php if(!empty($this->session->userdata('frontend_logged_in')['profile_picture'])): ?>	
						<li class="image-login-rentee-right" ><img src="<?php echo base_url(); ?>admin/<?php echo $this->session->userdata('frontend_logged_in')['profile_picture'] ?> " ></li>
					<?php else: ?> 
						<li class="image-login-rentee-right" ><img src="<?php echo base_url(); ?>assets/img/caution/rentee.jpg" ></li>
					<?php endif; ?>
					<?php if(!empty($this->session->userdata('frontend_logged_in')['rentee'])): ?>
						<li><a href="<?php echo base_url(); ?>User" class="login-rentee-cityride" ><?php echo $this->session->userdata('frontend_logged_in')['rentee']; ?></a></li> 
					<?php else: ?> 
						<li><a href="<?php echo base_url(); ?>User"  class="login-rentee-cityride" ><?php if($this->lang->line('login_slide_User')): ?><?php echo $this->lang->line('login_slide_User'); else: ?>User<?php endif; ?></a></li>
					<?php endif; ?>
					<li><a href="<?php echo base_url(); ?>Logout"  class="login-rentee-cityride" ><?php if($this->lang->line('login_slide_Logout')): ?><?php echo $this->lang->line('login_slide_Logout'); else: ?>Logout<?php endif; ?></a></li>
				<?php else: ?>
                        <!-- <li><a href="javascript:void(0);"  data-toggle="modal" class="login-signup-cityride" data-target="#myModallogin"><img src="<?php echo base_url(); ?>assets/img/tariff/5.png" /> <span><?php if($this->lang->line('signup')): ?><?php echo $this->lang->line('signup'); ?><?php else: ?><?php if($this->lang->line('signup')): ?><?php echo $this->lang->line('signup'); ?><?php else: ?>Sign up<?php endif; ?><?php endif; ?></span></a> </li> -->
                        <li><a href="javascript:void(0);" data-toggle="modal" class="login-signin-cityride" data-target="#myModallogin"><img src="<?php echo base_url(); ?>assets/img/tariff/6.png" /> <span><?php if($this->lang->line('login')): ?><?php echo $this->lang->line('login'); ?><?php else: ?><?php if($this->lang->line('login')): ?><?php echo $this->lang->line('login'); ?><?php else: ?>Login<?php endif; ?><?php endif; ?></span></a> </li>
				<?php endif; ?>		
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--navbar-inner-->
<!--head-inner-->
<div class="container-fluid">
    <div class="head-inner" style="background: #111119">
        <div class="container">
            <div class="col-lg-12">
                <div class="col-lg-4">
                    <a href="<?php echo base_url(); ?>" class="logo-img-inner"><img src="<?php echo base_url(); ?>assets/img/home/logo1.png" /> </a>
                </div>
                <div class="col-lg-4">
                    <ul class="hd-inner-ul-1">
                        <li class="tooltipimage" ><a href="javascript:void(0);"><img src="<?php echo base_url(); ?>assets/img/tariff/8.png" /> </a> <span class="tooltiptext">Search</span></li>
                        <li class="tooltipimage"><a href="<?php echo base_url(); ?>deal"><img src="<?php echo base_url(); ?>assets/img/tariff/9.png" /> </a><span class="tooltiptext">Deal</span></li>
                        <li class="tooltipimage"><a href="<?php echo base_url(); ?>commute"><img src="<?php echo base_url(); ?>assets/img/tariff/10.png" /> </a><span class="tooltiptext">Commute</span></li>
                        <li class="tooltipimage"><a href="<?php echo base_url(); ?>tariff"><img src="<?php echo base_url(); ?>assets/img/tariff/11.png" /> </a><span class="tooltiptext">Tariff</span></li>
                    </ul>
                </div>                
            </div>
        </div>
    </div>
</div>
<!--head-inner-->
<!--pop-up-section-->
<!-- Modal -->
	<div id="myModallogin" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<!-- Modal content-->
			<div class="modal-content">
				<button type="button" class="close close-login" data-dismiss="modal">&times;</button>
				<div class="col-lg-12">
					<div class="col-lg-6">
						<div class="left-popup-login">
							<a href=""><img src="<?php echo base_url(); ?>assets/img/home/logo1.png" class="img-lgj"/> </a>
							<h3><?php if($this->lang->line('login_slide_N')): ?><?php echo $this->lang->line('login_slide_N'); else: ?>Let's go for a Ride<?php endif; ?></h3>
							<ul>
								<li><span><?php if($this->lang->line('login_slide_O')): ?><?php echo $this->lang->line('login_slide_O'); else: ?>Rent a car starting at just Rupees 25/hr<?php endif; ?></span></li>
							   <li><span><?php if($this->lang->line('login_slide_P')): ?><?php echo $this->lang->line('login_slide_P'); else: ?>Tariff includes fuel, taxes and insurance<?php endif; ?></span></li>
							   <li><span><?php if($this->lang->line('login_slide_Q')): ?><?php echo $this->lang->line('login_slide_Q'); else: ?>All cars equipped with All India Permits<?php endif; ?></span></li>
						   </ul>
					   </div>
					</div>
					<div class="col-lg-6">
						<div class="login-rght-inner">
							<div class="showmsg-popup"></div>
							<div class="first-rght-login">
								<ul class="nav nav-tabs nav-tab-sn-pop">
									<li class="inner-login-signup-cityride"><a data-toggle="tab" href="#signup"><?php if($this->lang->line('login_slide_A')): ?><?php echo $this->lang->line('login_slide_A'); else: ?>Sign up<?php endif; ?></a></li>
									<li class="inner-login-signin-cityride"><a data-toggle="tab" href="#login"><?php if($this->lang->line('login_slide_B')): ?><?php echo $this->lang->line('login_slide_B'); else: ?>Signin<?php endif; ?></a></li>
									<li class="inner-login-forgotpassword-cityride"><a data-toggle="tab" href="#forget"><?php if($this->lang->line('login_slide_C')): ?><?php echo $this->lang->line('login_slide_C'); else: ?>Forget Password<?php endif; ?></a></li>
								</ul>
							</div>
							<div class="clearfix"></div>
								<div class="tab-content">
									<div id="signup" class="tab-pane fade ">
										<form class="col-lg-12 form-class-pop" id="myForm-signup">
											<div class="signin-contents">
												<a href="javascript:void(0);" class="snup"><span><img src="<?php echo base_url(); ?>assets/img/login/1.png" /> </span><?php if($this->lang->line('login_slide_D')): ?><?php echo $this->lang->line('login_slide_D'); else: ?>Sign up with  facebook<?php endif; ?></a>
												<a href="javascript:void(0);" class="snup snup-1"><span><img src="<?php echo base_url(); ?>assets/img/login/2.png" /> </span><?php if($this->lang->line('login_slide_E')): ?><?php echo $this->lang->line('login_slide_E'); else: ?>Sign up with Google+<?php endif; ?></a>
											</div>										
											<input type="email" id="signup-email" class="form-control frm-jkl" placeholder="Email">
											<input type="password" id="signup-password" class="form-control frm-jkl" placeholder="Password">
											<div class="checkbox ck-center">
												<label><input type="checkbox" value="" class="remember-class"><?php if($this->lang->line('login_slide_J')): ?><?php echo $this->lang->line('login_slide_J'); else: ?>Remember me<?php endif; ?></label>
											</div>
											<button type="submit" class="but-pop-1 "><?php if($this->lang->line('login_slide_A')): ?><?php echo $this->lang->line('login_slide_A'); else: ?>Signup<?php endif; ?></button>
										</form>
									</div>
									<div id="login" class="tab-pane fade">
										<form class="col-lg-12 form-class-pop" id="myForm-signin">
											<div class="signin-contents">
												<a href="javascript:void(0);" class="snup"><span><img src="<?php echo base_url(); ?>assets/img/login/1.png" /> </span><?php if($this->lang->line('login_slide_L')): ?><?php echo $this->lang->line('login_slide_L'); else: ?>Sign in with  facebook<?php endif; ?></a>
												<a href="javascript:void(0);" class="snup snup-1"><span><img src="<?php echo base_url(); ?>assets/img/login/2.png" /> </span><?php if($this->lang->line('login_slide_M')): ?><?php echo $this->lang->line('login_slide_M'); else: ?>Sign in with Google+<?php endif; ?></a>
											</div>										
											<input type="email" id="signin-email" class="form-control frm-jkl" placeholder="Email">
											<input type="password" id="signin-password" class="form-control frm-jkl" placeholder="Password">
											<div class="checkbox ck-center">
												<label><input type="checkbox" value="" class="remember-class"><?php if($this->lang->line('login_slide_J')): ?><?php echo $this->lang->line('login_slide_J'); else: ?>Remember me<?php endif; ?></label>
											</div>
											<button type="submit" class="but-pop-1 "><?php if($this->lang->line('login_slide_B')): ?><?php echo $this->lang->line('login_slide_B'); else: ?>Signin<?php endif; ?></button>
										</form>
									</div>
									<div id="forget" class="tab-pane fade">
										<form class="col-lg-12 form-class-pop" id="myForm-forgotpassword">
											<input type="email" id="forgot-email" class="form-control frm-jkl" placeholder="Email">
											<button type="submit" class="but-pop-1 "><?php if($this->lang->line('login_slide_K')): ?><?php echo $this->lang->line('login_slide_K'); else: ?>Submit<?php endif; ?></button>
										</form>
									</div>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!--pop-up-section-->
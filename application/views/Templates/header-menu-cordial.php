<!--navbar-->
<div class="body-landing">
	<div class="container-fluid">
		<div class="nav-custom">
			<div class="container">
				<div class="col-lg-12">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
						<div class="logo">
							<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/img/home/logo1.png" alt="logo" /></a>
						</div>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-9">
						<nav class="navbar navbar-default">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<!-- <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4 for-lang-trans">							
									<select class="selectpicker" data-style="btn-info" onchange="javascript:window.location.href='<?php echo base_url(); ?>LanguageSwitcher/switchLang/'+this.value;">
										<option value="english" <?php if (!$this->session->userdata('site_lang')) : echo 'selected="selected"';
																endif; ?>>Default: English(IN)</option>
										<?php foreach ($trimmed_lang as $single_lang) : ?>
											<option value="<?php echo $single_lang; ?>" <?php if ($this->session->userdata('site_lang')) : ?><?php if ($single_lang == $this->session->userdata('site_lang')) : echo 'selected="selected"';
																																						endif; ?> <?php endif; ?>><?php echo $single_lang; ?></option>										
										<?php endforeach; ?>	
									</select>
								</div> -->
								<ul class="nav navbar-nav nav-ul-sub">
									<li><a href="<?php echo base_url(); ?>Tariff"><?php if ($this->lang->line('tarrif')) : ?><?php echo $this->lang->line('tarrif'); ?> <?php else : ?>Tariffs<?php endif; ?><span class="sr-only">(current)</span></a></li>
									<li><a href="<?php echo base_url(); ?>Commute"><?php if ($this->lang->line('home_slide_A6')) : ?><?php echo $this->lang->line('home_slide_A6'); ?> <?php else : ?>CITYRIDE COMMUTE<?php endif; ?><span class="sr-only">(current)</span></a></li>
									<li><a href="<?php echo base_url(); ?>Deal"><?php if ($this->lang->line('home_slide_A7')) : ?><?php echo $this->lang->line('home_slide_A7'); ?> <?php else : ?>DEAL SHACK<?php endif; ?><span class="sr-only">(current)</span></a></li>
									<li><a href="<?php echo base_url(); ?>Offers"><?php if ($this->lang->line('home_slide_A8')) : ?><?php echo $this->lang->line('home_slide_A8'); ?> <?php else : ?>OFFERS<?php endif; ?><span class="sr-only">(current)</span></a></li>
									
									<?php if ($this->session->userdata('frontend_logged_in')) : ?>
										<?php if (!empty($this->session->userdata('frontend_logged_in')['profile_picture'])) : ?>
											<li class="image-login-rentee"><img src="<?php echo base_url(); ?>admin/<?php echo $this->session->userdata('frontend_logged_in')['profile_picture'] ?> "></li>
										<?php else : ?>
											<li class="image-login-rentee"><img src="<?php echo base_url(); ?>assets/img/caution/rentee.jpg"></li>
										<?php endif; ?>
										<?php if (!empty($this->session->userdata('frontend_logged_in')['rentee'])) : ?>
											<li><a href="<?php echo base_url(); ?>User" class="login-rentee-cityride"><?php echo $this->session->userdata('frontend_logged_in')['rentee']; ?></a></li>
										<?php else : ?>
											<li><a href="<?php echo base_url(); ?>User" class="login-rentee-cityride"><?php if ($this->lang->line('login_slide_User')) : ?><?php echo $this->lang->line('login_slide_User');
																																													else : ?>User<?php endif; ?></a></li>
										<?php endif; ?>
										<li><a href="<?php echo base_url(); ?>Logout" class="login-rentee-cityride"><?php if ($this->lang->line('login_slide_Logout')) : ?><?php echo $this->lang->line('login_slide_Logout');
																																												else : ?>Logout<?php endif; ?></a></li>
									<?php else : ?>
										<li><a href="javascript:void(0);" data-toggle="modal" class="login-signup-cityride" data-target="#myModallogin"><span style="font-size: 2rem; color: white;">|</span></a></li>
										<li><a href="javascript:void(0);" data-toggle="modal" class="login-signin-cityride" data-target="#myModallogin"><?php if ($this->lang->line('login')) : ?><?php echo $this->lang->line('login'); ?><?php else : ?>Login<?php endif; ?></a></li>
										<li><a href="javascript:void(0);" data-toggle="modal" class="login-signup-cityride" data-target="#myModallogin"><span style="font-size: 2rem; color: white;"><i class="fa fa-user-o" data-unicode="f2c0"></i></span></a></li>
									<?php endif; ?>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</div>
		<div class="banner-landing">
			<div class="container">
				<div class="landing-content">
					<h1 class="animated fadeInDown"><?php if ($this->lang->line('home_slide_A1')) : ?><?php echo $this->lang->line('home_slide_A1');
																										else : ?>DRIVE IN THE CITY & <?php endif; ?></h1>
					<h2 class="animated fadeInDown"><?php if ($this->lang->line('home_slide_A2')) : ?><?php echo $this->lang->line('home_slide_A2');
																										else : ?>OUTSTATION<?php endif; ?></h2>

				</div>
			</div>
			<!-- <div class="zoom-pop-down-1">
				<div class="cit-main">
					<h4><?php if ($this->lang->line('home_slide_A4')) : ?><?php echo $this->lang->line('home_slide_A4');
																			else : ?>Rent a Self-Drive car in <?php endif; ?></h4>
					<h4 class="fix-locdrum"></h4>
					<h5><img src="<?php echo base_url(); ?>assets/img/home/6.png" /> </h5>
				</div>
				<div class="zoom-pop-down">
					<div class="container">
						<div class="city-sel">
							<h3><?php if ($this->lang->line('home_slide_A5')) : ?><?php echo $this->lang->line('home_slide_A5');
																					else : ?>SELECT YOUR CITY<?php endif; ?></h3>
							<div class="col-lg-12">
								<div class="bxslider">
									<?php foreach ($selectlocations as $location) { ?>
										<div class="col-lg-2 col-md-2 col-sm-2 col-xs-4">
											<div class="city-1">
												<div class="location-term" onclick="locationpuller(this)" data-locdrumname="<?php echo $location->name; ?>" data-locdrumid="<?php echo $location->id; ?>">
													<h4><img src="<?php echo base_url(); ?>admin/<?php echo $location->picture; ?>" /></h4>
													<h5><?php echo $location->name; ?></h5>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div> -->
		</div>
	</div>
</div>
<!--navbar-->
<!--pop-up-section-->
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
						<a href=""><img src="<?php echo base_url(); ?>assets/img/home/logo1.png" class="img-lgj" /> </a>
						<h3><?php if ($this->lang->line('login_slide_N')) : ?><?php echo $this->lang->line('login_slide_N');
																				else : ?>Let's go for a Ride<?php endif; ?></h3>
						<ul>
							<li><span><?php if ($this->lang->line('login_slide_O')) : ?><?php echo $this->lang->line('login_slide_O');
																						else : ?>Rent a car starting at just Rupees 25/hr<?php endif; ?></span></li>
							<li><span><?php if ($this->lang->line('login_slide_P')) : ?><?php echo $this->lang->line('login_slide_P');
																						else : ?>Tariff includes fuel, taxes and insurance<?php endif; ?></span></li>
							<li><span><?php if ($this->lang->line('login_slide_Q')) : ?><?php echo $this->lang->line('login_slide_Q');
																						else : ?>All cars equipped with All India Permits<?php endif; ?></span></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login-rght-inner">
						<div class="showmsg-popup"></div>
						<div class="first-rght-login">
							<ul class="nav nav-tabs nav-tab-sn-pop">
								<li class="inner-login-signup-cityride"><a data-toggle="tab" href="#signup"><?php if ($this->lang->line('login_slide_A')) : ?><?php echo $this->lang->line('login_slide_A');
																																								else : ?>Sign up<?php endif; ?></a></li>
								<li class="inner-login-signin-cityride"><a data-toggle="tab" href="#login"><?php if ($this->lang->line('login_slide_B')) : ?><?php echo $this->lang->line('login_slide_B');
																																								else : ?>Signin<?php endif; ?></a></li>
								<li class="inner-login-forgotpassword-cityride"><a data-toggle="tab" href="#forget"><?php if ($this->lang->line('login_slide_C')) : ?><?php echo $this->lang->line('login_slide_C');
																																										else : ?>Forget Password<?php endif; ?></a></li>
							</ul>
						</div>
						<div class="clearfix"></div>
						<div class="tab-content">
							<div id="signup" class="tab-pane fade ">
								<form class="col-lg-12 form-class-pop" id="myForm-signup">
									<div class="signin-contents">
										<a href="javascript:void(0);" class="snup"><span><img src="<?php echo base_url(); ?>assets/img/login/1.png" /> </span><?php if ($this->lang->line('login_slide_D')) : ?><?php echo $this->lang->line('login_slide_D');
																																																				else : ?>Sign up with facebook<?php endif; ?></a>
										<a href="javascript:void(0);" class="snup snup-1"><span><img src="<?php echo base_url(); ?>assets/img/login/2.png" /> </span><?php if ($this->lang->line('login_slide_E')) : ?><?php echo $this->lang->line('login_slide_E');
																																																						else : ?>Sign up with Google+<?php endif; ?></a>
									</div>
									<input type="email" id="signup-email" class="form-control frm-jkl" placeholder="<?php if ($this->lang->line('login_slide_F')) : ?><?php echo $this->lang->line('login_slide_F');
																																										else : ?>Email<?php endif; ?>">
									<input type="password" id="signup-password" class="form-control frm-jkl" placeholder="<?php if ($this->lang->line('login_slide_G')) : ?><?php echo $this->lang->line('login_slide_G');
																																											else : ?>Password<?php endif; ?>">
									<div class="checkbox ck-center">
										<label><input type="checkbox" value="" class="remember-class"><?php if ($this->lang->line('login_slide_J')) : ?><?php echo $this->lang->line('login_slide_J');
																																						else : ?>Remember me<?php endif; ?></label>
									</div>
									<button type="submit" class="but-pop-1 "><?php if ($this->lang->line('login_slide_A')) : ?><?php echo $this->lang->line('login_slide_A');
																																else : ?>Signup<?php endif; ?></button>
								</form>
							</div>
							<div id="login" class="tab-pane fade">
								<form class="col-lg-12 form-class-pop" id="myForm-signin">
									<div class="signin-contents">
										<a href="javascript:void(0);" class="snup"><span><img src="<?php echo base_url(); ?>assets/img/login/1.png" /> </span><?php if ($this->lang->line('login_slide_L')) : ?><?php echo $this->lang->line('login_slide_L');
																																																				else : ?>Sign in with facebook<?php endif; ?></a>
										<a href="javascript:void(0);" class="snup snup-1"><span><img src="<?php echo base_url(); ?>assets/img/login/2.png" /> </span><?php if ($this->lang->line('login_slide_M')) : ?><?php echo $this->lang->line('login_slide_M');
																																																						else : ?>Sign in with Google+<?php endif; ?></a>
									</div>
									<input type="email" id="signin-email" class="form-control frm-jkl" placeholder="<?php if ($this->lang->line('login_slide_F')) : ?><?php echo $this->lang->line('login_slide_F');
																																										else : ?>Email<?php endif; ?>">
									<input type="password" id="signin-password" class="form-control frm-jkl" placeholder="<?php if ($this->lang->line('login_slide_G')) : ?><?php echo $this->lang->line('login_slide_G');
																																											else : ?>Password<?php endif; ?>">
									<div class="checkbox ck-center">
										<label><input type="checkbox" value="" class="remember-class"><?php if ($this->lang->line('login_slide_J')) : ?><?php echo $this->lang->line('login_slide_J');
																																						else : ?>Remember me<?php endif; ?></label>
									</div>
									<button type="submit" class="but-pop-1 "><?php if ($this->lang->line('login_slide_B')) : ?><?php echo $this->lang->line('login_slide_B');
																																else : ?>Signin<?php endif; ?></button>
								</form>
							</div>
							<div id="forget" class="tab-pane fade">
								<form class="col-lg-12 form-class-pop" id="myForm-forgotpassword">
									<input type="email" id="forgot-email" class="form-control frm-jkl" placeholder="<?php if ($this->lang->line('login_slide_F')) : ?><?php echo $this->lang->line('login_slide_F');
																																										else : ?>Email<?php endif; ?>">
									<button type="submit" class="but-pop-1 "><?php if ($this->lang->line('login_slide_K')) : ?><?php echo $this->lang->line('login_slide_K');
																																else : ?>Submit<?php endif; ?></button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
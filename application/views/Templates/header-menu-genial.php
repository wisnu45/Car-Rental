<?php $location = $this->session->userdata('location'); ?>
<!--navbar-inner-->
<!--navbar-inner-->
<div class="container-fluid">
    <div class="nav-inner-sub">
        <div class="container">
            <div class="col-lg-12">
                 <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <select class="selectpicker SelectUniversallocation" data-style="btn-info">
						<?php if(!isset($location) && empty($location)): ?>
							<option ><?php echo "Select City"; ?></option>
							<?php foreach($selectlocations as $single_loc): ?>								
								<option value="<?php echo $single_loc->id; ?>" data-loc="<?php echo $single_loc->name; ?>" ><?php echo $single_loc->name; ?></option>
						<?php endforeach;  else:?>
							<?php foreach($selectlocations as $single_loc): ?>
								<option  value="<?php echo $single_loc->id; ?>" <?php if($single_loc->id == $location):?> Selected <?php endif;?> data-loc="<?php echo $single_loc->name; ?>"><?php echo $single_loc->name; ?></option>
						<?php endforeach;  endif;?>
                    </select>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
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
						<!-- <li><a href="javascript:void(0);"  data-toggle="modal" class="login-signup-cityride" data-target="#myModallogin"><img src="<?php echo base_url(); ?>assets/img/tariff/5.png" /> <span><?php if($this->lang->line('signup')): ?><?php echo $this->lang->line('signup'); ?><?php else: ?>Sign up<?php endif; ?></span></a> </li> -->
                        <li><a href="javascript:void(0);" data-toggle="modal" class="login-signin-cityride" data-target="#myModallogin"><img src="<?php echo base_url(); ?>assets/img/tariff/6.png" /> <span><?php if($this->lang->line('login')): ?><?php echo $this->lang->line('login'); ?><?php else: ?>Login<?php endif; ?></span></a> </li>
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
    <div class="head-inner" style="background:#111119">
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
<!--select-main-head-->
<div class="container-fluid">
    <div class="select-main-head">
        <div class="container">
            <div class="select-main-e">
                <div class="col-lg-12">
                    <div class="col-lg-6 col-md-6 col-sm-6 ">
                        <h4> <?php if($this->lang->line('home_slide_A3')): ?><?php echo $this->lang->line('home_slide_A3'); else: ?>When do you need a CityRide?<?php endif; ?><span><img src="<?php echo base_url(); ?>assets/img/tariff/right-trf.png" class="img-trf" data-toggle="modal" data-target="#myModalzGenial" /></span></h4>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--select-main-head-->
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
							<a href=""><img src="<?php echo base_url(); ?>assets/img/home/1.png" class="img-lgj"/> </a>
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
											<input type="email" id="signup-email" class="form-control frm-jkl" placeholder="<?php if($this->lang->line('login_slide_F')): ?><?php echo $this->lang->line('login_slide_F'); else: ?>Email<?php endif; ?>" >
											<input type="password" id="signup-password" class="form-control frm-jkl"  placeholder="<?php if($this->lang->line('login_slide_G')): ?><?php echo $this->lang->line('login_slide_G'); else: ?>Password<?php endif; ?>" >
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
											<input type="email" id="signin-email" class="form-control frm-jkl" placeholder="<?php if($this->lang->line('login_slide_F')): ?><?php echo $this->lang->line('login_slide_F'); else: ?>Email<?php endif; ?>" >
											<input type="password" id="signin-password" class="form-control frm-jkl" placeholder="<?php if($this->lang->line('login_slide_G')): ?><?php echo $this->lang->line('login_slide_G'); else: ?>Password<?php endif; ?>" >
											<div class="checkbox ck-center">
												<label><input type="checkbox" value="" class="remember-class"><?php if($this->lang->line('login_slide_J')): ?><?php echo $this->lang->line('login_slide_J'); else: ?>Remember me<?php endif; ?></label>
											</div>
											<button type="submit" class="but-pop-1 "><?php if($this->lang->line('login_slide_B')): ?><?php echo $this->lang->line('login_slide_B'); else: ?>Signin<?php endif; ?></button>
										</form>
									</div>
									<div id="forget" class="tab-pane fade">
										<form class="col-lg-12 form-class-pop" id="myForm-forgotpassword">
											<input type="email" id="forgot-email" class="form-control frm-jkl" placeholder="<?php if($this->lang->line('login_slide_F')): ?><?php echo $this->lang->line('login_slide_F'); else: ?>Email<?php endif; ?>" >
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
<div class="modal fade" id="myModalzGenial" role="dialog">
    <div class="container">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        <div class="col-lg-1 col-md-1"></div>
                        <div class="col-lg-10 col-md-10">
                            <div class="ride-add-pop">
                                <h2><img src="<?php echo base_url(); ?>assets/img/home/1.png" /> </h2>
                                <ul>
                                    <li id="cnt-ride-1" class="pop-c-1-active">
                                        <img src="<?php echo base_url(); ?>assets/img/popup/7.png" class="pop-c-1 " />

                                        <div class="texty-c-1">
                                            <p><img src="<?php echo base_url(); ?>assets/img/popup/3.png" class="p-c-1" /><?php if($this->lang->line('chronologypopup1_slide_A1')): ?><?php echo $this->lang->line('chronologypopup1_slide_A1'); else: ?>Select Start Time <?php endif; ?></p>
                                        </div>
                                    </li>
                                    <li id="cnt-ride-2" ><img src="<?php echo base_url(); ?>assets/img/popup/8.png" class="pop-c-1" />
                                        <div class="texty-c-1">
                                            <p class="texty-c-2"><img src="<?php echo base_url(); ?>assets/img/popup/4.png" class="p-c-1" /><?php if($this->lang->line('chronologypopup1_slide_A2')): ?><?php echo $this->lang->line('chronologypopup1_slide_A2'); else: ?>Select End Time <?php endif; ?></p>
                                        </div>
                                    </li>
                                    <li id="cnt-ride-3"><img src="<?php echo base_url(); ?>assets/img/popup/9.png" class="pop-c-1" />
                                        <div class="texty-c-1">
                                            <p class="texty-c-2"><img src="<?php echo base_url(); ?>assets/img/popup/5.png" class="p-c-1" /><?php if($this->lang->line('chronologypopup1_slide_A3')): ?><?php echo $this->lang->line('chronologypopup1_slide_A3'); else: ?>Select Pickup Type<?php endif; ?></p>
                                        </div>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                                <div class="content-ul-ride-main">
                                    <div class="content-ul-ride-text cnt-ride-1 cnt-rides">
                                        <h3><?php if($this->lang->line('chronologypopup1_slide_B1')): ?><?php echo $this->lang->line('chronologypopup1_slide_B1'); else: ?>From when do you need a Cityride<?php endif; ?></span></h3>
                                        <div  class="cnt-ridez month_agenda">
                                            <h4><?php if($this->lang->line('chronologypopup1_slide_C1')): ?><?php echo $this->lang->line('chronologypopup1_slide_C1'); else: ?>SELECT MONTH<?php endif; ?></h4>
                                            <div class="col-md-6 col-md-offset-3">
                                                <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="30000000" id="myCarousel">
                                                    <div class="carousel-inner car-inn-1 ">
                                                        <?php
                                                        $current_frommonth;
                                                        foreach(Current_month()  as $set_months_from ){ ?>
                                                            <?php
                                                            $acty_from = '';
                                                            $active_from="";
                                                            $set_months_final_from=explode ('-',$set_months_from);
                                                            if(in_array($set_months_final_from[1],array($current_month_true))){
                                                                $current_frommonth = $set_months_final_from[1].'-'.$set_months_final_from[0];
                                                                $active_from = 'active';
                                                                $acty_from = "acty-1";
                                                            } ?>
                                                            <div class="item  <?php echo $active_from; ?>">
                                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                                    <h5 onclick="getmonthdiary(this,'<?php echo $set_months_from;?>')" class="<?php echo $acty_from; ?> enter-frommonth" data-frommonth="<?php echo $set_months_final_from[1].'-'.$set_months_final_from[0]; ?>" ><?php echo $set_months_final_from[1]; ?></h5>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <a class="left carousel-control" href="#myCarousel" data-slide="prev"><img src="<?php echo base_url(); ?>assets/img/popup/10.png" /> </a>
                                                    <a class="right carousel-control" href="#myCarousel" data-slide="next"><img src="<?php echo base_url(); ?>assets/img/popup/11.png" /> </a>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <h4><?php if($this->lang->line('chronologypopup1_slide_C2')): ?><?php echo $this->lang->line('chronologypopup1_slide_C2'); else: ?>SELECT DATE<?php endif; ?></h4>
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="30000000" id="myCarouselh">
                                                    <div class="carousel-inner car-inn-1 car-inn-2">
                                                        <?php
                                                        $current_fromdate;
                                                        foreach(Current_date() as $datewday_from){
                                                            $acty2_from = '';
                                                            $active_from="";
                                                            $datearray_from=explode ('-',$datewday_from);
                                                            if(in_array($datearray_from[2],array($current_day))){
                                                                $current_fromdate = $datearray_from[2].'-'.$datearray_from[3].'-'.$datearray_from[4].'-'.$datearray_from[5];
                                                                $active_from = 'active';
                                                                $acty2_from = "acty-2";
                                                            }
                                                            ?>
                                                            <div class="item <?php echo $active_from; ?>">
                                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                                    <h5 onclick="getdatediary(this,'<?php echo $datewday_from;?>')" class="<?php echo $acty2_from; ?> enter-fromdate" data-fromdate="<?php echo $datearray_from[2].'-'.$datearray_from[3].'-'.$datearray_from[4].'-'.$datearray_from[5]; ?>" ><?php echo $datearray_from[3]; ?><br>
                                                                        <span><?php echo $datearray_from[2]; ?></span></h5>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <a class="left carousel-control" href="#myCarouselh" data-slide="prev"><img src="<?php echo base_url(); ?>assets/img/popup/10.png" /> </a>
                                                    <a class="right carousel-control" href="#myCarouselh" data-slide="next"><img src="<?php echo base_url(); ?>assets/img/popup/11.png" /> </a>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="time-sl-main">
                                                <div class="range-main-slider fromchrono">
                                                    <?php $current_fromtime = Current_time_extracter(Current_time_from()); ?>
                                                    <input id="ex1" data-slider-id='ex1Slider' class="from_asst" type="text" data-slider-min="<?php echo Current_time_from(); ?>" data-slider-max="1440" data-slider-step="30" data-slider-value="<?php echo Current_time_from(); ?>" data-fromtime="<?php echo Current_time_from(); ?>" />
                                                </div>
                                            </div>
                                            <h6 class="FrommonthNext" onclick="FrommonthNext(this)" ><?php if($this->lang->line('chronologypopup1_slide_C3')): ?><?php echo $this->lang->line('chronologypopup1_slide_C3'); else: ?>NEXT<?php endif; ?><img src="<?php echo base_url(); ?>assets/img/popup/14.png" /> </h6>
                                        </div>
                                        <div class="from_eventual" >
                                            <input type="hidden" id="month_prev" name="from_month" class="from_eventual_month" value="<?php echo $current_frommonth; ?>">
                                            <input type="hidden" id="date_prev" name="from_date" class="from_eventual_date" value="<?php echo $current_fromdate; ?>">
                                            <input type="hidden" id="time_prev" name="from_time" class="from_eventual_time" value="<?php echo $current_fromtime; ?>">
                                            <input type="hidden" id="time_asst_prev" name="from_asst" class="from_eventual_asst" value="">
                                        </div>
                                    </div>
                                    <div class="content-ul-ride-text cnt-ride-2  cnt-rides hidden">
                                        <h3><?php if($this->lang->line('chronologypopup1_slide_B2')): ?><?php echo $this->lang->line('chronologypopup1_slide_B2'); else: ?>To when do you need a Cityride<?php endif; ?></span></h3>
                                        <div  class="cnt-ridez next_month_agenda">
                                            <h4><?php if($this->lang->line('chronologypopup1_slide_C1')): ?><?php echo $this->lang->line('chronologypopup1_slide_C1'); else: ?>SELECT MONTH<?php endif; ?></h4>
                                            <div class="col-md-6 col-md-offset-3">
                                                <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="30000000" id="myCarousel1">
                                                    <div class="carousel-inner car-inn-1">
                                                        <?php
                                                        $current_tomonth;
                                                        foreach(Current_month()  as $set_months_to ){ ?>
                                                            <?php
                                                            $acty_to = '';
                                                            $active_to="";
                                                            $set_months_final_to=explode ('-',$set_months_to);
                                                            if(in_array($set_months_final_to[1],array($current_month_true))){
                                                                $current_tomonth = $set_months_final_to[1];
                                                                $active_to = 'active';
                                                                $acty_to = "acty-1";
                                                            } ?>
                                                            <div class="item  <?php echo $active_to; ?>">
                                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                                    <h5 class="<?php echo $acty_to; ?>"><?php echo $set_months_final_to[1]; ?></h5>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <a class="left carousel-control" href="#myCarousel1" data-slide="prev"><img src="<?php echo base_url(); ?>assets/img/popup/10.png" /> </a>
                                                    <a class="right carousel-control" href="#myCarousel1" data-slide="next"><img src="<?php echo base_url(); ?>assets/img/popup/11.png" /> </a>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <h4><?php if($this->lang->line('chronologypopup1_slide_C2')): ?><?php echo $this->lang->line('chronologypopup1_slide_C2'); else: ?>SELECT DATE<?php endif; ?></h4>
                                            <div class="col-md-8 col-md-offset-2">
                                                <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="30000000" id="myCarouselh1">
                                                    <div class="carousel-inner car-inn-1 car-inn-2">
                                                        <?php
                                                        $current_todate;
                                                        foreach(Current_date() as $datewday_to){
                                                            $acty2_to = '';
                                                            $active_to="";
                                                            $datearray_to=explode ('-',$datewday_to);
                                                            if(in_array($datearray_to[2],array($current_day))){
                                                                $current_todate = $datearray_to[2];
                                                                $active_to = 'active';
                                                                $acty2_to = "acty-2";
                                                            }
                                                            ?>
                                                            <div class="item <?php echo $active_to; ?>">
                                                                <div class="col-md-3 col-sm-6 col-xs-12">
                                                                    <h5 class="<?php echo $acty2_to; ?>"><?php echo $datearray_to[3]; ?><br>
                                                                        <span><?php echo $datearray_to[2]; ?></span></h5>
                                                                </div>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                    <a class="left carousel-control" href="#myCarouselh1" data-slide="prev"><img src="<?php echo base_url(); ?>assets/img/popup/10.png" /> </a>
                                                    <a class="right carousel-control" href="#myCarouselh1" data-slide="next"><img src="<?php echo base_url(); ?>assets/img/popup/11.png" /> </a>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <div class="time-sl-main ">
                                                <div class="range-main-slider tochrono">
                                                    <?php $current_totime = Current_time_extracter(Current_time_to()); ?>
                                                    <input id="ex2" data-slider-id='ex1Slider' type="text" data-slider-min="0" data-slider-max="1440" data-slider-step="30" data-slider-value="<?php echo Current_time_to(); ?>"/>
                                                </div>
                                            </div>
                                            <h6 class="TomonthNext" onclick="TomonthNext(this)"><?php if($this->lang->line('chronologypopup1_slide_C3')): ?><?php echo $this->lang->line('chronologypopup1_slide_C3'); else: ?>NEXT<?php endif; ?><img src="<?php echo base_url(); ?>assets/img/popup/14.png" /> </h6>
                                        </div>
                                        <div class="to_eventual" >
                                            <input type="hidden" id="month_next" name="to_month" class="to_eventual_month" value="<?php echo $current_tomonth; ?>">
                                            <input type="hidden" id="date_next" name="to_date" class="to_eventual_date" value="<?php echo $current_todate; ?>">
                                            <input type="hidden" id="time_next" name="to_time" class="to_eventual_time" value="<?php echo $current_totime; ?>">
                                        </div>
                                    </div>
                                    <div class="content-ul-ride-text cnt-ride-3 cnt-rides hidden">
                                        <h3><?php if($this->lang->line('chronologypopup3_slide_B1')): ?><?php echo $this->lang->line('chronologypopup3_slide_B1'); else: ?>Tell us your location in  <?php endif; ?> <span class="fix-locdrum"></span></h3>
                                        <div class="cnt-ridez">
                                            <form role="form" method="post" enctype="multipart/form-data">
                                                <div class="texty-cnt">
                                                    <div class="fixAdatetime">
                                                        <input type="hidden" name="city_final" class="fix-locdrum" >
                                                        <input type="hidden" name="originallocation" class="original-bearings">
                                                        <input type="hidden" id="month_prev_org" name="from_month_org" class="from_eventual_month_org" value="">
                                                        <input type="hidden" id="date_prev_org" name="from_date_org" class="from_eventual_date_org" value="">
                                                        <input type="hidden" id="time_prev_org" name="from_time_org" class="from_eventual_time_org" value="">
                                                        <input type="hidden" id="month_next_org" name="to_month_org" class="to_eventual_month_org" value="">
                                                        <input type="hidden" id="date_next_org" name="to_date_org" class="to_eventual_date_org" value="">
                                                        <input type="hidden" id="time_next_org" name="to_time_org" class="to_eventual_time_org" value="">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <div class="col-lg-1 col-md-1"></div>
                                                        <div class="col-lg-10 col-md-10 inp-col-10">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-6 pad-zero">
                                                                    <div id="locality_finder">
                                                                        <input type="text" id="AutocompleteSearchText" required class="form-control inpj autocomplete" name="address" placeholder="<?php if($this->lang->line('chronologypopup3_slide_C1')): ?><?php echo $this->lang->line('chronologypopup3_slide_C1'); else: ?>Type in your Location<?php endif; ?>">
                                                                        <input type="hidden" class="locality" name="city">
                                                                        <input type="hidden" class="field administrative_area_level_1" name="state">
                                                                        <input type="hidden" class="field country" name="country">
                                                                        <input type="hidden" class="field postal_code" name="zip">
                                                                        <input type="hidden" id="lat" class="lat_perfect"  name="latitude">
                                                                        <input type="hidden" id="lon" class="lon_perfect"  name="longitude">
                                                                    </div>
                                                                </div>              
																<div class="col-lg-3 col-md-3" onclick="getLocation()">
																	<span class="form-control inpj sensor-span-text"><?php if($this->lang->line('chronologypopup3_slide_C2')): ?><?php echo $this->lang->line('chronologypopup3_slide_C2'); else: ?>Locate me<?php endif; ?></span>
																	<span><img src="<?php echo base_url(); ?>assets/img/popup/17.png" class="lctme" /> </span>
																</div>
																<div class="col-lg-3 col-md-3 pad-zero perfect-map-geodiv">
																	<a href="javascript:void(0);" class="sh-map perfect-map-geo" data-toggle="modal" data-target="#myModalmap" ><span><?php if($this->lang->line('chronologypopup3_slide_C3')): ?><?php echo $this->lang->line('chronologypopup3_slide_C3'); else: ?>show map <?php endif; ?><img src="<?php echo base_url(); ?>assets/img/popup/16.png" /> </span></a>
																</div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1 col-md-1"></div>
                                                    </div>
                                                    <div class="pushPlaces">
                                                        <div class="col-lg-12">
                                                            <ul>
                                                                <li><?php if($this->lang->line('chronologypopup3_slide_C4')): ?><?php echo $this->lang->line('chronologypopup3_slide_C4'); else: ?>POPULAR LOCATIONS<?php endif; ?></li>
                                                                <li>ndiranagar</li>
                                                                <li>Koramangala	</li>
                                                                <li>Rajajinagar</li>
                                                                <li>Magrath Road</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-12 ">
                                                        <div class="col-lg-1 col-md-1"></div>
                                                        <div class="col-lg-10 col-md-10 tert-1">
                                                            <div class="row" onclick="AirportAppendText(this)">
                                                                <div class="col-lg-8">
                                                                   <h5 ><?php if($this->lang->line('chronologypopup3_slide_C5')): ?><?php echo $this->lang->line('chronologypopup3_slide_C5'); else: ?>Need Cityride at <?php endif; ?><span class="fix-locdrum"></span><?php if($this->lang->line('chronologypopup3_slide_C8')): ?><?php echo $this->lang->line('chronologypopup3_slide_C8'); else: ?> Airport<?php endif; ?></h5>
                                                                </div>
                                                                <div class="col-lg-4">
                                                                    <a href="javascript:void(0);" ><?php if($this->lang->line('chronologypopup3_slide_C6')): ?><?php echo $this->lang->line('chronologypopup3_slide_C6'); else: ?>Terminal-1<?php endif; ?></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1 col-md-1"></div>
                                                    </div>
                                                </div>
                                                <h6><button type="submit" name="chronology" value="chronology" class="sh-map"><?php if($this->lang->line('chronologypopup3_slide_C7')): ?><?php echo $this->lang->line('chronologypopup3_slide_C7'); else: ?>DONE<?php endif; ?><span><img src="<?php echo base_url(); ?>assets/img/popup/15.png" /> </span></button></h6>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1"></div>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="myModalmap" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <div class="map-pop">
                   <div id="mapholder" class="img-responsive-geomap"> </div>  
               </div>
            </div>
        </div>
    </div>
</div>
<div id="myModalmapnotgeo" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
               <div class="map-pop">
                   <div id="mapholdernotgeo" class="img-responsive-geomap"> </div>  
               </div>
            </div>
        </div>
    </div>
</div>
<body onload="initialize()">
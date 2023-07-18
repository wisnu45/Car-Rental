<?php 
$car_exploded_name = explode(':',$car_name);
if(isset($car_exploded_name[0])):
	$car_fname = $car_exploded_name[0];	
else:	
	$car_fname = '';
endif;
if(isset($car_exploded_name[1])):	
	$car_lname = $car_exploded_name[1];
else:
	$car_lname = '';
endif;	
$from_date_first = date("d-M", strtotime($from_date));	
$from_date_last = date("D", strtotime($from_date));		
$to_date_first = date("d-M", strtotime($to_date));	
$to_date_last = date("D", strtotime($to_date));
$refund = get_settings()->refund_amount;
$initial_total = $refund+$car_price;
$total_date = $days .'-'. $hours .'-'. $minutes;
$from_full_date = date("d-m-Y", strtotime($from_date));	
$to_full_date = date("d-m-Y", strtotime($to_date));
?>
<?php $inner_active=""; $outer_active=""; $inner_disable=""; $outer_disable=""; if($this->session->userdata('frontend_logged_in')): $inner_active='active'; $outer_disable="disabledbutton"; else: $outer_active='active'; $inner_disable="disabledbutton";  endif; ?>
<input type="hidden" name="car_calc_price" id="car_calc_price" value="<?php echo $car_price; ?>" >
<input type="hidden" name="car_calc_price" id="car_calc_refund" value="<?php echo $refund; ?>" >
<input type="hidden" name="car_calc_category" id="car_calc_category" value="<?php echo $category; ?>" >
<input type="hidden" name="reservation_car_id" id="reservation_car_id" value="<?php echo $car_id; ?>" >
<input type="hidden" name="reservation_tariff_id" id="reservation_tariff_id" value="<?php echo $tariff_id; ?>" >
<input type="hidden" name="reservation_location_id" id="reservation_location_id" value="<?php echo $location_id; ?>" >
<input type="hidden" name="reservation_nearby_id" id="reservation_nearby_id" value="<?php echo $nearby_id; ?>" >
<input type="hidden" name="reservation_from_date" id="reservation_from_date" value="<?php echo $from_date; ?>" >
<input type="hidden" name="reservation_to_date" id="reservation_to_date" value="<?php echo $to_date; ?>" >
<input type="hidden" name="reservation_from_time" id="reservation_from_time" value="<?php echo $from_time; ?>" >
<input type="hidden" name="reservation_to_time" id="reservation_to_time" value="<?php echo $to_time; ?>" >
<input type="hidden" name="reservation_total_date" id="reservation_total_date" value="<?php echo $total_date; ?>" >
<input type="hidden" name="reservation_from_full_date" id="reservation_from_full_date" value="<?php echo $from_full_date; ?>" >
<input type="hidden" name="reservation_to_full_date" id="reservation_to_full_date" value="<?php echo $to_full_date; ?>" >
<input type="hidden" name="reservation_amount" id="reservation_amount" value="<?php echo $initial_total; ?>" >
<div class="clearfix"></div>
<div class="container-fluid">
    <div class="ckout-main">
        <div class="container">
            <div class="col-lg-12 ">
                <div class="help-supp">
                    <div class="faq-main-tab">
                        <div class="ck-out">
                             <div class="col-lg-12">
                                 <div class="col-lg-3 col-md-3"></div>
                                 <div class="col-lg-6 col-md-6">
                                     <ul class="nav nav-tabs faq-rt nav-bj-inner nav-ckout">
										<li id="main-nav-login" class="<?php echo $outer_active; ?> <?php echo $outer_disable; ?>">
											<a data-toggle="tab" href="#login">
											<h5><a href="" class="act-ht">1</a></h5>
											<h4><?php if($this->lang->line('checkout_slide_A1')): ?><?php echo $this->lang->line('checkout_slide_A1'); else: ?>Login/Signup<?php endif; ?></h4>
											</a>
										</li>
                                         <li id="main-nav-checkout" class="<?php echo $inner_active; ?> <?php echo $inner_disable; ?>" >
											<a data-toggle="tab" href="#booking">
											<h5><a href="" class="act-ht">2</a></h5>
											<h4><?php if($this->lang->line('checkout_slide_A2')): ?><?php echo $this->lang->line('checkout_slide_A2'); else: ?>Checkout<?php endif; ?></h4>
											</a></li>
                                         <li id="main-nav-payment" class="<?php echo $outer_disable; ?> <?php echo $inner_disable; ?>" >
											<a data-toggle="tab" href="#payment">
											<h5><a href="" class="act-ht">3</a></h5>
											<h4><?php if($this->lang->line('checkout_slide_A3')): ?><?php echo $this->lang->line('checkout_slide_A3'); else: ?>Finished<?php endif; ?></h4>
											</a>
                                         </li>
                                     </ul>
                                 </div>
                                 <div class="col-lg-3 col-md-3"></div>
							</div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-lg-12">
        <div class="col-lg-8 col-md-8 bac-gry">
            <div class="tab-content tab-faq-1">
                <div id="login" class="Login-tab-checker tab-pane fade in <?php echo $outer_active; ?>">					
                    <div class="sign-main">
						<div class="showmsg-popup" > </div>
                        <ul class="nav nav-tabs nav-bj-inner-1 navb-p">
                            <li id="logg-ed-in" class="logg-ed-in active" onclick="ChangeloginSetupsignin(this)" >
								<a data-toggle="tab" href="#signin">
									<h4><?php if($this->lang->line('checkout_slide_A4')): ?><?php echo $this->lang->line('checkout_slide_A4'); else: ?>LOGIN<?php endif; ?></h4>
								</a>
							</li>
                            <li id="sign-ed-in" class="sign-ed-in " onclick="ChangeloginSetupsignup(this)" >
								<a data-toggle="tab" href="#signup">
									<h4><?php if($this->lang->line('checkout_slide_A5')): ?><?php echo $this->lang->line('checkout_slide_A5'); else: ?>SIGNUP<?php endif; ?></h4>
                                </a>
							</li>
                        </ul>
                        <div class="tab-content tab-faq-1">							
                            <div id="signin" class="Signin-setup-checker tab-pane fade in active">
								 <div class="sign-inner">
									 <a href="" class="sgn-k"><?php if($this->lang->line('checkout_slide_A6')): ?><?php echo $this->lang->line('checkout_slide_A6'); else: ?>Sign in with  facebook<?php endif; ?></a>
									 <a href="" class="sgn-k"><?php if($this->lang->line('checkout_slide_A7')): ?><?php echo $this->lang->line('checkout_slide_A7'); else: ?>Sign in with Google+<?php endif; ?></a>
									 <div class="frm-kp">
										 <form>
											 <input type="email" id="signin_book_email" class="form-control emc-p" placeholder="Email" />
											 <input type="password" id="signin_book_password" class="form-control emc-p" placeholder="Password" />
											 <a href="javascript:void(0);" class="sub-bnj" type="submit" onclick="Finalsubmitloginbook(this)" ><?php if($this->lang->line('checkout_slide_A4')): ?><?php echo $this->lang->line('checkout_slide_A4'); else: ?>Login<?php endif; ?></a>
											 <h5> <a href="javascript:void(0);" class="alr-log" onclick="ChangeloginSetupsignup(this)"><?php if($this->lang->line('checkout_slide_A8')): ?><?php echo $this->lang->line('checkout_slide_A8'); else: ?>New to cityride ? <?php endif; ?><span><?php if($this->lang->line('checkout_slide_A5')): ?><?php echo $this->lang->line('checkout_slide_A5'); else: ?>Sign up<?php endif; ?></span></a></h5>
										 </form>
									 </div>
								 </div>
							</div>
                            <div id="signup" class="Signup-setup-checker tab-pane fade in ">
                                <div class="sign-inner">
                                    <a href="" class="sgn-k"><?php if($this->lang->line('checkout_slide_A12')): ?><?php echo $this->lang->line('checkout_slide_A12'); else: ?>Sign up with  facebook<?php endif; ?></a>
                                    <a href="" class="sgn-k"><?php if($this->lang->line('checkout_slide_A13')): ?><?php echo $this->lang->line('checkout_slide_A13'); else: ?>Sign up with Google+<?php endif; ?></a>
                                    <div class="frm-kp">
                                        <form>
                                            <input type="email" id="signup_book_email" class="form-control emc-p" placeholder="Email" />
                                            <input type="password" id="signup_book_password" class="form-control emc-p" placeholder="Password" />
                                            <a href="javascript:void(0);" class="sub-bnj" type="submit" onclick="Finalsubmitlogupbook(this)" ><?php if($this->lang->line('checkout_slide_A5')): ?><?php echo $this->lang->line('checkout_slide_A5'); else: ?>Sign up<?php endif; ?></a>
                                            <h5> <a href="javascript:void(0);" onclick="ChangeloginSetupsignin(this)" class="alr-log"><?php if($this->lang->line('checkout_slide_A11')): ?><?php echo $this->lang->line('checkout_slide_A11'); else: ?>Already have an account ? <?php endif; ?><span><?php if($this->lang->line('checkout_slide_A4')): ?><?php echo $this->lang->line('checkout_slide_A4'); else: ?>Login<?php endif; ?></span></a></h5>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="booking" class="Booking-tab-checker tab-pane fade in <?php echo $inner_active; ?>">   
					<div class="sign-inner">						
						<h3><?php if($this->lang->line('checkout_slide_A27')): ?><?php echo $this->lang->line('checkout_slide_A27'); else: ?>RESERVATION CHECKOUT<?php endif; ?></h3>
                        <div class="frm-kp">
                            <form>
                                <p class="p-tot1">
									<div class="col-lg-12 bf-pi">
										<div class="col-lg-6 col-md-5">
											<span class="bnm-code"><?php if($this->lang->line('checkout_slide_A28')): ?><?php echo $this->lang->line('checkout_slide_A28'); else: ?>Tariff Amount<?php endif; ?></span>
										</div>										
										<div class="col-lg-6 col-md-5">
											<span class="bnm-code pull-right"><img src="<?php echo base_url(); ?>assets/img/popup/2.png" /> <div class="price_changer" ><?php echo $car_price; ?></div></span>
										</div>
									</div>
								</p>
                                <div class="row ">
                                    <div class="col-lg-10 col-md-10 ">
                                        <input required="" style="background: #fff;" type="text" id="coupon_car_promo" class="form-control emc-p" placeholder="Enter promo" />
                                    </div>
                                    <div class="col-lg-2 col-md-2">
                                        <a href="javascript:void(0);" onclick="Couponchecker(this)" class="sub-bnj" type="submit" ><?php if($this->lang->line('checkout_slide_A30')): ?><?php echo $this->lang->line('checkout_slide_A30'); else: ?>APPLY<?php endif; ?></a>
                                    </div>
                                </div>
								<div class="promo-hidden-final" id="promo-hidden-final"></div>
                                <div class="showmsg-popup" > </div>
                                <p class="p-tot1">
                                <div class="col-lg-12  bf-pi">
                                    <div class="col-lg-6 col-md-5">
                                        <span class="bnm-code"><?php if($this->lang->line('checkout_slide_A31')): ?><?php echo $this->lang->line('checkout_slide_A31'); else: ?>Refundable Deposit<?php endif; ?></span>
                                    </div>
                                    <div class="col-lg-6 col-md-5 ">
                                        <span class="bnm-code pull-right"> <img src="<?php echo base_url(); ?>assets/img/popup/2.png" /><?php echo $refund; ?></span>
                                    </div>
                                </div>
                                </p>
                                <p class="p-tot">
                                <div class="col-lg-12  bf-pi bf-pi-1">
                                    <div class="col-lg-6 col-md-6">
                                        <span class="bnm-code"><?php if($this->lang->line('checkout_slide_A32')): ?><?php echo $this->lang->line('checkout_slide_A32'); else: ?>Total Payable Amount<?php endif; ?></span>
                                    </div>
                                    <div class="col-lg-6 col-md-6 ">
                                        <span class="bnm-code pull-right"><div class="total_price_changer" ><img src="<?php echo base_url(); ?>assets/img/popup/29.png" /> <?php echo $initial_total; ?></div></span>
                                    </div>
                                </div>
                                </p>
								<h4 class="sub-nj">
									<a href="javascript:void(0);" class="sub-bnj" type="submit" onclick="reservationsubmit(this)" ><?php if($this->lang->line('checkout_slide_A33')): ?><?php echo $this->lang->line('checkout_slide_A33'); else: ?>CHECKOUT<?php endif; ?></a>
								</h4>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="payment" class="Payment-tab-checker tab-pane fade in ">
                    <div class="sign-inner">
                        <div class="frm-kp">
                            <form>
                                <p class="p-tot">
                                <div class="col-lg-12  bf-pi bf-pi-1">                                    
									<span class="bnm-code"><?php if($this->lang->line('checkout_slide_A34')): ?><?php echo $this->lang->line('checkout_slide_A34'); else: ?>Final Checkout<?php endif; ?></span>                                    
                                </div>
                                </p>                                
                                <p class="p-tot1 p-tot2">
                                <div class="col-lg-12 bf-pi bf-pi-met">                                  
								   <span class="bnm-code"><img src="<?php echo base_url(); ?>assets/img/home/bookingnav.png" /> <?php if($this->lang->line('checkout_slide_A35')): ?><?php echo $this->lang->line('checkout_slide_A35'); else: ?> Successfully Reserved. Please check your email.<?php endif; ?></span>
                                </div>
                                </p>
                                <div class="clearfix"></div>                                 
                                <h4 class="sub-nj">
                                    <a href="<?php echo base_url()?>User" class="sub-bnj" type="submit" ><?php if($this->lang->line('checkout_slide_A36')): ?><?php echo $this->lang->line('checkout_slide_A36'); else: ?>Click here. To proceed.<?php endif; ?></a>
                                </h4>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4 right-sidebar-checkout-main">
			<div class="right-sidebar-checkout">
				<h2><?php if($this->lang->line('checkout_slide_A14')): ?><?php echo $this->lang->line('checkout_slide_A14'); else: ?>SUMMARY<?php endif; ?></h2>
				<div class="col-lg-12 sum-check-1">
					<div class="col-lg-6 col-md-6">
						<img src="<?php echo base_url(); ?>admin/<?php echo $car_image; ?>" class="img-responsive" />
					</div>
					<div class="col-lg-6 col-md-6">
						 <h3><?php echo $car_fname; ?></h3>
						<h4><?php echo $car_lname; ?></h4>
						<h5><?php echo $car_seats; ?> <?php if($this->lang->line('checkout_slide_A15')): ?><?php echo $this->lang->line('checkout_slide_A15'); else: ?> seater<?php endif; ?></h5>
					</div>
				</div>
				<div class="col-lg-12 sum-check-2">
					<div class="col-lg-5 col-md-5" >
						<h3><?php echo $from_time; ?></h3>
						<h4><?php echo $from_date_first; ?>, <?php echo $from_date_last; ?></h4>
					</div>
					<div class="col-lg-2 col-md-2" >
						<img src="<?php echo base_url(); ?>assets/img/popup/34.png" class="to-dc" />
					</div>
					<div class="col-lg-5 col-md-5" >
						<h3><?php echo $to_time; ?></h3>
						<h4><?php echo $to_date_first; ?>, <?php echo $to_date_last; ?></h4>
					</div>
					<h6><?php echo $days; ?> <?php if($this->lang->line('checkout_slide_A17')): ?><?php echo $this->lang->line('checkout_slide_A17'); else: ?>day<?php endif; ?>,<?php echo $hours; ?><?php if($this->lang->line('checkout_slide_A18')): ?><?php echo $this->lang->line('checkout_slide_A18'); else: ?> hours<?php endif; ?>,<?php echo $minutes; ?><?php if($this->lang->line('checkout_slide_A19')): ?><?php echo $this->lang->line('checkout_slide_A19'); else: ?> minutes<?php endif; ?></h6>
				</div>
				<div class="col-lg-12 sum-check-3">				  
					<div class="img-responsive-mapcanvas" id="map_inlocat">
					<input type="hidden" id="sh-lat-tik" value="<?php echo $showroom_latitude; ?>" >
					<input type="hidden" id="sh-lng-tik" value="<?php echo $showroom_longitude; ?>" >						
					</div>
					<h5><?php echo $showroom_address; ?></h5>
				</div>
				<div class="col-lg-12 sum-check-2 sum-check-4">
					<div class="col-lg-6 col-md-6">
					  <h6><?php if($this->lang->line('checkout_slide_A20')): ?><?php echo $this->lang->line('checkout_slide_A20'); else: ?>Tariff <?php endif; ?></h6>
					  <h6><?php if($this->lang->line('checkout_slide_A21')): ?><?php echo $this->lang->line('checkout_slide_A21'); else: ?>Refundable Deposit (?) <?php endif; ?></h6>
					</div>
					<div class="col-lg-6 col-md-6">
						<h6><div class="price_changer" ><img src="<?php echo base_url(); ?>assets/img/popup/35.png" /> <?php echo $car_price; ?></div></h6>
						<h6><img src="<?php echo base_url(); ?>assets/img/popup/35.png" /><?php echo $refund; ?></h6>
					</div>
				</div>
				<h2><?php if($this->lang->line('checkout_slide_A22')): ?><?php echo $this->lang->line('checkout_slide_A22'); else: ?>PAYABLE AMOUNT ? <?php endif; ?><div class="total_price_changer" ><?php echo $initial_total; ?></div></h2>
				<div class="col-lg-12 sum-check-2 sum-check-4 sum-check-5">
					<div class="col-lg-6 col-md-6">
						<h6><?php if($this->lang->line('checkout_slide_A23')): ?><?php echo $this->lang->line('checkout_slide_A23'); else: ?>Free Kms<?php endif; ?></h6>
						<h6><?php if($this->lang->line('checkout_slide_A25')): ?><?php echo $this->lang->line('checkout_slide_A25'); else: ?>Excess Kms<?php endif; ?></h6>
					</div>
					<div class="col-lg-6 col-md-6">
						<h6><img src="<?php echo base_url(); ?>assets/img/popup/35.png" /><?php echo $free_km; ?><?php if($this->lang->line('checkout_slide_A24')): ?><?php echo $this->lang->line('checkout_slide_A24'); else: ?> KMS <?php endif; ?></h6>
						<h6><img src="<?php echo base_url(); ?>assets/img/popup/35.png" /><?php echo $excess; ?><?php if($this->lang->line('checkout_slide_A26')): ?><?php echo $this->lang->line('checkout_slide_A26'); else: ?>Per/KM<?php endif; ?> </h6>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
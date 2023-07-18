<div class="rentee_account_navigation" >	
	<!--section-sele-main-->
	<div class="container">
		<div class="profile-dp">
			<div class="col-lg-4 col-md-4 col-sm-4"></div>
			<div class="col-lg-4 col-md-4 col-sm-4">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="pr-dp-main">
							<?php if(isset($data->profile_picture) &&!empty($data->profile_picture)): ?>
								<img src="<?php echo base_url(); ?>admin/<?php echo $data->profile_picture; ?>" />	
							<?php else: ?>
								<img src="<?php echo base_url(); ?>assets/img/caution/rentee.jpg" >
							<?php endif; ?>	
							<form method="post" id="rentee_image_post_front" enctype="multipart/form-data">						
								<label>
									<input type="file" name="profile_picture" id="rentee_image_push_front" style="opacity:0;"> 
									<img class="renter-picture-change" src="<?php echo base_url(); ?>assets/img/caution/edit.png" />
								</label>
							</form>	
						</div>							
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8">
						<div class="pr-dp-main">
						   <h3><?php echo $data->rentee; ?></h3>
							<h4><?php echo $data->phone; ?></h4>
							<p><?php echo $data->email; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-12 col-md-12 col-sm-12">
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
		</div>		
		<form role="form" method="post" data-parsley-validate="" enctype="multipart/form-data">
		<div class="profile-content">
			<div class="col-lg-12">
				<div class="hd-right-y">
					<ul>
						<li><?php if(empty($data->license_number)): ?><span><img src="<?php echo base_url(); ?>assets/img/profile/7.png" /> </span><?php if($this->lang->line('renter_page2_slide_C8')): ?><?php echo $this->lang->line('renter_page2_slide_C8'); else: ?> Driving Licence <?php endif; ?><?php else: ?><span><img src="<?php echo base_url(); ?>assets/img/profile/8.png" /> </span><?php if($this->lang->line('renter_page2_slide_C8')): ?><?php echo $this->lang->line('renter_page2_slide_C8'); else: ?> Driving Licence <?php endif; ?><?php endif; ?></li>
						<li><?php if(empty($data->phone)): ?><span><img src="<?php echo base_url(); ?>assets/img/profile/7.png" /> </span><?php if($this->lang->line('renter_page2_slide_A3')): ?><?php echo $this->lang->line('renter_page2_slide_A3'); else: ?>Mobile Number<?php endif; ?><?php else: ?><span><img src="<?php echo base_url(); ?>assets/img/profile/8.png" /> </span><?php if($this->lang->line('renter_page2_slide_A3')): ?><?php echo $this->lang->line('renter_page2_slide_A3'); else: ?>Mobile Number<?php endif; ?> <?php endif; ?></li>						
					</ul>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="col-lg-3 col-md-3 prof-cnt-bc">
					<div class="hd-left-y-1">
						<div class="row">
							<div class="col-lg-4 col-md-4">
								<img src="<?php echo base_url(); ?>assets/img/profile/2.png" />
							</div>
							<div class="col-lg-8 col-md-8">
								<h3><?php if($this->lang->line('renter_page2_slide_C9')): ?><?php echo $this->lang->line('renter_page2_slide_C9'); else: ?>Check<?php endif; ?></h3>
								<h4><?php if($this->lang->line('renter_page2_slide_C12')): ?><?php echo $this->lang->line('renter_page2_slide_C12'); else: ?>Credits Balance<?php endif; ?></h4>
							</div>
						</div>
						<div class="row br-rt-op">
							<div class="col-lg-4 col-md-4">
								<img src="<?php echo base_url(); ?>assets/img/profile/3.png" />
							</div>
							<div class="col-lg-8 col-md-8">
								<h4><?php if($this->lang->line('renter_page1_slide_B2')): ?><?php echo $this->lang->line('renter_page1_slide_B2'); else: ?>Link to PayTM Wallet while<?php endif; ?> </h4>
								<h4><?php if($this->lang->line('renter_page1_slide_B3')): ?><?php echo $this->lang->line('renter_page1_slide_B3'); else: ?>Riding for faster refunds!<?php endif; ?></h4>
							</div>
						</div>
					</div>
					<div class="hd-left-y-2">
						<a href="javascript:void(0);" class="welcome_account_navi" ><h5><?php if($this->lang->line('renter_page2_slide_A1')): ?><?php echo $this->lang->line('renter_page2_slide_A1'); else: ?>Account<?php endif; ?></h5></a>
						<h6><a href="javascript:void(0);" class="welcome_booking_navi" ><?php if($this->lang->line('renter_page1_slide_B4')): ?><?php echo $this->lang->line('renter_page1_slide_B4'); else: ?>My Bookings<?php endif; ?><span><img src="<?php echo base_url(); ?>assets/img/profile/4.png" /> </span></a></h6>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 prof-cnt-bc-1">
					<div class="col-lg-12 br-col9">
						<div class="col-lg-3 col-md-3">
							<div class="det-pr det-pr-op">
								<h3><img src="<?php echo base_url(); ?>assets/img/profile/5.png" /> </h3>
								<h4><?php if($this->lang->line('renter_page2_slide_A2')): ?><?php echo $this->lang->line('renter_page2_slide_A2'); else: ?>Account Details<?php endif; ?></h4>
							</div>
						</div>
						<div class="col-lg-9 col-md-9 city-trans">
							<div class="row">
								<div class="col-lg-4 col-md-4">
									<div class="text-ems">
										<h4><?php if($this->lang->line('renter_page2_slide_C7')): ?><?php echo $this->lang->line('renter_page2_slide_C7'); else: ?>Email <?php endif; ?>:</h4>
									</div>
								</div>
								<div class="col-lg-8 col-md-8">
									<input type="email" class="form-control mpo-tec" data-parsley-trigger="change"	
                             required="" name="email" value="<?php echo $data->email; ?>">
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-4">
									<div class="text-ems">
										<h4><?php if($this->lang->line('renter_page2_slide_A3')): ?><?php echo $this->lang->line('renter_page2_slide_A3'); else: ?>Mobile<?php endif; ?> :</h4>
									</div>
								</div>
								<div class="col-lg-8 col-md-8">
									<input type="text" class="form-control mpo-tec" data-parsley-type="digits" data-parsley-minlength="10" data-parsley-maxlength="15" data-parsley-pattern="^[0-9]+$" required="" name="phone" value="<?php echo $data->phone; ?>">
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-4">
									<div class="text-ems">
										<h4><?php if($this->lang->line('renter_page2_slide_C8')): ?><?php echo $this->lang->line('renter_page2_slide_C8'); else: ?>Driving License<?php endif; ?> :</h4>
									</div>
								</div>
								<div class="col-lg-8 col-md-8">
									<input type="text" class="form-control mpo-tec" required="" name="license_number" value="<?php echo $data->license_number; ?>">
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-4">
									<div class="text-ems">
										<h4><?php if($this->lang->line('renter_page2_slide_A4')): ?><?php echo $this->lang->line('renter_page2_slide_A4'); else: ?>Change Password<?php endif; ?> :</h4>
									</div>
								</div>
								<div class="col-lg-8 col-md-8">
									<input type="password" name="password" value="" class="form-control mpo-tec" >
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="col-lg-12 br-col9">
						<div class="col-lg-3 col-md-3">
							<div class="det-pr det-pr-op">
								<h3><img src="<?php echo base_url(); ?>assets/img/profile/9.png" /> </h3>
								<h4><?php if($this->lang->line('renter_page2_slide_B1')): ?><?php echo $this->lang->line('renter_page2_slide_B1'); else: ?>Personal Details<?php endif; ?></h4>
							</div>
						</div>
						<div class="col-lg-9 col-md-9 city-trans">
							<div class="row">
								<div class="col-lg-4 col-md-4">
									<div class="text-ems">
										<h4><?php if($this->lang->line('renter_page2_slide_B2')): ?><?php echo $this->lang->line('renter_page2_slide_B2'); else: ?>Name <?php endif; ?>:</h4>
									</div>
								</div>
								<div class="col-lg-8 col-md-8">
									<input type="text" class="form-control mpo-tec" required="" name="rentee" value="<?php echo $data->rentee; ?>">
								</div>
							</div>
							<div class="row">								
								<div class="col-lg-4 col-md-4">
									<div class="text-ems">
										<h4><?php if($this->lang->line('renter_page2_slide_B3')): ?><?php echo $this->lang->line('renter_page2_slide_B3'); else: ?>Date of Birth<?php endif; ?></h4>
									</div>
								</div>
								<div class="col-lg-8 col-md-8">
									<div class="row">
										<div class="col-lg-4 col-md-4">
											<input type="number" required="" placeholder="01" name="dob_date" data-parsley-type="digits" data-parsley-minlength="1" data-parsley-maxlength="2" data-parsley-pattern="^[0-9]+$" class="form-control mpo-tec" value="<?php if(isset($dob_date) && !empty($dob_date)): echo $dob_date; endif;?>" >
										</div>
										<div class="col-lg-4 col-md-4">
											<input type="number" required="" placeholder="01" data-parsley-type="digits" data-parsley-minlength="1" data-parsley-maxlength="2" data-parsley-pattern="^[0-9]+$" name="dob_month" class="form-control mpo-tec" value="<?php if(isset($dob_month) && !empty($dob_month)): echo $dob_month; endif; ?>" >
										</div>
										<div class="col-lg-4 col-md-4">
											<input type="number" required="" placeholder="1990" data-parsley-type="digits"  data-parsley-minlength="4" data-parsley-maxlength="4" data-parsley-pattern="^[0-9]+$" name="dob_year" class="form-control mpo-tec" value="<?php if(isset($dob_year) && !empty($dob_year)): echo $dob_year; endif; ?>" >
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-4 col-md-4">
									<div class="text-ems">
										<h4><?php if($this->lang->line('renter_page2_slide_B4')): ?><?php echo $this->lang->line('renter_page2_slide_B4'); else: ?>Gender <?php endif; ?>:</h4>
									</div>
								</div>
								<div class="col-lg-8 col-md-8">
									<select class="form-control selectpicker"  name="gender" data-style="btn-info">
										<?php if(isset($data->gender) && !empty($data->gender)): ?>
											
											<option <?php if($data->rentee == 'male'):?>selected <?php endif;?> value="male" ><?php if($this->lang->line('renter_page2_slide_C13')): ?><?php echo $this->lang->line('renter_page2_slide_C13'); else: ?>Male<?php endif; ?></option>
											<option <?php if($data->rentee == 'female'):?>selected <?php endif;?> value="female" ><?php if($this->lang->line('renter_page2_slide_C14')): ?><?php echo $this->lang->line('renter_page2_slide_C14'); else: ?>Female<?php endif; ?></option>
										<?php else: ?>
											<option value="male" ><?php if($this->lang->line('renter_page2_slide_C13')): ?><?php echo $this->lang->line('renter_page2_slide_C13'); else: ?>Male<?php endif; ?></option>
											<option value="female" ><?php if($this->lang->line('renter_page2_slide_C14')): ?><?php echo $this->lang->line('renter_page2_slide_C14'); else: ?>Female<?php endif; ?></option>										
										<?php endif; ?>	
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="clearfix"></div>
					<div class="col-lg-12 br-col9">
						<div class="col-lg-3 col-md-3">
							<div class="det-pr">
								<h3><img src="<?php echo base_url(); ?>assets/img/profile/9.png" /> </h3>
								<h4><?php if($this->lang->line('renter_page2_slide_C1')): ?><?php echo $this->lang->line('renter_page2_slide_C1'); else: ?>Location Details<?php endif; ?></h4>
							</div>
						</div>
						<div class="col-lg-9 col-md-9 city-trans">
							<div class="row">
								<div class="col-lg-4 col-md-4">
									<div class="text-ems">
										<h4><?php if($this->lang->line('renter_page2_slide_C2')): ?><?php echo $this->lang->line('renter_page2_slide_C2'); else: ?>Address <?php endif; ?>:</h4>
									</div>
								</div>
								<div class="col-lg-8 col-md-8">								
									<input type="text" required="" class="form-control mpo-tec" name="short_address" value="<?php echo $data->address; ?>">						
								</div>
							</div>
						</div>
					</div>
				</div>				
			</div>
			<div class="col-lg-12">
				<div class="upd-but rgt-wid-1">
					<h6><button type="submit" name="personel_settings" value="personel_settings" class="but-ck-avail"><?php if($this->lang->line('renter_page2_slide_C11')): ?><?php echo $this->lang->line('renter_page2_slide_C11'); else: ?>UPDATE<?php endif; ?></button> </h6>
				</div>
			</div>
		</div></form>
	</div>
</div>
<div class="rentee_booking_navigation" >
	<!--section-sele-main-->
	<div class="container">
		<div class="profile-dp">
			<div class="col-lg-4 col-md-4 col-sm-4"></div>
			<div class="col-lg-4 col-md-4 col-sm-4">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4">
						<div class="pr-dp-main">
							<?php if(isset($data->profile_picture) &&!empty($data->profile_picture)): ?>
								<img src="<?php echo base_url(); ?>admin/<?php echo $data->profile_picture; ?>" />	
							<?php else: ?>
								<img src="<?php echo base_url(); ?>assets/img/caution/rentee.jpg" >
							<?php endif; ?>	
							<form method="post" id="rentee_image_post_back" enctype="multipart/form-data">
								<label>
									<input type="file" name="profile_picture" id="rentee_image_push_back" style="opacity: 0;"> 
									<img class="renter-picture-change" src="<?php echo base_url(); ?>assets/img/caution/edit.png" />
								</label>
							</form>	
						</div>
					</div>
					<div class="col-lg-8 col-md-8 col-sm-8">
						<div class="pr-dp-main">
						   <h3><?php echo $data->rentee; ?></h3>
							<h4><?php echo $data->phone; ?></h4>
							<p><?php echo $data->email; ?></p>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4"></div>
		</div>
		<div class="profile-content">
			<div class="col-lg-12">
				<div class="hd-right-y hd-right-y-r">
					<ul>
						<a href="javascript:void(0);" class="pending-navi-panel"><li><?php if($this->lang->line('renter_page1_slide_A1')): ?><?php echo $this->lang->line('renter_page1_slide_A1'); else: ?>PENDING BOOKINGS<?php endif; ?></li></a>
						<a href="javascript:void(0);" class="completed-navi-panel"><li><?php if($this->lang->line('renter_page1_slide_A2')): ?><?php echo $this->lang->line('renter_page1_slide_A2'); else: ?>COMPLETED BOOKINGS<?php endif; ?></li></a>
						<a href="javascript:void(0);" class="cancelled-navi-panel"><li><?php if($this->lang->line('renter_page1_slide_A3')): ?><?php echo $this->lang->line('renter_page1_slide_A3'); else: ?>CANCELLED BOOKINGS<?php endif; ?></li></a>	
					</ul>
				</div>
			</div>
			<div class="col-lg-12">
				<div class="col-lg-3 col-md-3 prof-cnt-bc">
					<div class="hd-left-y-1">
						<div class="row">
							<div class="col-lg-4 col-md-4">
								<img src="<?php echo base_url(); ?>assets/img/profile/2.png" />
							</div>
							<div class="col-lg-8 col-md-8">
								<h3><?php if($this->lang->line('renter_page2_slide_C9')): ?><?php echo $this->lang->line('renter_page2_slide_C9'); else: ?>Check<?php endif; ?></h3>
								<h4><?php if($this->lang->line('renter_page2_slide_C12')): ?><?php echo $this->lang->line('renter_page2_slide_C12'); else: ?>Credits Balance<?php endif; ?></h4>
							</div>
						</div>
						<div class="row br-rt-op">
							<div class="col-lg-4 col-md-4">
								<img src="<?php echo base_url(); ?>assets/img/profile/3.png" />
							</div>
							<div class="col-lg-8 col-md-8">
								<h4><?php if($this->lang->line('renter_page1_slide_B2')): ?><?php echo $this->lang->line('renter_page1_slide_B2'); else: ?>Link to PayTM Wallet while <?php endif; ?></h4>
								<h4><?php if($this->lang->line('renter_page1_slide_B3')): ?><?php echo $this->lang->line('renter_page1_slide_B3'); else: ?>Riding for faster refunds!<?php endif; ?></h4>
							</div>
						</div>
					</div>
					<div class="hd-left-y-2">
						<a href="javascript:void(0);" class="welcome_booking_navi" ><h5><?php if($this->lang->line('renter_page1_slide_B4')): ?><?php echo $this->lang->line('renter_page1_slide_B4'); else: ?>My Bookings<?php endif; ?></h5></a>
						<h6><a href="javascript:void(0);" class="welcome_account_navi" ><?php if($this->lang->line('renter_page2_slide_A1')): ?><?php echo $this->lang->line('renter_page2_slide_A1'); else: ?>Account<?php endif; ?><span><img src="<?php echo base_url(); ?>assets/img/profile/4.png" /> </span></a></h6>
					</div>
				</div>
				<div class="col-lg-9 col-md-9 prof-cnt-bc-1 pending-booking-renter">
				<?php if(isset($pending_bookings) && !empty($pending_bookings)): 
						foreach($pending_bookings as $pending): 
							$from_date = date("M-d", strtotime($pending->from_date));
							$exploded_from_date = explode('-',$from_date);
							$to_date = date("M-d", strtotime($pending->to_date));
							$exploded_to_date = explode('-',$to_date);
							$exploded_total_date = explode('-',$pending->total_date);	
							?>
					<div class="col-lg-12 br-col9 br-col9p">
						<div class="col-lg-4 col-md-4 left-p-mybook">
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<img src="<?php echo base_url(); ?>admin/<?php echo $pending->car_image; ?>" class="left-p-mybook-bh-img" />
								</div>
								<div class="col-lg-6 col-md-6 left-p-mybook-bh">
									<h3><?php echo $pending->car_make; ?></h3>
									<h2><?php echo $pending->car_model; ?></h2>
									<h3><?php echo $pending->seats; ?> <?php if($this->lang->line('renter_page2_slide_C3')): ?><?php echo $this->lang->line('renter_page2_slide_C3'); else: ?>seater<?php endif; ?></h3>
								</div>
							</div>
						</div>
						<div class="col-lg-8 col-md-8">
							<div class="rgt-lk">
								<p><?php echo $exploded_from_date[0]; ?> <?php echo $exploded_from_date[1]; ?>, <?php echo $pending->from_time; ?> <span><?php if($this->lang->line('renter_page2_slide_C4')): ?><?php echo $this->lang->line('renter_page2_slide_C4'); else: ?>to<?php endif; ?></span><?php echo $exploded_to_date[0]; ?> <?php echo $exploded_to_date[1]; ?>, <?php echo $pending->to_time; ?></p>
							</div>
							<div class="rgt-lk">
								<div class="row">
									<div class="col-lg-6 col-md-6">									
										<h4><?php echo $exploded_total_date[0]; ?> <?php if($this->lang->line('renter_page2_slide_C5')): ?><?php echo $this->lang->line('renter_page2_slide_C5'); else: ?>days<?php endif; ?>, <?php echo $exploded_total_date[1]; ?> <?php if($this->lang->line('renter_page2_slide_C6')): ?><?php echo $this->lang->line('renter_page2_slide_C6'); else: ?>hours<?php endif; ?></h4>									
										<h5><?php echo $pending->sub_location; ?>, <?php echo $pending->main_location; ?></h5>
									</div>
									<div class="col-lg-6 col-md-6">
										<h6><span><img src="<?php echo base_url(); ?>assets/img/profile/12.png" /> <?php echo $pending->price; ?></span></h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
				<?php else: ?>
				<h3>No Bookings Found </h3>				
				<?php endif; ?>						
				</div>
				<div class="col-lg-9 col-md-9 prof-cnt-bc-1 completed-booking-renter">
					<?php if(isset($completed_bookings) && !empty($completed_bookings)): 
						foreach($completed_bookings as $completed): 
							$from_date = date("M-d", strtotime($completed->from_date));
							$exploded_from_date = explode('-',$from_date);
							$to_date = date("M-d", strtotime($completed->to_date));
							$exploded_to_date = explode('-',$to_date);
							$exploded_total_date = explode('-',$completed->total_date);	
							?>
					<div class="col-lg-12 br-col9 br-col9p">
						<div class="col-lg-4 col-md-4 left-p-mybook">
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<img src="<?php echo base_url(); ?>admin/<?php echo $completed->car_image; ?>" class="left-p-mybook-bh-img" />
								</div>
								<div class="col-lg-6 col-md-6 left-p-mybook-bh">
									<h3><?php echo $completed->car_make; ?></h3>
									<h2><?php echo $completed->car_model; ?></h2>
									<h3><?php echo $completed->seats; ?> <?php if($this->lang->line('renter_page2_slide_C3')): ?><?php echo $this->lang->line('renter_page2_slide_C3'); else: ?>seater<?php endif; ?></h3>
								</div>
							</div>
						</div>
						<div class="col-lg-8 col-md-8">
							<div class="rgt-lk">
								<p><?php echo $exploded_from_date[0]; ?> <?php echo $exploded_from_date[1]; ?>, <?php echo $completed->from_time; ?> <span>to</span><?php echo $exploded_to_date[0]; ?> <?php echo $exploded_to_date[1]; ?>, <?php echo $completed->to_time; ?></p>
							</div>
							<div class="rgt-lk">
								<div class="row">
									<div class="col-lg-6 col-md-6">									
										<h4><?php echo $exploded_total_date[0]; ?> <?php if($this->lang->line('renter_page2_slide_C5')): ?><?php echo $this->lang->line('renter_page2_slide_C5'); else: ?>days<?php endif; ?>, <?php echo $exploded_total_date[1]; ?><?php if($this->lang->line('renter_page2_slide_C6')): ?><?php echo $this->lang->line('renter_page2_slide_C6'); else: ?> hours<?php endif; ?></h4>									
										<h5><?php echo $completed->sub_location; ?>, <?php echo $completed->main_location; ?></h5>
									</div>
									<div class="col-lg-6 col-md-6">
										<h6><span><img src="<?php echo base_url(); ?>assets/img/profile/12.png" /> <?php echo $completed->price; ?></span></h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
				<?php else: ?>
				<h3>No Bookings Found </h3>
				<?php endif; ?>											
				</div>
				<div class="col-lg-9 col-md-9 prof-cnt-bc-1 cancelled-booking-renter">					
					<?php if(isset($cancelled_bookings) && !empty($cancelled_bookings)): 
						foreach($cancelled_bookings as $cancelled): 
							$from_date = date("M-d", strtotime($cancelled->from_date));
							$exploded_from_date = explode('-',$from_date);
							$to_date = date("M-d", strtotime($cancelled->to_date));
							$exploded_to_date = explode('-',$to_date);
							$exploded_total_date = explode('-',$cancelled->total_date);	
							?>
					<div class="col-lg-12 br-col9 br-col9p">
						<div class="col-lg-4 col-md-4 left-p-mybook">
							<div class="row">
								<div class="col-lg-6 col-md-6">
									<img src="<?php echo base_url(); ?>admin/<?php echo $cancelled->car_image; ?>" class="left-p-mybook-bh-img" />
								</div>
								<div class="col-lg-6 col-md-6 left-p-mybook-bh">
									<h3><?php echo $cancelled->car_make; ?></h3>
									<h2><?php echo $cancelled->car_model; ?></h2>
									<h3><?php echo $cancelled->seats; ?><?php if($this->lang->line('renter_page2_slide_C3')): ?><?php echo $this->lang->line('renter_page2_slide_C3'); else: ?> seater<?php endif; ?></h3>
								</div>
							</div>
						</div>
						<div class="col-lg-8 col-md-8">
							<div class="rgt-lk">
								<p><?php echo $exploded_from_date[0]; ?> <?php echo $exploded_from_date[1]; ?>, <?php echo $cancelled->from_time; ?> <span><?php if($this->lang->line('renter_page2_slide_C4')): ?><?php echo $this->lang->line('renter_page2_slide_C4'); else: ?>to<?php endif; ?></span><?php echo $exploded_to_date[0]; ?> <?php echo $exploded_to_date[1]; ?>, <?php echo $cancelled->to_time; ?></p>
							</div>
							<div class="rgt-lk">
								<div class="row">
									<div class="col-lg-6 col-md-6">									
										<h4><?php echo $exploded_total_date[0]; ?> <?php if($this->lang->line('renter_page2_slide_C5')): ?><?php echo $this->lang->line('renter_page2_slide_C5'); else: ?>days<?php endif; ?>, <?php echo $exploded_total_date[1]; ?> <?php if($this->lang->line('renter_page2_slide_C6')): ?><?php echo $this->lang->line('renter_page2_slide_C6'); else: ?>hours<?php endif; ?></h4>									
										<h5><?php echo $cancelled->sub_location; ?>, <?php echo $cancelled->main_location; ?></h5>
									</div>
									<div class="col-lg-6 col-md-6">
										<h6><span><img src="<?php echo base_url(); ?>assets/img/profile/12.png" /> <?php echo $cancelled->price; ?></span></h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php endforeach; ?>
				<?php else: ?>
				<h3>No Bookings Found </h3>
				<?php endif; ?>						
				</div>
			</div>
		</div>
	</div>
	<!--section-sele-main-->
</div>
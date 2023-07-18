<input type="hidden" name="glossy_tariff_car_id" id="glossy_tariff_car_id" value="<?php echo glossy_tariff()->id; ?>" >
<input type="hidden" name="currentlocation_id" id="curloc-id" data-location="<?php echo $get_locid; ?>" value="<?php echo $get_locid; ?>" >
<input type="hidden" name="modified_from_date" id="modified_from_date" data-location="<?php echo $modified_from_date; ?>" value="<?php echo $modified_from_date; ?>" >
<input type="hidden" name="modified_to_date" id="modified_to_date" data-location="<?php echo $modified_to_date; ?>" value="<?php echo $modified_to_date; ?>" >
<input type="hidden" name="modified_from_time" id="modified_from_time" data-location="<?php echo $from_time; ?>" value="<?php echo $from_time; ?>" >
<input type="hidden" name="modified_to_time" id="modified_to_time" data-location="<?php echo $to_time; ?>" value="<?php echo $to_time; ?>" >
<input type="hidden" name="modified_totaldays" id="modified_totaldays" data-location="<?php echo $duration_hours; ?>" value="<?php echo $duration_hours; ?>" >
<input type="hidden" name="modified_booking_days" id="modified_booking_days" data-location="<?php echo $duration_days; ?>" value="<?php echo $duration_days; ?>" >
<input type="hidden" name="modified_booking_minutes" id="modified_booking_minutes" data-location="<?php echo $duration_minutes; ?>" value="<?php echo $duration_minutes; ?>" >
<input type="hidden" name="modified_booking_address" id="modified_booking_address" data-location="<?php echo $address; ?>" value="<?php echo $address; ?>" >
<input type="hidden" name="modified_booking_latitude" id="modified_booking_latitude" data-location="<?php echo $latitude; ?>" value="<?php echo $latitude; ?>" >
<input type="hidden" name="modified_booking_longitude" id="modified_booking_longitude" data-location="<?php echo $longitude; ?>" value="<?php echo $longitude; ?>" >
<input type="hidden" name="calculated_modified_total_hours" id="calculated_modified_total_hours" data-location="<?php echo $duration_hours; ?>" value="<?php $final_cal_tot_hours = ($duration_days * 24 ) + $duration_hours; echo $final_cal_tot_hours; ?>" >
<!--section-sele-main-->
<div class="booking_page_container" >
	<div class="container-fluid">
		<div class="sel-ridepop-main">
			<div class="container">
				<div class="col-lg-12">
					<div class="col-lg-4 col-md-4">
						<div class="ride-pop-1">
							<h3><?php if($this->lang->line('coupe_slide_A1')): ?><?php echo $this->lang->line('coupe_slide_A1'); else: ?>Date and time for your trip<?php endif; ?></h3>
							<div class="row">
								<div class="col-lg-4 col-md-4 bc-black blc-w">
									<p><?php if($this->lang->line('coupe_slide_A4')): ?><?php echo $this->lang->line('coupe_slide_A4'); else: ?>START  TRIP<?php endif; ?> <span><img src="<?php echo base_url(); ?>assets/img/popup/20.png" /> </span></p>
									<h5><?php echo $from_date; ?></h5>
									<p><?php echo $from_month; ?></p>
									<p><?php echo $from_time; ?></p>
								</div>
								<div class="col-lg-4 col-md-4 bc-black blc-w">
									<p><?php if($this->lang->line('coupe_slide_A5')): ?><?php echo $this->lang->line('coupe_slide_A5'); else: ?>END  TRIP <?php endif; ?><span><img src="<?php echo base_url(); ?>assets/img/popup/20.png" /> </span></p>
									<h5><?php echo $to_date; ?></h5>
									<p><?php echo $to_month; ?></p>
									<p><?php echo $to_time; ?></p>
								</div>
								<div class="col-lg-4 col-md-4 bc-black blc-w">
									<p><?php if($this->lang->line('coupe_slide_A6')): ?><?php echo $this->lang->line('coupe_slide_A6'); else: ?>DURATION<?php endif; ?></p>
									<h5><?php echo $duration_days; ?> <?php if($this->lang->line('coupe_slide_B4')): ?><?php echo $this->lang->line('coupe_slide_B4'); else: ?>DAYS<?php endif; ?>
									<?php echo $duration_hours; ?> <?php if($this->lang->line('coupe_slide_B5')): ?><?php echo $this->lang->line('coupe_slide_B5'); else: ?>HOURS <?php endif; ?>
									<?php echo $duration_minutes; ?> <?php if($this->lang->line('coupe_slide_B6')): ?><?php echo $this->lang->line('coupe_slide_B6'); else: ?>MINUTES<?php endif; ?></h5>
								</div>
							</div>
							<h4><button type="submit" class="btn-tcki btn-tcki-1"><img src="<?php echo base_url(); ?>assets/img/popup/18.png" /> </button></h4>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 ">
						<div class="ride-pop-1 ride-pop-2">
							<h3><?php if($this->lang->line('coupe_slide_A2')): ?><?php echo $this->lang->line('coupe_slide_A2'); else: ?>Find cars at <?php endif; ?> <?php echo $search_location; ?></h3>
							<div class="col-lg-12 bc-black">
								<h5><?php if($this->lang->line('coupe_slide_A7')): ?><?php echo $this->lang->line('coupe_slide_A7'); else: ?>YOUR LOCATION IS<?php endif; ?></h5>
								<h5><?php echo $address; ?></h5>                 
							</div>
								<h4><button type="submit" class="btn-tcki btn-tcki-2"><img src="<?php echo base_url(); ?>assets/img/popup/18.png" /> </button></h4>
							</div>
					</div>
					<div class="col-lg-4 col-md-4">
						<div class="ride-pop-1">
						<h3><?php if($this->lang->line('coupe_slide_A3')): ?><?php echo $this->lang->line('coupe_slide_A3'); else: ?>Choose a free km package<?php endif; ?></h3>
							<div class="row">
								<?php foreach($tariff as $single_tariff): ?>
									<div class="col-lg-4 col-md-4 bc-black blc-w tariff-amat " id="StyleTariffCar<?php if(glossy_tariff()->id == $single_tariff->id): echo glossy_tariff()->id; else: echo $single_tariff->id; endif; ?>" onclick="tariffcarselection(this,<?php echo $single_tariff->id; ?>)">
										<h5 class="coupe-h5" ><?php if($this->lang->line('webname')): ?><?php echo $this->lang->line('webname'); else: ?>CITYRIDE <?php endif; ?><?php echo $single_tariff->name; ?></h5>
										<p><?php if($this->lang->line('coupe_slide_A8')): ?><?php echo $this->lang->line('coupe_slide_A8'); else: ?>YOU GET FIRST<?php endif; ?></p>
										<p><?php echo $single_tariff->free_km; ?><?php if($this->lang->line('coupe_slide_B7')): ?><?php echo $this->lang->line('coupe_slide_B7'); else: ?>kms FREE<?php endif; ?></p>
									</div>
								<?php endforeach; ?>
							</div>
							<h4><button type="submit" class="btn-tcki "><img src="<?php echo base_url(); ?>assets/img/popup/18.png" /> </button></h4>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--section-sele-main-->	
	<div class="container">		
		<div class="avail-cars car-tariff-changes ">
			<?php if(isset($showroom_cars) && !empty($showroom_cars)): ?>
			<div class="col-lg-12">
				<h3><?php if($this->lang->line('coupe_slide_B1')): ?><?php echo $this->lang->line('coupe_slide_B1'); else: ?>Available Cars<?php endif; ?></h3>
				<div class="avl-car-main">
				<?php foreach($showroom_cars as $single_cars):
						?>				
					<div class="row caramat" data-tariffid="<?php echo $single_cars->tariff_id; ?>" data-category="<?php echo $single_cars->category; ?>"  data-freekm="<?php echo $single_cars->free_km; ?>" data-showroomaddress="<?php echo $single_cars->showroom_address; ?>" data-showroomlat="<?php echo $single_cars->latitude; ?>" data-showroomlon="<?php echo $single_cars->longitude; ?>" data-image="<?php echo $single_cars->main_image; ?>" data-seats="<?php echo $single_cars->seats; ?>" data-price="<?php echo $single_cars->final_price; ?>" data-carname="<?php echo $single_cars->car_fname .':'. $single_cars->car_lname; ?>" data-excess="<?php echo $single_cars->price_km; ?>" id="stylecarSelect<?php echo $single_cars->id; ?>" onclick="carselection(this,<?php echo $single_cars->id; ?>)" >
						<div class="col-lg-3 col-md-3 bc-v-1">
						  <div class="cart-1">
							  <img src="<?php echo base_url(); ?>admin/<?php echo $single_cars->main_image; ?>" class="img-responsive" />
						  </div>
						</div>
						<div class="col-lg-6 col-md-6 bc-v-2">
							<div class="cart-2">
								<h4><?php echo $single_cars->car_fname .' '. $single_cars->car_lname; ?></h4>
								<ul>						
									<?php if(!empty($single_cars->seats)): ?>  <li><span><img src="<?php echo base_url(); ?>assets/img/popup/22.png" /> </span> <?php echo $single_cars->seats; ?> <?php if($this->lang->line('coupe_slide_B8')): ?><?php echo $this->lang->line('coupe_slide_B8'); else: ?>Seats<?php endif; ?></li> <?php endif; ?>
									<?php if(!empty($single_cars->transmission)): ?>  <li><span><img src="<?php echo base_url(); ?>assets/img/popup/23.png" /> </span> <?php echo $single_cars->transmission; ?> </li><?php endif; ?>
									<?php if(!empty($single_cars->top_speed)): ?><li><span><img src="<?php echo base_url(); ?>assets/img/popup/24.png" /> </span> <?php echo $single_cars->top_speed; ?> <?php if($this->lang->line('coupe_slide_B9')): ?><?php echo $this->lang->line('coupe_slide_B9'); else: ?>Speed<?php endif; ?></li><?php endif; ?>
								</ul>
								<div class="clearfix"></div>
							</div>
							<div class="cart-3">
								<ul>
									<li><span><img src="<?php echo base_url(); ?>assets/img/popup/25.png" /> </span><?php echo $single_cars->fuel_type; ?></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 bc-v-2">
							<div class="cart-4">
								<h4><span><img src="<?php echo base_url(); ?>assets/img/popup/26.png" /></span><?php echo $single_cars->final_price; ?></h4>
								<h5><?php if($this->lang->line('coupe_slide_B11')): ?><?php echo $this->lang->line('coupe_slide_B11'); else: ?>Excess <?php endif; ?><span><img src="<?php echo base_url(); ?>assets/img/popup/26.png" /></span><?php echo $single_cars->price_km; ?><?php if($this->lang->line('coupe_slide_B12')): ?><?php echo $this->lang->line('coupe_slide_B12'); else: ?>Per/km<?php endif; ?></h5>
							</div>
							<div class="cart-5">
								<h4><?php echo $single_cars->name; ?></h4>
								<h5>(<?php echo $single_cars->showroom_address; ?>)</h5>
							</div>
						</div>
					</div>				
				<?php endforeach;?>
				</div>
				<div class="row bookamat"></div>
			</div>
			<?php  else: ?>
			<div class="caution-img" >
				<img src="<?php echo base_url(); ?>assets/img/caution/nocar.jpg" /> 	
			</div>	
			<?php  endif; ?>
		</div>		
	</div>	
</div>
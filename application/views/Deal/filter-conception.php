<?php if(!empty($deal_cars) && isset($deal_cars)): ?>
<div class="col-lg-12 change-deal-cars deal-edit-styles">
	<div class="check-inner-main">
				<?php 		foreach($deal_cars as $cars):
								$separatedDM_From = date("d-M", strtotime($cars->from_date));
								$daymonth_From =explode('-',$separatedDM_From);  
								$from_date = explode('-',$cars->from_date); 						
								$separatedDM_To = date("d-M", strtotime($cars->to_date));
								$daymonth_To =explode('-',$separatedDM_To);  
								$to_date = explode('-',$cars->to_date); 							
								$time_diff = explode(':',$cars->time_diff);
								?>								
								<input type="hidden" class="car-final-price" name="car_price" id="car-final-price<?php echo $cars->car_listing_id; ?>" value="<?php echo $cars->offer_price_normal; ?>" >
								<input type="hidden" class="car-final-freekm" name="free_km" id="car-final-freekm<?php echo $cars->car_listing_id; ?>" value="<?php echo $cars->free_km_normal; ?>" >
								<input type="hidden" name="location_id" id="curloc-id<?php echo $cars->car_listing_id; ?>" value="<?php echo $location_id; ?>" >
								<input type="hidden" name="excess" id="excess-price-km<?php echo $cars->car_listing_id; ?>" value="<?php echo $cars->excess; ?>" >
								<input type="hidden" name="from_date" id="modified_from_date<?php echo $cars->car_listing_id; ?>" value="<?php echo $cars->from_date .' '. $cars->from_time; ?>" >
								<input type="hidden" name="to_date" id="modified_to_date<?php echo $cars->car_listing_id; ?>" value="<?php echo $cars->to_date .' '. $cars->to_time; ?>" >
								<input type="hidden" name="days" id="modified_booking_days<?php echo $cars->car_listing_id; ?>" value="<?php echo $time_diff[0]; ?>" >
								<input type="hidden" name="hours" id="calculated_modified_total_hours<?php echo $cars->car_listing_id; ?>" value="<?php echo $time_diff[1]; ?>" >
								<input type="hidden" name="minutes" id="modified_booking_minutes<?php echo $cars->car_listing_id; ?>" value="<?php echo $time_diff[2]; ?>" >								
								<input type="hidden" name="car_name" id="car-final-name<?php echo $cars->car_listing_id; ?>" value="<?php echo $cars->car_fname .':'.$cars->car_lname; ?>" >
								<input type="hidden" name="car_image" id="car-final-image<?php echo $cars->car_listing_id; ?>" value="<?php echo $cars->main_image; ?>" >
								<input type="hidden" name="car_seats" id="car-final-seats<?php echo $cars->car_listing_id; ?>" value="<?php echo $cars->seats; ?>" >
								<input type="hidden" name="showroom_latitude" id="car-final-lat<?php echo $cars->car_listing_id; ?>" value="<?php echo $cars->showroom_latitude; ?>" >
								<input type="hidden" name="showroom_longitude" id="car-final-lon<?php echo $cars->car_listing_id; ?>" value="<?php echo $cars->showroom_longitude; ?>" >								
								<input type="hidden" name="from_time" id="modified_from_time<?php echo $cars->car_listing_id; ?>" value="<?php echo $cars->from_time; ?>" >
								<input type="hidden" name="to_time" id="modified_to_time<?php echo $cars->car_listing_id; ?>" value="<?php echo $cars->to_time; ?>" >
								<input type="hidden" name="showroom_address" id="car-final-address<?php echo $cars->car_listing_id; ?>" value="<?php echo $cars->short_address; ?>" >
								<input type="hidden" name="category" id="car-final-category<?php echo $cars->car_listing_id; ?>" value="<?php echo $cars->category;?>" >
								<input type="hidden" name="free_km" id="car-final-freekm<?php echo $cars->car_listing_id; ?>"  >
								<input type="hidden" name="nearby_id" id="popular-location-by-loc<?php echo $cars->car_listing_id; ?>" >
								<input type="hidden" name="tariff_id" id="car-final-tariff_id<?php echo $cars->car_listing_id; ?>"  >
								<input type="hidden" name="address" id="modified_booking_address<?php echo $cars->car_listing_id; ?>"  >
								<input type="hidden" name="latitude" id="modified_booking_latitude<?php echo $cars->car_listing_id; ?>"  >
								<input type="hidden" name="longitude" id="modified_booking_longitude<?php echo $cars->car_listing_id; ?>"  >	
								<div class="col-lg-6">
									<div class="row">
										<div class="ck-inner-r-1">
											<div class="col-lg-5">
												 <h2 class="deal-ckrent-1"><img src="<?php echo base_url(); ?>admin/<?php echo $cars->main_image; ?>" /> </h2>
												 <h3><?php echo $cars->car_fname; ?></h3>
												<h3><span class="tr-deal-car" ><?php echo $cars->car_lname; ?> </span><?php if(!empty($cars->seats)): ?><span><?php echo $cars->seats; ?> <?php if($this->lang->line('deal_slide_B10')): ?><?php echo $this->lang->line('deal_slide_B10'); else: ?>seater<?php endif; ?></span><?php endif; ?></h3>
											</div>
											<div class="col-lg-7">
												<?php if(!empty($cars->percentage)): ?><span class="off-scn"><?php echo $cars->percentage; ?><?php if($this->lang->line('deal_slide_B9')): ?><?php echo $this->lang->line('deal_slide_B9'); else: ?>% OFF<?php endif; ?></span><?php endif; ?>
												<p><span><?php echo $daymonth_From[0]; ?>, <?php echo $from_date[0]; ?> <?php echo $daymonth_From[1]; ?>,<?php echo $cars->from_time; ?></span><img src="<?php echo base_url(); ?>assets/img/faq/12.png" /><span><?php echo $daymonth_To[0]; ?>, <?php echo $to_date[0]; ?> <?php echo $daymonth_To[1]; ?>,<?php echo $cars->to_time; ?></span> </p>
												<h5><?php echo $time_diff[0]; ?> <?php if($this->lang->line('deal_slide_B8')): ?><?php echo $this->lang->line('deal_slide_B8'); else: ?>days <?php endif; ?> <?php echo $time_diff[1]; ?> <?php if($this->lang->line('deal_slide_B7')): ?><?php echo $this->lang->line('deal_slide_B7'); else: ?>hours <?php endif; ?> <?php echo $time_diff[2]; ?> <?php if($this->lang->line('deal_slide_B6')): ?><?php echo $this->lang->line('deal_slide_B6'); else: ?> minutes<?php endif; ?></h5>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="cfg-inner-1">
											<h3><span><img src="<?php echo base_url(); ?>assets/img/faq/11.png" /> </span><?php echo $cars->short_address; ?></h3>
											<div class="row">
												<div class="col-lg-4">
													<div class="dealcartarchange slc-change" data-price="<?php echo $cars->offer_price_normal; ?>" data-freekm="<?php echo $cars->free_km_normal; ?>" id="DealCarNaviOne<?php echo $cars->id;?>" onclick="DealCarNaviOne(this,<?php echo $cars->id;?>)" >
														<?php if(!empty($cars->original_price_normal)): ?><h4><img src="<?php echo base_url(); ?>assets/img/faq/14.png" /><?php echo $cars->original_price_normal; ?></h4><?php endif; ?>
														<?php if(!empty($cars->offer_price_normal)): ?><h5><img src="<?php echo base_url(); ?>assets/img/faq/14.png" /><?php echo $cars->offer_price_normal; ?></h5><?php endif; ?>
														<?php if(!empty($cars->free_km_normal)): ?><h6><?php echo $cars->free_km_normal; ?><?php if($this->lang->line('deal_slide_B5')): ?><?php echo $this->lang->line('deal_slide_B5'); else: ?>km free<?php endif; ?></h6><?php endif; ?>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="dealcartarchange" data-price="<?php echo $cars->offer_price_special; ?>" data-freekm="<?php echo $cars->free_km_special; ?>" id="DealCarNaviTwo<?php echo $cars->id;?>" onclick="DealCarNaviTwo(this,<?php echo $cars->id;?>)" >
														<?php if(!empty($cars->original_price_special)): ?><h4><img src="<?php echo base_url(); ?>assets/img/faq/14.png" /><?php echo $cars->original_price_special; ?></h4><?php endif; ?>
														<?php if(!empty($cars->offer_price_special)): ?><h5><img src="<?php echo base_url(); ?>assets/img/faq/14.png" /><?php echo $cars->offer_price_special; ?></h5><?php endif; ?>
														<?php if(!empty($cars->free_km_special)): ?><h6><?php echo $cars->free_km_special; ?><?php if($this->lang->line('deal_slide_B5')): ?><?php echo $this->lang->line('deal_slide_B5'); else: ?>km free<?php endif; ?></h6><?php endif; ?>
													</div>
												</div>
												<div class="col-lg-4">
													<div class="dealcartarchange" data-price="<?php echo $cars->offer_price_super; ?>" data-freekm="<?php echo $cars->free_km_super; ?>" id="DealCarNaviThree<?php echo $cars->id;?>" onclick="DealCarNaviThree(this,<?php echo $cars->id;?>)" >
														<?php if(!empty($cars->original_price_super)): ?><h4><img src="<?php echo base_url(); ?>assets/img/faq/14.png" /><?php echo $cars->original_price_super; ?></h4><?php endif; ?>
														<?php if(!empty($cars->offer_price_super)): ?><h5><img src="<?php echo base_url(); ?>assets/img/faq/14.png" /><?php echo $cars->offer_price_super; ?></h5><?php endif; ?>
														<?php if(!empty($cars->free_km_super)): ?><h6><?php echo $cars->free_km_super; ?><?php if($this->lang->line('deal_slide_B5')): ?><?php echo $this->lang->line('deal_slide_B5'); else: ?>km free<?php endif; ?></h6><?php endif; ?>
													</div>
												</div>
											</div>
											<h6><a href="javascript:void(0);" onclick="nextsubmitbookingDeal(this)"  data-id="<?php echo $cars->car_listing_id; ?>" ><?php if($this->lang->line('deal_slide_B4')): ?><?php echo $this->lang->line('deal_slide_B4'); else: ?>Book<?php endif; ?></a></h6>
										</div>
									</div>
								</div>
				<?php endforeach;?>														
			</div>
		</div>
		<?php else: ?>
		<div class="caution-img" >
			<img src="<?php echo base_url(); ?>assets/img/caution/nocar.jpg" /> 	
		</div>	
<?php endif; ?>			
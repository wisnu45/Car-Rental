<div class="commute-page-container" >
	<input type="hidden" name="glossy_commute_id" id="glossy_commute_id" value="<?php if(isset(glossy_commute()->id) && !empty(glossy_commute()->id)): echo glossy_commute()->id; endif;?>" >
	<!--commute-first-->
	<div class="container sc-mn-compute">
		<div class="col-lg-12">
			<div class="first-commute">
				<img src="<?php echo base_url(); ?>assets/img/commute/2.png" class="img-responsive" />
			</div>
		</div>
		<div class="second-commute ">
			<div class="col-lg-12 ">
				<div class="col-lg-12 second-commute-1">
					<div class="col-lg-3">
						<h2><img src="<?php echo base_url(); ?>assets/img/commute/3.png" /> </h2>
						<h3><?php if($this->lang->line('commute_slide_A1')): ?><?php echo $this->lang->line('commute_slide_A1'); else: ?>No peak hour cab blues<?php endif; ?></h3>
					</div>
					<div class="col-lg-3">
						<h2><img src="<?php echo base_url(); ?>assets/img/commute/4.png" /> </h2>
						<h3><?php if($this->lang->line('commute_slide_A2')): ?><?php echo $this->lang->line('commute_slide_A2'); else: ?>Weather won't ruin your ride <?php endif; ?></h3>
					</div>
					<div class="col-lg-3">
						<h2><img src="<?php echo base_url(); ?>assets/img/commute/5.png" /> </h2>
						<h3><?php if($this->lang->line('commute_slide_A3')): ?><?php echo $this->lang->line('commute_slide_A3'); else: ?>Car pool to add fun & lower costs <?php endif; ?></h3>
					</div>
					<div class="col-lg-3">
						<h2><img src="<?php echo base_url(); ?>assets/img/commute/6.png" /> </h2>
						<h3><?php if($this->lang->line('commute_slide_A4')): ?><?php echo $this->lang->line('commute_slide_A4'); else: ?>Do more with weeks <?php endif; ?></h3>
					</div>
				</div>
				<div class="col-lg-12 second-commute-2">
					<?php 
					if(isset($commute) && !empty($commute)):
						foreach($commute as $single_commute): 
							$From_date = date("d-M", strtotime($single_commute->from_date));
							$To_date = date("d-M", strtotime($single_commute->to_date));
							$exploded_from_date =explode('-',$From_date); 
							$exploded_to_date =explode('-',$To_date);
							$single_commute_from_date = $single_commute->from_date .' '. $single_commute->from_time;
							$single_commute_to_date = $single_commute->to_date .' '. $single_commute->to_time;
						?>
							<div class="col-lg-4 col-md-4 sdf-1" data-fromdate="<?php echo $single_commute_from_date; ?>" data-todate="<?php echo $single_commute_to_date; ?>" id="CommuteNavigationFunc<?php if(glossy_commute()->id == $single_commute->id): echo glossy_commute()->id; else: echo $single_commute->id; endif; ?>" onclick="CommuteNavigationFunc(this,<?php echo $single_commute->id; ?>)" >
								<div class="row">
									<div class="col-lg-4">
										<div class="time-scn-commute">
											<h2><?php echo $exploded_from_date[0].' '.$exploded_from_date[1]; ?> 
												<?php echo $single_commute->from_time; ?></h2>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="time-scn-commute">
											<h2><?php if($this->lang->line('commute_slide_B')): ?><?php echo $this->lang->line('commute_slide_B'); else: ?>To<?php endif; ?></h2>
										</div>
									</div>
									<div class="col-lg-4">
										<div class="time-scn-commute">
											<h2><?php echo $exploded_to_date[0].' '.$exploded_to_date[1]; ?> 
												<?php echo $single_commute->to_time; ?></h2>
										</div>
									</div>
								</div>
							</div>
				   <?php endforeach; endif;?>
				</div>
				<div class="append-commute-car-outer" >
					<?php if(isset($get_cars) && !empty($get_cars)): ?>
					<div class="col-lg-12 second-commute-2">
						<div class="col-lg-12 pad-zero commute-edit-styles">
							<?php 						
								foreach($get_cars as $commute_cars): 
									$durationfrom =new DateTime($commute_cars->from_date .' '. $commute_cars->from_time);
									$durationto =new DateTime($commute_cars->to_date .' '. $commute_cars->to_time);
									$diff = $durationfrom->diff($durationto);
									$duration_days = $diff->days;
									$duration_hours = $diff->h;
									$duration_minutes = $diff->m;
								?>	
									<input type="hidden" name="car_id" id="car-selected-id" value="<?php echo $commute_cars->car_listing_id; ?>" > 
									<input type="hidden" class="car-final-price" name="car_price" id="car-final-price" value="<?php echo $commute_cars->limit_start_km; ?>" >
									<input type="hidden" class="car-final-freekm" name="free_km" id="car-final-freekm" value="<?php echo $commute_cars->limit_start_price; ?>" >
									<input type="hidden" name="location_id" id="curloc-id" value="<?php echo $location_id; ?>" >										
									<input type="hidden" name="excess" id="excess-price-km" value="<?php echo $commute_cars->excess; ?>" >
									<input type="hidden" name="from_date" id="modified_from_date" value="<?php echo $commute_cars->from_date .' '. $commute_cars->from_time; ?>" >
									<input type="hidden" name="to_date" id="modified_to_date" value="<?php echo $commute_cars->to_date .' '. $commute_cars->to_time; ?>" >
									<input type="hidden" name="days" id="modified_booking_days" value="<?php echo $duration_days; ?>" >
									<input type="hidden" name="hours" id="calculated_modified_total_hours" value="<?php echo $duration_hours; ?>" >
									<input type="hidden" name="minutes" id="modified_booking_minutes" value="<?php echo $duration_minutes; ?>" >								
									<input type="hidden" name="car_name" id="car-final-name" value="<?php echo $commute_cars->car_fname .':'.$commute_cars->car_lname; ?>" >
									<input type="hidden" name="car_image" id="car-final-image" value="<?php echo $commute_cars->main_image; ?>" >
									<input type="hidden" name="car_seats" id="car-final-seats" value="<?php echo $commute_cars->seats; ?>" >
									<input type="hidden" name="showroom_latitude" id="car-final-lat" value="<?php echo $commute_cars->showroom_latitude; ?>" >
									<input type="hidden" name="showroom_longitude" id="car-final-lon" value="<?php echo $commute_cars->showroom_longitude; ?>" >								
									<input type="hidden" name="from_time" id="modified_from_time" value="<?php echo $commute_cars->from_time; ?>" >
									<input type="hidden" name="to_time" id="modified_to_time" value="<?php echo $commute_cars->to_time; ?>" >
									<input type="hidden" name="showroom_address" id="car-final-address" value="<?php echo $commute_cars->showroom_address; ?>" >
									<input type="hidden" name="category" id="car-final-category" value="<?php echo $commute_cars->category;?>" >																
									<input type="hidden" name="tariff_id" id="car-final-tariff_id"  >
									<input type="hidden" name="address" id="modified_booking_address"  >
									<input type="hidden" name="latitude" id="modified_booking_latitude"  >
									<input type="hidden" name="longitude" id="modified_booking_longitude"  >
									<div class="col-lg-4 dsf-1">
										<div class="time-scn-info">
											<h3><img src="<?php echo base_url(); ?>admin/<?php echo $commute_cars->main_image;?>" /> </h3>
											<h4><?php echo $commute_cars->car_fname; ?></h4>
											<h4><?php echo $commute_cars->car_lname; ?> <?php if(!empty($commute_cars->seats)): ?><span><?php echo $commute_cars->seats; ?><?php if($this->lang->line('commute_slide_D')): ?><?php echo $this->lang->line('commute_slide_D'); else: ?> seater<?php endif; ?></span><?php endif; ?></h4>
										</div>
										<div class="time-scn-info-1">
											<div class="row time-inn-1">
												<img src="<?php echo base_url(); ?>assets/img/commute/13.png" />
												<select class="selectpicker" id="popular-location-by-loc" name="popular_place" data-style="btn-info">
													<?php
													if(isset($commute_cars->short_address) && !empty($commute_cars->short_address)):
														$popularBylocation=array();
														$exploded_popular_places = explode(',',$commute_cars->short_address);
														foreach($exploded_popular_places as $key => $value): 
															$popularBylocation[] = $value;
														endforeach;
														foreach($popularBylocation as $popular_place):	
															?>		
															<option value="<?php echo $popular_place; ?>" ><?php echo $popular_place; ?></option>
													<?php endforeach; endif;?>	
												</select>
											</div>
											<div class="row">
												<div class="col-lg-6 slc-1" id="CommuteCarNaviFrom<?php echo $commute_cars->id;?>" onclick="CommuteCarNaviFrom(this,<?php echo $commute_cars->id;?>)" data-price="<?php echo $commute_cars->limit_start_price;?>" data-freekm="<?php echo $commute_cars->limit_start_km;?>" >
													  <h5><?php echo $commute_cars->limit_start_km;?> <?php if($this->lang->line('commute_slide_E')): ?><?php echo $this->lang->line('commute_slide_E'); else: ?>kms<?php endif; ?></h5>
													<h6><img src="<?php echo base_url(); ?>assets/img/commute/14.png" /><?php echo $commute_cars->limit_start_price;?></h6>
												</div>
												<div class="col-lg-6 slc-1 slc-2" id="CommuteCarNaviTo<?php echo $commute_cars->id;?>" onclick="CommuteCarNaviTo(this,<?php echo $commute_cars->id;?>)" data-price="<?php echo $commute_cars->limit_end_price;?>" data-freekm="<?php echo $commute_cars->limit_end_km;?>">
													<h5><?php echo $commute_cars->limit_end_km;?><?php if($this->lang->line('commute_slide_E')): ?><?php echo $this->lang->line('commute_slide_E'); else: ?> kms<?php endif; ?></h5>
													<h6><img src="<?php echo base_url(); ?>assets/img/commute/14.png" /><?php echo $commute_cars->limit_end_price;?></h6>
												</div>
											</div>
											<div class="book-coomute">
												<h3><a href="javascript:void(0);" onclick="nextsubmitbookingCommute(this)" ><?php if($this->lang->line('commute_slide_F')): ?><?php echo $this->lang->line('commute_slide_F'); else: ?>Book now<?php endif; ?></a></h3>
											</div>
										</div>
									</div>
							<?php endforeach; ?>								
						</div>
					</div>
				<?php else: ?>
					<div class="caution-img" >
						<img src="<?php echo base_url(); ?>assets/img/caution/nocar.jpg" /> 	
					</div>	
				<?php endif; ?>
			</div>
			</div>
		</div>    
	</div>
	<!--commute-first-->
</div>	
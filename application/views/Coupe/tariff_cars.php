<?php if(isset($showroom_cars) && !empty($showroom_cars)): ?>
<div class="col-lg-12">
	<h3> <?php if($this->lang->line('coupe_slide_B1')): ?><?php echo $this->lang->line('coupe_slide_B1'); else: ?>Available Cars<?php endif; ?></h3>
				<div class="avl-car-main">
		<?php foreach($showroom_cars as $single_cars):
				?>							
						<div class="row caramat" data-tariffid="<?php echo $single_cars->tariff_id; ?>" data-category="<?php echo $single_cars->category; ?>" data-freekm="<?php echo $single_cars->free_km; ?>"  data-showroomaddress="<?php echo $single_cars->showroom_address; ?>" data-showroomlat="<?php echo $single_cars->latitude; ?>" data-showroomlon="<?php echo $single_cars->longitude; ?>" data-image="<?php echo $single_cars->main_image; ?>" data-seats="<?php echo $single_cars->seats; ?>" data-price="<?php echo $single_cars->final_price; ?>" data-carname="<?php echo $single_cars->car_fname; ?>" data-excess="<?php echo $single_cars->price_km; ?>" id="stylecarSelect<?php echo $single_cars->id; ?>" onclick="carselection(this,<?php echo $single_cars->id; ?>)" >
							<div class="col-lg-3 col-md-3 bc-v-1">
								<div class="cart-1">
									<img src="<?php echo base_url(); ?>admin/<?php echo $single_cars->main_image; ?>" class="img-responsive" />
								</div>
							</div>
							<div class="col-lg-6 col-md-6 bc-v-2">
								<div class="cart-2">
									<h4><?php echo $single_cars->car_fname .' '. $single_cars->car_lname; ?></h4>
									<ul>						
										<?php if(!empty($single_cars->seats)): ?>  <li><span><img src="<?php echo base_url(); ?>assets/img/popup/22.png" /> </span> <?php echo $single_cars->seats; ?>  <?php if($this->lang->line('coupe_slide_B8')): ?><?php echo $this->lang->line('coupe_slide_B8'); else: ?>Seats<?php endif; ?></li> <?php endif; ?>
										<?php if(!empty($single_cars->transmission)): ?>  <li><span><img src="<?php echo base_url(); ?>assets/img/popup/23.png" /> </span> <?php echo $single_cars->transmission; ?> </li><?php endif; ?>
										<?php if(!empty($single_cars->top_speed)): ?><li><span><img src="<?php echo base_url(); ?>assets/img/popup/24.png" /> </span> <?php echo $single_cars->top_speed; ?> <?php if($this->lang->line('coupe_slide_B9')): ?><?php echo $this->lang->line('coupe_slide_B9'); else: ?> Speed<?php endif; ?></li><?php endif; ?>
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
									<h5> <?php if($this->lang->line('coupe_slide_B11')): ?><?php echo $this->lang->line('coupe_slide_B11'); else: ?>Excess <?php endif; ?><span><img src="<?php echo base_url(); ?>assets/img/popup/26.png" /></span><?php echo $single_cars->price_km; ?> <?php if($this->lang->line('coupe_slide_B12')): ?><?php echo $this->lang->line('coupe_slide_B12'); else: ?>Per/km<?php endif; ?></h5>
								</div>
								<div class="cart-5">
									<h4><?php echo $single_cars->name; ?></h4>
									<h5>(<?php echo $single_cars->showroom_address; ?>)</h5>
								</div>
							</div>
						</div>					
		<?php endforeach;?>
					</div>
	<div class="row bookamat">                
	</div>
</div>
<?php  else: ?>
<div class="caution-img" >
	<img src="<?php echo base_url(); ?>assets/img/caution/nocar.jpg" /> 	
</div>	
<?php  endif; ?>
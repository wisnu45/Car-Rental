<input type="hidden" name="excess-price" value="<?php echo $excess ; ?>" id="excess-price-km" >
<input type="hidden" name="car-selected-id" value="<?php echo $id ; ?>" id="car-selected-id" >
<input type="hidden" name="car-final-price" value="<?php echo $price; ?>" id="car-final-price" >
<input type="hidden" name="car-final-freekm" value="<?php echo $free_km; ?>" id="car-final-freekm" >
<input type="hidden" name="car-final-name" value="<?php echo $car_name; ?>" id="car-final-name" >
<input type="hidden" name="car-final-image" value="<?php echo $car_image; ?>" id="car-final-image" >
<input type="hidden" name="car-final-seats" value="<?php echo $seats; ?>" id="car-final-seats" >
<input type="hidden" name="car-final-lat" value="<?php echo $showroom_latitude; ?>" id="car-final-lat" >
<input type="hidden" name="car-final-lon" value="<?php echo $showroom_longitude; ?>" id="car-final-lon" >
<input type="hidden" name="car-final-address" value="<?php echo $showroomaddress; ?>" id="car-final-address" >
<input type="hidden" name="car-final-category" value="<?php echo $category; ?>" id="car-final-category" >
<input type="hidden" name="car-final-tariff_id" value="<?php echo $tariff_id; ?>" id="car-final-tariff_id" >
<div class="col-lg-3 col-md-3 col-sm-3 bc-gh">
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="img-cr-e-1">
				<img src="<?php echo base_url(); ?>admin/<?php echo $car_image; ?>" class="img-responsive" />
			</div>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6">
			<div class="img-cr-e-1">
				<h4> <?php echo $car_name; ?></h4>
				<h5><?php if($this->lang->line('coupe_slide_B11')): ?><?php echo $this->lang->line('coupe_slide_B11'); else: ?>Excess <?php endif; ?><span> <img src="<?php echo base_url(); ?>assets/img/profile/12.png" /><?php echo $excess ; ?><?php if($this->lang->line('coupe_slide_B12')): ?><?php echo $this->lang->line('coupe_slide_B12'); else: ?>Per/Km <?php endif; ?></h5>
			</div>
		</div>
	</div>
</div>
<div class="col-lg-5 col-md-5 col-sm-5">
	<div class="earl-loc">
		<h5><?php if($this->lang->line('coupe_slide_B10')): ?><?php echo $this->lang->line('coupe_slide_B10'); else: ?>NEAREST LOCATIONS<?php endif; ?></h5>
		<span class="sl-time"><img src="<?php echo base_url(); ?>assets/img/popup/30.png" /></span>
		<select class="selectpicker form-control" id="popular-location-by-loc" data-style="btn-info">
		<?php foreach($nearby_locations as $single_location): ?>
			<option value="<?php echo $single_location->id;?>" ><?php echo $single_location->short_address;?></option>
		<?php endforeach; ?>
		</select>
	</div>
</div>
<div class="col-lg-4 col-md-4 col-sm-4 pad-zero">
	<div class="bk-nm">
		<h5><button type="submit" onclick="nextsubmitbooking(this,<?php echo $id ; ?>,<?php echo $price; ?>)" ><?php if($this->lang->line('coupe_slide_B3')): ?><?php echo $this->lang->line('coupe_slide_B3'); else: ?>BOOK NOW <?php endif; ?> <span><img src="<?php echo base_url(); ?>assets/img/popup/29.png" /> </span><?php echo $price; ?></button></h5>
	</div>
</div>
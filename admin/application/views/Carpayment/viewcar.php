<div class="form-group has-feedback cardiv" >
	<label>Choose Car</label>
	<select class="form-control " style="width: 100%;" name="listing_id" id="tariff_listing_id"  required="">
		<option value="" disabled selected>Select your option</option>
		<?php foreach($result as $car){ ?>	 
		<option onClick="get_append_tariff(<?php echo $car->id;?>)" value="<?php echo $car->id;?>"><?php echo $car->car_name;?></option>
		<?php } ?>
	</select>
</div>
						







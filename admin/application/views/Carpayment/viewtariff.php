<div class="form-group has-feedback " id="tariff">
	<label>Choose Tariff</label>							
		<select class="form-control " style="width: 100%;" name="tariff_id" required="" >
			<option value="" disabled selected>Select your option</option>
				<?php
				foreach($result as $tariff1) {
				?>	 
				<option value="<?php echo $tariff1->id;?>"><?php echo $tariff1->name;?>&nbsp(Free Km-<?php echo $tariff1->free_km;?>)&nbsp(Price-<?php echo $tariff1->price_normal;?>)</option>
				<?php } ?>
	</select>
</div>






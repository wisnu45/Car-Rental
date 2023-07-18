<div class="col-lg-12">
	<ul>
		<li><?php if($this->lang->line('chronologypopup3_slide_C4')): ?><?php echo $this->lang->line('chronologypopup3_slide_C4'); else: ?>POPULAR LOCATIONS<?php endif; ?></li>
		<?php foreach($location as $place){ ?>
			<li onclick="AppendpopularonTextbar(this)" data-address="<?php echo $place->short_address;?>" ><?php echo $place->short_address;?></li>		
		<?php } ?>
	</ul>
</div>
<?php $limit_loc = limited_get_location(); ?>
<!-- Location Store -->
<input type="hidden" name="originallocation" class="original-bearings">
<!-- Back to top image -->	
<a href="#" id="back-to-top" title="Back to top"><img src="<?php echo base_url(); ?>assets/img/tariff/25.png"></a>
<!--footer-->
<footer>
	<div class="container">
		<div class="footer-main">
			<div class="col-lg-12">
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
					<h3><?php if($this->lang->line('home_slide_H1')): ?><?php echo $this->lang->line('home_slide_H1'); else: ?>Cities<?php endif; ?></h3>
					<ul>
					<?php if(isset($limit_loc) && !empty($limit_loc)): 
							foreach($limit_loc as $single_location): ?>
						<li ><a href="javascript:void(0);" onclick="SelectUniversallocationByclick(this,<?php echo $single_location->id; ?>)"><?php if($this->lang->line('home_slide_H2')): ?><?php echo $this->lang->line('home_slide_H2'); else: ?>Car Rental <?php endif; ?><?php echo $single_location->name; ?></a></li>
					<?php endforeach; endif; ?>	
					</ul>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
					<h3><?php if($this->lang->line('home_slide_H3')): ?><?php echo $this->lang->line('home_slide_H3'); else: ?>How It Works ?<?php endif; ?></h3>
					<ul>
						<li><a href="javascript:void(0);"><?php if($this->lang->line('home_slide_H4')): ?><?php echo $this->lang->line('home_slide_H4'); else: ?> How Cityride Works<?php endif; ?></a></li>
						<li><a href="javascript:void(0);"><?php if($this->lang->line('home_slide_H5')): ?><?php echo $this->lang->line('home_slide_H5'); else: ?>Policies<?php endif; ?></a></li>
						<li><a href="javascript:void(0);"><?php if($this->lang->line('home_slide_H6')): ?><?php echo $this->lang->line('home_slide_H6'); else: ?>Cityride in Safety<?php endif; ?></a></li>
						<li><a href="javascript:void(0);"><?php if($this->lang->line('home_slide_H7')): ?><?php echo $this->lang->line('home_slide_H7'); else: ?>Going Outstation?<?php endif; ?></a></li>
						<li><a href="javascript:void(0);"><?php if($this->lang->line('home_slide_H8')): ?><?php echo $this->lang->line('home_slide_H8'); else: ?>FAQs<?php endif; ?></a></li>
					</ul>
				</div>
				<div class="clearfix hidden-lg hidden-md"></div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
					<h3><?php if($this->lang->line('home_slide_H9')): ?><?php echo $this->lang->line('home_slide_H9'); else: ?>About Us<?php endif; ?></h3>
					<ul>
					   <li><a href="javascript:void(0);"><?php if($this->lang->line('home_slide_H10')): ?><?php echo $this->lang->line('home_slide_H10'); else: ?>Cityride Team<?php endif; ?></a></li>
						<li><a href="javascript:void(0);"><?php if($this->lang->line('home_slide_H11')): ?><?php echo $this->lang->line('home_slide_H11'); else: ?>CAP<?php endif; ?></a></li>
						<li><a href="javascript:void(0);"><?php if($this->lang->line('home_slide_H12')): ?><?php echo $this->lang->line('home_slide_H12'); else: ?>Careers @ Cityride<?php endif; ?></a></li>
						<li><a href="javascript:void(0);"><?php if($this->lang->line('home_slide_H13')): ?><?php echo $this->lang->line('home_slide_H13'); else: ?>Cityride Blog<?php endif; ?></a></li>
						<li><a href="javascript:void(0);"><?php if($this->lang->line('home_slide_H14')): ?><?php echo $this->lang->line('home_slide_H14'); else: ?>Locations and Cars<?php endif; ?></a></li>
					</ul>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
					<h3><?php if($this->lang->line('home_slide_H15')): ?><?php echo $this->lang->line('home_slide_H15'); else: ?>Let's keep in touch<?php endif; ?></h3>
					<ul>
						<p><?php if($this->lang->line('home_slide_H16')): ?><?php echo $this->lang->line('home_slide_H16'); else: ?>Help and Support
							7th Floor, Tower-B,
							Diamond District,<?php endif; ?>
							<?php if($this->lang->line('home_slide_H17')): ?><?php echo $this->lang->line('home_slide_H17'); else: ?>150, HAL Airport Road,
							Kodihalli,<?php endif; ?>
							<?php if($this->lang->line('home_slide_H18')): ?><?php echo $this->lang->line('home_slide_H18'); else: ?>Bangalore – 560008<?php endif; ?></p>
					</ul>
					<div class="social-media-footer">
						<img src="<?php echo base_url(); ?>assets/img/home/58.png" />
						<img src="<?php echo base_url(); ?>assets/img/home/59.png" />
						<img src="<?php echo base_url(); ?>assets/img/home/60.png" />
						<img src="<?php echo base_url(); ?>assets/img/home/61.png" />
					</div>
				</div>
			</div>
			<div class="col-lg-12">
				<h5 class="col-lg-12"><?php if($this->lang->line('home_slide_H19')): ?><?php echo $this->lang->line('home_slide_H19'); else: ?>© Copyright © 2017-2018 Techware Solution. All rights reserved.<?php endif; ?></h5>
			</div>
		</div>
	</div>
</footer>
<!--footer-->
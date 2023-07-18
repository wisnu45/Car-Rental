<div class="container">
<div class="col-lg-12">
    <div class="offer-1">
        <h2><?php if($this->lang->line('webname')): ?><?php echo $this->lang->line('webname'); else: ?>CITYRIDE<?php endif; ?> <?php if($this->lang->line('offers_slide_A1')): ?><?php echo $this->lang->line('offers_slide_A1'); else: ?>OFFERS FOR BANGALORE<?php endif; ?>  <span class="fix-locdrum"></span></h2>
    </div>
</div>
    <div class="col-lg-12">
        <div class="offer-2">
          <h3><?php if($this->lang->line('offers_slide_B1')): ?><?php echo $this->lang->line('offers_slide_B1'); else: ?>DRIVE MORE, SAVE MORE<?php endif; ?></h3>
            <h4><?php if($this->lang->line('offers_slide_B2')): ?><?php echo $this->lang->line('offers_slide_B2'); else: ?>FLATE 15% OF ON 2 DAYS AND LONGER TRIPS<?php endif; ?></h4>
            <h5><a href="javascript:void(0);" ><?php if($this->lang->line('offers_slide_D15')): ?><?php echo $this->lang->line('offers_slide_D15'); else: ?>Terms & Condition<?php endif; ?><span><img src="<?php echo base_url(); ?>assets/img/commute/24.png" /></span></a></h5>
        </div>
    </div>
    <div class="col-lg-12 hvr-mnc">
        <div class="offer-3">			
			<?php  if(isset($get_offer_cars) && !empty($get_offer_cars)):
				foreach($get_offer_cars as $offer_cars): ?>
					<div class="col-lg-6 pad-zero">
						<div class="hovereffect">
							<img class="img-responsive" src="<?php echo base_url(); ?>admin/<?php echo $offer_cars->image; ?>" alt="">
							<div class="overlay">
								<a class="info" href="javascript:void(0);">
								<h3><?php if($this->lang->line('offers_slide_C1')): ?><?php echo $this->lang->line('offers_slide_C1'); else: ?>GET <?php endif; ?>  <?php echo $offer_cars->percentage; ?> <?php if($this->lang->line('offers_slide_C2')): ?><?php echo $this->lang->line('offers_slide_C2'); else: ?>%  OFF<?php endif; ?></h3>
								<h4><?php if($this->lang->line('offers_slide_C3')): ?><?php echo $this->lang->line('offers_slide_C3'); else: ?>EXCLUSIVELY FOR<?php endif; ?>
								<?php echo $offer_cars->coupon_for; ?> <?php if($this->lang->line('offers_slide_C4')): ?><?php echo $this->lang->line('offers_slide_C4'); else: ?> CUSTOMERS<?php endif; ?></h4>
								 <a href="<?php echo base_url();?>offers/pitch/<?php echo $offer_cars->id; ?>"><h6><span><?php if($this->lang->line('offers_slide_C5')): ?><?php echo $this->lang->line('offers_slide_C5'); else: ?>More  Details <?php endif; ?></span></h6></a>
								</a>
							</div>
						</div>
					</div>
			<?php endforeach; else: ?> 
				<div class="caution-img" >
					<img src="<?php echo base_url(); ?>assets/img/caution/offer.png" /> 	
				</div>	
			<?php endif; ?>	
        </div>
    </div>
</div>
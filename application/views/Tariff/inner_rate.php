<div class="panel-group" id="accordion">
	<?php foreach($get_car_categories as $single_category): ?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
				<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $single_category->id;?>">
					<span class="spm-panel-mn"><?php echo $single_category->name; ?></span>
						<span class="spm-panel-main">
						<span class="spm-panel"><?php if($this->lang->line('tariff_slide_B1')): ?><?php echo $this->lang->line('tariff_slide_B1'); else: ?>Mon-Sun<?php endif; ?></span>
						<span class="spm-panel"><?php if($this->lang->line('tariff_slide_B2')): ?><?php echo $this->lang->line('tariff_slide_B2'); else: ?>Special <?php endif; ?></span>
						<span class="spm-panel"><?php if($this->lang->line('tariff_slide_B3')): ?><?php echo $this->lang->line('tariff_slide_B3'); else: ?>Peak Season ?<?php endif; ?></span>
					</span>
				</a>
				</h4>
			</div>
			<div id="collapseOne<?php echo $single_category->id;?>" class="panel-collapse collapse in">
				<div class="panel-body pb-main">
					<?php 
						if(!empty($single_category->subs)):
							foreach ($single_category->subs as $sub): ?>
								<div class="row pb-1">
									<div class="panel-mn-tariff">
										<div class="col-lg-5">
											<div class="row">
												<div class="col-lg-6">
													<div class="left-tariff-1">
														<img src="<?php echo base_url(); ?>admin/<?php echo $sub->main_image; ?>" class="img-responsive" />
													</div>
												</div>
												<div class="col-lg-6">
													<div class="left-tariff-1">
														<h5><?php echo $sub->car_fname; ?></h5>
														<h5><?php echo $sub->car_lname; ?></h5>                  
														<h5><?php echo $sub->seats; ?><?php if($this->lang->line('tariff_slide_C16')): ?><?php echo $this->lang->line('tariff_slide_C16'); else: ?> seater<?php endif; ?></h5>
													</div>
												</div>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="row">
												<div class="right-tariff-1">
													<div class="col-lg-4">
														<div class="right-tariff-1-inner">
															<h4><img src="<?php echo base_url(); ?>assets/img/tariff/28.png" /> </h4>
															<h5><?php echo $sub->price_normal; ?>.0<?php if($this->lang->line('tariff_slide_C17')): ?><?php echo $this->lang->line('tariff_slide_C17'); else: ?>/hr<?php endif; ?></h5>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="right-tariff-1-inner">
															<h4><img src="<?php echo base_url(); ?>assets/img/tariff/28.png" /> </h4>
															<h5><?php echo $sub->price_weekend; ?>.0<?php if($this->lang->line('tariff_slide_C17')): ?><?php echo $this->lang->line('tariff_slide_C17'); else: ?>/hr<?php endif; ?></h5>
														</div>
													</div>
													<div class="col-lg-4">
														<div class="right-tariff-1-inner" style="border: none;">
															<h4><img src="<?php echo base_url(); ?>assets/img/tariff/28.png" /> </h4>
															<h5><?php echo $sub->price_peak; ?>.0<?php if($this->lang->line('tariff_slide_C17')): ?><?php echo $this->lang->line('tariff_slide_C17'); else: ?>/hr<?php endif; ?></h5>
														</div>
													</div>
													<div class="col-lg-12">
														<h6 class="right-tariff-h6"> <?php echo $sub->price_km; ?><?php if($this->lang->line('tariff_slide_C18')): ?><?php echo $this->lang->line('tariff_slide_C18'); else: ?>per excess km <?php endif; ?></h6>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
					<?php endforeach; 
							endif;
							?>                                      
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>
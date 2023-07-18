								<?php foreach($tariff as $single_tariff): ?>
								<div class="col-lg-4">
                                    <div class="rgt-zoom-cont">
                                        <h3><?php if($this->lang->line('webname')): ?><?php echo $this->lang->line('webname'); else: ?>CityRide <?php endif; ?><?php echo $single_tariff->name; ?></h3>
                                        <h4><?php echo $single_tariff->free_km; ?> <?php if($this->lang->line('tariff_slide_C19')): ?><?php echo $this->lang->line('tariff_slide_C19'); else: ?>km free<?php endif; ?></h4>
                                        <h5><span><img src="<?php echo base_url(); ?>assets/img/tariff/28.png" /></span><?php echo $single_tariff->price_normal; ?></h5>
                                    </div>
                                </div>
                                <?php endforeach; ?>
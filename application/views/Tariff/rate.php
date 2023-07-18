<input type="hidden" name="glossy_tariff_id" id="glossy_tariff_id" value="<?php echo glossy_tariff()->id; ?>" >
<input type="hidden" name="location_id" id="tariff-bag-location" value="<?php echo $location_id; ?>" >
<!--section-sele-main-->
<div class="container-fluid rate-fluid-away">
    <div class="container">
        <div class="sel-sec-main">
            <div class="col-lg-12 pds-zero">
                <div class="col-lg-8 pds-zero">
                    <div class="tariff-inner-1">
                        <div class="col-lg-12 pad-zero">
						<?php foreach($tariff as $single_tariff): ?>
                            <div class="col-lg-4 pad-zero-1">
                                <div class="zoom-class-1 cityride-tariff" id="StyleCityTariffbagA<?php if(glossy_tariff()->id == $single_tariff->id): echo glossy_tariff()->id; else: echo $single_tariff->id; endif; ?>" onclick="ratepuller(this,<?php echo $single_tariff->id; ?>)">
                                    <h4><?php if($this->lang->line('webname')): ?><?php echo $this->lang->line('webname'); else: ?>CityRide <?php endif; ?><?php echo $single_tariff->name; ?> </h4>
                                    <h5><?php echo $single_tariff->free_km; ?><?php if($this->lang->line('tariff_slide_C10')): ?><?php echo $this->lang->line('tariff_slide_C10'); else: ?> Free kms/hr<?php endif; ?></h5>
                                </div>
                            </div>
						<?php endforeach; ?>
                        </div>
                    </div>
                    <div class="tariff-inner-2 Change-bag-wise-tariff">
                        <div class="panel-group" id="accordion">
						<?php foreach($get_car_categories as $single_category): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne<?php echo $single_category->id;?>">
                                            <span class="spm-panel-mn"><?php echo $single_category->name; ?></span>
                                            <span class="spm-panel-main">
                                                   <span class="spm-panel"><?php if($this->lang->line('tariff_slide_B1')): ?><?php echo $this->lang->line('tariff_slide_B1'); else: ?>Mon-Sun<?php endif; ?></span>
                                            <span class="spm-panel"><?php if($this->lang->line('tariff_slide_B2')): ?><?php echo $this->lang->line('tariff_slide_B2'); else: ?>Special<?php endif; ?></span>
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
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                                <div class="right-tariff-1-inner">
                                                                    <h4><img src="<?php echo base_url(); ?>assets/img/tariff/28.png" /> </h4>
                                                                    <h5><?php echo $sub->price_normal; ?>.0<?php if($this->lang->line('tariff_slide_C17')): ?><?php echo $this->lang->line('tariff_slide_C17'); else: ?>/hr<?php endif; ?></h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                                <div class="right-tariff-1-inner">
                                                                    <h4><img src="<?php echo base_url(); ?>assets/img/tariff/28.png" /> </h4>
                                                                    <h5><?php echo $sub->price_weekend; ?>.0<?php if($this->lang->line('tariff_slide_C17')): ?><?php echo $this->lang->line('tariff_slide_C17'); else: ?>/hr<?php endif; ?></h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
                                                                <div class="right-tariff-1-inner" style="border: none;">
                                                                    <h4><img src="<?php echo base_url(); ?>assets/img/tariff/28.png" /> </h4>
                                                                    <h5><?php echo $sub->price_peak; ?>.0<?php if($this->lang->line('tariff_slide_C17')): ?><?php echo $this->lang->line('tariff_slide_C17'); else: ?>/hr<?php endif; ?></h5>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-12">
                                                                <h6 class="right-tariff-h6"> <?php echo $sub->price_km; ?> <?php if($this->lang->line('tariff_slide_C18')): ?><?php echo $this->lang->line('tariff_slide_C18'); else: ?>per excess km <?php endif; ?></h6>
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
                    </div>
                </div>
                <div class="col-lg-4 pad-zero bac-fgju">
                    <div class="right-side-widget">
                        <div class="rgt-wid-1">
							<form id="submit-tariff-calculation" role="form" method="post" enctype="multipart/form-data">
							<input type="hidden" name="city_final" class="fix-locdrum" >
                            <h2><?php if($this->lang->line('tariff_slide_C1')): ?><?php echo $this->lang->line('tariff_slide_C1'); else: ?>TARIFF CALCULATOR<?php endif; ?></h2>
                            <h3><img src="<?php echo base_url(); ?>assets/img/tariff/15.png" /></h3>
                            <div class="row sel-car-row">
                                <div class="col-lg-4">
                                    <p class="sel-csr"><?php if($this->lang->line('tariff_slide_C2')): ?><?php echo $this->lang->line('tariff_slide_C2'); else: ?>Select a car<?php endif; ?>:</p>
                                </div>
                                <div class="col-lg-8">
                                    <select name="car_id" class="selectpicker tariff-select-picker" required="" data-style="btn-info">
										<option selected="selected" disabled > <?php if($this->lang->line('tariff_slide_C2')): ?><?php echo $this->lang->line('tariff_slide_C2'); else: ?>Select Car <?php endif; ?></option>
										<?php foreach($get_tariff_car_categories as $single_category): ?>		
											<option data-loc="<?php echo $single_category->id; ?>" value="<?php echo $single_category->id; ?>" onclick="tariffselectpicker(this,<?php echo $single_category->id; ?>)" ><?php echo $single_category->car_fname; ?>-<?php echo $single_category->car_lname; ?></option>			
										<?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row sel-car-row">
                                <div class="col-lg-4">
                                    <p class="sel-csr"><?php if($this->lang->line('tariff_slide_C3')): ?><?php echo $this->lang->line('tariff_slide_C3'); else: ?>From Date:<?php endif; ?></p>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" name="from_time" id="kill-fromtime" required="" placeholder="<?php echo date('d-m-Y H:i A'); ?>" class="fromtime selectpicker sel-pick form_datetime" data-style="btn-info">
                                </div>
                            </div>
							<div class="row sel-car-row">
                                <div class="col-lg-4">
                                    <p class="sel-csr"><?php if($this->lang->line('tariff_slide_C4')): ?><?php echo $this->lang->line('tariff_slide_C4'); else: ?>To Date:<?php endif; ?></p>
                                </div>
                                <div class="col-lg-8">
                                    <input type="text" name="to_time" id="kill-totime" onchange="Todatechangepickertariff()" required="" placeholder="<?php echo date('d-m-Y H:i A',strtotime("+1 hour")); ?>" class="totime selectpicker sel-pick to_datetimepicker" data-style="btn-info">
                                </div>
                            </div>
                            <div class="range-main-slider">                               
                            </div>                        
                            <div class="col-lg-12 car-rght-jk append-tar-cars">
                                <?php foreach($tariff as $single_tariff): ?>
								<div class="col-lg-4">
                                    <div class="rgt-zoom-cont">
                                        <h3><?php if($this->lang->line('webname')): ?><?php echo $this->lang->line('webname'); else: ?>CityRide<?php endif; ?> <?php echo $single_tariff->name; ?></h3>
                                        <h4><?php echo $single_tariff->free_km; ?> <?php if($this->lang->line('tariff_slide_C19')): ?><?php echo $this->lang->line('tariff_slide_C19'); else: ?>km free<?php endif; ?></h4>
                                        <h5><span><img src="<?php echo base_url(); ?>assets/img/tariff/28.png" /></span><?php if($this->lang->line('tariff_slide_C13')): ?><?php echo $this->lang->line('tariff_slide_C13'); else: ?>NIL<?php endif; ?></h5>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <h5 class="all-prc"><?php if($this->lang->line('tariff_slide_C5')): ?><?php echo $this->lang->line('tariff_slide_C5'); else: ?>All prices include free fuel<?php endif; ?></h5>
                            <h6><button type="submit" class="but-ck-avail" name="checktariff" value="checktariff" id="tariff-button-form" ><?php if($this->lang->line('tariff_slide_C6')): ?><?php echo $this->lang->line('tariff_slide_C6'); else: ?>Check Availablility<?php endif; ?></button> </h6></form>
                            <h5 class="fty"><?php if($this->lang->line('tariff_slide_C7')): ?><?php echo $this->lang->line('tariff_slide_C7'); else: ?>FEATURES<?php endif; ?></h5>
                            <div class="col-lg-12 fet-rght">
                                <div class="col-lg-6">
                                    <h5><img src="<?php echo base_url(); ?>assets/img/tariff/29.png" /> </h5>
                                    <h6><?php if($this->lang->line('tariff_slide_C8')): ?><?php echo $this->lang->line('tariff_slide_C8'); else: ?>Prices Include
                                        Free Fuel<?php endif; ?></h6>
                                </div>
                                <div class="col-lg-6">
                                    <h5><img src="<?php echo base_url(); ?>assets/img/tariff/30.png" /> </h5>
                                    <h6><?php if($this->lang->line('tariff_slide_C9')): ?><?php echo $this->lang->line('tariff_slide_C9'); else: ?>Insurance & Tax
                                        Included<?php endif; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-12 fet-rght">
                                <div class="col-lg-6">
                                    <h5><img src="<?php echo base_url(); ?>assets/img/tariff/31.png" /> </h5>
                                    <h6><?php if($this->lang->line('tariff_slide_C12')): ?><?php echo $this->lang->line('tariff_slide_C12'); else: ?>Prices Include
                                        Free Fuel<?php endif; ?></h6>
                                </div>
                                <div class="col-lg-6">
                                    <h5><img src="<?php echo base_url(); ?>assets/img/tariff/32.png" /> </h5>
                                    <h6><?php if($this->lang->line('tariff_slide_C11')): ?><?php echo $this->lang->line('tariff_slide_C11'); else: ?>Insurance & Tax
                                        Included<?php endif; ?></h6>
                                </div>
                            </div>
                            <div class="col-lg-12 fet-rght">
                                <div class="col-lg-6">
                                    <h5><img src="<?php echo base_url(); ?>assets/img/tariff/33.png" /> </h5>
                                    <h6><?php if($this->lang->line('tariff_slide_C14')): ?><?php echo $this->lang->line('tariff_slide_C14'); else: ?>Prices Include
                                        Free Fuel<?php endif; ?></h6>
                                </div>
                                <div class="col-lg-6">
                                    <h5><img src="<?php echo base_url(); ?>assets/img/tariff/32.png" /> </h5>
                                    <h6><?php if($this->lang->line('tariff_slide_C15')): ?><?php echo $this->lang->line('tariff_slide_C15'); else: ?>Insurance & Tax
                                        Included<?php endif; ?></h6>
                                </div>
                            </div>							
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>
<!--section-sele-main-->
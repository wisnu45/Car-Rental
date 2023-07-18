										<h4><?php if($this->lang->line('chronologypopup1_slide_C1')): ?><?php echo $this->lang->line('chronologypopup1_slide_C1'); else: ?>SELECT MONTH<?php endif; ?></h4>
                                        <div class="col-md-6 col-md-offset-3">
                                            <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="30000000" id="myCarousel">
                                                <div class="carousel-inner car-inn-1 ">
												<?php 												
												foreach(Current_month()  as $set_months_from ){ ?>
												<?php 
												$acty_from = '';
												$active_from="";
												$set_months_final_from=explode ('-',$set_months_from);
												if(in_array($set_months_final_from[1],array($target_date[1]))){
													$active_from = 'active';
													$acty_from = "acty-1";
												 } ?>
                                                    <div class="item  <?php echo $active_from; ?>">
                                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                                            <h5 onclick="getmonthdiary(this,'<?php echo $set_months_from;?>')" class="<?php echo $acty_from; ?> enter-frommonth" data-frommonth="<?php echo $set_months_final_from[1].'-'.$set_months_final_from[0]; ?>"><?php echo $set_months_final_from[1]; ?></h5>
                                                         </div>
                                                    </div>
												<?php } ?>   
                                                </div>
                                                <a class="left carousel-control" href="#myCarousel" data-slide="prev"><img src="<?php echo base_url(); ?>assets/img/popup/10.png" /> </a>
                                                <a class="right carousel-control" href="#myCarousel" data-slide="next"><img src="<?php echo base_url(); ?>assets/img/popup/11.png" /> </a>
                                            </div>
                                        </div>
                                       <div class="clearfix"></div>
								<h4><?php if($this->lang->line('chronologypopup1_slide_C2')): ?><?php echo $this->lang->line('chronologypopup1_slide_C2'); else: ?>SELECT DATE<?php endif; ?></h4>
                                        <div class="col-md-8 col-md-offset-2">
                                            <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="30000000" id="myCarouselh">
                                                <div class="carousel-inner car-inn-1 car-inn-2">
													<?php 													
													foreach(Current_date_runner($target_date[4],$target_date[5]) as $datewday_from){ 
														$acty2_from = '';
														$active_from="";
												        $datearray_from=explode ('-',$datewday_from);			
													if(in_array($datearray_from[2],array($target_date[2]))){	  
														$active_from = 'active';
														$acty2_from = "acty-2";
													}
														  ?>
                                                    <div class="item <?php echo $active_from; ?>">
                                                        <div class="col-md-3 col-sm-6 col-xs-12">
                                                            <h5 onclick="getdatediary(this,'<?php echo $datewday_from;?>')" class="<?php echo $acty2_from; ?> enter-fromdate" data-fromdate="<?php echo $datearray_from[2].'-'.$datearray_from[3].'-'.$datearray_from[4].'-'.$datearray_from[5]; ?>"><?php echo $datearray_from[3]; ?><br>
                                                            <span><?php echo $datearray_from[2]; ?></span></h5>
                                                        </div>
                                                    </div> 
													<?php } ?>													
                                                </div>
                                                <a class="left carousel-control" href="#myCarouselh" data-slide="prev"><img src="<?php echo base_url(); ?>assets/img/popup/10.png" /> </a>
                                                <a class="right carousel-control" href="#myCarouselh" data-slide="next"><img src="<?php echo base_url(); ?>assets/img/popup/11.png" /> </a>
                                            </div>
                                        </div>

                                             <div class="clearfix"></div>
                                        <div class="time-sl-main">
                                            <div class="range-main-slider fromchrono">
                                                <input id="ex1" data-slider-id='ex1Slider' type="text" data-slider-min="<?php echo Current_time_from_runner($target_date[4],$target_date[5],$target_date[2]); ?>" data-slider-max="1440" data-slider-step="30" data-slider-value="<?php echo Current_time_from_runner($target_date[4],$target_date[5],$target_date[2]); ?>" data-fromtime="<?php echo Current_time_from_runner($target_date[4],$target_date[5],$target_date[2]); ?>"/>
                                            </div>
                                        </div>
										 <h6 class="FrommonthNext" onclick="FrommonthNext(this)" ><?php if($this->lang->line('chronologypopup1_slide_C3')): ?><?php echo $this->lang->line('chronologypopup1_slide_C3'); else: ?>NEXT<?php endif; ?><img src="<?php echo base_url(); ?>assets/img/popup/14.png" /> </h6>
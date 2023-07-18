										<h4><?php if($this->lang->line('chronologypopup1_slide_C1')): ?><?php echo $this->lang->line('chronologypopup1_slide_C1'); else: ?>SELECT MONTH<?php endif; ?></h4>
                                          <div class="col-md-6 col-md-offset-3">
                                              <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="30000000" id="myCarousel1">
                                                  <div class="carousel-inner car-inn-1">
													<?php 												
														foreach(Current_month()  as $set_months_to ){ ?>
														<?php 
															$acty_to = '';
															$active_to="";
															$set_months_final_to=explode ('-',$set_months_to);
															if(in_array($set_months_final_to[1],array($target_month[1]))){																
																$active_to = 'active';
																$acty_to = "acty-1";							
															} ?>                                                      
													   <div class="item  <?php echo $active_to; ?> ">
                                                        <div class="col-md-3 col-sm-6 col-xs-12">
															<?php if(strtotime($set_months_final_to[0].'-'.$set_months_final_to[1]) >= strtotime($current_month_true[1].'-'.$current_month_true[0])): ?>
																<h5 onclick="getfacingmonthdiary(this,'<?php echo $set_months_to;?>')" data-tomonth="<?php echo $set_months_final_to[1].'-'.$set_months_final_to[0]; ?>" class="<?php echo $acty_to; ?> enter-tomonth"><?php echo $set_months_final_to[1]; ?></h5>
															<?php else: ?>
																<h5 data-tomonth="<?php echo $set_months_final_to[1]; ?>" class="<?php echo $acty_to; ?> enter-tomonth"><?php echo $set_months_final_to[1]; ?></h5>
															<?php endif; ?>	
                                                         </div>
                                                    </div>
														<?php } ?>
                                                  </div>
                                                  <a class="left carousel-control" href="#myCarousel1" data-slide="prev"><img src="<?php echo base_url(); ?>assets/img/popup/10.png" /> </a>
                                                  <a class="right carousel-control" href="#myCarousel1" data-slide="next"><img src="<?php echo base_url(); ?>assets/img/popup/11.png" /> </a>
                                              </div>
                                          </div>
                                          <div class="clearfix"></div>
                                          <h4><?php if($this->lang->line('chronologypopup1_slide_C2')): ?><?php echo $this->lang->line('chronologypopup1_slide_C2'); else: ?>SELECT DATE<?php endif; ?></h4>
                                          <div class="col-md-8 col-md-offset-2">
                                              <div class="carousel slide" data-ride="carousel" data-type="multi" data-interval="30000000" id="myCarouselh1">
                                                  <div class="carousel-inner car-inn-1 car-inn-2">
														  <?php 													
															foreach(Current_date_runner($target_month[0],$target_month[2])as $datewday_to){ 
																$acty2_to = '';
																$active_to="";
																$datearray_to=explode ('-',$datewday_to);			
															if(in_array($datearray_to[2],array($current_day[0]))){	  
																$active_to = 'active';
																$acty2_to = "acty-2";
																}
																	?>
														<div class="item <?php echo $active_to; ?>">
															<div class="col-md-3 col-sm-6 col-xs-12">
																<?php if(strtotime($current_day[2].'-'.$current_day[3].'-'.$current_day[0]) <= strtotime($datearray_to[4].'-'.$datearray_to[5].'-'.$datearray_to[2])): ?>
																	<h5 onclick="getfacingdatediary(this,'<?php echo $datewday_to;?>')" data-todate="<?php echo $datearray_to[2].'-'.$datearray_to[3].'-'.$datearray_to[4].'-'.$datearray_to[5]; ?>" class="<?php echo $acty2_to; ?> enter-todate" ><?php echo $datearray_to[3]; ?><br>
																	<span><?php echo $datearray_to[2]; ?></span></h5>
																<?php else: ?>
																	<h5 data-todate="<?php echo $datearray_to[2].'-'.$datearray_to[3].'-'.$datearray_to[4].'-'.$datearray_to[5]; ?>" class="<?php echo $acty2_to; ?> enter-todate" ><?php echo $datearray_to[3]; ?><br>
																	<span><?php echo $datearray_to[2]; ?></span></h5>
																<?php endif; ?>	
															</div>
														</div> 
														<?php } ?>	                                                   
                                                  </div>
                                                  <a class="left carousel-control" href="#myCarouselh1" data-slide="prev"><img src="<?php echo base_url(); ?>assets/img/popup/10.png" /> </a>
                                                  <a class="right carousel-control" href="#myCarouselh1" data-slide="next"><img src="<?php echo base_url(); ?>assets/img/popup/11.png" /> </a>
                                              </div>
                                          </div>

                                          <div class="clearfix"></div>
                                          <div class="time-sl-main">
                                              <div class="range-main-slider tochrono">
                                                  <input id="ex2" data-slider-id='ex1Slider' type="text" data-slider-min="<?php echo $calculated_next_time; ?>" data-slider-max="1440" data-slider-step="30" data-slider-value="<?php echo $calculated_next_time; ?>"/>
                                              </div>
                                          </div>
                                          <h6 class="TomonthNext" onclick="TomonthNext(this)"><?php if($this->lang->line('chronologypopup1_slide_C3')): ?><?php echo $this->lang->line('chronologypopup1_slide_C3'); else: ?>NEXT<?php endif; ?><img src="<?php echo base_url(); ?>assets/img/popup/14.png" /> </h6>
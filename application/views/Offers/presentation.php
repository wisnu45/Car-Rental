<?php  $month = date("M", strtotime($offer_details->expiry_date)); $date =explode('-',$offer_details->expiry_date); ?>
<div class="container">
    <div class="col-lg-12">
        <div class="offer-2 d-offer-2">
          <h3><?php if($this->lang->line('offers_slide_C1')): ?><?php echo $this->lang->line('offers_slide_C1'); else: ?>GET <?php endif; ?>  <?php echo $offer_details->percentage; ?><?php if($this->lang->line('offers_slide_C2')): ?><?php echo $this->lang->line('offers_slide_C2'); else: ?>%  OFF<?php endif; ?></h3>
            <h4><?php if($this->lang->line('offers_slide_C3')): ?><?php echo $this->lang->line('offers_slide_C3'); else: ?>EXCLUSIVELY FOR <?php endif; ?><br>
                <span><?php echo $offer_details->coupon_for; ?></span><?php if($this->lang->line('offers_slide_C4')): ?><?php echo $this->lang->line('offers_slide_C4'); else: ?> CUSTOMRS<?php endif; ?></h4>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="offer-1 d-offer-1">
            <h2><?php if($this->lang->line('offers_slide_D16')): ?><?php echo $this->lang->line('offers_slide_D16'); else: ?>Exclusive offer for<?php endif; ?> <?php echo $offer_details->coupon_for; ?> <?php if($this->lang->line('offers_slide_C4')): ?><?php echo $this->lang->line('offers_slide_C4'); else: ?> Customers<?php endif; ?></h2>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="offer-2 d-offer-3">
            <p><?php if($this->lang->line('offers_slide_D1')): ?><?php echo $this->lang->line('offers_slide_D1'); else: ?>Applicable on Monday to Thursday booking. Maximum Discount of Rs 1,200.<?php endif; ?></p>
            <p><?php if($this->lang->line('offers_slide_D2')): ?><?php echo $this->lang->line('offers_slide_D2'); else: ?>Validity : <?php endif; ?><?php echo $date[0]; ?> <?php echo $month; ?> <?php echo $date[2]; ?></p>
            <p><?php if($this->lang->line('offers_slide_D4')): ?><?php echo $this->lang->line('offers_slide_D4'); else: ?>Minimum billing is for 4 hours. All bookings between 1 to 3 hours will be billed at 4 hours.<?php endif; ?></p>
            <p><?php if($this->lang->line('offers_slide_D7')): ?><?php echo $this->lang->line('offers_slide_D7'); else: ?>Valid on first booking.<?php endif; ?></p>
            <p><?php if($this->lang->line('home_slide_D9')): ?><?php echo $this->lang->line('home_slide_D9'); else: ?>A fully refundable security deposit of Rs 5,000 will be charged at time of booking
                Only valid on bookings made through Zoomcar website and iOS/Android app.
                Discount applicable only on original reservation charges (not applicable on excess Km, late return fee, or other fees/charges)
                Applicable only on Indusind Bank Debit and Credit Cards<?php endif; ?></p>
            <h6><?php if($this->lang->line('offers_slide_D10')): ?><?php echo $this->lang->line('offers_slide_D10'); else: ?>HOW TO AVAIL: <?php endif; ?></h6>
            <p><?php if($this->lang->line('offers_slide_D11')): ?><?php echo $this->lang->line('offers_slide_D11'); else: ?>Use Promocode : <?php endif; ?><?php echo $offer_details->coupon_code; ?></p>
            <a href="<?php echo base_url();?>"><?php if($this->lang->line('offers_slide_D12')): ?><?php echo $this->lang->line('offers_slide_D12'); else: ?>Book now<?php endif; ?> </a>
            <h6><?php if($this->lang->line('offers_slide_D13')): ?><?php echo $this->lang->line('offers_slide_D13'); else: ?>PLEASE NOTE: <?php endif; ?> </h6>
            <p><?php if($this->lang->line('offers_slide_D14')): ?><?php echo $this->lang->line('offers_slide_D14'); else: ?>Discount will not be applicable on any of these days<?php endif; ?> </p>
        </div>
    </div>
</div>
<?php 
/* === Initial - Month Calculation === */
	function Current_month(){
			$general_current_date = strtotime(date('Y-m-01'));
			$current_month = date('Y-M-m-d-y-D');
			$current_month_plus_one = date("Y-M-m-d-y-D", strtotime("+1 month", $general_current_date));			
			$current_month_plus_two =  date("Y-M-m-d-y-D", strtotime("+2 month", $general_current_date));
			$current_month_plus_three =  date("Y-M-m-d-y-D", strtotime("+3 month", $general_current_date));
			$current_month_plus_four =  date("Y-M-m-d-y-D", strtotime("+4 month", $general_current_date));
			$current_month_plus_five =  date("Y-M-m-d-y-D", strtotime("+5 month", $general_current_date));			
			return array(
								'current_month' =>$current_month,
								'current_month_plus_one' => $current_month_plus_one,
								'current_month_plus_two' => $current_month_plus_two,
								'current_month_plus_three' => $current_month_plus_three,
								'current_month_plus_four' => $current_month_plus_four,
								'current_month_plus_five' => $current_month_plus_five								
							);										
	}
/* === Initial - Date Calculation === */
	function Current_date(){						
			$list=array();
			$month = date('m');
			$year = date('Y');
			$date = date('d');
			for($d=$date; $d<=31; $d++)
			{
				$time=mktime(12, 0, 0, $month, $d, $year);          
				if (date('m', $time)==$month)       
					$list[]=date('Y-M-d-D-y-m', $time);	
			}			
			return $list;
	}		
/* === Initial - Time Calculation === */				
	function Current_time_from(){						
			$current_dttime = date('y-m-d^H:i');		
			$current_dttime_exploded=explode ('^',$current_dttime);		
			$current_time_exploded = explode(':',$current_dttime_exploded[1]);		
			$waiting_time = 30;
				if($current_time_exploded[1] >= 30){
					$minutes_relaxation = 5;
				}else{
					$minutes_relaxation = 0;
				}		
			$calculated_time= $current_time_exploded[0].'.'.$minutes_relaxation;		
			return ($calculated_time*60)+($waiting_time);			
	}
	function Current_time_to(){						
			$current_dttime = date('y-m-d^H:i');		
			$current_dttime_exploded=explode ('^',$current_dttime);		
			$current_time_exploded = explode(':',$current_dttime_exploded[1]);		
			$waiting_time = 90;
				if($current_time_exploded[1] >= 30){
					$minutes_relaxation = 5;
				}else{
					$minutes_relaxation = 0;
				}		
			$calculated_time= $current_time_exploded[0].'.'.$minutes_relaxation;		
			return ($calculated_time*60)+($waiting_time);			
	}
/* === After - Date Calculation === */
	function Current_date_runner($year_c,$month_c){		
			$list=array();
			$month = $month_c;
			$year = $year_c;
			if($month == date('m')){
				$date = date('d');	
			}else{
				$date = 01;	
			}			
			for($d=$date; $d<=31; $d++)
			{
				$time=mktime(12, 0, 0, $month, $d, $year);          
				if (date('m', $time)==$month)       
					$list[]=date('Y-M-d-D-y-m', $time);	
			}			
			return $list;
	}
	function Current_nextdate_runner($year_c,$month_c){		
				$list=array();
				$month = $month_c;
				$year = $year_c;
				if($month == date('m')){
					$date = date('d');	
				}else{
					$date = 01;	
				}			
				for($d=$date; $d<=31; $d++)
				{
					$time=mktime(12, 0, 0, $month, $d, $year);          
					if (date('m', $time)==$month)       
						$list[]=date('Y-M-d-D-y-m', $time);	
				}			
				return $list;
		}				
/* === After - Time Calculation === */				
	function Current_time_from_runner($year,$month,$date){
			$seektime =$year.'-'.$month.'-'.$date;
			$current_dttime = date('y-m-d^H:i');		
			$current_dttime_exploded=explode ('^',$current_dttime);			
			if($current_dttime_exploded[0] == $seektime):	
				$current_time_exploded = explode(':',$current_dttime_exploded[1]);							
			else:
				$current_time_exploded[1] = 0;
				$current_time_exploded[0] = 0;	
			endif;		
			$waiting_time = 0;
				if($current_time_exploded[1] >= 30){
					$minutes_relaxation = 5;
				}else{
					$minutes_relaxation = 0;
				}		
			$calculated_time= $current_time_exploded[0].'.'.$minutes_relaxation;		
			return ($calculated_time*60)+($waiting_time);			
	}
	function Current_time_extracter($value){
		$hours = $value / 60 ;
		$minutes = $value - ($hours * 60 );
		return $hours.$minutes;
	}
	function Current_time_to_calculated($hour,$minutes){
			if($hour=="default" | $minutes=="default"){
				$current_time_exploded[1] = 0;
				$current_time_exploded[0] = 0;
				$waiting_time = 30;
					if($current_time_exploded[1] >= 30){
						$minutes_relaxation = 5;
					}else{
						$minutes_relaxation = 0;
					}		
				$calculated_time= $current_time_exploded[0].'.'.$minutes_relaxation;		
				return ($calculated_time*60)+($waiting_time);			
			}else{
			$waiting_time = 60;
				if($minutes >= 30){
					$minutes_relaxation = 5;
				}else{
					$minutes_relaxation = 0;
				}		
			$calculated_time= $hour.'.'.$minutes_relaxation;		
			return ($calculated_time*60)+($waiting_time);
			}			
	}	
?>
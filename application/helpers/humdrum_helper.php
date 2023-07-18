<?php 
	/* == CHECK INSTALLER == */
	function check_installer(){  
		$file = "INSTALLER_TRUE.php";
		if(file_exists($file)){
			redirect(base_url().'Installer/installer.php');
		} 
	}
	/* == Settings == */
	function get_settings(){
		$CI = & get_instance();		
		$CI->db->limit(1);	
		$result = $CI->db->get('general_settings')->row();
		return $result;	
	}
	/* == Glossy Tariff == */
	function glossy_tariff(){
		$CI = & get_instance();		
		$CI->db->limit(1);	
		$result = $CI->db->get('tariff')->row();
		return $result;	
	}
	/* == Glossy Commute == */
	function glossy_commute(){
		$CI = & get_instance();		
		$CI->db->limit(1);	
		$result = $CI->db->get('commute')->row();
		return $result;	
	}
	/* == GET LOCATION == */
	function get_location_non_id(){
		$CI = & get_instance();				
		$result = $CI->db->get('general_locations')->result();
		return $result;	
	}
	function get_location($id){
		$CI = & get_instance();		
		$CI->db->where("id", $id);
		$result = $CI->db->get('general_locations')->row();
		return $result;	
	}
	/* == Check location's city == */
	function check_location_name($city){
		$CI = & get_instance();		
		$CI->db->where("city", $city);
		$result = $CI->db->get('general_locations')->row();
		return $result;	
	}
	/* == Check Location's graph == */
	function check_location_graph($lat,$lon){
		$CI = & get_instance();		
		$CI->db->where("short_lat", $lat);
		$CI->db->where("short_lon", $lon);
		$result = $CI->db->get('general_locations')->row();
		return $result;
	}
	/* == Check Sub Location's graph == */
	function check_sub_location_graph($lat,$lon){
		$CI = & get_instance();		
		$CI->db->where("short_lat", $lat);
		$CI->db->where("short_lon", $lon);
		$result = $CI->db->get('general_sub_locations')->result();
		return $result;
	}
	/* == Check Location's zip == */
	function check_location_zip($zip){
		$CI = & get_instance();		
		$CI->db->where("zip", $zip);
		$result = $CI->db->get('general_locations')->row();
		return $result;	
	}
	/* == Check Raw Location */
	function check_raw_location($data,$session_loc_id){	
		//check session location 
		if(empty($session_loc_id)):
			$session_loc_id = get_location_non_id()[0]->id;
		endif;
		//get location details
		$Location_family = get_location($session_loc_id);
		//short format of latitude		
		if(isset($data['latitude']) && !empty($data['latitude'])):
			$exploded_lat = explode('.',$data['latitude']);
			$short_lat = $exploded_lat[0];
		else:
			$short_lat = '';
		endif;
		//short format of longitude
		if(isset($data['longitude']) && !empty($data['longitude'])):
			$exploded_lon = explode('.',$data['longitude']);
			$short_lon = $exploded_lon[0];
		else:
			$short_lon = '';
		endif; 
		//check -> if short latitude and longitude match the location in database
		if(isset($short_lat) && isset($short_lon) && !empty($short_lat) && !empty($short_lon)):
			$Location_checker = check_location_graph($short_lat,$short_lon); 
			if(!empty($Location_checker)):
				$data['session-location'] = $Location_checker->id;						
			else:
				$Sub_location_checker = check_sub_location_graph($short_lat,$short_lon); 
				if(!empty($Sub_location_checker)):
					$data['session-location'] = $Sub_location_checker[0]->id;						
				else:
					$data['session-location'] = $session_loc_id;
				endif;
			endif;
		else:
			$data['session-location'] = $session_loc_id;
		endif; 
		return $data['session-location'];
	}
	/* == Booking Car's Page Function == */
	function choosedrive($data=""){ 
		$CI = & get_instance();	
		if(isset($data) && !empty($data)):		
			$from_month_divider = explode('-',$data['from_month_org']);
			$from_date_divider = explode('-',$data['from_date_org']);
			$from_time_divider = explode(':',$data['from_time_org']);
			$to_month_divider = explode('-',$data['to_month_org']);
			$to_date_divider = explode('-',$data['to_date_org']);
			$to_time_divider = explode(':',$data['to_time_org']);			
			$from_date=$from_date_divider[0].'-'.$from_date_divider[3].'-'.$from_month_divider[1].' '.$from_time_divider[1].':'.$from_time_divider[2];
			$to_date=$to_date_divider[0].'-'.$to_date_divider[3].'-'.$to_month_divider[1].' '.$to_time_divider[1].':'.$to_time_divider[2]; 			
			$durationfrom =new DateTime($from_date);
			$durationto =new DateTime($to_date);
			$diff = $durationfrom->diff($durationto);
			$amiable['duration_days'] = $diff->days;
			$amiable['duration_hours'] = $diff->h;
			$amiable['duration_minutes'] = $diff->i;
			$total_hours = ($amiable['duration_days']*24)+$amiable['duration_hours'];	
			$datediff = strtotime($to_date) - strtotime($from_date);
			$totaldaysall =  floor($datediff / (60 * 60 * 24));
			if(isset($totaldaysall)):
				$totaldays = $totaldaysall + 1;
			endif;
			$amiable['modified_from_date']=$from_date;			
			$amiable['modified_to_date']=$to_date;
			$amiable['modified_totaldays']=$totaldays;
			$amiable['from_month']=$from_month_divider[0];
			$amiable['to_month']=$to_month_divider[0];
			$amiable['from_date']=$from_date_divider[0];
			$amiable['to_date']=$to_date_divider[0];
			$amiable['from_time']=$from_time_divider[1].':'.$from_time_divider[2];
			$amiable['to_time']=$to_time_divider[1].':'.$to_time_divider[2];
			$amiable['address']=$data['address'];
			$amiable['latitude']=$data['latitude'];
			$amiable['longitude']=$data['longitude'];
			$get_address_original = bag_exact_address($data['session-location']);	
			$amiable['search_location'] = $get_address_original->name;
			$amiable['get_locid']= $data['session-location'];
			$amiable['current_month_true'] = date('M');
			$amiable['current_day'] = date('d');
			$amiable['tariff'] = pull_tariff();	
			$amiable['showroom_cars'] = bag_showroom_cars($data['session-location'],$from_date,$to_date,$total_hours,$amiable['tariff'][0]->id);
			$amiable['selectlocations'] = bag_locations();			
			$amiable['page'] = "Coupe/choosecar";
			$amiable['page_title'] = "Choose Drive";
			$amiable['data'] = "Choose Drive page";
			$CI->load->view('amiable', $amiable);	
		endif;
	}
	function pull_tariff(){
		$CI = & get_instance();	
		$query = $CI->db->get('tariff');
		return $result = $query->result();
	}
	function bag_showroom_cars($city,$from_date,$to_date,$totalhours,$tariff_id){ 
 		$final_from_date = strtotime($from_date);
		$final_to_date = strtotime($to_date); 
		$CI = & get_instance();	
		$CI->db->select('car_listing.id as id,car_make.name as car_fname,car_model.name as car_lname,car_listing.showroom_id,car_listing.main_image,car_listing.seats,car_listing.transmission,car_listing.top_speed,car_fuel.name as fuel_type,car_listing.price_km,(tariff_package.price_normal * '.$totalhours.') as final_price,car_showroom.name,car_showroom.short_address as showroom_address,tariff.free_km,car_showroom.latitude,car_showroom.longitude,car_listing.category,tariff.id as tariff_id');
		$CI->db->from('tariff_package');
		$CI->db->join('car_listing','car_listing.id = tariff_package.listing_id ','left');
		$CI->db->join('car_make','car_make.id = car_listing.make ','left');
		$CI->db->join('car_model','car_model.id = car_listing.model ','left');
		$CI->db->join('car_fuel','car_fuel.id = car_listing.fuel_type','left');
		$CI->db->join('car_showroom','car_showroom.id = car_listing.showroom_id','left');
		$CI->db->join('tariff','tariff.id = tariff_package.tariff_id','left');
		$CI->db->where('tariff_package.tariff_id',$tariff_id);
		$CI->db->where('car_showroom.location_id',$city);
		$CI->db->where('car_listing.status',1);	
		$CI->db->where('car_listing.from_date <', $final_from_date);
		$CI->db->where('car_listing.from_date <', $final_to_date);
		$CI->db->where('car_listing.to_date <', $final_from_date);					
		$CI->db->where('car_listing.to_date <',$final_to_date);			
		$query = $CI->db->get();	
		return  $result= $query->result();						
	}
	function bag_locations() {
		$CI = & get_instance();		
		$query = $CI->db->get('general_locations');
		return $result = $query->result();
	}
	function get_rentee($id){
		$CI = & get_instance();		
		$query = $CI->db->get('renter');
		return $result = $query->row();
	}
	/* == GET LOCATION == */
	function limited_get_location(){
		$CI = & get_instance();	
		$CI->db->limit(6);
		$result = $CI->db->get('general_locations')->result();
		return $result;	
	}
	/* == GET EXACT LOCATION == */
	function bag_exact_address($loc_id){
		$CI = & get_instance();	
		$CI->db->where('id',$loc_id);
		$result = $CI->db->get('general_locations')->row();
		return $result;	
	}
?>
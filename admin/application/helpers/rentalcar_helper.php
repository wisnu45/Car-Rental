<?php
	function get_homesettings(){
		$CI = & get_instance();		
		$CI->db->limit(1);	
		$result = $CI->db->get('general_settings')->row();
		return $result;		
	}
	function set_upload_options_admin() {   		
		$config = array();
		$config['upload_path'] = 'uploads/admin';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '5000';
		$config['overwrite']     = FALSE;	
		return $config;	
	}
	function get_picture($id){
		$CI = & get_instance();
		$query = $CI->db->get_where('admin',array('id' => $id));		
		$result = $query->row();
		return $result;		
	}
	
	function set_upload_options() {   		
		$config = array();
		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '5000';
		$config['overwrite']     = FALSE;	
		return $config;	
	}
	
	function set_upload_image() {   		
		$config = array();
		$config['upload_path'] = 'uploads/';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$config['max_size']      = '5000';
		$config['overwrite']     = FALSE;	
		return $config;	
	}

/* === Pop up view of Cardirectory=== */
	function get_single_table($id,$table){
		$CI = & get_instance();		
		$query = $CI->db->get_where($table,array('id' => $id));		
		$result = $query->row();
		return $result;		
	}
	function get_first_limited($id){
		$CI = & get_instance();		
		$CI->db->select('dealers.first_name,car_showroom.name,
						  car_make.name as make_name,car_model.name as model_name,
						  car_category.name as category_name,');
		$CI->db->from('car_listing');
		$CI->db->join('dealers','dealers.id = car_listing.dealer_id','left');
	    $CI->db->join('car_showroom','car_showroom.id  = car_listing.showroom_id','left');	
		$CI->db->join('car_make',   'car_make.id       = car_listing.make','left');	
		$CI->db->join('car_model',  'car_model.id      = car_listing.model','left');
		$CI->db->join('car_category','car_category.id  = car_listing.category','left');
		$CI->db->where('car_listing.id',$id);
		$query = $CI->db->get();
		$result = $query->row();
		return $result;		
	}
		function get_second_limited($id){
		$CI = & get_instance();		
		$CI->db->select('car_fuel.name as fuel,car_insurance.name as insurance,
						 inter_color.color_name as interior_color,
						 exter_color.color_name as exterior_color,admin_role.rolename,
						 GROUP_CONCAT(distinct car_feature.name) as feature
					    ');
		$CI->db->from('car_listing');
		$CI->db->join('admin_role', 'admin_role.id = car_listing.created_by','left');
		$CI->db->join('car_fuel','car_fuel.id  = car_listing.fuel_type','left');
		$CI->db->join('car_insurance','car_insurance.id  = car_listing.insurance','left');
		$CI->db->join('car_color as inter_color', 'inter_color.id  = car_listing.interior_color','left');
		$CI->db->join('car_color as exter_color', 'exter_color.id = car_listing.exterior_color','left');
		$CI->db->join('car_feature', 'FIND_IN_SET(car_feature.id, car_listing.car_features) > 0','left');
		$CI->db->where('car_listing.id',$id);
		$query = $CI->db->get();
		$result = $query->row();
		return $result;		
	}
	/* === End Pop-up View=== */
	
	/* === Get Rolename=== */
		function get_role($id){
		$CI = & get_instance();			    		
		$CI->db->where('id',$id);
		$query = $CI->db->get('admin_role');
		$result = $query->row();
		return $result;		
		}
		function get_role_id($name){
			$CI = & get_instance();			    		
		$CI->db->select('id');
		$CI->db->where('rolename',$name);
		$query = $CI->db->get('admin_role');
		$result = $query->row();
		return $result;	
		}
	/* === SET PERMISSION=== */
	function permission($role){		
		$CI = & get_instance();	
		$permission="";
		if(($CI->session->userdata('permission'))) {
			$pm = $CI->db->query("SELECT * FROM  admin_role_pages WHERE pages='$role'");		
			$adc =$pm->row(); 
			if($adc->p_id !=0 ) {
				$upm = $pm->row('p_id');
				$id=explode(',',$CI->session->userdata('permission'));
				if(in_array($upm,$id)) {
					$permission = "access";
				} 
				else {
				$permission = "failed";
					redirect(base_URL.'Role/not_admin');
				}
			} 
			else {
			$permission = "failed";
			}
	    }		
		return $permission;
    }	
	/**Get Running Cars Count**/
		function get_running_cars(){
			$CI = & get_instance();	
			$CI->db->where('status','4');			
			$query = $CI->db->get('car_booking');
			$car=$query->num_rows();
			return $car;	
		}
	/**Get Active Cars Count**/
		function get_active_cars(){
			$CI = & get_instance();	
			$CI->db->where('status','1');			
			$query = $CI->db->get('car_listing');
			$car=$query->num_rows();
			return $car;	
		}
	/**Get User Registration Count**/
		function get_users(){
			$CI = & get_instance();			    		
			$query = $CI->db->get('renter');
			$car=$query->num_rows();
			return $car;	
		}
	/**Get Total Booking Count**/
		function get_carbooking(){
			$CI = & get_instance();			    		
			$query = $CI->db->get('car_booking');
			$car=$query->num_rows();
			return $car;	
		}
?>

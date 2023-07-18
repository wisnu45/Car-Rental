<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends CI_Controller {
	/**
	**** TECHWARE SOLUTIONS
	****** RE-EN TW-130 
	**** CREATED DATE : 01,March 2017
	 */
	public function __construct() {
		parent::__construct();
		check_installer();	
		$this->load->model('Humdrum_model');
		$this->load->model('Tariff_model');			
 	}	
	public function index(){
		$session_loc_id = $this->session->userdata('location');	
		if($_POST):
			if(isset($_POST) && !empty($_POST)):
				$data = $_POST; 
				$data['session-location'] = check_raw_location($data,$session_loc_id);				
				$this->session->unset_userdata('location');	
				if(!isset($data['session-location'])){
					$data['session-location'] = $session_loc_id;
				}			
				$this->session->set_userdata('location', $data['session-location']);	
				return choosedrive($data);				
			endif;
		endif;
		$lang_directory = directory_map('./application/language', TRUE); 
		$trimmed_lang = array(); 
		foreach($lang_directory as $key => $value):
			$trimmed_lang[] = trim($value , " \.");    
		endforeach;
		$cordial['trimmed_lang'] = $trimmed_lang;	
		$cordial['location'] = $this->session->userdata('location');
		$cordial['selectlocations'] = $this->Humdrum_model->bag_locations();
		$cordial['tariff_poster'] = $this->Humdrum_model->bag_tariff();
		$cordial['category_poster'] = $this->Humdrum_model->bag_category();
		$cordial['current_month_true'] = date('M');
		$cordial['current_day'] = date('d');		
		$cordial['page'] = "Central/home";
		$cordial['page_title'] = "Home Page";
		$cordial['data'] = "Home page";
		$this->load->view('cordial', $cordial);		
	}			
}
?>
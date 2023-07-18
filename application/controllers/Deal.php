<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Deal extends CI_Controller {
	/**
	**** TECHWARE SOLUTIONS
	****** RE-EN TW-130 
	**** CREATED DATE : 02,March 2017
	 */
	public function __construct() {
		parent::__construct();
		check_installer();	
		$this->load->model('Humdrum_model');
		$this->load->model('Deal_model');
 	}	
	public function index(){
		$session_loc_id = $this->session->userdata('location');
		if($_POST):
			if(isset($_POST) && !empty($_POST)):
				$data = $_POST;			
				$data['session-location'] = check_raw_location($data,$session_loc_id);				
				if(!isset($data['session-location'])){
					$data['session-location'] = $session_loc_id;
				}else{
					$this->session->unset_userdata('location');	
				}					
				$this->session->set_userdata('location', $data['session-location']);
				return choosedrive($data);				
			endif;
		endif;
		$genial['current_month_true'] = date('M');
		$genial['current_day'] = date('d');		
		$genial['location_id']= $this->session->userdata('location');			
		$genial['selectlocations'] = $this->Humdrum_model->bag_locations();			
		$genial['deal_cars'] = $this->Deal_model->pull_cars($genial['location_id']);
		$genial['total_cars'] = count($genial['deal_cars']);
		$genial['popular_locations'] = $this->Humdrum_model->get_popularlocations($genial['location_id']);	
		$genial['car_categories'] = $this->Deal_model->bag_significant('car_category');
		$genial['durations'] = $this->Deal_model->bag_significant('deal_durations');		
		$genial['select_makes'] = $this->Deal_model->bag_significant('car_make');		
		$genial['page'] = "Deal/conception";
		$genial['page_title'] = "Deal Page";
		$genial['data'] = "Deal page";
		$this->load->view('genial', $genial);
	}
	function filtercars(){
		$location_id= $this->session->userdata('location');
		if($_POST):
			if(isset($_POST) && !empty($_POST)):
				$data = $_POST;
				$page['deal_cars'] = $this->Deal_model->filter_cars($location_id,$data); 
				$page['total_cars'] = count($page['deal_cars']);
				$page['location_id']= $location_id;
				$page['page'] = "Deal/filter-conception";
				$page['page_title'] = "Deal Page";
				$page['data'] = "Deal page";
				$this->load->view('page', $page);			
			endif;
		endif;
	}
	public function booking(){
		if($_POST):
			if(isset($_POST) && !empty($_POST)):				
				$data = $_POST;
				$result = $this->Deal_model->Check_Booking_exist($data['car_id'],$data['from_date'],$data['to_date']);
				if(!$result):
					echo "exist";
				else: 
					$this->load->view('Checkout/deckout',$data);
				endif;	
			endif;
		endif;
	}		
}
?>
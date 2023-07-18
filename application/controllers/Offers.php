<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Offers extends CI_Controller {
	/**
	**** TECHWARE SOLUTIONS
	****** RE-EN TW-130 
	**** CREATED DATE : 02,March 2017
	 */
	public function __construct() {
		parent::__construct();
		check_installer();	
		$this->load->model('Offer_model');
		$this->load->model('Humdrum_model');
 	}	
	public function index()
	{
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
		$genial['get_offer_cars']=$this->Offer_model->pull_all_offers($genial['location_id']);			
		$genial['page'] = "Offers/bid";
		$genial['page_title'] = "Offers Page";
		$genial['data'] = "Offers page";
		$this->load->view('genial', $genial);
	}
	public function pitch(){		
		$offer_id = $this->uri->segment(3);
		$genial['offer_details'] = $this->Offer_model->bag_offer($offer_id);		
		if($genial['offer_details']):
			if(isset($genial['offer_details']) && !empty($genial['offer_details'])):
				if($_POST):
					if(isset($_POST) && !empty($_POST)):
						$data = $_POST;
						$data['city'] = 'Atlanta';
						$data['address'] = 'infopark';
						$data['session-location'] = $this->session->userdata('location');
						return $this->choosedrive($data);				
					endif;
				endif;
				$genial['current_month_true'] = date('M');
				$genial['current_day'] = date('d');		
				$genial['location_id']= $this->session->userdata('location');			
				$genial['selectlocations'] = $this->Humdrum_model->bag_locations();		
				$genial['page'] = "Offers/presentation";
				$genial['page_title'] = "Offers Page";		
				$this->load->view('genial', $genial);
			endif;
		endif;
	}		
}
?>
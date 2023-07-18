<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Commute extends CI_Controller {
	/**
	**** TECHWARE SOLUTIONS
	****** RE-EN TW-130 
	**** CREATED DATE : 02,March 2017
	 */
	public function __construct() {
		parent::__construct();
		check_installer();	
		$this->load->model('Humdrum_model');
		$this->load->model('Commute_model');
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
		$genial['commute'] =$this->Commute_model->pull_margin('commute');
		if(isset($genial['commute']) && !empty($genial['commute'])):
			$commute_from_date =$genial['commute'][0]->from_date .' '. $genial['commute'][0]->from_time;
			$commute_to_date =$genial['commute'][0]->to_date .' '. $genial['commute'][0]->to_time;
			$commute_id = $genial['commute'][0]->id;
		else:
			$commute_from_date = date('d-m-Y H:i A');
			$commute_to_date = date('d-m-Y H:i A');
			$commute_id = null;
		endif; 
		$get_cars=$this->Commute_model->get_special_cars($commute_id,$genial['location_id'],$commute_from_date,$commute_to_date); 				
		$genial['get_cars'] = $get_cars;		
		$genial['page'] = "Commute/drive";
		$genial['page_title'] = "Commute Page";
		$genial['data'] = "Commute page";
		$this->load->view('genial', $genial);
	}	
	public function append_commute(){
		$location_id= $this->session->userdata('location');	
		if($_POST):
			if(isset($_POST) && !empty($_POST)):
				$data = $_POST;
				$get_cars=$this->Commute_model->get_special_cars($data['commute_id'],$location_id,$data['from_date'],$data['to_date']);						
				$page['location_id']=	$location_id;
				$page['get_cars'] = $get_cars;
				$this->load->view('Commute/append_drive', $page);	
			endif;
		endif;
	}	
}
?>
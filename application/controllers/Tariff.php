<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tariff extends CI_Controller {
	/**
	**** TECHWARE SOLUTIONS
	****** RE-EN TW-130 
	**** CREATED DATE : 02,March 2017
	 */
	public function __construct() {
		parent::__construct();
		check_installer();	
		$this->load->model('Tariff_model');
		$this->load->model('Humdrum_model');
 	}	
	public function index(){					
		$session_loc_id = $this->session->userdata('location');
		if($_POST):
			if(isset($_POST) && !empty($_POST)):
				if(isset($_POST['chronology']) && !empty($_POST['chronology'])):
					$data = $_POST;
					$data['session-location'] = check_raw_location($data,$session_loc_id);				
					if(!isset($data['session-location'])){
						$data['session-location'] = $session_loc_id;
					}else{
						$this->session->unset_userdata('location');	
					}					
					$this->session->set_userdata('location', $data['session-location']);
					return choosedrive($data);
				elseif(isset($_POST['checktariff']) && !empty($_POST['checktariff'])):
					return $this->tariff_submission($_POST);
				endif;	
			endif;
		endif;
		$tariff['current_month_true'] = date('M');
		$tariff['current_day'] = date('d');		
		$tariff['location_id']= $this->session->userdata('location');			
		$tariff['selectlocations'] = $this->Humdrum_model->bag_locations();			
		$tariff['tariff'] =$this->Tariff_model->pull_margin('tariff');		
		$tariff['get_car_categories']=$this->Tariff_model->pull_car_categories($tariff['tariff'][0]->id,$tariff['location_id']);
		$tariff['get_tariff_car_categories'] =$this->Tariff_model->pull_tariff_car_categories($tariff['location_id']); 	
		$tariff['page'] = "Tariff/rate";
		$tariff['page_title'] = "Tariff Page";
		$tariff['data'] = "Tariff page";
		$this->load->view('tariff', $tariff);
	}	
	public function tariff_carchange(){
		if($_POST):
			if(isset($_POST) && !empty($_POST)):				
				$data = $_POST;	
				$page['get_car_categories']=$this->Tariff_model->pull_car_categories($data['tariff_id'],$data['location_id']);
				$this->load->view('Tariff/inner_rate',$page);
			endif;
		endif;
	}	
	public function order_tariff_cars(){
		if($_POST){
			if(isset($_POST) && !empty($_POST)){
				$data = $_POST;
				if(!empty($data['from_time'])&& empty($data['to_time'])){ 
					$from_time =strtotime($data['from_time']);
					$data['to_time'] = date('Y-m-d H:i', strtotime("+1 hour",$from_time));					
				}
				if(!empty($data['to_time'])&& empty($data['from_time'])){
					$to_time =strtotime($data['to_time']);
					$data['from_time'] = date('Y-m-d H:i',strtotime("-1 hour",$to_time));	
				}				
				$durationfrom =new DateTime($data['from_time']);
				$durationto =new DateTime($data['to_time']);
				$diff = $durationfrom->diff($durationto);
				$duration_days = $diff->days;
				$duration_hours = $diff->h;
				$total_hours = $duration_days * 24 + $duration_hours;	
				$page['tariff'] =$this->Tariff_model->pull_unique_tariff($data['car_id'],$total_hours);
				$this->load->view('Tariff/append_car_tariff',$page);
			}
		}
	}
	public function tariff_submission(){
		$session_loc_id = $this->session->userdata('location');
		if($_POST){
			if(isset($_POST) && !empty($_POST)){
				$data = $_POST;						
				$data['from_month_org'] = date('M-Y', strtotime($data['from_time']));
				$data['from_date_org'] = date('d-D-y-m', strtotime($data['from_time']));
				$data['from_time_org'] ='Time:'.''.date('h:i A', strtotime($data['from_time']));
				$data['to_month_org'] = date('M-Y', strtotime($data['to_time']));
				$data['to_date_org'] = date('d-D-y-m', strtotime($data['to_time']));
				$data['to_time_org'] ='Time:'.''.date('h:i A', strtotime($data['to_time']));
				$data['originallocation'] =$session_loc_id;
				$data['session-location'] = $session_loc_id;
				$data['address'] = $data['city_final'];
				$data['latitude'] = "";
				$data['longitude'] = "";
				$car_listing = $this->Tariff_model->bag_cars_chronology($_POST['car_id']);				
				$car_from_date = $car_listing->from_date;
				$car_to_date = $car_listing->to_date;				
				$from_date =  strtotime($data['from_time']);
				$to_date = strtotime($data['to_time']);					
				if($car_from_date < $from_date && $car_to_date < $from_date && $car_from_date < $to_date && $car_to_date < $to_date): 
					return choosedrive($data);
				else:
					$this->session->set_flashdata('message',array('message' => 'Sorry! Requested car not found. Please choose some other date ','class' => 'success'));
					redirect(base_URL().'Tariff');					
				endif;	
			}
		}	
	}
	public function get_fromdatetime(){
		if($_POST){
			if(isset($_POST) && !empty($_POST)){
				$data = $_POST; 
				$from_date = strtotime($data['from_date']); 					
				echo $final_from_date = date("Y-m-d H:i", strtotime("+1 hours", $from_date));					
			}
		}
	}		
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Humdrum extends CI_Controller {
	/**
	**** TECHWARE SOLUTIONS
	****** RE-EN TW-130 
	**** CREATED DATE : 17,March 2017
	**/
	public function __construct() {
		parent::__construct();
		check_installer();	
		$this->load->model('Humdrum_model');
 	}	
	public function get_popularlocations(){
		if($_POST):
			if(isset($_POST) && !empty($_POST)):				
				$data = $_POST;
				$id = $data['lastmsg'];
				$this->session->set_userdata('location', $id);	
				$page['location']= $this->Humdrum_model->get_popularlocations($id);
				$this->load->view('Coupe/popular_places',$page);
			endif;
		endif;
	}
	public function append_booking(){
		if($_POST):
			if(isset($_POST) && !empty($_POST)):				
				$data = $_POST;				
				$page['id'] = $data['lastmsg'];
				$page['locationid'] = $data['locationid'];	
				$page['price']= $data['price'];
				$page['free_km']= $data['free_km'];
				$page['car_name']= $data['carname'];
				$page['car_image']= $data['car_image'];
				$page['seats']= $data['seats'];
				$page['showroom_latitude']= $data['showroom_lat'];
				$page['showroom_longitude']= $data['showroom_lon'];
				$page['excess']= $data['excess'];
				$page['category']= $data['category'];
				$page['tariff_id']= $data['tariff_id'];
				$page['showroomaddress']= $data['showroomaddress'];				
				$page['nearby_locations']= $this->Humdrum_model->get_popularlocations_cars($page['locationid']);
				$this->load->view('Coupe/append_booking',$page);
			endif;
		endif;
	}	
	public function location_change(){
		$this->session->unset_userdata('location');
		if($_POST):
			$this->session->set_userdata('location', $_POST['lastmsg']);		
			echo "success";
		endif;
	}
	public function booking(){
		if($_POST):
			if(isset($_POST) && !empty($_POST)):				
				$data = $_POST;									
				$this->load->view('Checkout/deckout',$data);
			endif;
		endif;
	}
	public function append_tariff_cars(){
		if($_POST):
			if(isset($_POST) && !empty($_POST)):				
				$data = $_POST;	
				$page['tariff_book_id']= $data['tariff_id'];	
				$page['showroom_cars'] = $this->Humdrum_model->bag_showroom_cars($data['lastmsg'],$data['from_date'],$data['to_date'],$data['total_hours'],$data['tariff_id']);				
				$this->load->view('Coupe/tariff_cars',$page);
			endif;
		endif;
	}
	public function Couponcheck(){
		$date = date('d-m-Y');
		if($_POST):
			if(isset($_POST) && !empty($_POST)):				
				$data = $_POST;								
				$result= $this->Humdrum_model->bag_coupon_cars($data['coupon'],$date,$data['category']); 		
				if($result != null){ 
					echo $result->percentage;	
				}else{
					echo null;
				}									
			endif;
		endif;
	}
	public function Reservation(){
		$renter_id = $this->session->userdata('frontend_logged_in')['id'];
		$rentee = get_rentee($renter_id);
		if($_POST):
			if(isset($_POST) && !empty($_POST)):				
				$data = $_POST;
				$data['renter_id'] = $renter_id;	
				$result= $this->Humdrum_model->Reservation($data);
				if($result == 'success'):
					$settings = get_settings();	           
					if(!empty($rentee->rentee)):
						$username=$rentee->rentee;
					else:
						$username=$rentee->email;
					endif;
					$from_email=$settings->admin_email;					           			
					$configs = array(
						'protocol'=>'smtp',
						'smtp_host'=>$settings->smtp_host,
						'smtp_user'=>$settings->smtp_username,
						'smtp_pass'=>$settings->smtp_password,
						'smtp_port'=>'587'
					);             
					$this->load->library('email');
					$this->email->initialize($configs);
					$this->email->from($from_email, $username);
					$this->email->to($rentee->email);
					$this->email->subject('Cityride Car Reservation');
					$this->email->message('Hi Sir/Madam , Reservation for your car from '.$data['from_date'].' to '.$data['from_date'].' is successfully booked. Kindly pick your car from showroom. Thanks by. CityRide Team');
					$this->email->send();                       					
					echo 'success';						
				endif;	
			endif;
		endif;
	}	
}
?>
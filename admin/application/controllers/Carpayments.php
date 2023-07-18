<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Carpayments extends CI_Controller {
	public function __construct() {
		parent::__construct();
		
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Carpayment_model');	
		$this->load->model('Deal_model');	
		$this->load->model('Cardirectory_model');
 	}
/* === VIEW PAYMENT DETAILS=== */
	public function view()
	{
		$Carpayments_view_page = "Carpayment/view-carpayment";
		$permission = permission($Carpayments_view_page);
		if($permission == "access") {
			$template['page'] = "Carpayment/view-carpayment";
			$template['page_title'] = "Car Payment Page";
			$template['data'] = $this->Carpayment_model->get_cpayment();
			$this->load->view('template', $template);
		}
		else{
			$this->load->view('error_trans');
		}
	}
/* === ADD PAYMENT DETAILS== */
	public function add()
	{
		$Carpayments_add_page = "Carpayment/add-carpayment";
		$permission = permission($Carpayments_add_page);
		if($permission == "access") {		
			if($_POST)
			{
				if(isset($_POST) && !empty($_POST)){
					$data = $_POST;
						$price = $this->Carpayment_model->getprice($data['tariff_id']);
						$date1=$data['from_date'];
						$date2=$data['to_date'];
						$from_date = new DateTime($date1);
						$to_date   = new DateTime($date2);
						$diff      = date_diff($from_date,$to_date);					
						$d=$diff->d;
						$h=$diff->h;
						$m=$diff->i;
						$data['total_date']=$d.'-'.$h.'-'.$m;
						if($diff->d==0)
						{
							$payment_gross=$diff->h*$price->price_normal;
						}
						else{
							$totalhr=($diff->d)*24+($diff->h);
							$payment_gross=$totalhr*$price->price_normal;
						}
						$data['amount']=$payment_gross;
					   $result = $this->Carpayment_model->add_cpayment($data);
						if($result) {
							$this->session->set_flashdata('message',array('message' => 'Car Booking For Requested Renter is Added Successfully','class' => 'success'));
							redirect(base_url().'Carpayments/view');
						}
						else{
							$this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
							redirect(base_url().'Carpayments/view');
						}
				}
			}
			$template['renter']  =  $this->Cardirectory_model->get('renter');
			$template['location']  =  $this->Cardirectory_model->get('general_locations');
			$template['car'] = $this->Cardirectory_model->get('car_listing');
			$template['tariff']  =  $this->Cardirectory_model->get('tariff');
			$template['page'] = "Carpayment/add-carpayment";
			$template['page_title'] = "Car payment Page";
			$this->load->view('template', $template);
		}
		else{
			$this->load->view('error_trans');
		}
	}
/* === DEACTIVE  CAR PAYMENT DETAILS=== */
	  public function disable(){
			$data1 = array(
						"status" => '3'
						 );
			$id = $this->uri->segment(3);
			$car_id = $this->uri->segment(4); 
			$data['from_date'] = '';
			$data['to_date'] = '';	
			$data1['updated_on'] = date('Y-m-d H:i A');
			$s=$this->Carpayment_model->update_cpayment_status_new($id, $data1,$car_id,$data);
			$this->session->set_flashdata('message', array('message' => 'Payment Status Successfully Cancelled','class' => 'warning'));
			redirect(base_url().'Carpayments/view');
	    }
		/* === ONLINE  CAR PAYMENT DETAILS=== */
	  public function online(){
			$data1 = array(
						"status" => '4'
						 );
			$id = $this->uri->segment(3);
			$s=$this->Carpayment_model->update_cpayment_status($id, $data1);
			$this->session->set_flashdata('message', array('message' => 'Car started Running','class' => 'warning'));
			redirect(base_url().'Carpayments/view');
	    }
/* === ACTIVE  CAR PAYMENT DETAILS=== */
		public function active(){
			$data1 = array(
							"status" => '2'
							 );
			$id = $this->uri->segment(3);
			$car_id = $this->uri->segment(4);
			$data['from_date'] = '';
			$data['to_date'] = '';	
			$data1['updated_on'] = date('Y-m-d H:i A');
			$s=$this->Carpayment_model->update_cpayment_status_new($id, $data1,$car_id,$data);
			$this->session->set_flashdata('message', array('message' => ' Payment Status Completed','class' => 'success'));
			redirect(base_url().'Carpayments/view');
	    }
/* === EDIT PAYMENT DETAILS=== */
		public function edit()
		{
			$Carpayments_edit_page = 'Carpayment/edit-carpayment';
			$permission = permission($Carpayments_edit_page);
	    	if($permission == "access") {		
				$id = $this->uri->segment(3);
				$template['data'] = $this->Carpayment_model->get_single_cpayment($id);
				if(!empty($template['data'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$price = $this->Carpayment_model->getprice($data['tariff_id']);
							$date1=$data['from_date'];
							$date2=$data['to_date'];
						$from_date = new DateTime($date1);
						$to_date   = new DateTime($date2);
						$diff      = date_diff($from_date,$to_date);					
						$d=$diff->d;
						$h=$diff->h;
						$m=$diff->i;
						$data['total_date']=$d.'-'.$h.'-'.$m;
						if($diff->d==0){
							$payment_gross=$diff->h*$price->price_normal;
						}
						else{
							$totalhr=($diff->d)*24+($diff->h);
							$payment_gross=$totalhr*$price->price_normal;
						}
						$data['amount']=$payment_gross;
							$result = $this->Carpayment_model->cpayment_edit($id,$data);
							if($result){
									$this->session->set_flashdata('message',array('message' => 'Requested Car Booing for the Renter is Updated Successfully','class' => 'success'));
									redirect(base_url().'Carpayments/view');
							}
							else{
									$this->session->set_flashdata('message',array('message' => 'Error','class' => 'error'));
									redirect(base_url().'Carpayments/view');
							}
						}
					}
				}
				else{
					$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					redirect(base_url().'Carpayments/view');
				}
			$template['renter']  =  $this->Cardirectory_model->get('renter');
			$template['location']  =  $this->Cardirectory_model->get('general_locations');
			$template['place']  =  $this->Carpayment_model->get_single_sub_location($template['data']->location_id);		
			$template['car'] = $this->Carpayment_model->getcars($template['data']->location_id);
			$template['tariff']  =  $this->Carpayment_model->singletariff($template['data']->tariff_id);
			$template['page'] = 'Carpayment/edit-carpayment';
			$template['page_title'] = 'Edit Car payment';
			$this->load->view('template',$template);
		}
		else{
			$this->load->view('error_trans');
		}	
	  }
/* === PAYMENT DELETE=== */
		public function deletecpayment(){ 
			$id = $this->uri->segment(3);
			$car_id = $this->uri->segment(4); 			
			$data['from_date'] = '';
			$data['to_date'] = '';			
			$result= $this->Carpayment_model->deletecpayment($id,$car_id,$data);
			$this->session->set_flashdata('message', array('message' => 'Requested Car Booing for the Renter is Deleted Successfully','class' => 'success'));
			redirect(base_url().'Carpayments/view');
	    }
		/* === SHOW CAR BY LOCATION == */
		public function getcar(){ 
			$id = $_POST['id'];
			$template['result']= $this->Carpayment_model->getcar($id);
			$this->load->view('Carpayment/viewcar',$template);
	    }
		/* === SHOW CAR BY LOCATION == */
		public function gettariff(){ 
			$id = $_POST['id'];
			$template['result']= $this->Carpayment_model->gettariff($id);
			$this->load->view('Carpayment/viewtariff',$template);
	    }
		/* === DateTime Picker Check === */
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
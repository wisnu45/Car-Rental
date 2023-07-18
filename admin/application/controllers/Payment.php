<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Payment extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Payment_model');
		$this->load->model('Cardirectory_model');	
		$this->load->model('Package_model');		
 	}
/* === ADD PAYMENT DETAILS== */
	public function add()
	{
		$payament_add_page = "payment/add-payment";
		$permission = permission($payament_add_page);
		if($permission == "access") {
			if($_POST)
			{
				if(isset($_POST) && !empty($_POST)){
					$data = $_POST;
					$singlepackage = $this->Package_model->get_singlepackage($data['package_id']);
					$data['package_name']= $singlepackage->package_name;
					$data['package_period']= $singlepackage->period;
					$data['payment_gross']= $singlepackage->price;
					$data['expiry_date'] = date('Y-m-d', strtotime("+".$singlepackage->period));
					$result = $this->Payment_model->add_payment($data);
					if($result) {
				
						$this->session->set_flashdata('message',array('message' => 'Payment added  successfully','class' => 'success'));
					   redirect(base_url().'Payment/add');
				}
					else{
						$this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
						redirect(base_url().'Payment/add');
					}
				}
			}
			$template['page'] = "payment/add-payment";
			$template['page_title'] = "payment Page";
			$template['data'] = $this->Payment_model->get_payment();
			$template['dealer']  =  $this->Cardirectory_model->get('dealers');
			$template['package'] = $this->Payment_model->get_package();
			$this->load->view('template', $template);
		}			
		else
		{
			$this->load->view('error_trans');
		}
	}
/* === DEACTIVE  PAYMENT DETAILS=== */
	  public function disable(){
			$data1 = array(
						"status" => '0'
						 );
			$id = $this->uri->segment(3);
			$s=$this->Payment_model->update_payment_status($id, $data1);
			$this->session->set_flashdata('message', array('message' => 'Payment Successfully Inactivated','class' => 'warning'));
			redirect(base_url().'Payment/add');
	    }
/* === ACTIVE  PAYMENT DETAILS=== */
		public function active(){
			$data1 = array(
							"status" => '1'
							 );
			$id = $this->uri->segment(3);
			$s=$this->Payment_model->update_payment_status($id, $data1);
			$this->session->set_flashdata('message', array('message' => ' Successfully Activated','class' => 'success'));
			redirect(base_url().'Payment/add');
	    }
/* === EDIT PAYMENT DETAILS=== */
		public function edit()
		{
			$payament_edit_page = 'payment/edit-payment';
			$permission = permission($payament_edit_page);
		    if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Payment_model->get_single_payment($id);
				if(!empty($template['data'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$singlepackage = $this->Package_model->get_singlepackage($data['package_id']);
							$data['package_name']= $singlepackage->package_name;
							$data['package_period']= $singlepackage->period;
							$data['payment_gross']= $singlepackage->price;
							$data['expiry_date'] = date('Y-m-d', strtotime("+".$singlepackage->period));
							$result = $this->Payment_model->payment_edit($id,$data);
							if($result){
									$this->session->set_flashdata('message',array('message' => 'Package Details Updated  Successfully','class' => 'success'));
									redirect(base_url().'Payment/add');
							}
						}
					}
				}
				else{
					$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					redirect(base_url().'Payment/add');
					}
				$template['page'] = 'payment/edit-payment';
				$template['page_title'] = 'Edit payment';
				$template['dealer']  =  $this->Cardirectory_model->get('dealers');
				$template['package'] = $this->Package_model->get_package();
				$this->load->view('template',$template);
				}			
			else{
				$this->load->view('error_trans');
			}			
	    }
/* === PAYMENT DELETE=== */
		public function deletepayment(){ 
			$id = $this->uri->segment(3);
			$result= $this->Payment_model->deletepayment($id);
			$this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
			redirect(base_url().'Payment/add');
	    }
}
?>
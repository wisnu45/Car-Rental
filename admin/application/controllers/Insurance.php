<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Insurance extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Insurance_model');		
 	}
/* === ADD INSURENCE=== */
	function add()
	{
		$insurance_add_page = "Insurance/add-insurance";
		$permission = permission($insurance_add_page);
		if($permission == "access") {
			if($_POST){
				if(isset($_POST) && !empty($_POST)){
					$data = $_POST;
					$result = $this->Insurance_model->add_insurance($data);
					if($result){
							$this->session->set_flashdata('message',array('message' => 'Insurance added  successfully','class' => 'success'));
					}
					else{
						 $this->session->set_flashdata('message', array('message' => 'Insurance Already Exist','class' => 'error'));
					}
				}
			}
			$template['page'] = "Insurance/add-insurance";
			$template['page_title'] = "Insurance Page";
			$template['data'] = $this->Insurance_model->get_insurance();
			$this->load->view('template', $template); 
		}		
		else{
				$this->load->view('error_trans');
		}			
	}	
/* === EDIT  INSURENCE DETAILS=== */	
		public function edit()
		{
			$insurance_edit_page = 'Insurance/edit-insurance';
			$permission = permission($insurance_edit_page);
			if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Insurance_model->get_single_insurance($id);
				if(!empty($template['data'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$result = $this->Insurance_model->insurance_edit($id,$data);
							if($result){
									$this->session->set_flashdata('message',array('message' => 'Requested Insurance Updated  successfully','class' => 'success'));
									redirect(base_url().'Insurance/add');
							}
							else{
									$this->session->set_flashdata('message',array('message' => 'Insurance Already Exist','class' => 'danger'));
									redirect(base_url().'Insurance/add');
							}
						}
					}
				}
				else{
					$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					redirect(base_url().'Insurance/add');
				}
				$template['page'] = 'Insurance/edit-insurance';
				$template['page_title'] = 'Edit Insurance';
				$this->load->view('template',$template);
			}			
			else{
					$this->load->view('error_trans');
			}			
	    }
/* === DELETE INSURENCE=== */
	public function deleteinsurance(){
		$id = $this->uri->segment(3);
		$result= $this->Insurance_model->deleteinsurance($id);
		$this->session->set_flashdata('message', array('message' => 'Requested Insurance Deleted Successfully','class' => 'success'));
		redirect(base_url().'Insurance/add');
	}	
}
?>
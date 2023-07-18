<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Duration extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Duration_model');		
 	}
/* ===ADD Duration DETAILS=== */	
	public function add()
	{
		$duration_view_page = "Duration/add-duration";
		$permission = permission($duration_view_page);
		if($permission == "access") {
			if($_POST)
			{
				if(isset($_POST) && !empty($_POST)){
					$data = $_POST;
					$result = $this->Duration_model->add_duration($data);
					if($result) {
				
						$this->session->set_flashdata('message',array('message' => 'Duration added  successfully','class' => 'success'));
						redirect(base_url().'Duration/add');
					}
					else{
						$this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
						redirect(base_url().'Duration/add');
					}
				}
			}
			$template['page'] = "Duration/add-duration";
			$template['page_title'] = "Duration Page";
			$template['data'] = $this->Duration_model->get_duration();
			$this->load->view('template', $template);
		}
		else{
				$this->load->view('error_trans');
			}	
	}
/* === DEACTIVE  PACKAGE DETAILS=== */	
	  public function disable(){
			$data1 = array(
						"status" => '0'
						 );
			$id = $this->uri->segment(3);
			$s=$this->Duration_model->update_duration_status($id, $data1);
			$this->session->set_flashdata('message', array('message' => 'Inactivated Successfully ','class' => 'warning'));
			redirect(base_url().'Duration/add');
	    }
/* ===ACTIVE  PACKAGE DETAILS=== */	
		public function active(){
			$data1 = array(
							"status" => '1'
							 );
			$id = $this->uri->segment(3);
			$s=$this->Duration_model->update_duration_status($id, $data1);
			$this->session->set_flashdata('message', array('message' => ' Activated Successfully ','class' => 'success'));
			redirect(base_url().'Duration/add');
	    }
/* === EDIT PACKAGE DETAILS=== */	
		public function edit()
		{
			$duration_edit_page = 'Duration/edit-duration';
		    $permission = permission($duration_edit_page);
		    if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Duration_model->get_single_duration($id);
				if(!empty($template['data'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$result = $this->Duration_model->duration_edit($id,$data);
							if($result){
									$this->session->set_flashdata('message',array('message' => 'Requested Duration Updated  successfully','class' => 'success'));
									redirect(base_url().'Duration/add');
							}
							else{
									$this->session->set_flashdata('message',array('message' => 'Error  successfully','class' => 'danger'));
									redirect(base_url().'Duration/add');
							}
							
						}
					}
				}
				else{
					$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					redirect(base_url().'Duration/add');
					}
				$template['page'] = 'Duration/edit-duration';
				$template['page_title'] = 'Edit Duration';
				$this->load->view('template',$template);
			}
			else{
					$this->load->view('error_trans');
				}			
	    }
/* === DELETE PACKAGE=== */	
		public function deleteduration(){ 
			$id = $this->uri->segment(3);
			$result= $this->Duration_model->deleteduration($id);
			$this->session->set_flashdata('message', array('message' => 'Requested Duration Deleted Successfully','class' => 'success'));
			redirect(base_url().'Duration/add');
	    }
}
?>
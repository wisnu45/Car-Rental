<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Model extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Model_model');		
 	}
	/* === ADD MODEL=== */
	function addmodel()
	{
		$model_add_page = "Model/add-model";
		$permission = permission($model_add_page);
		if($permission == "access") {
			if($_POST){
				if(isset($_POST) && !empty($_POST)){
					$data = $_POST;
					$result = $this->Model_model->add_model($data);
					if($result){
							$this->session->set_flashdata('message',array('message' => 'Model added  successfully','class' => 'success'));
					}
					else{
						 $this->session->set_flashdata('message', array('message' => 'Model Name already Exist','class' => 'error'));
					}
				}
			}
			$template['page'] = "Model/add-model";
			$template['page_title'] = "Model Page";
			$template['data'] = $this->Model_model->get_model();
			$template['make'] = $this->Model_model->get_car_make();
			$this->load->view('template', $template);  
		}	
		else{
			$this->load->view('error_trans');
		}	
	}		
/* === EDIT  MODEL DETAILS=== */
		public function edit()
		{
			$model_edit_page = 'Model/edit-model';
			$permission = permission($model_edit_page);
		    if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Model_model->get_single_model($id);
				if(!empty($template['data'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$result = $this->Model_model->model_edit($id,$data);
							if($result){
									$this->session->set_flashdata('message',array('message' => 'Requested  Model Updated  Successfully','class' => 'success'));
									redirect(base_url().'Model/addmodel');
							}
						}
					}
				}
				else{
					$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					redirect(base_url().'Model/addmodel');
				}
				$template['make'] = $this->Model_model->get_car_make();
				$template['page'] = 'Model/edit-model';
				$template['page_title'] = 'Edit model';
				$this->load->view('template',$template);
			}
			else{
				$this->load->view('error_trans');
			}	
	    }
/* === DELETE MODEL=== */	
	public function deletemodel(){
		$id = $this->uri->segment(3);
		$result= $this->Model_model->deletemodel($id);
		$this->session->set_flashdata('message', array('message' => 'Requested  Model Deleted Successfully','class' => 'success'));
		redirect(base_url().'Model/addmodel');
	}	
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Feature extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Feature_model');		
 	}
/* === VIEW FEATURE DETAILS=== */
	public function view()
	{
		$feature_view_page = "Feature/view-feature";
		$permission = permission($feature_view_page);
		if($permission == "access") {
			$template['page'] = "Feature/view-feature";
			$template['page_title'] = "Feature Page";
			$template['data'] = $this->Feature_model->get_feature();
			$this->load->view('template', $template);
		}
		else{
			$this->load->view('error_trans');
		}
	}
/* === ADD MASTER TABLE  FEATURE=== */
	function addfeature()
	{
		$feature_add_page = "Feature/add-feature";
		$permission = permission($feature_add_page);
		if($permission == "access") {
			if($_POST)
			{
				if(isset($_POST) && !empty($_POST)){
					$data = $_POST;
					$result = $this->Feature_model->add_feature($data);
					if($result) {
							$this->session->set_flashdata('message',array('message' => 'Feature added  successfully','class' => 'success'));
					}else{						
							$this->session->set_flashdata('message', array('message' => 'Feature Already Exist','class' => 'error'));
					}
				}				
			}
			$template['page'] = "Feature/add-feature";
			$template['page_title'] = "Feature Page";
			$template['data'] = $this->Feature_model->get_feature();
			$this->load->view('template', $template);  
		}
		else{
			$this->load->view('error_trans');
		}		
	}		
/* === EDIT  FEATURE DETAILS=== */
		public function edit(){
			$feature_edit_page = 'Feature/edit-feature';
			$permission = permission($feature_edit_page);
		    if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Feature_model->get_single_feature($id);
				if(!empty($template['data'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$result = $this->Feature_model->feature_edit($id,$data);
							if($result){
								$this->session->set_flashdata('message',array('message' => 'Requested feature Updated  successfully','class' => 'success'));
								redirect(base_url().'Feature/addfeature');
							}
							else{
								$this->session->set_flashdata('message',array('message' => 'Feature Already Exist','class' => 'danger'));
								redirect(base_url().'Feature/addfeature');
							}
						}
					}
				}
				else{
						$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
						redirect(base_url().'Feature/addfeature');
				}
				$template['page'] = 'Feature/edit-feature';
				$template['page_title'] = 'Edit Feature';
				$this->load->view('template',$template);
			}
			else
			{
				$this->load->view('error_trans');
			}	
	    }
/* === DELETE FEATURE=== */
	public function deletefeature(){      
		$id = $this->uri->segment(3);
		$result= $this->Feature_model->deletefeature($id);
		$this->session->set_flashdata('message', array('message' => 'Requested feature Deleted Successfully','class' => 'success'));
	    redirect(base_url().'Feature/addfeature');
	}	
}
?>
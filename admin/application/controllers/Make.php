<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Make extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Make_model');		
 	}
/* === ADD MAKE=== */
	function addmake()
	{
		$make_add_page = "Make/add-make";
		$permission = permission($make_add_page);
		if($permission == "access") {
			if($_POST){
				if(isset($_POST) && !empty($_POST)){
					$data = $_POST;
					$result = $this->Make_model->add_make($data);
					if($result){
							$this->session->set_flashdata('message',array('message' => 'Make added  successfully','class' => 'success'));
					}
					else{
						 $this->session->set_flashdata('message', array('message' => 'Make Name already exist','class' => 'error'));
					}
				}
			}
			$template['page'] = "Make/add-make";
			$template['page_title'] = "Make Page";
			$template['data'] = $this->Make_model->get_make();
			$this->load->view('template', $template);  
		}
		else{
				$this->load->view('error_trans');
			}		
	}		
/* === EDIT  MAKE DETAILS=== */
		public function edit()
		{
			$make_edit_page = 'Make/edit-make';
			$permission = permission($make_edit_page);
	    	if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Make_model->get_single_make($id);
				if(!empty($template['data'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$result = $this->Make_model->make_edit($id,$data);
							if($result){
									$this->session->set_flashdata('message',array('message' => 'Requested Make Updated successfully','class' => 'success'));
									redirect(base_url().'Make/addmake');
							}
							else{
									$this->session->set_flashdata('message',array('message' => 'Make Name Already Exist','class' => 'danger'));
									redirect(base_url().'Make/addmake');
							}
						}
					}
				}
				else{
					$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					redirect(base_url().'Make/addmake');
				}
				$template['page'] = 'Make/edit-make';
				$template['page_title'] = 'Edit Make';
				$this->load->view('template',$template);	
			}
			else{
					$this->load->view('error_trans');
			}	
	    }
/* === DELETE MAKE=== */	
	 public function deletemake(){
			$id = $this->uri->segment(3);
			$result= $this->Make_model->deletemake($id);
			$this->session->set_flashdata('message', array('message' => 'Requested Make Deleted Successfully','class' => 'success'));
			redirect(base_url().'Make/addmake');
	    }	
}
?>
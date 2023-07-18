<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Color extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Color_model');		
 	}
/* === ADD MASTER TABLE FOR COLOR=== */
	function addcolor()
	{
		$color_view_page = "Color/add-color";
		$permission = permission($color_view_page);
		if($permission == "access") {
			if($_POST){
				if(isset($_POST) && !empty($_POST)){
					$data = $_POST;
					$result = $this->Color_model->add_color($data);
					if($result){
								$this->session->set_flashdata('message',array('message' => 'Color added  successfully','class' => 'success'));
					}
					else{
							$this->session->set_flashdata('message', array('message' => 'Color Already Exist','class' => 'error'));
					}
				}
			}
			$template['data'] = $this->Color_model->get_color();
			$template['page'] = "Color/add-color";
			$template['page_title'] = "Color Page";
			$this->load->view('template', $template);   
		}
		else{
			$this->load->view('error_trans');
		}	
    }
/* === EDIT  COLOR DETAILS=== */	
		public function edit()
		{
			$color_edit_page = 'Color/edit-color';
			$permission = permission($color_edit_page);
		    if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Color_model->get_single_color($id);
				if(!empty($template['data'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$result = $this->Color_model->color_edit($id,$data);
							if($result){
								$this->session->set_flashdata('message',array('message' => 'Requested Color Updated  successfully','class' => 'success'));
								redirect(base_url().'Color/addcolor');
							}
							else{
								$this->session->set_flashdata('message',array('message' => 'Color Already Exist','class' => 'danger'));
								redirect(base_url().'Color/addcolor');
							}
						}
					}
				}
				else{
					$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					redirect(base_url().'Color/addcolor');
					}
				$template['page'] = 'Color/edit-color';
				$template['page_title'] = 'Edit Color';
				$this->load->view('template',$template);	
			}
			else{
				$this->load->view('error_trans');
			}	
	    }
/* === DELETE COLOR DETAILS=== */	
	public function deletecolor(){
		$id = $this->uri->segment(3);
		$result= $this->Color_model->deletecolor($id);
		$this->session->set_flashdata('message', array('message' => 'Requested Color Deleted Successfully','class' => 'success'));
	    redirect(base_url().'Color/addcolor');
	}	
}
?>
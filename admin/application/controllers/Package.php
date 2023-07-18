<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Package extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Package_model');		
 	}
/* === ADD AND VIEW PACKAGE DETAILS=== */	
	public function view()
	{
		$package_view_page = "Package/view-package";
		$permission = permission($package_view_page);
		if($permission == "access") {
			if($_POST)
			{
				if(isset($_POST) && !empty($_POST)){
					$data = $_POST;
					$result = $this->Package_model->add_package($data);
					if($result) {
				
						$this->session->set_flashdata('message',array('message' => 'Package added  successfully','class' => 'success'));
						redirect(base_url().'Package/view');
					}
					else{
						$this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
						redirect(base_url().'Package/view');
					}
				}
			}
			$template['page'] = "Package/view-package";
			$template['page_title'] = "Package Page";
			$template['data'] = $this->Package_model->get_package();
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
			$s=$this->Package_model->update_package_status($id, $data1);
			$this->session->set_flashdata('message', array('message' => 'Inactivated Successfully ','class' => 'warning'));
			redirect(base_url().'Package/view');
	    }
/* ===ACTIVE  PACKAGE DETAILS=== */	
		public function active(){
			$data1 = array(
							"status" => '1'
							 );
			$id = $this->uri->segment(3);
			$s=$this->Package_model->update_package_status($id, $data1);
			$this->session->set_flashdata('message', array('message' => 'Activated Successfully ','class' => 'success'));
			redirect(base_url().'Package/view');
	    }
/* === EDIT PACKAGE DETAILS=== */	
		public function edit()
		{
			$package_edit_page= 'Package/edit-package';
			$permission = permission($package_edit_page);
		    if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Package_model->get_single_package($id);
				if(!empty($template['data'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$result = $this->Package_model->package_edit($id,$data);
							if($result){
									$this->session->set_flashdata('message',array('message' => 'Requested Package Updated successfully','class' => 'success'));
									redirect(base_url().'Package/view');
							}
							else
							{
								$this->session->set_flashdata('message',array('message' => 'Error','class' => 'danger'));
								redirect(base_url().'Package/view');
							}
						}
					}
				}
				else{
					$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					redirect(base_url().'Package/view');
					}
				$template['page'] = 'Package/edit-package';
				$template['page_title'] = 'Edit Package';
				$this->load->view('template',$template);	
			}	
			else{
				$this->load->view('error_trans');
			}	
	    }
/* === DELETE PACKAGE=== */	
		public function deletepackage(){ 
			$id = $this->uri->segment(3);
			$result= $this->Package_model->deletepackage($id);
			$this->session->set_flashdata('message', array('message' => 'Requested Package Deleted Successfully','class' => 'success'));
			redirect(base_url().'Package/view');
	    }
}
?>
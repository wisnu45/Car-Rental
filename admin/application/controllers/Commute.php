<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Commute extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Cardirectory_model');		
		$this->load->model('Commute_model');	
 	}
/* ===ADD COMMUTE DETAILS=== */	
		public function add()
	{
		$commute_add_page = "Commute/add-commute";
		$permission = permission($commute_add_page);
		if($permission == "access") {
			if($_POST)
			{
				if(isset($_POST) && !empty($_POST)){
					$data = $_POST;
					$result = $this->Commute_model->add_commute($data);
					if($result=="sucess") {
				
						$this->session->set_flashdata('message',array('message' => 'Commute added  successfully','class' => 'success'));
						redirect(base_url().'Commute/add');
					}
					elseif($result=="exist"){
						$this->session->set_flashdata('message', array('message' => 'Commute Name Already Exist','class' => 'error'));
						redirect(base_url().'Commute/add');
					}
					elseif($result=="overload"){
						$this->session->set_flashdata('message', array('message' => 'Limit End','class' => 'error'));
						redirect(base_url().'Commute/add');
					}
				}
			}
			$template['data'] = $this->Commute_model->get_commute();
			$template['page'] = "Commute/add-commute";
			$template['page_title'] = "Commute Page";
			$this->load->view('template', $template);
		}
		else{
				$this->load->view('error_trans');
		}
	}
/* === DEACTIVE  COMMUTE DETAILS=== */	
	  public function disable(){
			$data1 = array(
						"status" => '0'
						 );
			$id = $this->uri->segment(3);
			$s=$this->Commute_model->update_commute_status($id, $data1);
			$this->session->set_flashdata('message', array('message' => 'Inactived Successfully ','class' => 'warning'));
			redirect(base_url().'Commute/view');
	    }
/* ===ACTIVE  COMMUTE DETAILS=== */	
		public function active(){
			$data1 = array(
							"status" => '1'
							 );
			$id = $this->uri->segment(3);
			$s=$this->Commute_model->update_commute_status($id, $data1);
			$this->session->set_flashdata('message', array('message' => 'Actived Successfully ','class' => 'success'));
			redirect(base_url().'Commute/view');
	    }
/* === EDIT COMMUTE DETAILS=== */	
		public function edit()
		{
			$commute_edit_page = 'Commute/edit-commute';
			$permission = permission($commute_edit_page);
		    if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Commute_model->get_single_commute($id);
				if(!empty($template['data'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$result = $this->Commute_model->commute_edit($id,$data);
							if($result == 'exist'){
									$this->session->set_flashdata('message',array('message' => 'Commute Name Already Exist','class' => 'error'));
									redirect(base_url().'Commute/add');
									
							}
							elseif($result= 'success'){
								$this->session->set_flashdata('message',array('message' => 'Commute For the Requested Car Updated Sucessfully','class' => 'success'));
									redirect(base_url().'Commute/add');	
							}
						}
					}
				}
				else{
					$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					redirect(base_url().'Commute/add');
					}
				$template['page'] = 'Commute/edit-commute';
				$template['page_title'] = 'Edit Commute';
				$this->load->view('template',$template);
				}
			else{
					$this->load->view('error_trans');
			}			
	    }
/* === DELETE COMMUTE=== */	
		public function deletecommute(){ 
			$id = $this->uri->segment(3);
			$result= $this->Commute_model->deletecommute($id);
			$this->session->set_flashdata('message', array('message' => 'Commute For the Requested Car Deleted Successfully','class' => 'success'));
			redirect(base_url().'Commute/add');
	    }
		/* === ADD COMMUTE PACKAGE=== */	
		public function addpackage(){		
			$commute_addpackage_page = "Commute/commute-package";
			$permission = permission($commute_addpackage_page);
		    if($permission == "access") {
				if($_POST)
				{
					if(isset($_POST) && !empty($_POST)){
						$data = $_POST;
						$result = $this->Commute_model->add_package($data);
						if($result){
							
							$this->session->set_flashdata('message',array('message' => 'Commute Package added  successfully','class' => 'success'));
							redirect(base_url().'Commute/view');
							
						}
						else{
							$this->session->set_flashdata('message', array('message' => 'Requested Car for this package is not available please choose another','class' => 'error'));
							redirect(base_url().'Commute/view');
						}	
					}
				}
				$template['commute'] = $this->Cardirectory_model->get('commute');
				$template['car'] = $this->Cardirectory_model->get('car_listing');
				$template['page'] = "Commute/commute-package";
				$template['page_title'] = "Commute Page";
				$this->load->view('template', $template);
			}
			else{
				$this->load->view('error_trans');
			}
	    }
	/* === VIEW COMMUTE PACKAGE DETAILS=== */
	public function view()
	{
		$commute_viewpackage_page = "Commute/view-commutepackage";
		$permission = permission($commute_viewpackage_page);
		if($permission == "access") {
			$template['page'] = "Commute/view-commutepackage";
			$template['page_title'] = "Commute View Page";
			$template['data'] = $this->Commute_model->get_cpackage();
			$this->load->view('template', $template);
		}
		else{
				$this->load->view('error_trans');
		}
	}
		/* === EDIT PACKAGE DETAILS=== */	
		public function editpackage()
		{
			$commute_editpackage_page = "Commute/commute-editpackage";
			$permission = permission($commute_editpackage_page);
		    if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Commute_model->get_single_package($id);
				if(!empty($template['data'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$result = $this->Commute_model->package_edit($id,$data);
							if($result){
								
								$this->session->set_flashdata('message',array('message' => 'Requested Commute Package Updated  successfully','class' => 'success'));
								 redirect(base_url().'Commute/view');
								
							}
							else{
								$this->session->set_flashdata('message', array('message' => 'Requested Car for this package is not available please choose another','class' => 'error'));
								redirect(base_url().'Commute/view');
							}	
						}
					}
				}
				else{
					$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					redirect(base_url().'Commute/view');
					}
				$template['page'] = "Commute/commute-editpackage";
				$template['page_title'] = 'Edit Commute';
				$template['commute'] = $this->Cardirectory_model->get('commute');
				$template['car'] = $this->Cardirectory_model->get('car_listing');
				$this->load->view('template',$template);
			}
			else{
					$this->load->view('error_trans');
			}			
	    }
		/* === DELETE PACKAGE=== */	
		public function deletepackage(){ 
			$id = $this->uri->segment(3);
			$result= $this->Commute_model->deletepackage($id);
			$this->session->set_flashdata('message', array('message' => 'Requested Commute Package Deleted Successfully','class' => 'success'));
			redirect(base_url().'Commute/view');
	    }
}
?>
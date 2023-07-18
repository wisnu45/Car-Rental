<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Tariff extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Tariff_model');		
		$this->load->model('Cardirectory_model');	
 	}
/* ===ADD Duration DETAILS=== */	
	public function add()
	{
		$tariff_add_page = "Tariff/add-tariff";
		$permission = permission($tariff_add_page);
		if($permission == "access") {		
			if($_POST)
			{
				if(isset($_POST) && !empty($_POST)){
					$data = $_POST;
					$result = $this->Tariff_model->add_tariff($data);
					if($result) {
						$this->session->set_flashdata('message',array('message' => 'Tarrif added  successfully','class' => 'success'));
					}
					else{
						$this->session->set_flashdata('message', array('message' => 'End Limit','class' => 'error'));
					}
				}
			}
			$template['page'] = "Tariff/add-tariff";
			$template['page_title'] = "Tariff Page";
			$template['data'] = $this->Tariff_model->get_tariff();
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
			$s=$this->Tariff_model->update_tariffpack_status($id, $data1);
			$this->session->set_flashdata('message', array('message' => 'Inactivated Successfully ','class' => 'warning'));
			redirect(base_url().'Tariff/view');
	    }
/* ===ACTIVE  PACKAGE DETAILS=== */	
		public function active(){
			$data1 = array(
							"status" => '1'
							 );
			$id = $this->uri->segment(3);
			$s=$this->Tariff_model->update_tariffpack_status($id, $data1);
			$this->session->set_flashdata('message', array('message' => 'Activated Successfully ','class' => 'success'));
			redirect(base_url().'Tariff/view');
	    }
/* === EDIT PACKAGE DETAILS=== */	
		public function edit()
		{
			$tariff_edit_page = 'Tariff/edit-tariff';
			$permission = permission($tariff_edit_page);
		    if($permission == "access") {		    
				$id = $this->uri->segment(3);	
				$template['data'] = $this->Tariff_model->get_single_tariff($id);				
				if(!empty($template['data'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$result = $this->Tariff_model->tariff_edit($id,$data);
							if($result){
								$this->session->set_flashdata('message',array('message' => 'Requested Tariff Details Updated successfully','class' => 'success'));
								redirect(base_url().'Tariff/add');
							}
							else{
								$this->session->set_flashdata('message',array('message' => 'Error','class' => 'danger'));
								redirect(base_url().'Tariff/add');
							}
						}
					}
				}
				else{
					$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					redirect(base_url().'Tariff/add');
					}
				$template['page'] = 'Tariff/edit-tariff';	
				$template['page_title'] = 'Edit Tariff';
				$template['data'] = $this->Tariff_model->get_single_tariff($id);	
				$this->load->view('template',$template);
			}
			else{
					$this->load->view('error_trans');
			}			
	    }
/* === DELETE PACKAGE=== */	
		public function deletetariff(){ 
			$id = $this->uri->segment(3);
			$result= $this->Tariff_model->deletetariff($id);
			$this->session->set_flashdata('message', array('message' => 'Requested Tariff Deleted Successfully','class' => 'success'));
			redirect(base_url().'Tariff/add');
	    }
		/* === ADD TARIFF PACKAGE=== */	
		public function addpackage(){ 
			$tariff_addpackage_page = "Tariff/tariff-package";
			$permission = permission($tariff_addpackage_page);
		    if($permission == "access") {			
				if($_POST)
				{
					if(isset($_POST) && !empty($_POST)){
						$data = $_POST;
						$result = $this->Tariff_model->add_package($data);
						if($result) {
							$this->session->set_flashdata('message',array('message' => 'Package for Requested Car is addded Sucessfully','class' => 'success'));
							redirect(base_url().'Tariff/view');
						}
						else{
							$this->session->set_flashdata('message', array('message' => 'Requested Package for this car is Already Exist Please choose another one','class' => 'danger'));
							redirect(base_url().'Tariff/view');
						}
					}
				}
				$template['page'] = "Tariff/tariff-package";
				$template['page_title'] = "Tariff Page";
				$template['tariff'] = $this->Cardirectory_model->get('tariff');
				$template['car'] = $this->Cardirectory_model->get('car_listing');
				$this->load->view('template', $template);
			}
			else{
				$this->load->view('error_trans');
			}
	    }
	/* === VIEW TARIFF PACKAGE DETAILS=== */
	public function view()
	{
		$template['page'] = "Tariff/view-tariffpackage";
		$template['page_title'] = "Tariff View Page";
		$template['data'] = $this->Tariff_model->get_tpackage();
		$this->load->view('template', $template);
	}
	/* === EDIT PACKAGE DETAILS=== */	
		public function editpackage()
		{
			$tariff_editpackage_page = "Tariff/tariff-packageedit";
			$permission = permission($tariff_editpackage_page);
		    if($permission == "access") {			
				$id = $this->uri->segment(3);
				$template['data'] = $this->Tariff_model->get_single_package($id);		    
				if(!empty($template['data'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$result = $this->Tariff_model->package_edit($id,$data);
							if($result){
								$this->session->set_flashdata('message',array('message' => 'Requested Package fot the Car is Updated Sucessfully','class' => 'success'));
								redirect(base_url().'Tariff/view');
							}
							else{
								$this->session->set_flashdata('message',array('message' => 'Requested car for this package is Already Exist Please choose another one','class' => 'danger'));
								redirect(base_url().'Tariff/view');
							}	
						}
					}
				}
				else{
					$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					redirect(base_url().'Tariff/view');
					}
				$template['page'] = "Tariff/tariff-packageedit";	
				$template['page_title'] = 'Edit Tariff';
				$template['data'] = $this->Tariff_model->get_single_package($id);	
				$template['tariff'] = $this->Cardirectory_model->get('tariff');
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
			$result= $this->Tariff_model->deletepackage($id);
			$this->session->set_flashdata('message', array('message' => 'Requested Package fot the Car is Deleted Successfully','class' => 'success'));
			redirect(base_url().'Tariff/view');
	    }
}
?>
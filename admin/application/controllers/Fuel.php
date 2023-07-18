<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Fuel extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Fuel_model');		
 	}
/* === ADD MASTER TABLE FOR FUEL=== */
	function add()
	{
		$fuel_add_page = "Fuel/add-fuel";
		$permission = permission($fuel_add_page);
		if($permission == "access") {
			if($_POST)
			{
				if(isset($_POST) && !empty($_POST)){			
					$data = $_POST;
					$result = $this->Fuel_model->add_fuel($data);
					if($result){
						$this->session->set_flashdata('message',array('message' => 'Fuel added  successfully','class' => 'success'));
					}else{						
							$this->session->set_flashdata('message', array('message' => 'Fuel Already Exist','class' => 'error'));
					}
				}				
			}
			$template['page'] = "Fuel/add-fuel";
			$template['page_title'] = "Fuel Page";
			$template['data'] = $this->Fuel_model->get_fuel();
			$this->load->view('template', $template); 
		}	
		else
		{
			$this->load->view('error_trans');
		}			
	}	
/* === EDIT  FUEL DETAILS=== */	
	public function edit(){
			$fuel_edit_page = 'Fuel/edit-fuel';
			$permission = permission($fuel_edit_page);
		    if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Fuel_model->get_single_fuel($id);
				if(!empty($template['data'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$result = $this->Fuel_model->fuel_edit($id,$data);
							//print_r($result);die;
							if($result){
									$this->session->set_flashdata('message',array('message' => 'Requested Fuel Type Updated successfully','class' => 'success'));
									redirect(base_url().'Fuel/add');
							}
							else{
									$this->session->set_flashdata('message',array('message' => 'Fuel Type Already exist','class' => 'danger'));
									redirect(base_url().'Fuel/add');
							}			
						}
					}
				}
				else{
						$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
						redirect(base_url().'Fuel/add');
				}
				$template['page'] = 'Fuel/edit-fuel';
				$template['page_title'] = 'Edit Fuel';
				$this->load->view('template',$template);
			}
			else
			{
				$this->load->view('error_trans');
			}
	    }
/* === DELETE FUEL=== */
	 public function deletefuel(){ 
			$id = $this->uri->segment(3);
			$result= $this->Fuel_model->deletefuel($id);
			$this->session->set_flashdata('message', array('message' => 'Requested Fuel Type Deleted Successfully','class' => 'success'));
			redirect(base_url().'Fuel/add');
	    }	
}
?>
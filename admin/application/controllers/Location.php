<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Location extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Location_model');	
        $this->load->model('Cardirectory_model');		
 	}
/* === ADD LOCATION DETAILS === */	
	public function add()
	{
		$location_add_page = "Location/location";
		$permission = permission($location_add_page);
		if($permission == "access") {
			if($_POST){
				$data=$_POST;
				$result = $this->Location_model->add($data);
				if($result){
					 $this->session->set_flashdata('message',array('message' => 'Popular Location added  successfully','class' => 'success'));
					 redirect(base_url().'Location/add');
				}
				else{
					$this->session->set_flashdata('message', array('message' => 'Requested Popular Location  Already Exist','class' => 'error'));
					redirect(base_url().'Location/add');
				}			
			}
			$template['page'] = "Location/location";
			$template['page_title'] = "Location Page";
			$template['location']  =  $this->Cardirectory_model->get('general_locations');
			$template['city'] = $this->Location_model->get_city();
			$template['value'] = $this->Location_model->get();
			$this->load->view('template', $template);
		}
		else{
					$this->load->view('error_trans');
			}	
	}
	/* === DELETE LOCATION DETAILS === */	
	 public function deletelocation(){    
		$id = $this->uri->segment(3);
		$result= $this->Location_model->deletelocation($id);
		$this->session->set_flashdata('message', array('message' => 'Popular Location Deleted Successfully','class' => 'success'));
	    redirect(base_url().'Location/add');
	}
/* === EDIT  LOCATION DETAILS=== */	
		public function edit()
		{
			$location_edit_page = 'Location/edit-location';
			$permission = permission($location_edit_page);
		    if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data1'] = $this->Location_model->get_single_location($id);
				if(!empty($template['data1'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$result = $this->Location_model->location_edit($id,$data);
							if($result){
								$this->session->set_flashdata('message',array('message' => 'Requested Popular location Updated  successfully','class' => 'success'));
								 redirect(base_url().'Location/add');
							}
							else{
								$this->session->set_flashdata('message',array('message' => 'Popular location Already Exist','class' => 'danger'));
								 redirect(base_url().'Location/add');
							}
						}
					}
				}
				else{
					 $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					 redirect(base_url().'Location/add');
					}
				$template['page'] = 'Location/edit-location';
				$template['page_title'] = 'Edit Location';
				$template['location']  =  $this->Cardirectory_model->get('general_locations');
				$template['car']  =  $this->Cardirectory_model->get('car_listing');
				$template['city'] = $this->Location_model->get_city();
				$this->load->view('template',$template);
			}			
			else{
						$this->load->view('error_trans');
				}			
	    }	
}
?>
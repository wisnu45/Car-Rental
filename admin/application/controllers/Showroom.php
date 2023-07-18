<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Showroom extends CI_Controller {	
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Showroom_model');
		$this->load->model('Cardirectory_model');	
		$this->load->model('Carpayment_model');		
 	}
/* === VIEW SHOWROOM DETAILS=== */
	public function view()
	{
		$showroom_view_page = "Showroom/view-showroom";
		$permission = permission($showroom_view_page);
		if($permission == "access") {
			$template['page'] = "Showroom/view-showroom";
			$template['page_title'] = "Showroom Page";
			$template['data'] = $this->Showroom_model->get_showroom();
			$this->load->view('template', $template);
		}
		else{
				$this->load->view('error_trans');
		}
	}
/* === ADD SHOWROOM=== */
	function add()
	{
		$showroom_add_page = "Showroom/add-showroom";
		$permission = permission($showroom_add_page);
		if($permission == "access") {
			if($_POST){
				if(isset($_POST) && !empty($_POST)){
					$data = $_POST;
						if(isset($_FILES["logo"]) && !empty($_FILES["logo"])){					
						$config = set_upload_image('assets/uploads/');
						$this->load->library('upload');
						$new_name = time()."_".$_FILES["logo"]['name'];
						$config['file_name'] = $new_name;
						$this->upload->initialize($config);
						if ($this->upload->do_upload('logo')){
							$upload_data = $this->upload->data();
							$data['logo'] = $config['upload_path'].$upload_data['file_name'];
						}
					}
					$result = $this->Showroom_model->add_showroom($data);
					if($result){
						 $this->session->set_flashdata('message',array('message' => 'Showroom  added successfully','class' => 'success'));
						 redirect(base_url().'Showroom/view');
					}
					else{
						 $this->session->set_flashdata('message', array('message' => 'Showroom Name Already Exist','class' => 'danger'));
						 redirect(base_url().'Showroom/view');
					}
				}
			}
		   $template['page'] = "Showroom/add-showroom";
		   $template['page_title'] = "Showroom Page";
		   $template['location']  =  $this->Cardirectory_model->get('general_locations');
		   $template['dealer']  =  $this->Cardirectory_model->get('dealers');
		   $this->load->view('template', $template); 
		}
		else{
				$this->load->view('error_trans');
		}	   
	}	
/* === DEACTIVE  SHOWROOM DETAILS=== */	
	public function disable(){
		$data1 = array(
				  "status" => '0'
					 );
		$id = $this->uri->segment(3);
		$s=$this->Showroom_model->update_showroom_status($id, $data1);
		$this->session->set_flashdata('message', array('message' => 'Inactivated Successfully','class' => 'warning'));
	    redirect(base_url().'Showroom/view');
	}
/* === ACTIVE  SHOWROOM DETAILS=== */
		public function active(){
			$data1 = array(
				  "status" => '1'
							 );
			$id = $this->uri->segment(3);
		    $s=$this->Showroom_model->update_showroom_status($id, $data1);
			$this->session->set_flashdata('message', array('message' => ' Activated Successfully ','class' => 'success'));
		    redirect(base_url().'Showroom/view');
	    }
/* === EDIT  SHOWROOM DETAILS=== */
		public function edit(){
			$showroom_edit_page = 'Showroom/edit-showroom';
			$permission = permission($showroom_edit_page);
		    if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Showroom_model->get_single_showroom($id);
				if(!empty($template['data']))
				{
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
					if(isset($_FILES["logo"]) && !empty($_FILES["logo"])){					
						$config = set_upload_image('assets/uploads/');
						$this->load->library('upload');
						$new_name = time()."_".$_FILES["logo"]['name'];
						$config['file_name'] = $new_name;
						$this->upload->initialize($config);
						if ($this->upload->do_upload('logo')){
							$upload_data = $this->upload->data();
							$data['logo'] = $config['upload_path'].$upload_data['file_name'];
						}
					}
					$result = $this->Showroom_model->showroom_edit($id,$data);
					if($result){
						  $this->session->set_flashdata('message',array('message' => ' Requested Dealer Details Updated Sucessfully','class' => 'success'));
						  redirect(base_url().'Showroom/view');
						 }
					  }
				   }
				}
				else{
					 $this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					 redirect(base_url().'Showroom/view');
				}
				$template['page'] = 'Showroom/edit-showroom';
				$template['page_title'] = 'Edit Showroom';
				$template['location']  =  $this->Cardirectory_model->get('general_locations');
				$template['place']  =  $this->Carpayment_model->get_single_sub_location($template['data']->location_id);		
				$template['dealer']  =  $this->Cardirectory_model->get('dealers');
				$this->load->view('template',$template);
		    }
			else{
					$this->load->view('error_trans');
			}		
	    }
/* === DELETE SHOWROOM=== */
	 public function deleteshowroom(){    
		$id = $this->uri->segment(3);
		$result= $this->Showroom_model->deleteshowroom($id);
		$this->session->set_flashdata('message', array('message' => 'Requested Dealer Deleted Successfully','class' => 'success'));
	    redirect(base_url().'Showroom/view');
	}	
/* === SHOWROOM POP VIEW=== */	
	public function viewpopup()
	{
		if($_POST){
			if(isset($_POST) && !empty($_POST)){
				$id=$_POST['id'];
				$template['data'] = $this->Showroom_model->viewpopup($id);
				$this->load->view('Showroom/view-showroompopup',$template);
			}
		}
	}
	/* ===  GET PLACE BY LOCATION ID=== */	
		public function getplace()
	{
		 $id=$_POST['id'];
	     $place = $this->Showroom_model->gets_place($id);
		 foreach($place as $place)
		 {
			 echo "<option value=".$place->id.">".$place->short_address."</option>";
		 }
	}
}
?>
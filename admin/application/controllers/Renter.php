<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Renter extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Renter_model');		
 	}
/* === VIEW RENTER DETAILS=== */
	public function view()
	{
		$renter_view_page = "Renter/view-renter";
		$permission = permission($renter_view_page);
		if($permission == "access") {
			$template['page'] = "Renter/view-renter";
			$template['page_title'] = "Renter Page";
			$template['data'] = $this->Renter_model->get_renter();
			$this->load->view('template', $template);
		}
		else{
				$this->load->view('error_trans');
		}
	}
/* === ADD RENTER DETAILS=== */
	public function add()
	{
		$renter_add_page = "Renter/add-renter";
		$permission = permission($renter_add_page);
		if($permission == "access") {
			if($_POST){
				if(isset($_POST) && !empty($_POST)){
					$data = $_POST;
					$config = set_upload_image('assets/uploads/');
					$this->load->library('upload');
					$new_name = time()."_".$_FILES["profile_picture"]['name'];
					$config['file_name'] = $new_name;
					$this->upload->initialize($config);
					if ( ! $this->upload->do_upload('profile_picture')) {
						$this->session->set_flashdata('message', array('message' => "Main Image : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
					}
					else{
							$upload_data = $this->upload->data();
							$data['profile_picture'] = $config['upload_path'].$upload_data['file_name'];	
							$result = $this->Renter_model->add_renter($data);
							if($result){
									$this->session->set_flashdata('message',array('message' => 'Rentee Details Added successfully','class' => 'success'));
									redirect(base_url().'Renter/view');
							}
							else{
								 $this->session->set_flashdata('message', array('message' => 'Email Already Exist','class' => 'error'));
								 redirect(base_url().'Renter/view');
							}
					}
				}
			}
			$template['page'] = "Renter/add-renter";
			$template['page_title'] = "Renter Page";
			$this->load->view('template', $template);
			}
		else
			{
				$this->load->view('error_trans');
			}
	}
/* === VIEW PAYMENT DETAILS=== */
	  public function disable(){
			$data1 = array(
							"status" => '0'
							);
			$id = $this->uri->segment(3);
		    $s=$this->Renter_model->update_renter_status($id, $data1);
			$this->session->set_flashdata('message', array('message' => 'Inactivated Successfully ','class' => 'warning'));
		    redirect(base_url().'Renter/view');
	    }
/* === ACTIVE  RENTER DETAILS=== */
		public function active(){
		    $data1 = array(
							"status" => '1'
							 );
			$id = $this->uri->segment(3);
			$s=$this->Renter_model->update_renter_status($id, $data1);
		    $this->session->set_flashdata('message', array('message' => ' Activated Successfully ','class' => 'success'));
			redirect(base_url().'Renter/view');
	    }
/* === EDIT  RENTER DETAILS=== */
		public function edit()
		{
		    $id = $this->uri->segment(3);
		    $template['data'] = $this->Renter_model->get_single_renter($id);
			if(!empty($template['data'])){
				if($_POST)
				{ 
					if(isset($_POST['acknowledgement2']) && !empty($_POST['acknowledgement2']))
					{
						$data = $_POST;
						unset($data['acknowledgement2']);
						$data1['email']=$data['email'];
						$result = $this->Renter_model->renterdetails_edit($id,$data1);
						if($result){
								$this->session->set_flashdata('message',array('message' => 'Change Email for the requested Rentee Updated Sucessfully','class' => 'success'));
								redirect(base_url().'Renter/view');
						}
						else{
								$this->session->set_flashdata('message',array('message' => 'Email Already Exist','class' => 'danger'));
								redirect(base_url().'Renter/view');
						}
					}
					if(isset($_POST['acknowledgement3']) && !empty($_POST['acknowledgement3']))
					{
						$data = $_POST;
						unset($data['acknowledgement3']);
						$p = md5($data['password']);
						$data1['password']=$p;
						$result = $this->Renter_model->renterdetails_edit($id,$data1);
						if($result){
								$this->session->set_flashdata('message',array('message' => 'Change Password for the requested Rentee Updated Sucessfully','class' => 'success'));
								redirect(base_url().'Renter/view');
						}
						else{
								$this->session->set_flashdata('message',array('message' => 'Error','class' => 'danger'));
								redirect(base_url().'Renter/view');
						}
					}
					elseif(isset($_POST['acknowledgement1']) && !empty($_POST['acknowledgement1']))
					{						
						$data = $_POST;						
						unset($data['acknowledgement1']);
						if(isset($_FILES["profile_picture"]) && !empty($_FILES["profile_picture"])):
							$config = set_upload_image('assets/uploads/');
							$this->load->library('upload');
							$new_name = time()."_".$_FILES["profile_picture"]['name'];
							$config['file_name'] = $new_name;
							$this->upload->initialize($config);
								if ( $this->upload->do_upload('profile_picture')) {								
									$upload_data = $this->upload->data();
									$data['profile_picture'] = $config['upload_path'].$upload_data['file_name'];
								}
						endif;
						$result = $this->Renter_model->renterdetails_edit($id,$data);
						if($result){
							 $this->session->set_flashdata('message',array('message' => 'Requested Rentee Details Updated Sucessfully','class' => 'success'));
							 redirect(base_url().'Renter/view');
						}
						else{
							 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'danger'));
							 redirect(base_url().'Renter/view');
						}					
					}
				}
			}
			else{
					$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					redirect(base_url().'Renter/view');
			}
			$renter_edit_page = 'Renter/edit-renter';
			$permission = permission($renter_edit_page);
		    if($permission == "access") {
				$template['page'] = 'Renter/edit-renter';
				$template['page_title'] = 'Edit Renter';
				$this->load->view('template',$template);
			}
			else
			{
				$this->load->view('error_trans');
			}
	    }
/* === RENTER DELETE=== */	
		 public function deleterenter(){
			$id = $this->uri->segment(3);
			$result= $this->Renter_model->deleterenter($id);
			$this->session->set_flashdata('message', array('message' => 'Requested Rentee Detail Deleted Successfully','class' => 'success'));
			redirect(base_url().'Renter/view');
	    }
/* === RENTER POPUP VIEW=== */		
		 public function viewpopup()
	    {
			if($_POST){
				if(isset($_POST) && !empty($_POST)){
					$id=$_POST['id'];
					$template['data'] = $this->Renter_model->viewpopup($id);
					$this->load->view('Renter/view-renterpopup',$template);
				}
			}
	    }
/* === RENTER LICENCE === */
	   public function license()
	    {
	    	$license_add_page = "Renter/add-licence";
			$permission = permission($license_add_page);
		    if($permission == "access") {
				if($_POST){
					if(isset($_POST) && !empty($_POST)){
						$data = $_POST;
						$config = set_upload_image('assets/uploads/');
						$this->load->library('upload');
						$new_name = time()."_".$_FILES["license"]['name'];
						$config['file_name'] = $new_name;
						$this->upload->initialize($config);
						if ( ! $this->upload->do_upload('license')) {
							$this->session->set_flashdata('message', array('message' => "Main Image : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
						}
						else{
								$upload_data = $this->upload->data();
								$data['license'] = $config['upload_path'].$upload_data['file_name'];	
								$result = $this->Renter_model->add_license($data);
								if($result){
									 $this->session->set_flashdata('message',array('message' => ' Licence for the Requested Rentee added  successfully','class' => 'success'));
								}
								else{
									 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
								}
						}
					}
				}
				$template['page'] = "Renter/add-licence";
				$template['page_title'] = "Renter Licence Page";
				$template['rentee'] = $this->Renter_model->get_renter();
				$template['license'] = $this->Renter_model->get_license();
				$this->load->view('template', $template);
			}
			else
			{
				$this->load->view('error_trans');
			}
	    }
/* === DELETE LICENCE === */
		public function deletelicense()
		{
			$id = $this->uri->segment(3);
			$result= $this->Renter_model->deletelicense($id);
			$this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
			redirect(base_url().'Renter/license');
		}
/* === EDIT LICENCE === */
		public function editlicense()
		{
			$license_edit_page = 'Renter/edit-licence';
			$permission = permission($license_edit_page);
		    if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Renter_model->get_renterlicense($id);
				if(!empty($template['data'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$config = set_upload_image('assets/uploads/');
							$this->load->library('upload');
							$new_name = time()."_".$_FILES["license"]['name'];
							$config['file_name'] = $new_name;
							$this->upload->initialize($config);
							if ( ! $this->upload->do_upload('license')) {
									$this->session->set_flashdata('message', array('message' => "Image : ".$this->upload->display_errors(), 'title' => 'Error !', 'class' => 'danger'));
							}
							else {
								$upload_data = $this->upload->data();
								$data['license'] = $config['upload_path'].$upload_data['file_name'];	
							}
							$result = $this->Renter_model->license_edit($id,$data);
							if($result){
									$this->session->set_flashdata('message',array('message' => 'Requested Licence for the Rentee updated Sucessfully','class' => 'success'));
									redirect(base_url().'Renter/license');
							}
							 else{
									  $this->session->set_flashdata('message', array('message' => 'Error','class' => 'error'));
							}
						}
					}
				}
				else{
						$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
						redirect(base_url().'Renter/editlicense');
					}
				$template['page'] = 'Renter/edit-licence';
				$template['page_title'] = 'Edit licence';
				$template['rentee'] = $this->Renter_model->get_renter();
				$template['license'] = $this->Renter_model->get_license();
				$this->load->view('template',$template);
			}
			else
			{
				$this->load->view('error_trans');
			}			
		}
/* === ADD CO-JOCKEYS=== */
		public function co_jockeys()
		{
			$co_jockeys_add_page = 'Renter/add-cojockeys';
			$permission = permission($co_jockeys_add_page);
		    if($permission == "access") {
				if($_POST){
					if(isset($_POST) && !empty($_POST)){
						$data = $_POST;
						$result = $this->Renter_model->add_cojockeys($data);
						if($result){
							 $this->session->set_flashdata('message',array('message' => ' co_jockeys for the requested Rentee added Sucessfully ','class' => 'success'));
							 redirect(base_url().'Renter/co_jockeys');
						}
						else{
							$this->session->set_flashdata('message', array('message' => 'Email Already Exist','class' => 'danger'));
						}
					}
				}
				$template['page'] = 'Renter/add-cojockeys';
				$template['page_title'] = 'Add co_jockeys';
				$template['rentee'] = $this->Renter_model->get_renter();
				$template['jockeys'] = $this->Renter_model->get_jockeys();
				$this->load->view('template',$template);
			}
			else
			{
				$this->load->view('error_trans');
			}
		}
/* === EDIT CO-JOCKEYS=== */
		public function editjockeys(){
			$co_jockeys_edit_page = 'Renter/edit-cojockeys';
			$permission = permission($co_jockeys_edit_page);
		    if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Renter_model->get_single_jockeys($id);
				if(!empty($template['data'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)) {
							 $data = $_POST;
							 $result = $this->Renter_model->jockeys_edit($id,$data);
							 if($result){
									$this->session->set_flashdata('message',array('message' => 'Requested package for the dealer is updated Sucessfully','class' => 'success'));
									redirect(base_url().'Renter/co_jockeys');
							}
							else{
									$this->session->set_flashdata('message',array('message' => 'Email Already Exist','class' => 'danger'));
									redirect(base_url().'Renter/co_jockeys');
							}
						}
					}
				}
				else{
						$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
						redirect(base_url().'Renter/co_jockeys');
					}
				$template['page'] = 'Renter/edit-cojockeys';
				$template['page_title'] = 'Edit cojockeys';
				$template['rentee'] = $this->Renter_model->get_renter();
				$template['jockeys'] = $this->Renter_model->get_jockeys();
				$this->load->view('template',$template);
				}
			else
			{
				$this->load->view('error_trans');
			}			
	    }
/* === DELETE CO-JOCKEYS=== */
		public function deletejockeys(){
			$id = $this->uri->segment(3);
			$result= $this->Renter_model->deletejockeys($id);
			$this->session->set_flashdata('message', array('message' => 'Deleted Successfully','class' => 'success'));
			redirect(base_url().'Renter/co_jockeys');
		}
}
?>
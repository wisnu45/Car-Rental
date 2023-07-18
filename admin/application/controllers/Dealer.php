<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dealer extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Dealer_model');		
 	}
/* === VIEW DEALER DETAILS=== */
	public function view()
	{
		$deal_view_page = "Dealer/view-dealer";
		$permission = permission($deal_view_page);
		if($permission == "access") {
			$template['page'] = "Dealer/view-dealer";	
			$template['page_title'] = "Dealer Page";
			$template['data'] = $this->Dealer_model->get_dealer();
			$this->load->view('template', $template);
		}
		else{
				$this->load->view('error_trans');
		}
	}
/* === ADD DEALER DETAILS=== */
	public function add()
	{		
		if($_POST):
			if(isset($_POST) && !empty($_POST)):				
				$data = $_POST;
				/* === Profile Picture Upload === */
				if(isset($_FILES["profile_picture"]) && !empty($_FILES["profile_picture"])): 
					$config = set_upload_image('assets/uploads/');
					$this->load->library('upload');	
					$new_name = time()."_".$_FILES["profile_picture"]['name'];
					$config['file_name'] = $new_name;
					$this->upload->initialize($config);
					if ( $this->upload->do_upload('profile_picture')):
							$upload_data = $this->upload->data();
							$data['profile_picture'] = $config['upload_path'].$upload_data['file_name'];
					endif;
				endif;				
				$result = $this->Dealer_model->add_dealer($data,$data['password']);
				if($result):				
					$this->session->set_flashdata('message',array('message' => 'Dealer added successfully ','class' => 'success'));
					redirect(base_url().'Dealer/view');
				else:
					$this->session->set_flashdata('message', array('message' => 'Email Already Exist','class' => 'danger')); 
					redirect(base_url().'Dealer/view');					
				endif;
			endif;
		endif;
		$deal_add_page = "Dealer/add-dealer";
		$permission = permission($deal_add_page);
		if($permission == "access") {
			$template['page'] = "Dealer/add-dealer";
			$template['page_title'] = "Dealer Page";
			$this->load->view('template',$template);
		}		
		else{
				$this->load->view('error_trans');
		}	    
	}
/* === DEACTIVE  DEALER DETAILS=== */
	  public function disable(){
			$data1 = array(
				  "status" => '0'
				 );
			$id = $this->uri->segment(3);
			$s=$this->Dealer_model->update_dealer_status($id, $data1);
			$this->session->set_flashdata('message', array('message' => ' Inactivated Successfully ','class' => 'warning'));
			redirect(base_url().'Dealer/view');
	    }
/* === ACTIVE  DEALER DETAILS=== */
		public function active(){
			$data1 = array(
				  "status" => '1'
				 );
			$id = $this->uri->segment(3);
			$s=$this->Dealer_model->update_dealer_status($id, $data1);
			$this->session->set_flashdata('message', array('message' => 'Activated Successfully ','class' => 'success'));
		    redirect(base_url().'Dealer/view');
	    }
/* === EDIT  DEALER DETAILS=== */
		public function edit(){
			$deal_edit_page = 'Dealer/edit-dealer';
			$permission = permission($deal_edit_page);
		    if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Dealer_model->get_single_dealer($id);
				if(!empty($template['data'])){
					if($_POST){ 
							/* ===Update Dealer Email === */
							if(isset($_POST['acknowledgement2']) && !empty($_POST['acknowledgement2'])){
								$data = $_POST;
								unset($data['acknowledgement2']);
								$data1['email']=$data['email'];
								$result = $this->Dealer_model->dealer_edit($id,$data1);
								if($result){
										$this->session->set_flashdata('message',array('message' => 'Change Email for the requested staff updated Sucesssfully','class' => 'success'));
										redirect(base_url().'Dealer/view');
								}
								else{
										$this->session->set_flashdata('message',array('message' => 'Email Already Exist','class' => 'danger'));
										redirect(base_url().'Dealer/view');
								}
							}
							/* ===Update Dealer password === */
							if(isset($_POST['acknowledgement3']) && !empty($_POST['acknowledgement3'])){
								$data = $_POST;
								unset($data['acknowledgement3']);
								$p = md5($data['password']);
								$data1['password']=$p;
								$result = $this->Dealer_model->dealer_edit($id,$data1);
								if($result){
										$this->session->set_flashdata('message',array('message' => 'Change Password for the requested staff updated Sucesssfully','class' => 'success'));
										redirect(base_url().'Dealer/view');
								}
								else{
										$this->session->set_flashdata('message',array('message' => 'Error','class' => 'danger'));
										redirect(base_url().'Dealer/view');
								}
							}
							/* === Profile Picture Upload === */
						  elseif(isset($_POST['acknowledgement1']) && !empty($_POST['acknowledgement1']))
						 {						 
								$data = $_POST;						
								unset($data['acknowledgement1']);
						/* === Profile Picture Upload === */
							if(isset($_FILES["profile_picture"]) && !empty($_FILES["profile_picture"])){
								$config = set_upload_image('assets/uploads');
								$this->load->library('upload');	
								$new_name = time()."_".$_FILES["profile_picture"]['name'];
								$config['file_name'] = $new_name;
								$this->upload->initialize($config);
								if ( $this->upload->do_upload('profile_picture')){
									$upload_data = $this->upload->data();
									$data['profile_picture'] = $config['upload_path'].$upload_data['file_name'];
							}
						}	
								$result = $this->Dealer_model->dealer_edit($id,$data);
								if($result){
									 $this->session->set_flashdata('message',array('message' => 'Requested Dealer Details updated Sucessfully','class' => 'success'));
									 redirect(base_url().'Dealer/view');
								}
								else{
									 $this->session->set_flashdata('message', array('message' => 'Error','class' => 'danger'));
									 redirect(base_url().'Dealer/view');
								}					
						  }
					 }					
				}
				else{
						$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
						redirect(base_url().'Dealer/view');
				}
			   $template['page'] = 'Dealer/edit-dealer';
			   $template['page_title'] = 'Edit Dealer';
			   $this->load->view('template',$template);	 
		}
		   	else{
				$this->load->view('error_trans');
		    }	
	    }
/* === DEALER DELETE=== */
	public function deletedealer(){
		$id = $this->uri->segment(3);
		$result= $this->Dealer_model->deletedealer($id);
		$this->session->set_flashdata('message', array('message' => 'Requested Dealer Deleted Successfully','class' => 'success'));
	    redirect(base_url().'Dealer/view');
    }
/* === DEALER VIEW POPUP VIEW=== */
	public function viewpopup()
	{	
		if($_POST){
			if(isset($_POST) && !empty($_POST)){
				$id=$_POST['id'];
				$template['data'] = $this->Dealer_model->viewpopup($id);
				$this->load->view('Dealer/view-dealerpopup',$template);
			}
		}	
    }
}
?>
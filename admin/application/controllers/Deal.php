<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Deal extends CI_Controller {
	public function __construct() {
		parent::__construct();
		date_default_timezone_set("Asia/Kolkata");
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
		$this->load->model('Deal_model');		
 	}
/* === VIEW PAYMENT DETAILS=== */
	public function view()
	{
		$deal_view_page = "Deal/view-deal";
		$permission = permission($deal_view_page);
		if($permission == "access") {
			$template['page'] = "Deal/view-deal";
			$template['page_title'] = "Deal Page";
			$template['data'] = $this->Deal_model->get_deal();
			$this->load->view('template', $template);
		}
		else{
				$this->load->view('error_trans');
			}
	}
/* === ADD DEALER DETAILS== */
	public function add()
	{
		$deal_add_page = "Deal/add-deal";
		$permission = permission($deal_add_page);
		if($permission == "access") {
			if($_POST)
			{
				if(isset($_POST) && !empty($_POST)){
					$data = $_POST;
							$result = $this->Deal_model->add($data);
							if($result=="sucess"){
								
								$this->session->set_flashdata('message',array('message' => 'Deal  Added  successfully','class' => 'success'));
								 redirect(base_url().'Deal/view');
								
							}
							elseif($result=="booked"){
								$this->session->set_flashdata('message', array('message' => 'Requested Car for this package is not available please choose another','class' => 'error'));
								redirect(base_url().'Deal/view');
							}
								elseif($result=="carname"){
								$this->session->set_flashdata('message', array('message' => 'CarName Already Exist','class' => 'error'));
								redirect(base_url().'Deal/view');
							}
					
				}
			}
			$template['page'] = "Deal/add-deal";
			$template['page_title'] = "Deal Page";
			$template['duration'] = $this->Deal_model->get_duration();
			$template['data'] = $this->Deal_model->get_car();
			$this->load->view('template', $template);
		}
		else{
				$this->load->view('error_trans');
			}
	}
	/* === DELETE DEAL=== */
	 public function deletedeal(){    
		$id = $this->uri->segment(3);
		$result= $this->Deal_model->deletedeal($id);
		$this->session->set_flashdata('message', array('message' => 'Requested Deal Deleted Successfully','class' => 'success'));
	    redirect(base_url().'Deal/view');
	}	
	/* === EDIT DEAL DETAILS=== */	
		public function edit()
		{
			$deal_edit_page = 'Deal/edit-deal';
			$permission = permission($deal_edit_page);
		   if($permission == "access") {
		    $id = $this->uri->segment(3);
		    $template['data'] = $this->Deal_model->get_single_deal($id);
			if(!empty($template['data']))
			{
			    if($_POST){
					if(isset($_POST) && !empty($_POST)){
						$data = $_POST;
						$result = $this->Deal_model->deal_edit($id,$data);
						if($result=="sucess"){
							
							$this->session->set_flashdata('message',array('message' => 'Requested Deal  Updated  successfully','class' => 'success'));
							 redirect(base_url().'Deal/view');
							
						}
						elseif($result=="booked"){
							$this->session->set_flashdata('message', array('message' => 'Requested Car for this package is not available please choose another','class' => 'error'));
							redirect(base_url().'Deal/view');
						}
							elseif($result=="car-exist"){
							$this->session->set_flashdata('message', array('message' => 'CarName Already Exist','class' => 'error'));
							redirect(base_url().'Deal/view');
						}
					}
				}
			}
			else{
				$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
				redirect(base_url().'Deal/view');
				}
			$template['page'] = 'Deal/edit-deal';
		    $template['page_title'] = 'Edit Deal';
			$template['duration'] = $this->Deal_model->get_duration();
			$template['car'] = $this->Deal_model->get_car();
    	    $this->load->view('template',$template);
		   }
			else{
					$this->load->view('error_trans');
				}			
	    }
	/* === DEACTIVE  DEAL DETAILS=== */	
	public function disable(){
		$data1 = array(
				  "status" => '0'
					 );
		$id = $this->uri->segment(3);
		$s=$this->Deal_model->update_deal_status($id, $data1);
		$this->session->set_flashdata('message', array('message' => 'Inactivated Successfully ','class' => 'warning'));
	    redirect(base_url().'Deal/view');
	}
  /* === ACTIVE  DEAL DETAILS=== */
		public function active(){
			$data1 = array(
				  "status" => '1'
							 );
			$id = $this->uri->segment(3);
		    $s=$this->Deal_model->update_deal_status($id, $data1);
			$this->session->set_flashdata('message', array('message' => ' Activated Successfully ','class' => 'success'));
		    redirect(base_url().'Deal/view');
	    }
  /* === POP-UP VIEW OF DEAL DETAILS=== */
		public function viewpopup()
	{
		if($_POST){
			if(isset($_POST) && !empty($_POST)){
				$id=$_POST['id'];
				$template['data'] = $this->Deal_model->viewpopup($id);
				$this->load->view('Deal/view-dealpopup',$template);
			}
		}
	}
}
?>
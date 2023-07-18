<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Role extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if(!$this->session->userdata('logged_in')) { 
			redirect(base_url());
		}	
			$this->load->model('Role_model');	
 	}	
/* === ADD ROLES=== */
	public function add()
	{
		$role_add_page = "Role/add-role";
		$permission = permission($role_add_page);
	    if($permission == "access") {
			if($_POST){
				if(isset($_POST) && !empty($_POST)){
					$data = $_POST;
					$result = $this->Role_model->add_role($data);
					if($result){
								$this->session->set_flashdata('message',array('message' => 'Role added  successfully','class' => 'success'));
					}
					else{
							$this->session->set_flashdata('message', array('message' => 'Role Already Exist','class' => 'error'));
					}
				}
			}
			$template['page'] = "Role/add-role";
			$template['page_title'] = "Role Page";
			$template['data'] = $this->Role_model->get_role();
			$this->load->view('template', $template); 
		}
		else{
			$this->load->view('error_trans');
		}
	}
/* === EDIT  ROLE DETAILS=== */	
		public function edit()
		{
			$role_edit_page = 'Role/edit-role';
	    	$permission = permission($role_edit_page);
	        if($permission == "access") {
				$id = $this->uri->segment(3);
				$template['data'] = $this->Role_model->get_single_role($id);
				if(!empty($template['data'])){
					if($_POST){
						if(isset($_POST) && !empty($_POST)){
							$data = $_POST;
							$result = $this->Role_model->role_edit($id,$data);
							if($result){
								$this->session->set_flashdata('message',array('message' => 'Requested Role Updated Sucessfully','class' => 'success'));
								redirect(base_url().'Role/add');
							}
							else{
								$this->session->set_flashdata('message',array('message' => 'Role Already Exist','class' => 'danger'));
								redirect(base_url().'Role/add');
							}
						}
					}
				}
				else{
					$this->session->set_flashdata('message', array('message' => "You don't have permission to access.",'class' => 'danger'));
					redirect(base_url().'Role/add');
					}
				$template['page'] = 'Role/edit-role';
				$template['page_title'] = 'Edit Role';
				$this->load->view('template',$template);
			}
			else{
				$this->load->view('error_trans');
			}	
	    }
/* === DELETE ROLES=== */
	public function deleterole(){
		$id = $this->uri->segment(3);
		$result= $this->Role_model->deleterole($id);
		$this->session->set_flashdata('message', array('message' => 'Requested Role Deleted Successfully','class' => 'success'));
	    redirect(base_url().'Role/add');
	}
/* === VIEW ROLES=== */
	public function role_management()
	{
		if($this->session->userdata('logged_in'))
		{
			if(($this->session->userdata('admin') == '1') || ($permission == "access")){
			$rolemanagement_page = "Role/role";
			$permission = permission($rolemanagement_page);
			$template['page'] = "Role/role";
			$template['page_title'] = "Role Managment";
			$template['roles'] = $this->Role_model->rolename();	
			$this->load->view('template', $template); 
			}
			else{
				redirect('Role/not_admin');
			}
		}
		else{
	        $this->load->view('Admin/login-form');	
		}
	}
	/* === MANAGE ROLES=== */
	public function role()
	{
		$template['page'] = "Role/role-management";
		$template['page_title'] = "Role Managment";
		$template['data'] = $this->Role_model->roledetails();
		if(($this->session->userdata('admin') == '1') || ($permission == "access")){			
			$this->load->view('template', $template); 
		}
		else{
			redirect('Role/not_admin');
		}	
	}
	public function update_role()
	{
		$data=$_POST;	
        $role=$this->Role_model->updaterole($data);
        echo $role;
	}
	public function not_admin()
	{
	 $this->load->view('error_trans');
	}
}
?>
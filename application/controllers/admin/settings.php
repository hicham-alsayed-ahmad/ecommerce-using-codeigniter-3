<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
		
	public function __construct ()
	{
		parent::__construct();
		if($this->session->userdata('group')!=	'1' )
		{
			
			redirect('admin/products');	
		}
		$this->load->model('model_settings');
		
	}
	
	public function index()
	{	
		$data['get_sitename'] = $this->model_settings->sitename_settings();	
		$data['get_footer'] = $this->model_settings->footer_settings();	
		
		$this->load->view('backend/settings',$data);
		
	}
	
	
	public function edit_sitename()
	{
		$this->form_validation->set_rules('edit_sitename_input','Edit Site Name','required');
		if ($this->form_validation->run() == FALSE)
		{
			
				redirect('admin/settings');	
				
		}else{
				
				$edit_sitename_is = array(
											'all_value_settings' => set_value('edit_sitename_input') 
										);
				$this->model_settings->m_edit_sitename_settings($edit_sitename_is);
				redirect('admin/settings');		
			 }
	}
	///////////////////////////////
	public function edit_footer()
	{
		$this->form_validation->set_rules('edit_footer_input','Edit Footer','required');
		if ($this->form_validation->run() == FALSE)
		{
			
				redirect('admin/settings');	
				
		}else{
				
				$edit_footer_is = array(
											'all_value_settings' => set_value('edit_footer_input') 
										);
				$this->model_settings->m_edit_footer_settings($edit_footer_is);
				redirect('admin/settings');		
			 }
	}
	
	public function change_password_admin()
	{
		$this->form_validation->set_rules('oldpassword_admin','Old Password','required|alpha_numeric|md5');
		$this->form_validation->set_rules('password_admin','New Password','required|alpha_numeric|matches[repassword_admin]|min_length[6]|max_length[24]|md5');
		$this->form_validation->set_rules('repassword_admin','Re-Type Password','required|alpha_numeric');
		if ($this->form_validation->run() == FALSE)
		{
			redirect('admin/settings');	
			
			
		}else{
				$this->load->model('model_users');	
				$valid_user	= $this->model_users->check_password_admin_for_change();
				if($valid_user	==	FALSE)
					{
						redirect('logout');
						$this->session->set_flashdata('error','Username / Password Not Correct !' );
						
					}else{
							
							$new_admin_password = array(
														'usr_password'	=> set_value('password_admin')
														);
							
							$this->model_users->m_change_admin_password($new_admin_password);	
							$this->session->set_userdata('username',$valid_user->usr_name);
							$this->session->set_userdata('group',$valid_user->usr_group);
							redirect('login');
						 }
				
			 }
	}
	
	
	
	
				
				
}//end class
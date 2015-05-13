<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
		
	public function index()
	{
		$this->load->model('model_settings');
		$this->form_validation->set_rules('username','Username','required|alpha_numeric');
		$this->form_validation->set_rules('password','Password','required|alpha_numeric|md5');
		
		if($this->form_validation->run()	==	FALSE)
		{
			$data['get_sitename'] = $this->model_settings->sitename_settings();
			$data['get_footer'] = $this->model_settings->footer_settings();	
			$this->load->view('login/form_login',$data); 	
		}else{
			$this->load->model('model_users');	
			$valid_user	= $this->model_users->check_usr();
			$check_user_is_active = $this->model_users->check_user_is_active();
			if($valid_user	==	FALSE)
			{
				if ($check_user_is_active == FALSE)
				{
						$this->session->set_flashdata('error','Username / Password Not Correct !' );
				}else{
						$this->session->set_flashdata('error','Sorry this account is not active !' );
					 }
				
				redirect('login');
			}else{
				$this->session->set_userdata('username',$valid_user->usr_name);
				$this->session->set_userdata('group',$valid_user->usr_group);
				
				switch($valid_user->usr_group)
				{
					case 1 ://for admin
							redirect('admin/products');
					break;
					
					case 2 ://for c-admin
							redirect('admin/products');
					break;
					
					case 3 ://for member
							redirect(base_url());
					break;
					
					default: break;
				}
			}//end if valid_user 
			
		}//end if validation
		
		
		
		
	}
	
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
	
		
	
	
}

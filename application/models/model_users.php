<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_users extends CI_Model {
		
	public function check_usr()
		{
			$username = set_value('username');	
			$password = set_value('password');	
			$stuts = '1';
			$gry = $this->db->where('usr_name',$username)
							->where('usr_password',$password)
							->where('stuts',$stuts)
							->limit(1)
							->get('users');
			if($gry->num_rows()	>	0)
			{
				return $gry->row();	
			}else{
					return array();
			}
				
				
		}//end check_usr function
		
	public function check_user_is_active()
		{
			//if the user try to login and his account is not acctive
			$username = set_value('username');	
			$password = set_value('password');	
			$stuts = '0';
			$gry = $this->db->where('usr_name',$username)
							->where('usr_password',$password)
							->where('stuts',$stuts)
							->limit(1)
							->get('users');
			if($gry->num_rows()	>	0)
			{
				return $gry->row();	
			}else{
					return array();
			}
				
				
		}
	
	public function members()
		{ 
			$member = $this->db->get('users');
			if($member->num_rows() > 0 ) {
				return $member->result();
			} else {
				return array();
			} //end if num_rows
			
		}//end function member
	
	public function active($usr_id,$data_user)
		{	
			$this->db->where('usr_id',$usr_id)
					->update('users',$data_user);
						
		}
	
	public function disable($usr_id,$data_user)
		{	
			$this->db->where('usr_id',$usr_id)
			->update('users',$data_user);
			
		}
		
	public function register_new($data_register_new)
	{
		$this->db->insert('users',$data_register_new);		
	}
	
	public function is_usr()
	{
		$username = set_value('rusername');	
		$gry = $this->db->where('usr_name',$username)
		->limit(1)
		->get('users');
		if($gry->num_rows()	>	0)
		{
			return TRUE;	
			}else{
			return FALSE;
		}
		
		
	}
	
	public function check()
	{
		$username = set_value('rusername');	
		$password = set_value('rpassword');	
		$stuts = '1';
		$gry = $this->db->where('usr_name',$username)
		->where('usr_password',$password)
		->where('stuts',$stuts)
		->limit(1)
		->get('users');
		if($gry->num_rows()	>	0)
		{
			return $gry->row();	
			}else{
			return array();
		}
		
	}
	
		public function check_password_admin_for_change()
		{
			$old_password	= set_value('oldpassword_admin'); 	
			$usr_name = 'admin';
			$gry = $this->db->where('usr_name',$usr_name)
							->where('usr_password',$old_password)
							->limit(1)
							->get('users');
			if($gry->num_rows()	>	0)
			{
					return $gry->row();	
			}else{
					return array();
			}
		}
		public function m_change_admin_password($new_admin_password)
		{
			
			$usr_name = 'admin';
			$this->db->where('usr_name',$usr_name)	
					->update('users',$new_admin_password);
		}
	
	
		
	}///end class  ///
	
	
?>
		
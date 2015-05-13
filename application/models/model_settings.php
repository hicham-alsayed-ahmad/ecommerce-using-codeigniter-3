<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_settings extends CI_Model {
	
	
		/////////////////////////////////
		public function sitename_settings()
		{
			$query = $this->db->query('SELECT  * FROM all_settings WHERE all_name_settings = "site_name"');
			return $query->result();
		}
		public function m_edit_sitename_settings($edit_sitename_is)
		{
				$sitename = 'site_name';
				$this->db->where('all_name_settings',$sitename)
					->update('all_settings',$edit_sitename_is);
		}
		/////////////////////////////////
		public function footer_settings()
		{
			$query = $this->db->query('SELECT  * FROM all_settings WHERE all_name_settings = "footer"');
			return $query->result();
		}
		public function m_edit_footer_settings($edit_footer_is)
		{
				$footer = 'footer';
				$this->db->where('all_name_settings',$footer)
					->update('all_settings',$edit_footer_is);
		}
		
	
		
		
		

}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoices extends CI_Controller {
		
	public function __construct ()
	{
		parent::__construct();
		if($this->session->userdata('group')!=	('1' ||'2') )
		{
			$this->session->set_flashdata('error','Sorry You Are Not Logged in !');
			redirect('login');	
		}

		$this->load->model('model_orders');
		$this->load->model('model_users');
		$this->load->model('model_settings');
	}
	
	public function index()
	{	
		$data['invoices'] = $this->model_orders->all_invoices();	
		$data['get_sitename'] = $this->model_settings->sitename_settings();
		$data['get_footer'] = $this->model_settings->footer_settings();	
		$this->load->view('backend/view_all_invoices',$data);
	}
	public function detail($invoice_id)
	{
			
		$data['get_sitename'] = $this->model_settings->sitename_settings();
		$data['get_footer'] = $this->model_settings->footer_settings();	
		$data['orders']	= $this->model_orders->get_orders_by_invoice($invoice_id);
		$data['invoice'] = $this->model_orders->get_invoice_by_id($invoice_id);
		$this->load->view('backend/view_invoice_detail',$data);
	}
	
	

	

}

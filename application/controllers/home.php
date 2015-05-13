<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
		
	public function __construct ()
	{
		parent::__construct();
		//load model -> model_products 
		$this->load->model('model_products');
		$this->load->model('model_settings');
	}

	public function index()
	{	
		$data['get_sitename'] = $this->model_settings->sitename_settings();
		$data['get_footer'] = $this->model_settings->footer_settings();	
		$data['products'] = $this->model_products->all_products();	//this all_products from model 
		$data['starts'] = $this->model_products->dis_products();
		$this->load->view('home',$data); //this $data from model inside class model_products
		
		
		
	}
	
	public function showme($pro_name)
	{		
			$data['get_sitename'] = $this->model_settings->sitename_settings();
			$data['get_footer'] = $this->model_settings->footer_settings();	
			$data['starts'] = $this->model_products->dis_products();
			$data['comes'] = $this->model_products->showme($pro_name); //for showme function in home/showme
			$this->load->view('this_products',$data);
	}
	
	public function add_to_cart($pro_id,$send)
	{
		$product = $this->model_products->find($pro_id);
		$data = array(
						'id'      => $product->pro_id,
						'qty'     => 1,
						'price'   => $product->pro_price,
						'name'    => $product->pro_name,
						'title'	  => $product->pro_title
						);
		
		$this->cart->insert($data);	
		if ($send == 'add')
		{
				redirect('home/showme/'.$product->pro_name);
		}else{
				redirect(base_url());
			 }
		
	}
	
	public function cart()
	{
		$data['get_sitename'] = $this->model_settings->sitename_settings();
		$data['get_footer'] = $this->model_settings->footer_settings();	
		$this->load->view('show_cart',$data);	
		
	}//view inside cart
	
	public function clear_cart()
	{
		$this->cart->destroy();
		redirect(base_url());
	}
	
	public function report($pro_id)
	{
		$product = $this->model_products->find($pro_id);
		
		if($this->session->userdata('group')	!=	('2' ||'3'))
		{
			$group_usr = Gost;
			$name_usr = Gost;	
		}else{
				$group_usr = $this->session->userdata('group');
				$name_usr = $this->session->userdata('username');
			}
		
		
		
		$report_products = array
		(
			'rep_id_product'			=> $product->pro_id,
			'rep_name'					=> $product->pro_name,
			'rep_title_product'			=> $product->pro_title,
			'rep_usr_name'				=> $name_usr,
			'rep_usr_group'				=> $group_usr
		);
		$this->model_products->report($report_products);
		redirect(base_url());
		
	}
	
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
		
	public function __construct ()
	{
		parent::__construct();
		if($this->session->userdata('group')!=	('1' ||'2') )
		{
			$this->session->set_flashdata('error','Sorry You Are Not Logged in !');
			redirect('login');	
		}
		
		//load model -> model_products
		$this->load->model('model_products');
		$this->load->model('model_users');
		$this->load->model('model_settings');
	}
	
	public function index()
	{	
		$data['products'] = $this->model_products->all_products();	
		$data['get_sitename'] = $this->model_settings->sitename_settings();
		$data['get_footer'] = $this->model_settings->footer_settings();	
		$this->load->view('backend/dashboard',$data);
	}
	
	public function create()
	{
		$data['get_sitename'] = $this->model_settings->sitename_settings();
		$data['get_footer'] = $this->model_settings->footer_settings();	
		$this->load->view('backend/form_create_product',$data);
		
		$this->form_validation->set_rules('pro_name','Product Name','required');
		$this->form_validation->set_rules('pro_title','Product Title','required');
		$this->form_validation->set_rules('pro_description','Product Description','required');
		$this->form_validation->set_rules('pro_price','Product Price','required|integer');
		$this->form_validation->set_rules('pro_stock','Available Stock','required|integer');
		//$this->form_validation->set_rules('userfile','image error','required');	
		
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('backend/form_create_product');	
				
		}else{
			//load uploading file 
				$config['upload_path']          = './assets/uploads/';
				$config['allowed_types']        = 'jpg|png';
				$config['max_size']             = 2048000;// = MB
				$config['max_width']            = 2000;
				$config['max_height']           = 2000;
				$this->load->library('upload', $config);
				
			if ( ! $this->upload->do_upload())
			{	
				$this->load->view('backend/form_create_product');
				
				
			}else{	
				// if form_validation = true  -> insert into db
					$upload_image = $this->upload->data();
					$data_products = array
					(
						'pro_name'			=> set_value('pro_name'),
						'pro_title'			=> set_value('pro_title'),
						'pro_description'	=> set_value('pro_description'),
						'pro_price'			=> set_value('pro_price'),
						'pro_stock'			=> set_value('pro_stock'),
						'pro_image'			=> $upload_image['file_name']
					);//end array data_products
					
					$this->model_products->create($data_products);
					redirect('admin/products');	
			} //end if uploading 
			
		}//end if form_validation
		
	}///end class create ///
	
	public function edit($pro_id)
	{
		$data['get_sitename'] = $this->model_settings->sitename_settings();
		$data['get_footer'] = $this->model_settings->footer_settings();	
		$this->form_validation->set_rules('pro_name','Product Name','required');
		$this->form_validation->set_rules('pro_title','Product Title','required');
		$this->form_validation->set_rules('pro_description','Product Description','required');
		$this->form_validation->set_rules('pro_price','Product Price','required|integer');
		$this->form_validation->set_rules('pro_stock','Available Stock','required|integer');
		
		if ($this->form_validation->run() == FALSE)
			{
				$data['product'] = $this->model_products->find($pro_id);
				$this->load->view('backend/form_update_product',$data);
			} else {
				if($_FILES['userfile']['name'] != '')
				{
					//load uploading file 
						$config['upload_path']          = './assets/uploads/';
						$config['allowed_types']        = 'jpg|png';
						$config['max_size']             = 2000;// = MB
						$config['max_width']            = 2000;
						$config['max_height']           = 2000;
						$this->load->library('upload', $config);
						
					if ( ! $this->upload->do_upload())
					{	
						$data['product'] = $this->model_products->find($pro_id);
						$this->load->view('backend/form_update_product',$data);
						
					}else{
							$upload_image = $this->upload->data();
							$data_products = array(
								'pro_name'			=> set_value('pro_name'),
								'pro_title'			=> set_value('pro_title'),
								'pro_description'	=> set_value('pro_description'),
								'pro_price'			=> set_value('pro_price'),
								'pro_stock'			=> set_value('pro_stock'),
								'pro_image'			=> $upload_image['file_name']
							);//end array data_products
							$this->model_products->edit($pro_id,$data_products);
							redirect('admin/products');
					}//end if uploading
				}else{
						$data_products = array(
						'pro_name'			=> set_value('pro_name'),
						'pro_title'			=> set_value('pro_title'),
						'pro_description'	=> set_value('pro_description'),
						'pro_price'			=> set_value('pro_price'),
						'pro_stock'			=> set_value('pro_stock'),
						
						);//end array data_products
						$this->model_products->edit($pro_id,$data_products);
						redirect('admin/products');
						
				}//end if FILES
				
			}//end if form_validation
			
	}//end function update
	
	public function delete($pro_id)
	{
		$this->model_products->delete($pro_id);
		redirect('admin/products');
	}
	
	public function reports()
	{
		$data['get_sitename'] = $this->model_settings->sitename_settings();
		$data['get_footer'] = $this->model_settings->footer_settings();	
		$data['reports'] = $this->model_products->reports();	
		$this->load->view('backend/reports',$data);
	}
	
	public function del_report($rep_id_product)
	{
		$this->model_products->del_report($rep_id_product);
		redirect('admin/products/reports');	
	}
	
	public function members()
	{
		$data['get_sitename'] = $this->model_settings->sitename_settings();
		$data['get_footer'] = $this->model_settings->footer_settings();	
		$data['members'] = $this->model_users->members();	
		$this->load->view('backend/members',$data);
	}
	
	public function active_usr($usr_id)
	{
		$active = '1';
		$data_user = array
		(
			'stuts'			=> $active
		);
		$this->model_users->active($usr_id,$data_user);
		redirect('admin/products/members');
	}
	
	public function disable_usr($usr_id)
	{
		$active = '0';
		$data_user = array
		(
		'stuts'			=> $active
		);
		$this->model_users->active($usr_id,$data_user);
		redirect('admin/products/members');
	}
	

	

}

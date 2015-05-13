<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_products extends CI_Model {
	
		public function all_products()//لجلب  جميع البيانات واظهاراها في الصفحة الرئيسية
		{ //$show -> guery to get all products from table products
			$show = $this->db->get('products');
			if($show->num_rows() > 0 ) {
					return $show->result();
			} else {
					 return array();
			} //end if num_rows
					
		}//end function all_products
		
		public function dis_products()//لجلب اسماء البيانات و اظهارها بالشريط بدون تكرار الاسماء 
		{
				$this->db->distinct();
				$query = $this->db->query('SELECT DISTINCT pro_name FROM products');
				return $query->result();
		}//without repeated values
		
		public function showme($pro_name)//لاظهار البيانات من نفس اسم المنتج 
		{ 
			
			$query = $this->db->get_where('products', array('pro_name' => $pro_name));
			return $query->result();
			
		}//end function this --------- this will find product and show all same product
		
		public function find($pro_id)//للبحث عن رقم المنتج وتحقق من وجوده 
			//this is for find record id->product
		{ 
			$code = $this->db->where('pro_id',$pro_id)
							->limit(1)
							->get('products');
			if ($code->num_rows() > 0 )
				{
					return $code->row();
				}else {
					return array();
				}//end if code->num_rows > 0 
				
		}//end function find
		
		public function create($data_products)//لانشاء منتج جديد
		{
			//guery insert into database 	
			$this->db->insert('products',$data_products);
				
		}//end function craete
		
		public function edit($pro_id,$data_products)//للتعديل على المنتج
		{
			//guery update FROM .. WHERE id->products
			$this->db->where('pro_id',$pro_id)
					->update('products',$data_products);
		}
		
		public function delete($pro_id)//لحذف منتج
		{
			//guery delete id->products
			$this->db->where('pro_id',$pro_id)
					->delete('products');
		}
		
	public function report($report_products)
	{
		
		$this->db->insert('reports',$report_products);
		
	}//end function craete
	
	public function reports()
	{ 
		$report = $this->db->get('reports');
		if($report->num_rows() > 0 ) {
			return $report->result();
		} else {
			return array();
		} //end if num_rows
		
	}//end function report
	
	
	public function del_report($rep_id_product)
	{
		$this->db->where('rep_id_product',$rep_id_product)
		->delete('reports');
	}
	
	
	
		
} //end class Model_products
///////////////////////////////  Model_products : this is use in controller admin/products + home 
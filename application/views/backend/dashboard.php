<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Online</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url('/assets/css/bootstrap.min.css');?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url('/assets/css/modern-business.css');?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url('/assets/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	<!-- load for table and search in table -->
	<script type="text/javascript" language="javascript" src="<?php echo base_url('/assets/js/jquery-1.10.2.min.js');?>"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url('/assets/js/jquery.dataTables.min.js');?>"></script>
	<script type="text/javascript" language="javascript" src="<?php echo base_url('/assets/js/dataTables.bootstrap.js');?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('/assets/css/dataTables.bootstrap.css');?>">
</head>

	
	<body>
		
		<!-- Navigation -->
		<?php $this->load->view('layout/dash_navigation')?>
		<!-- Header- dash_menu -->
		<?php $this->load->view('layout/dash_menu')?>
		<!-- Page Content -->
		<div class="container">
			<!-- /.row -->
			<div class="row">
				<!-- body items -->
	
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4><i class="fa fa-fw fa-compass"></i> Products <?=  anchor('admin/products/create','Add New Product',['class'=>'btn btn-primary btn-xs']) ?></h4>
							
						</div>
						<div class="panel-body">
							<table class="table table-striped table-hover" id="tableproducts">
								<thead>
									<tr>
										<th>#</th>
										<th>Name Product</th>
										<th>Title</th>
										<th>Description</th>
										<th>Price</th>
										<th>Stock</th>
										<th>Image</th>
										<th>Control Product</th>
									</tr>
								</thead>
								<tbody>
								<!-- load products from table -->
								<?php foreach ($products as $product ) : ?>
									<tr>
										<td><?=  $product->pro_id  ?></td>
										<td><?=  $product->pro_name  ?></td>
										<td><?=  $product->pro_title  ?></td>
										<td><textarea rows="4" disabled><?=  $product->pro_description  ?></textarea></td>
										<td><?=  $product->pro_price  ?></td>
										<td><?=  $product->pro_stock  ?></td>
										<td>
											<a href="">
												<style>#g {width:50px;height:50px;}</style>
												<?php
													
													$product_image =['src'	=>'assets/uploads/'.$product->pro_image,
													
													'class'=>'img-responsive img-portfolio img-hover',
													'id'=>'g'
													];
													echo img($product_image);
												?>
										</td>
										<td>
											<?=  anchor('admin/products/edit/'.$product->pro_id,'Edit',['class'=>'btn btn-success btn-xs']) ?>
											<?php  if($this->session->userdata('group')	==	'1' ): ?>
											<?=  anchor('admin/products/delete/'.$product->pro_id,'Delete',['class'=>'btn btn-danger btn-xs',
																											'onclick'=>'return confirm(\'Are You Sure ? \')'
																											]) ?>
											<?php else:?>
											<?=  anchor('admin/products/delete/','Delete',['class'=>'btn btn-danger btn-xs','data-toggle'=>'button',
												'onclick'=>'return confirm(\'Sorry You Cant Delete it you should be admin  ? \')'
											]) ?>
											<?php endif;?>
											
										</td>
									</tr>
									<?php endforeach; ?>
									
									
								</tbody>
							</table>
							<script>
								$(document).ready(function(){
									$('#tableproducts').DataTable();
									
								});
							</script>
							
						</div>
					</div>
				</div> 
				
			</div>
			<!-- /.row -->
			
			<!-- Features Section -->
			
			<!-- /.row -->
			<hr>
			
			<!-- Footer -->
			<?php $this->load->view('layout/footer')?>
			
		</div>
		<!-- /.container -->
		
		<!-- jQuery -->
		<script src="<?php  base_url('/assets/js/jquery.js');?>"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="<?php  base_url('/assets/js/bootstrap.min.js');?>"></script>
		
		<!-- Script to Activate the Carousel -->
		
		
	</body>
	
</html>

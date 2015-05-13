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
		<?php $this->load->view('layout/dash_navigation');?>
		<!-- Header- dash_menu -->
		<?php $this->load->view('layout/dash_menu');?>
		<!-- Page Content -->
		<div class="container">
			<!-- /.row -->
			<div class="row">
				<!-- body items -->
	
				<div class="col-md-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h4><i class="fa fa-fw fa-compass"></i> Items Ordered in Invoice # <?php foreach ($invoice as $invoice_id ) : ?><?= $invoice_id->id ?>	<?php endforeach; ?> </h4>
							
						</div>
						<div class="panel-body">
							
							<table class="table table-striped table-hover" id="table-invoice">
								<thead>
									<tr>
										
										
										<th>Product id</th>
										<th>Product type</th>
										<th>Product title</th>
										<th>Quantity</th>
										<th>price</th>
										<th>Subtotal</th>
										
									</tr>
								</thead>
								<tbody>
								<!-- load products from table -->
								<?php 
									$total = 0;
									foreach ($orders as $order ) : 
									$subtotal = $order->qty * $order->price;
									$total += $subtotal;
								?>
									<tr>
										<td><?= $order->product_id ?></td>	
										<td><?= $order->product_type ?></td>
										<td><?= $order->product_title ?></td>
										<td><?= $order->qty ?></td>
										<td><?= $order->price ?></td>
										<td><?= $subtotal ?></td>
									
									</tr>
									<?php endforeach; ?>
									<tfoot>
										<tr>
											<td align="right" colspan="5">Total :</td>
											<td><?=$total?></td>
										</tr>
									</tfoot>
									
								</tbody>
							</table>
							<script>
								$(document).ready(function(){
									$('#table-invoice').DataTable();
									
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
		<script type="text/javascript" src="<?php  base_url('/assets/js/jquery.js');?>"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script type="text/javascript" src="<?php echo  base_url('/assets/js/bootstrap.min.js');?>"></script>
		
		<!-- Script to Activate the Carousel -->
		
		
	</body>
	
</html>

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
							<h4><i class="fa fa-fw fa-compass"></i> Members</h4>
							
						</div>
						<div class="panel-body">
						<?php foreach ($members as $member ) : ?>
						<div class="col-md-12">
						<hr>
							<div class="col-md-1">
								
							</div>
							<div class="col-md-3">
								<h4>User ID</h4>
									<?=  $member->usr_id  ?>
							</div>
							
							<div class="col-md-3">
								<h4>User Name </h4>
								<?=  $member->usr_name  ?>
							</div>
							
							<div class="col-md-3">
								<h4>User Group</h4>
								<?php if ($member->usr_group == '1' ):?>
								<?php echo "administrator"  ;?>
								<?php endif;?>
								<?php if ($member->usr_group == '2' ):?>
								<?php  echo "C-administrator"  ;?>
								<?php endif;?>
								<?php if ($member->usr_group == '3' ):?>
								<?php  echo "Members"  ;?>
								<?php endif;?>
								
							</div>

							<div class="col-md-2">
								
							
								<?php  if($this->session->userdata('group')	==	'1' ): ?>
								<h4>User Status</h4>
								<?php if ($member->usr_id == '1' ):?>
								<?php echo "administrator"?>
								<?php else:?>
								<?php if ($member->stuts == '1' and $member->usr_id != '1' ):?>
								
								
								<?=  anchor('admin/products/disable_usr/'.$member->usr_id,'Disabled ',['class'=>'btn btn-danger btn-xs ',
									'onclick'=>'return confirm(\'Are You Sure You Want Disabled This user ? \')'
								])  ?>
								
								<?=  anchor('#','Active',['class'=>'btn btn-success btn-xs disabled '
								])  ?>
								<?php else:?>
								<?=  anchor('#','Disabled ',['class'=>'btn btn-danger btn-xs disabled'])  ?>
								
								<?=  anchor('admin/products/active_usr/'.$member->usr_id,'Active ',['class'=>'btn btn-success btn-xs ',
									'onclick'=>'return confirm(\'Are You Sure You Want Disabled This  user ? \')'
								])  ?>
								<?php endif;?>
								<?php endif;?>
								<?php endif;?>
								
							</div>
						
						</div>
						<?php endforeach; ?>	
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
		<script src="js/jquery.js"></script>
		
		<!-- Bootstrap Core JavaScript -->
		<script src="js/bootstrap.min.js"></script>
		
		<!-- Script to Activate the Carousel -->
		
		
	</body>
	
</html>

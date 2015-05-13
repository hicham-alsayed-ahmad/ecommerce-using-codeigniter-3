
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
							<h4><i class="fa fa-fw fa-compass"></i> Settings</h4>
						</div>
						<div class="panel-body"><?= validation_errors()?>
							<div class="col-md-12">
										<blockquote>
											<p>Here You Can <code>Edit</code> Site Information  and <code>Add</code> Some Options: </p>
											<blockquote>
												<p><kbd>Change</kbd> Site Name <code><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span></code> <mark><ins><abbr title="This is Site Name" class="attribute"><?php foreach($get_sitename as $sitename):?><?=  $sitename->all_value_settings;?><?php endforeach;?></abbr></ins></mark></p>
							<?=  form_open('admin/settings/edit_sitename',['class'=>'form-group']) ?>
											<div class="col-md-3">
											<div class="input-group">
												<input type="text" class="form-control" name="edit_sitename_input"  value="<?=set_value('edit_sitename_input') ?>">
											</div>
											</div>
							<button type="submit" class="btn btn-success btn-xs" onclick="return confirm ('Are You Sure You Want Change  Site Name ?')">Change</button>
							<?= form_close() ?>
											</blockquote>
											
											<blockquote>
												<p><kbd>Edit</kbd> Site Footer <code><span class="glyphicon glyphicon-hand-right" aria-hidden="true"></span></code> <mark><ins><abbr title="This is Footer" class="attribute"><?php foreach($get_footer as $footer):?><?=  $footer->all_value_settings;?><?php endforeach;?></abbr></ins></mark></p>
							<?=  form_open('admin/settings/edit_footer',['class'=>'form-inline']) ?>	
											<div class="col-md-3">
											<div class="input-group">
												<input type="text" class="form-control" name="edit_footer_input"  value="<?=set_value('edit_footer_input') ?>">
											</div>
											</div>
							<button type="submit" class="btn btn-success btn-xs" onclick="return confirm ('Are You Sure You Want Change  Site Footer Name ?')">Change</button>
							<?= form_close() ?>
											</blockquote>
											
											<blockquote>
												<p><kbd>Change</kbd> Admin Password </p>
							<?=  form_open('admin/settings/change_password_admin',['class'=>'form-inline']) ?>	
											<div class="col-md-3">
											<div class="input-group">
												<input type="text" class="form-control" name="oldpassword_admin" placeholder="Enter Old Password"  value="<?=set_value('oldpassword_admin') ?>">
											</div>
											</div>
											<div class="col-md-3">
											<div class="input-group">
												<input type="text" class="form-control" name="password_admin" placeholder="New Admin Password"  value="<?=set_value('password_admin') ?>">
											</div>
											</div>
											<div class="col-md-3">
											<div class="input-group">
												<input type="text" class="form-control" name="repassword_admin" placeholder="Re Type Your Password" value="<?=set_value('repassword_admin') ?>">
											</div>
											</div>
							<button type="submit" class="btn btn-success btn-xs" onclick="return confirm ('Are You Sure You Want Change  Admin Password  ?')">Change</button>
							<?= form_close() ?>
											</blockquote>
											<blockquote><p><kbd>Add</kbd> Slide Show ...</p></blockquote>
										</blockquote>
									
								
							</div><!-- /.div 12 -->
						</div><!-- /.div panel-body  -->
					</div><!-- /.div  panel-default -->
				</div> <!-- /.div 12 -->
			</div>
			<!-- /.row -->
			<!-- Footer -->
			<?php $this->load->view('layout/footer')?>
		</div>
		<!-- /.container -->
		
		<!-- jQuery -->
		<script src="<?php echo base_url('/assets/js/jquery.js');?>"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="<?php echo base_url('/assets/js/bootstrap.min.js');?>"></script>
		
		<!-- Script to Activate the Carousel -->
	</body>
	
</html>

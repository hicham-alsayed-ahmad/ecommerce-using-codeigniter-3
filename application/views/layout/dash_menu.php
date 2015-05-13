
	
		<!-- Header- dash_menu -->
		<header  class="container">
			<!-- Indicators -->
			<div class="col-md-2">
			</div> 
			<div class="col-xs-8" >
				<div class="panel panel-default " >
					<div class="panel-body">
						<h4> Dashboard <i class="fa fa-th-large"></i> </h4>
						<div class="btn-toolbar btn-group-lg" role="group" aria-label="" style="text-align: center">
						<div class="span7 offset5">
							<?php  if($this->session->userdata('group')	==	'1'  or $this->session->userdata('group')	==	'2' ): ?>
							<?=  anchor('admin/products','View All Productst',['class'=>'btn btn-default']) ?>
							<?=  anchor('admin/products/create','Add New Product',['class'=>'btn btn-default']) ?>
							<?=  anchor('admin/products/members','Members',['class'=>'btn btn-default']) ?>
							<?=  anchor('admin/settings/','settings',['class'=>'btn btn-default']) ?>
							<?php else:?>
							<?= redirect(base_url()); ?>
							<?php endif;?>
						</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-2">
			</div> 
		</header>
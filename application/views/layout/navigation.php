<!-- Navigation Top_Menu -->


	<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
				<div class="container">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="<?php echo base_url(); ?>"><?php foreach($get_sitename as $sitename):?><?=  $sitename->all_value_settings;?><?php endforeach;?></a>
					</div>
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<ul class="nav navbar-nav navbar-left">
							<li>
								<a href="<?php echo base_url(); ?>">Home</a>
							</li>
							<li>
								<a href="">About</a>
							</li>	
						</ul>
						<ul class="nav navbar-nav navbar-right">
								<?php  if($this->session->userdata('group')	==	'1'  or $this->session->userdata('group')	==	'2' ): ?>
									<!-- يجب  ازالة group = 3 -->
								
							
							<li>
							<?php echo anchor('admin/invoices','Invoices List');?>
							</li>
							<li>
								<?php echo anchor('admin/products/reports','Product Report');?>
							</li>
							<li>
								<?php echo anchor('admin/products','Dashboard');?>
								<?php endif;?>
							</li>
								<?php if ($this->session->userdata('group')=='3'): ?>
							<li>
								<?php echo anchor('customer/payment_confirmation','Payment Confirmation');?>
							</li>
							<li>
								<?php echo anchor('customer/shopping_history','History');?>
							</li>
								<?php endif;?>
								
							<?php if ($this->session->userdata('username')): ?>
							<li>
								
								<?php echo ('<a>'.'You Are : '.$this->session->userdata('username').'</a>'); ?>
							</li>
							
							<li>
								<?php echo anchor('logout','Logout');?>
								<?php else:?>
							</li>
							<li>
								<?php echo anchor('login','Login / Sign Up');?>
								<?php endif;?>
							</li>							
							<?php  if($this->session->userdata('group')	!=	'1'  and $this->session->userdata('group')	!=	'2' ): ?>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"> My Cart <?= $this->cart->total_items(); ?> <i class="fa fa-shopping-cart"> </i> <b class="caret"> </b></a>
								<ul class="dropdown-menu">
								
									<li>
										<?php
											$url_cart	 = 'My Cart ';
											$url_cart	.=$this->cart->total_items().' <i class="fa fa-shopping-cart"></i></a>';
										?>
										<?= anchor('home/cart',$url_cart); ?>
										
									</li>
									<li>
											<?php
											$url_order	 = 'Check Out';
											$url_order	.=' <i class="fa fa-cc-paypal"></i> '.' <i class="fa fa-credit-card"></i> '.' <i class="fa fa-cc-visa"></i></a> ';
											?>
											<?php if  ($this->cart->total_items()!=0):?>
											<?= anchor('order',$url_order); ?>
											<?php else:?>
											<?= anchor(base_url(),$url_order); ?>
											<?php endif ;?>
									</li>
								</ul>
							</li>
							
							
							<?php endif;?>
							
						</ul>
					</div>
					<!-- /.navbar-collapse -->
				</div>
				<!-- /.container -->
			</nav>

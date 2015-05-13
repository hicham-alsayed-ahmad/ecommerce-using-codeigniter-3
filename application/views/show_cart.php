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

</head>

<body>

    <!-- Navigation Top_Menu -->
    <?php $this->load->view('layout/navigation')?>
    <!-- Header Carousel -->

    <!-- Page Content -->
    <div class="container">

       <hr>
        <!-- /.row -->
        <div class="row">
                        <!-- body items -->
            <!-- load products from table -->
             <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">
						
							<h3>My Carts : <?=  $this->cart->total_items()?> <i class="fa fa-shopping-cart"></i></h3> 
                    </div>
                    <div class="panel-body" width="100px">
						<div class="col-md-12">
							<hr>
								<div class="col-md-1">
								<h3>#</h3>
								</div>
								<div class="col-md-2">
								<h3>Product</h3>
								</div>
								<div class="col-md-2">
								<h3>Name</h3>
								</div>
								<div class="col-md-2">
								<h3>Quantity</h3>
								</div>
								<div class="col-md-3">
								<h3>Price</h3>
								</div>
								<div class="col-md-2">
								<h3>Subtotal</h3>
								</div>
						</div>  
						<hr>
						<?php 
							$i=0;
							foreach ($this->cart->contents() as $items): 
							$i++;
						?>
						<div class="col-md-12">
							<hr>
							<div class="col-md-1">
								<?= $i ?>
							</div>
							<div class="col-md-2">
								<?= $items['name'] ?>
							</div>
							<div class="col-md-2">
								<?= $items['title'] ?>
							</div>
							<div class="col-md-2">
								<?= $items['qty'] ?>
							</div>
							<div class="col-md-3">
								<?php echo $this->cart->format_number( $items['price'] );?>
							</div>
							<div class="col-md-2">
								<?php echo $this->cart->format_number( $items['subtotal'] );?>
							</div>
							<hr>
						</div> 
						<?php endforeach;?>
						
						<div class="col-md-12">
							<hr>
							<div class="col-md-9">
							<hr>
							</div>
							<div class="col-md-3">
								<h3>Total : <?php echo $this->cart->format_number( $this->cart->total() ); ?></h3>
							</div>
						</div>
						<div class="col-md-4"></div>
						<div class="col-md-6">
							<?=  anchor('home/clear_cart','Clear Cart',['class'=>'btn btn-danger','role'=>'button']) ?>
							<?=  anchor(base_url(),'Continue Shopping',['class'=>'btn btn-primary','role'=>'button']) ?>
							<?php
								
								$url_check	='<button class="btn btn-success type="submit">';
								$url_check	 .= 'Check Out'.'</button>';
							?>
							<?php if  ($this->cart->total_items()!=0):?>
							<?=  anchor('order',' Check Out',['class'=>'btn btn-success','role'=>'button']) ?>
							<?php else:?>
							<?= anchor(base_url(),$url_check); ?>
							<?php endif ;?>
						</div>
						<div class="col-md-2"></div>
                    </div>
                </div>
            </div>  
			
        </div>
        <!-- /.row -->

        <!-- Features Section -->

        <!-- /.row -->

        <hr>

        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="#">Report For Buggs</a>
                </div>
            </div>
        </div>

        <hr>

        <!-- Footer -->
        <?php $this->load->view('layout/footer')?>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="<?php echo base_url('/assets/js/jquery.js');?>"></script>
	
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('/assets/js/bootstrap.min.js');?>"></script>

    <!-- Script to Activate the Carousel -->
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

</body>

</html>

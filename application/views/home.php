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
    <header id="myCarousel" class="carousel slide">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide One');"></div>
                <div class="carousel-caption">
                    <h2>Caption 1</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Two');"></div>
                <div class="carousel-caption">
                    <h2>Caption 2</h2>
                </div>
            </div>
            <div class="item">
                <div class="fill" style="background-image:url('http://placehold.it/1900x1080&text=Slide Three');"></div>
                <div class="carousel-caption">
                    <h2>Caption 3</h2>
                </div>
            </div>
        </div>
        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </header>
    <!-- Page Content -->
    <div class="container">
        <!-- Product Menu -->
        <?php $this->load->view('layout/product_menu')?>
        <!-- /.row -->
        <div class="row">
            
                        <!-- body items -->
            <!-- load products from table -->
			<?php foreach ($products as $product ) : ?>
             <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
						
							<h6><?=  $product->pro_name  ?> - <?=  $product->pro_title  ?></h6>
						 
                    </div>
                    <div class="panel-body" width="100px">
						<a href="">
						<style>#g {width:500%;height: 120px;}</style>
							<?php
								
								$product_image =['src'	=>'assets/uploads/'.$product->pro_image,
								
								'class'=>'img-responsive img-portfolio img-hover',
								'id'=>'g'
								];
								echo img($product_image);
							?>
						</a>
						<style>#t {width: 230px;height: 75px;overflow: scroll;}</style>
                        <p id="t"> <?=  $product->pro_description  ?></p>
                       <p><code>Price:</code> <?=  $product->pro_price  ?>  <code> Stock:</code> <?=  $product->pro_stock  ?> </p>
					   <?php  if($this->session->userdata('group')	!=	'1'  and $this->session->userdata('group')	!=	'2' ): ?>
                        <?=  anchor('home/add_to_cart/'.$product->pro_id,'Add To Cart || Buy',['class'=>'btn btn-success  btn-xs','role'=>'button']) ?>
                        <ul class="nav nav-tabs navbar-right">
						<li class="dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown">Report <i class="fa fa-exclamation-triangle"></i></a> 
							<ul class="dropdown-menu">
							<li>
							<?=  anchor('home/report/'.$product->pro_id,"I don't  like this Product",["class'=>'btn  btn-xs"]) ?>
							</li>
							</ul>
						</li> 
						</ul>
						
						<?php else:?>
						<?=  anchor('admin/products/edit/'.$product->pro_id,'Edit',['class'=>'btn btn-success btn-xs']) ?>
						<?php  if($this->session->userdata('group')	==	'1' ): ?>
						<?=  anchor('admin/products/delete/'.$product->pro_id,'Delete',['class'=>'btn btn-danger btn-xs',
							'onclick'=>'return confirm(\'Are You Sure ? \')'
						]) ?>
						<?php else:?>
						<?=  anchor('admin/products/delete/','Delete',['class'=>'btn btn-danger btn-xs ','data-toggle'=>'button',
							'onclick'=>'return confirm(\'Sorry You Cant Delete it , Should Be Admin ! \')'
						]) ?>
						<?php endif;?>
						<?php endif;?>
                    </div>
                </div>
            </div>  
			<?php endforeach; ?>
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

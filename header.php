<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							<ul class="nav nav-pills">
								<li><a href="#"><i class="fa fa-phone"></i> +33 00000000</a></li>
								<li><a href="#"><i class="fa fa-envelope"></i> Boutique@uvsq.fr</a></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->
		
		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-md-4 clearfix">
						<div class="logo pull-left">
							<a href="index.php"><img src="images/home/logo.png" alt="" /></a>
						</div>
					
					</div>
					<div class="col-md-8 clearfix">
						<div class="shop-menu clearfix pull-right">
							<ul class="nav navbar-nav">
                            <?php
                            if(!isset($_SESSION['user_name'])) session_start();
								if (isset($_SESSION['user_name']) && $_SESSION['user_login_status'] == 1) {
									echo '<li><a href="edit-account.php"><i class="fa fa-user"></i>'.$_SESSION['user_name']  .'</a></li>';
								} else {
									echo '<li><a href="page_login.php"><i class="fa fa-user"></i>Mon Compte</a></li>';
									
								}
								?>
								
								
								<li><a href="cart.php"><i class="fa fa-shopping-cart"></i> Carte</a></li>
								<?php
								
								if (isset($_SESSION['user_login_status']) && $_SESSION['user_login_status'] == 1) {
									echo '<li><a href="index.php?logout"><b>déconnection</b></a></li>';
									
								} else {
									echo '<li><a href="page_login.php"><i class="fa fa-lock"></i> Connexion</a></li>';
								}
								?>
								
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->
	
		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>
						<div class="mainmenu pull-left">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="page_acceuil.php" class="active">Home</a></li>
								<li class="dropdown"><a href="#">Shop<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="shop.php">Products</a></li>
										<li><a href="product-details.html">Product Details</a></li> 
										
										<li><a href="cart.php">Cart</a></li> 
										<li><a href="login.html">Login</a></li> 
                                    </ul>
                                </li> 
								
								<li><a href="contact-us.html">Contact</a></li>
							</ul>
						</div>
					</div>
					<!-- search bar-->
					</div>
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->
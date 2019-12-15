<html lang="en"><head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Product Details | E-Boutique</title>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<link href="css/prettyPhoto.css" rel="stylesheet">
		<link href="css/price-range.css" rel="stylesheet">
		<link href="css/animate.css" rel="stylesheet">
		<link href="css/main.css" rel="stylesheet">
		<link href="css/responsive.css" rel="stylesheet">
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<script src="js/respond.min.js"></script>
		<![endif]-->       
		<link rel="shortcut icon" href="images/ico/favicon.ico">
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	</head><!--/head-->
	
	<body >
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
							<a href="page_acceuil.php"><img src="images/home/logo.png" alt="" /></a>
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
					
				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->	
		<section>
			<div class="container">
				<div class="row">
					<?php

							require_once("./php/config/db.php");
   
						$id_article = $_GET['profil_views'];
						$sql = "SELECT quantite,a.artdesc,a.id_article,a.marque,a.image,a.categorie,
						f.fournisseurname,a.ttc 
						 from vue_article v ,article a , fournisseur f where 
						v.id_article=a.id_article
						and a.id_fournisseur=f.id_fournisseur and v.id_article='".$id_article."';";
						$res = mysqli_query($con, $sql);
						$i = 0;
						
						while ($row_pro = mysqli_fetch_array($res)) {
						$id_article = $row_pro['id_article'];
						$description = $row_pro['artdesc'];
						$marque = $row_pro['marque'];
						$img = $row_pro['image'];
						$categorie = $row_pro['categorie'];
						$fournisseur = $row_pro['fournisseurname'];
						$ttc = $row_pro['ttc'];
						$qte = $row_pro['quantite'];
						
						$i ++; 

								?>
					
					<div class="col-sm-9 padding-right">
						<div class="product-details"><!--product-details-->
							<div class="col-sm-5">
								<div class="view-product">
									<img src="images/product-details/<?php echo $img?>" alt=""/>
									
								</div>
								<div id="similar-product" class="carousel slide" data-ride="carousel">
									
									  <!-- Wrapper for slides -->
										<div class=" carousel-inner">
											<div class="item active">
											<a href=""><img src="images/product-details/<?php echo "1".$img?>" alt=""></a>
											<a href=""><img src="images/product-details/<?php echo "2".$img?>" alt=""></a>
											  
											  
											 
											
											</div>
											<div class="item">
											
											<a href=""><img src="images/product-details/<?php echo "3".$img?>" alt=""></a>
											  <a href=""><img src="images/product-details/<?php echo "4".$img?>" alt=""></a>
											  
											 
											
											 
											</div>
											<div class="item">
											
											<a href=""><img src="images/product-details/<?php echo "1".$img?>" alt=""></a>
											  <a href=""><img src="images/product-details/<?php echo "2".$img?>" alt=""></a>
											 
											
											 
											</div>
											
										</div>
	
									  <!-- Controls -->
									  <a class="left item-control" href="#similar-product" data-slide="prev">
										<i class="fa fa-angle-left"></i>
									  </a>
									  <a class="right item-control" href="#similar-product" data-slide="next">
										<i class="fa fa-angle-right"></i>
									  </a>
								</div>
	
							</div>
							<div class="col-sm-7">
								<div class="product-information"><!--/product-information-->
									<img src="images/product-details/new.jpg" class="newarrival" alt="">
									<h2><?php echo $description?></h2>
									<p>fournisseur : <?php echo $fournisseur?> </p>
									
									<span>
										<span>prix : <?php echo $ttc?> </span>
										<label>Quantity:  </label>
										
										<input type="number" value="1" name="qtt">
										<a href="add_carte.php?<?php echo 'id_article='.$id_article.'&quantite=1'?>">
										<button type="submit" class="btn btn-fefault cart" >
											<i class="fa fa-shopping-cart"></i>
											Add to cart
										</button></a>
										
									</span>
									<p><b>Availability:</b><?php if($qte>0) echo '<b>'.$qte."articles disponible".'</b>'; else '<b>'."non disponible".'</b>'?></p>
									<p><b>marque:</b><?php echo $marque?> </p>
									</form>
								</div><!--/product-information-->
							</div>
						<?php } ?>
						</div><!--/product-details-->
						
					</div>
				</div>
			</div>
		</section>
		
		<!--/Footer-->
		
	
	  
		<script src="js/jquery.js"></script>
		<script src="js/price-range.js"></script>
		<script src="js/jquery.scrollUp.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.prettyPhoto.js"></script>
		<script src="js/main.js"></script>
	
	<a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: none;"><i class="fa fa-angle-up"></i></a></body>
	</html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | E-Shopper</title>
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
								session_start();
								if (isset($_SESSION['user_name']) && $_SESSION['user_login_status'] == 1) {
									echo '<li><a href="edit-account.php"><i class="fa fa-user"></i>'.$_SESSION['user_name']  .'</a></li>';
								} else {
									echo '<li><a href="page_login.php"><i class="fa fa-user"></i>Mon Compte</a></li>';
									
								}
								?>
								
								<li><a href="checkout.html"><i class="fa fa-crosshairs"></i> Checkout</a></li>
								<li><a href="cart.html"><i class="fa fa-shopping-cart"></i> Carte</a></li>
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
	
	</header><!--/header-->

		</div><!--/header_top-->
	
		
	
	<section id="do_action">
		<div class="container">
			<div class="heading">
				<h3>What would you like to do next?</h3>
				<p>Choose if you have a discount code or reward points you want to use or would like to estimate your delivery cost.</p>
			</div>
							<?php
				
				require_once("./php/config/db.php");
				
								$user_id=$_SESSION['user_id'];
				$sql = "SELECT *
                        FROM users
						WHERE user_id = '" . $user_id . "';";
						$res=mysqli_query($con,$sql);
						$row = mysqli_fetch_array($res);
						
						$sql2="SELECT SUM((a.prix-a.remise)*e.qte) as totale
						from article a ,apartient e ,commande c 
						where a.id_article=e.id_article and e.commande_id=c.commande_id
						and c.user_id= '" . $user_id . "';";
						$cmd=mysqli_query($con,$sql2);
						$row2 = mysqli_fetch_array($cmd);
						
						$sql3 ="SELECT count(*) as nbr
						from commande c
						where c.user_id ='".$user_id."';";

				
				$nb=mysqli_query($con,$sql3);
				$row3 = mysqli_fetch_array($nb);
				$string = "";
					$string .= '<ul>
								 	<li>Nom<span>'.$row['user_nom'].'</span></li>
									<li>Prenom :<span>'.$row['user_prenom'].'</span></li>
									<li>Adresse Mail :<span>'.$row['user_email'].'</span></li>
									<li>Numéro tel :<span>'.$row['user_tel'].'</span></li>
						<li>Adresse :<span>'.$row['user_adresse'].'</span></li>
						<li>Code Postale :<span>'.$row['user_code_postale'].'</span></li>

						<li>Sexe :<span>'.$row['user_sexe'].'</span></li>
										</ul>'

				
					
				
				
				
				?>
			<div class="row">
				<div class="col-sm-6">
					<div class="chose_area">
						<ul class="user_option">
                            
    <div class="total_area" style="margin-bottom:2px;">
						
							<?php echo $string ?>
							
					</div>
    </li>
                                
                               
							
							
							
						</ul>
						<ul class="user_info">
                        <form method="post" action="update_info.php" name="updateform">
							<li class="single_field">
								<label>Country:</label>
								<select>
									<option>Select</option>
									<option>France</option>
									
									
									
									
									
									
								</select>
								
							</li>
							<li class="single_field zip-field">
								<label>Code Postale:</label>
								<input type="text" name="user_code_postale">
							</li>

<li class="single_field zip-field">
								<label>Adresse </label>
								<input type="text" name="user_adresse">
							</li>

<li class="single_field zip-field">
								<label>Numéro tel: </label>
								<input type="text" name="user_tel">
							</li>

    
						</ul>
                    <button type="submit" class="btn btn-default update"  > update</button>
                        
</form>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="total_area">
						<ul>
<li> <div class="login-form"><!--login form-->
						<h2>Mise A jours du Mot De Passe</h2>
												<form method="post" action="update_info.php" name="loginform">

				<label for="login_input_password_new">Nouveau 
Mot De Passe  (min. 6  characters)</label> 
					<input id="login_input_password_new" class="login_input" type="password" name="user_password_new" required="">

					<label for="login_input_password">Confirmation Mot De Passe</label>
					<input id="login_input_password" class="login_input" type="password" name="user_password_repeat" autocomplete="off" required="">
							
							<button type="submit" name="login" class="btn btn-default">update</button>
						</form>
					</div> </li>
							<li>payment effectuer <span><?php  if($row2['totale']) echo $row2['totale']." euro";
							else echo "0 euro";?></span></li>
							<li>nombre de commande <span><?php echo $row3['nbr'];?></span></li>
							
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				
			</div>
		</div>
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>


</header><a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: block;"><i class="fa fa-angle-up"></i></a></body></html>
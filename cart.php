<html lang="en"><head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">
		<title>Cart | E-Shopper</title>
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
	 
	<body>
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
		<section id="cart_items">
			<div class="container">
				
				<div class="table-responsive cart_info">
					
					<table class="table table-condensed">
						<thead>
							<tr class="cart_menu">
								<td class="image">Item</td>
								<td class="description"></td>
								<td class="price">Price</td>
								<td class="quantity">Quantity</td>
								<td class="total">Total</td>
								<td></td>
							</tr>
						</thead>
								<tbody>
						<?php
						require_once("./php/config/db.php");
						if (isset($_SESSION['user_id']))
						$user_id=$_SESSION['user_id'];
						else $user_id=0;					
					$sql = "SELECT a.artdesc , (a.prix - a.remise) as prix_remise ,a.prix , s.fournisseurname
						from commande c ,apartient e , article a ,fournisseur s
						where  a.id_article=e.id_article
						and c.commande_id=e.commande_id
						and etatcmd  LIKE 'en%'
						and s.id_fournisseur=a.id_fournisseur
						and c.user_id = '" . $user_id . "';";
						$res=mysqli_query($con,$sql);
						$tot =0;
						$capnum=0;
						$i=0;
						if ($user_id==0)
						echo "log in first";
									
						while ($row=mysqli_fetch_array($res)) {
							$four=$row['fournisseurname'];
							$art=$row['artdesc'];
							$prix=$row['prix'];
							$prix_remise=$row['prix_remise'];
							$tot+=intval($row['prix']);
							$i++;
							
					?>
							<tr>
								<td class="cart_product">
									<a href=""><img src="images/cart/one.png" alt=""></a>
								</td>
								<td class="cart_description">
									<h4><a href=""><?php echo $art?></a></h4>
									<p><?php echo "Fournisseur: ".'<b> '.$four.'</b>' ?></p>
								</td>
								<td class="cart_price">
									<p><?php echo $prix?></p>
								</td>
								<td class="cart_quantity" id="<?php echo $i ?>" >
								
									<div class="cart_quantity_button">
									<form action="cart.php" method="get" >
										<input type="submit"  class="cart_quantity_up" id="<?php echo $i ?>" name="add<?php echo $i?>" value="+" ></input>
											<?php 
											echo 1;?>
										<input type="submit"  class="cart_quantity_up" id="<?php echo $i ?>" name="down<?php echo $i?>" value="-" ></input>
										</form>
									</div>
									
								</td> 
						
								<td class="cart_total">
									<p class="cart_total_price"><?php 
									 echo $prix_remise;
									 ?></p>
								</td>
								<td class="cart_delete" >
									<a class="cart_quantity_delete" href=""><i class="fa fa-times"></i></a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				
			</div>
				
			</div>
		</section> <!--/#cart_items-->
	
		<section id="do_action">
			<div class="container">
				
				<div class="row">
					
					<div class="col-sm-6">
					<div class="order-message">
						<form method="POST" action="cart.php">
							
							<textarea id="messagecmd" placeholder="Notes about your order, Special Notes for Delivery" rows="3"></textarea>
							</form>
							<script>
				print_r(document.getElementById("messagecmd"));
				 
				  document.cookie="message="+document.getElementById("messagecmd").value;
				</script>'
						</div>
				</div>
				<?php
				
				if (isset($_POST["autre_adresse"])&& empty($_POST['adresse_or']))
				{$my_adr=false;
				echo '<div class="col-sm-5 clearfix">
						<div class="bill-to">
							<p>Bill To</p>
							<div class="form-one">
								<form>
									
									
									
									<input type="text" placeholder="First Name *">
									<input type="text" placeholder="Middle Name">
									<input type="text" placeholder="Last Name *">
									<input type="text" placeholder="Address 1 *">
									<input type="text" placeholder="Address 2">
								</form>
							</div>
							<div class="form-two">
								<form>
									<input type="text" placeholder="Zip / Postal Code *">
									<select>
										<option>-- Country --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									<select>
										<option>-- State / Province / Region --</option>
										<option>United States</option>
										<option>Bangladesh</option>
										<option>UK</option>
										<option>India</option>
										<option>Pakistan</option>
										<option>Ucrane</option>
										<option>Canada</option>
										<option>Dubai</option>
									</select>
									
									<input type="text" placeholder="Phone *">
									<input type="text" placeholder="Mobile Phone">
									
								</form>
							</div>
						</div>
					</div>';
					
;				}elseif (!empty($_POST['adresse_or']))
				{
				echo "<script>alert(\" décoche utilisé mon adresse avant \")</script>";
				
			}
			 	 if (isset($_POST["payer_cmd"])&&($user_id!=0)&&$tot>0)
			{ 
				$message= $_COOKIE['message'];
				
				
				
;					$sqle= "UPDATE commande 
					set etatcmd = 'valider' , cmddescription = '".$message."'
					where etatcmd like 'en%'
					and user_id ='".$_SESSION['user_id']."';";
					$cmd=mysqli_query($con,$sqle);
					if($cmd)
					echo "<script>alert(\" commande confirmer \")</script>";
					else echo "<script>alert(\" erreur est survenu \")</script>";

			}  if (isset($_POST["payer_cmd"])&&($user_id!=0)&&($tot==0))
			echo "<script>alert(\" ajout des article avant de commander \")</script>";
			
			
					?>
<div class="col-sm-6">
						<div class="total_area">
							<ul>
								<li>Cart Sub Total <span><?php echo $tot." euro"?></span></li>
								<li>Eco Tax <span><?php 
								if($tot>0){
								$tax=2;
								echo $tax." euro";}
								else {$tax=0; echo $tax." euro";}?></span></li>
								<li>Shipping Cost <span>Free</span></li>
								<li>Total <span><?php
								echo $tot+$tax ." euro"
								?></span></li>
							</ul>

<ul><label>
<form action="cart.php" method="POST">	
<input type="checkbox" name="adresse_or" checked=".<?php $my_adr?>.">  utilise mon adresse</label></ul>
		
<input type="submit" class="btn btn-default update" id="1" name ="autre_adresse" value ="une autre adresse ?"/>
</form>
<form action="cart.php" method="POST">
<input type="submit" class="btn btn-default update" id="2" name ="payer_cmd" value ="commander" onclick="myfunction()"/>
							</form>
							
						</div>
					</div>

				</div>
			</div>
		</section>
	
		<footer id="footer"><!--Footer-->
			<div class="footer-top">
				<div class="container">
					<div class="row">
						<div class="col-sm-2">
							<div class="companyinfo">
								<h2><span>e</span>-shopper</h2>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
							</div>
						</div>
						<div class="col-sm-7">
							<div class="col-sm-3">
								<div class="video-gallery text-center">
									<a href="#">
										<div class="iframe-img">
											<img src="images/home/iframe1.png" alt="">
										</div>
										<div class="overlay-icon">
											<i class="fa fa-play-circle-o"></i>
										</div>
									</a>
									<p>Circle of Hands</p>
									<h2>24 DEC 2014</h2>
								</div>
							</div>
							
							<div class="col-sm-3">
								<div class="video-gallery text-center">
									<a href="#">
										<div class="iframe-img">
											<img src="images/home/iframe2.png" alt="">
										</div>
										<div class="overlay-icon">
											<i class="fa fa-play-circle-o"></i>
										</div>
									</a>
									<p>Circle of Hands</p>
									<h2>24 DEC 2014</h2>
								</div>
							</div>
							
							<div class="col-sm-3">
								<div class="video-gallery text-center">
									<a href="#">
										<div class="iframe-img">
											<img src="images/home/iframe3.png" alt="">
										</div>
										<div class="overlay-icon">
											<i class="fa fa-play-circle-o"></i>
										</div>
									</a>
									<p>Circle of Hands</p>
									<h2>24 DEC 2014</h2>
								</div>
							</div>
							
							<div class="col-sm-3">
								<div class="video-gallery text-center">
									<a href="#">
										<div class="iframe-img">
											<img src="images/home/iframe4.png" alt="">
										</div>
										<div class="overlay-icon">
											<i class="fa fa-play-circle-o"></i>
										</div>
									</a>
									<p>Circle of Hands</p>
									<h2>24 DEC 2014</h2>
								</div>
							</div>
						</div>
						<div class="col-sm-3">
							<div class="address">
								<img src="images/home/map.png" alt="">
								<p>505 S Atlantic Ave Virginia Beach, VA(Virginia)</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			
			
			
			</div>
			
		</footer><!--/Footer-->
		
	
	
		<script src="js/jquery.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.scrollUp.min.js"></script>
		<script src="js/jquery.prettyPhoto.js"></script>
		<script src="js/main.js"></script>
	
	<a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: none;"><i class="fa fa-angle-up"></i></a><a id="scrollUp" href="#top" style="position: fixed; z-index: 2147483647; display: none;"><i class="fa fa-angle-up"></i></a></body></html>
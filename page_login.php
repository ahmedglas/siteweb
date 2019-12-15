
<!DOCTYPE html>
<html lang="en">
<head>
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

<body>
<?php
require_once("header.php");
?>	
	<section id=""><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Se connecter </h2>
						<?php
									// show potential errors / feedback (from login object)
									if (isset($login)) {
										if ($login->errors) {
											foreach ($login->errors as $error) {
												echo $error;
											}
										}
										if ($login->messages) {
											foreach ($login->messages as $message) {
												echo $message;
											}
										}
									}
									?>
						<form method="post" action="index.php" name="loginform">

				<label for="login_input_email">email</label>
					<input id="login_input_email" class="login_input" type="text" name="user_email" required />

					<label for="login_input_password">Password</label>
					<input id="login_input_password" class="login_input" type="password" name="user_password" autocomplete="off" required />
							<span>
								<input type="checkbox" class="checkbox"> 
								Restez-connecté !
							</span>
							<button type="submit" name ="login" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
			
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
							<?php
									// show potential errors / feedback (from registration object)
									if (isset($registration)) {
										if ($registration->errors) {
											foreach ($registration->errors as $error) {
												echo $error;
											}
										}
										if ($registration->messages) {
											foreach ($registration->messages as $message) {
												echo $message;
											}
										}
									}
									?>
						<form method="post" action="registration.php" name="registerform">

						<!-- the user name input field uses a HTML5 pattern check -->
						<label for="login_input_username">Username (letters et numéro, 2 to 64 caractères)</label>
						<input id="login_input_username" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_name" required="">
						<label for="login_input_nom">NOM</label>
						<input id="login_input_nom" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_nom" required="">
						<label for="login_input_prenom">PRENOM</label>
						<input id="login_input_prenom" class="login_input" type="text" pattern="[a-zA-Z0-9]{2,64}" name="user_prenom" required="">
						<!-- the email input field uses a HTML5 email type check -->
						<label for="login_input_sexe">sexe</label>
						<select id="login_input_sexe" class="login_input" type="text" name="user_sexe" required="">
							<option value="Homme">Homme </option>
							<option value="Femme">Femme </option>
						</select> <br><br>
						<label for="login_input_email"> Email</label>
						<input id="login_input_email" class="login_input" type="email" name="user_email" required="">
					
						<label for="login_input_password_new">Password (min. 6 caractères)</label>
						<input id="login_input_password_new" class="login_input" type="password" name="user_password_new" pattern=".{6,}" required="" autocomplete="off">
					
						<label for="login_input_password_repeat">confirmation password</label>
						<input id="login_input_password_repeat" class="login_input" type="password" name="user_password_repeat" pattern=".{6,}" required="" autocomplete="off">
						<label for="login_input_cin">CIN</label>
						<input id="login_input_cin" class="login_input" type="text" pattern="+[0-9]{2}\([0-9]\))?[0-9]{8}" name="user_cin" required="">
						<label for="login_input_tel">Téléphone</label>
						<input id="login_input_tel" class="login_input" type="text" pattern="+[0-9]{2}\([0-9]\))?[0-9]{10}" name="user_tel" required="">
						<label for="login_input_adresse">Adresse</label>
						<input id="login_input_adresse" class="login_input" type="text"  name="user_adresse" required="">
						<label for="login_input_code_postale">Code postale</label>
						<input id="login_input_code_postale" class="login_input" type="text" pattern="+[0-9]{2,6}" name="user_code_postale" required="">
						<input type="submit" class="btn btn-default" style="background-color: #ec971f;" name="register" value="Register">
						
						
 
					
					</form>
					</div><!--/sign up form-->
				</div>
				</div>
			</div>
		</div>
	</section><!--/form-->
	
	
	<footer id="footer"><!--Footer-->
		<div class="footer-top">
			<div class="container">
				<div class="row">
					<div class="col-sm-2">
						<div class="companyinfo">
							<h2><span>e</span>-shopper</h2>
							<p>projet BD UVSQ web-site ecommerce	</p>
						</div>
					</div>
					<div class="col-sm-7">
						<div class="col-sm-3">
							<div class="video-gallery text-center">
								<a href="#">
									<div class="iframe-img">
										<img src="images/home/iframe1.png" alt="" />
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
										<img src="images/home/iframe2.png" alt="" />
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
										<img src="images/home/iframe3.png" alt="" />
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
										<img src="images/home/iframe4.png" alt="" />
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
							<img src="images/home/map.png" alt="" />
							<p>versaille uvsq l3 informatique</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		
		
	</footer><!--/Footer-->
	

  
    <script src="js/jquery.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
</body>
</html>

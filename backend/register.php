<?php $title ="Accueil" ; ?>
<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="La technologie en global">
    <meta name="author" content="Moumouni Komoye Harouna">
    

    <title id="WEBSIT_NAME">
    <?php 
      require('constants/constants.php');
    echo isset($title)
         ? $title . '_' . WEBSIT_NAME
         : WEBSIT_NAME;
    ?>

  </title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/customer.css" rel="stylesheet">
    <link rel="stylesheet" href="./libs/font-awesome-4.7.0/css/font-awesome.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <link rel="stylesheet" type="text/css" href="libs/alertifyjs/css/alertify.min.css">
    <link rel="stylesheet" type="text/css" href="libs/alertifyjs/css/themes/bootstrap.min.css">
  
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    
    <link href="favicon.ico" rel="icon" type="image/jpg" style="border-radius: 0.5em;" />
  </head>

  <body style="background-image:url(2.png);
              background-repeat: no-repeat;
              background-attachment: fixed;" class="login">
    
  


  <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><i class="fa fa-database" aria-hidden="true"></i> WIND UNIX STORAGE SYSTEM  > login > register</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href=""><b>VERSION 1.0</b></a></li>
            <li><a href=""><b><?php date_default_timezone_set('UTC'); echo date('<em>l F Y h:i:s A<em>');?></b></a>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div  class="container">
  <p style="text-align: center; color: #004d99 !important;">BIENVENUE A NOTRE SYSTEME DE GESTION EN LIGNE<br>VEUILLEZ FOURNIR DES INFOS POUR CONTINUER
  <br><br><br><a id="register" style="text-align: center; color: #004d99 !important;" href="login.php"><i class="fa fa-users" aria-hidden="true"></i> Login Or Register!</a></p>
  <br><br>
  <hr>
<div class="col-sm-4 col-sm-offset-4">
              
                <div  style="border: solid 1px #004d99;"  class="panel panel-default">
                <div  style="border: solid 1px #004d99;"  class="panel-heading ">
                 <h1 style="text-align: center;"><i class="fa fa-user-circle-o" aria-hidden="true"></i> register </h1>
               </div>
                <hr>
                <div class="panel-body">
           
       <?php  include('includes/_alert.php');?>
              <form data-parsley-validate method="post" action="" class="well">
                <div class="form-group">
                  <input type="text"  placeholder="Nom complet..." class="form-control" name="nom"  required="" />
                </div>

                <div class="form-group">
                  <input type="email"  placeholder="entrez une adresse mail valide..." class="form-control" name="email" required=""/>
                </div>

                 <div class="form-group">
                  <input type="number"  class="form-control" placeholder="Numéro..." name="numero"  required=""/>
                </div>

                 <div class="form-group">
                   <input type="text"   name="titre" placeholder="votre titre..."   class="form-control" required="">
                <div class="form-group">
                  <input type="text"  placeholder="pseudo" class="form-control" name="pseudo"  required="" />
                </div>

                <div class="form-group">
                  <input type="password"  class="form-control" name="password" required=""/>
                </div>

                 <div class="form-group">
                    <input style="background-color: #004d99; border : #004d99;" type="submit" name="envoi" class="btn btn-primary" value="validez" />
                 </div>
               </form>
             
           </div>
         </div>
          </div>

        </div>



     

          <div class="bcg" class="container">
        
            

 
           
               <div class="col-sm-4 col-sm-offset-4">
                
                <p style="color:#004d99; text-align: center;"  > &copy; projet web 2019</p>
                <marquee direction="down">
                <p style="color:#004d99; text-align: center;"  >Site pour le projet de BD  </p></marquee>
            </div>
         
        </div> 
    <script src="libs/parsley.min.js"></script>
      </body>
      </html>
<?php
  include'includes/functions.php';

  include('config/bd.php');

if (isset($_POST['envoi'])) {

  global $con;

  $nom = $_POST['nom'];
 $email  = $_POST['email'];
  $numero = $_POST['numero'];


  $titre = $_POST['titre'];
  $pseudo = $_POST['pseudo'];

$password  = $_POST['password'];



  echo
   $insert = " INSERT INTO admin (nom, email, numero, titre, pseudo, password) VALUES('$nom','$email','$numero','$titre','$pseudo','$password')";

$run = mysqli_query($con, $insert);

  
if ($run) {
   echo "<script>alert ('compte crée avec succés!')</script>";
   echo "<script>window.open ('login.php','_self')</script>";
   

}else{
  echo "<script>alert ('Echec!')</script>";
   echo "<script>window.open ('rgister.php','_self')</script>";
}

}

  
?>

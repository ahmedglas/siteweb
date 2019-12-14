<?php 
session_start();
if (!isset($_SESSION['email'])) {
   echo "<script>window.open('login.php','_self')</script>";
}else{

 ?>

<?php
  include'includes/functions.php';
   include('config/db.php');
  
if (isset($_POST['registeruser'])) {

  global $con;

  $nom = $_POST['nom'];

  $poste  = $_POST['poste'];

  $quartier = $_POST['quartier'];

  $avatar= $_FILES['avatar']['name'];
  $avatar_tmp = $_FILES['avatar']['tmp_name'];

  move_uploaded_file($avatar_tmp,"images/$avatar");

  $sex = $_POST['sex'];

  $numero = $_POST['numero'];

  $email  = $_POST['email'];

  $matricule = $_POST['matricule'];

  $password  = $_POST['password'];
  

  

//connect to MYSQL
    
    
    $con = mysqli_connect('localhost','root','','projet');
  

    include('config/bd.php');
  
   $insert = " INSERT INTO users (nom, poste, quartier,avatar, sexe, numero, email, matricule, password) VALUES('$nom','$poste','$quartier','$avatar','$sex','$numero','$email','$matricule','$password')";

   $run = mysqli_query($con, $insert);

  
if ($run) {
   echo "<script>alert('Utilisateur ajouté avec succés!')</script>";
   echo "<script>window.open('liste.php','_self')</script>";
   

}else{
  echo "<script>alert('Echec d'Enregistrement!')</script>";
   echo "<script>window.open('ajoute.php','_self')</script>";

}

}  
?>

<?php } ?>
     



<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="La technologie en global">
    <meta name="author" content="projet L3 Informatique">

    

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
    
  <?php require'includes/functions.php';
  require('includes/_alert.php');
  require('includes/_flash.php');
 require('config/bd.php');

   ?>

   <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php"><i class="fa fa-database" aria-hidden="true"></i>Systeme de gestion <?php $a = "> Ajouter un utilisateur"; echo " $a ";?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">
                        <li style="padding-top: 10px;">
             <form action="search.php" method="GET" enctype="multipart/form-data">
                   <input style="border: solid 1px #001a33; border-radius: 3em;" type="search" name="supprimer" placeholder="search">

                   <button style="background-color: #001a33; color: white; width: 30px; height: 30px; border: solid 0.5px #001a33; border-radius: 100%;" type="submit" name="search" value="search"><i class="fa fa-search" aria-hidden="true"></i></button>
              </form> 
            </li>
            <li><a href=""><b><?php date_default_timezone_set('UTC'); echo date('<em>l F Y h:i:s A<em>');?></b></a>
              <li><a href="logout.php"><b><i class="fa fa-sign-out" aria-hidden="true"></i>Deconnexion</b></a></li>
          </ul>
          
        </div><!--/.nav-collapse -->
      </div>
    </nav>

<div  class="container">
  <p style="text-align: center; color: #004d99 !important;">Enregistrement d'un Utilisateur <img src="icons/user1.png" alt="user1" width=""></h1><br></p>
  <hr>
    <?php include'dashboard.php'; ?>
<div class="col-sm-11 col-sm-offset-0">
              
                <div  style="border: solid 1px #004d99;"  class="panel panel-default">
                <div  style="border: solid 1px #004d99 ;"  class="panel-heading ">
                 <h5 style="text-align: center;"><a style="float: left; color: white; font-size: 15px;" href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i> Retour</a> Ajouter un utilisateur <i class="fa fa-plus-circle" aria-hidden="true"></i><br></h5>
               </div>
                <hr>
                 <div id="main-content">

      <div class="container">

        <div class="row">
       
          <div class="col-sm-7 col-sm-offset-2">
              <div class="panel panel-default">
               <div class="panel-heading">
                <h3 style="text-align:center;" class="panel-title"><b>formulaire d'indcription</b></h3>
            
              </div>
            <div class="panel-body">
      
                <!--nom-->
           <form data-parsley-validate method="post" enctype="multipart/form-data">
             <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label" for="nom" >Nom<span class="text-danger">*</span></label>
                  <input type="text" placeholder="nom..." name="nom" id="nom" class="form-control" value="" required="required">
                </div>
                
              </div>
                  <!--vile-->
             
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label" for="poste" >Poste<span class="text-danger">*</span></label>
                  <input type="text" placeholder="post..." name="poste" id="poste" value="" class="form-control" required="required">
                </div>
                
              </div>
               
             </div>
              
             
             <div class="row">
               <div class="col-md-6">
                 <div class="form-group">
                   <label for="avatar">Avatar utilisateur</label>
                   <input type="file" name="avatar" id="avatar" >
                 </div>
               </div>
             </div>
             <!--vile-->
             <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label" for="quartier" >Quartier<span class="text-danger">*</span></label>
                  <input type="text" placeholder="quartier..." name="quartier" id="quartier" value="" class="form-control" required="required">
                </div>
                
              </div>

               <!--sex-->
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label" for="sex" >Sexe<span class="text-danger">*</span></label>
                  <select name="sex" id="sex" class="form-control" required="required">
                    <option>
                      Homme
                    </option>
                    <option>
                      Femme
                    </option>
                  </select>
                </div>
              </div>
              
               
             </div>


               <!--twitter-->
             <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label" for="numero" >Numero<span class="text-danger">*</span></label>
                  <input type="text"  name="numero" id="numero" value="" class="form-control" placeholder="+33...">
                </div>
                
              </div>

               <!--github-->
             
              <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label" for="email" >Email<span class="text-danger">*</span></label>
                  <input type="email"  name="email" id="email" class="form-control" value="" placeholder="Exemple@uvsq.fr">
                </div>
                
              </div>
               
               
             </div>
         <!--disponibilites-->
             <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                
                  <label class="control-label" for="matricule" >Matricule<span class="text-danger">*</span></label>
                    <input type="text"  name="matricule" id="matricule" value="" class="form-control" placeholder="matricule" />
              
                </div>
                
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                
                  <label class="control-label" for="matricule" >Password<span class="text-danger">*</span></label>
                    <input type="password"  name="password" id="password" value="" class="form-control" placeholder="******" />
              
                </div>
                
              </div>

              
               
             </div>


              <!--vile-->
             
             <input style="background-color: #004d99; border : #004d99;" type="submit" class="btn btn-primary" value="valider" name="registeruser">
              <input style="background-color: #004d99; border : #004d99; float: right;" type="reset" class="btn btn-primary" value="actualiser">
           </form> 

          </div>
          
        </div>
            
          </div>
      

        </div>
      
     </div><!-- /.container -->

       
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

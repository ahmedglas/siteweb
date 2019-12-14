
<?php 

// si le user est connecté sur la page
session_start();
if (!isset($_SESSION['email'])) {
   echo "<script>window.open('login.php','_self')</script>";
}else{

 ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="La technologie en global">
    <meta name="author" content="Projet L3 Informatique">

    
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
 require('config/db.php');

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
          <a class="navbar-brand" href="index.php"><i class="fa fa-database" aria-hidden="true"></i>Système de Gestion > lister les articles</a>
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
  <p style="text-align: center; color: #004d99 !important;"><a style="color: #004d99 ; float: left;" href="index.php"><i class="fa fa-arrow-left" aria-hidden="true"></i>RETOUR</a> voir tout les articles  
  
  </p>
  <br>
  <?php include'dashboard.php'; ?>
     <div class="col-sm-11 col-sm-offset-0">
              
                <div  style="border: solid 1px white;"  class="panel panel-default">

        <div id="main-content">

       
          <div class="row">
           
       
  <table class="table table-sm">
   <thead>
      <tr align="center" style="background-color: #004d99; color: white;">
      <th scope="col">Numero</th>&nbsp;
      <th scope="col">id_article</th>&nbsp;
      <th scope="col">Description</th>&nbsp;
      <th scope="col">Marque</th>&nbsp;&nbsp;
      <th scope="col">Image</th>&nbsp;
      <th scope="col">Categorie</th>&nbsp;
      <th scope="col">Fournisseur</th>&nbsp;
      <th scope="col">Prix</th>&nbsp;
      <th scope="col">Remise</th>&nbsp;
      <th scope="col">TTC</th>&nbsp;
      <th scope="col">Modifier</th>&nbsp;
      <th scope="col">Supprimer</th>&nbsp;
    </tr>
  </thead>
  <tbody>
     <?php
     include('config/bd.php');

     $get_pro = "select * from article";

     $run_pro = mysqli_query($con, $get_pro);


     $i = 0;
     while ($row_pro=mysqli_fetch_array($run_pro)) {

      $id_article = $row_pro['id_article'];
      $description = $row_pro['artdesc'];
      $marque = $row_pro['marque'];
      $avatar = $row_pro['image'];
      $categorie = $row_pro['categorie'];
      $fournisseur = $row_pro['id_fournisseur'];
      $prix = $row_pro['prix'];
      $remise = $row_pro['remise'];
      $ttc = $row_pro['ttc'];
      

      $i ++;
     




      ?>

    <tr align="left">
      <td scope="row"><span style="background-color:#004d99;" class="badge" ><?php echo $i; ?></span></td>
      <td><?php echo $id_article; ?></td>
      <td><?php echo $description; ?></td>

      <td><span class="badge"><?php echo $marque; ?></span></td>
        <td><a href="profil.php?profil_views=<?php echo $article_id?>"><img style="border-radius: 100%;" src="image_article/<?php echo $avatar; ?>" width="60" height="60"/></a></td>
        <td><?php echo $categorie; ?></td>
      <td><?php echo $fournisseur; ?></td>
      <td><?php echo $prix; ?></td>
      <td><?php echo $remise; ?></td>
      <td><?php echo $ttc; ?></td>   
      <td><li class="list-group-item"><a  href="modifie_article.php?mdfa=<?php echo $id_article; ?>" style="text-align: center;"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></h1></a></li></td>
      <td><li class="list-group-item"><a  href="supprimer_article.php?mdfa=<?php echo $id_article; ?>" style="text-align: center;"><i class="fa fa-trash" aria-hidden="true"></i></h1></a></li></td>
    </tr>


    <?php } ?>
    </tbody>
</table>
           
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
                <p style="color:#004d99; text-align: center;"  >Site pour le projet de BD L3 Informatique  </p></marquee>
            </div>
         
        </div>  
         
         
    
      </body>
      </html>


<script src="libs/parsley.min.js"></script>
</body>
</html>



<?php } ?>
     


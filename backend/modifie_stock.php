
    <?php
     include('config/bd.php');
    $con = mysqli_connect('localhost','root','','projet');
     $id_article = $_GET['mstk'];

    

     $get_pro = "SELECT * from stock_article where id_article='$id_article'";

     $run_pro = mysqli_query($con, $get_pro);


     $i = 0;

     while($row_pro = mysqli_fetch_array($run_pro)) {

     $capacite = $row_pro['id_capacite'];

     $couleur  = $row_pro['id_couleur'];
 
     $article = $row_pro['id_article'];

     $quantite = $row_pro['qte'];

     $description = $row_pro['description'];


      $i ++;
 
      ?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="La technologie en global">
    <meta name="author" content="L3 projet">

    

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
          <a class="navbar-brand" href="index.php"><i class="fa fa-database" aria-hidden="true"></i>Système de gestion> Modification</a>
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
    
     <div id="main-content">

      <div class="container">
        <div class="row">
       
          <div class="col-sm-7 col-sm-offset-2">
              <div class="panel panel-default">
               <div class="panel-heading">
                <h3 style="text-align:center;" class="panel-title"><b>mise à jours des infos des articles</b></h3>
            
              </div>
            <div class="panel-body">
      
                <!--nom-->
               <form data-parsley-validate method="post"  enctype="multipart/form-data">
             <div class="row">
                 <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label" for="capacite" >Capacite<span class="text-danger">*</span></label>
                  <select name="capacite" id="capacite" type="text"  class="form-control" value="" required="required">
                    <option><?php echo"$capacite"; ?></option>
                        <?php
                        try
                        {
                          $con= new PDO('mysql:host=localhost;dbname=projet;charset=latin1','root','');
                        }
                        catch (Exception $e)
                        {
                          die('Erreur : ' . $e->getMessage());
                        }
                        $reponse = $con->query('SELECT id_capacite,taille FROM capacite');
                         
                        while ($donnees = $reponse->fetch())
                        {
                        ?>
                        <option value=<?php echo $donnees['id_capacite'];?>><?php echo $donnees['taille'];?></option>
                         
                        <?php 
                        }
                         
                        ?>

                  </select>
                </div>
              </div>
                
              </div>
                    <div class="col-sm-6">
                <div class="form-group">
                  <label class="control-label" for="couleur" >Couleur<span class="text-danger">*</span></label>
                  <select name="couleur" id="couleur" type="text"  class="form-control" value="" required="required">
                    
                        <?php
                        try
                        {
                          $con= new PDO('mysql:host=localhost;dbname=projet;charset=latin1','root','');
                        }
                        catch (Exception $e)
                        {
                          die('Erreur : ' . $e->getMessage());
                        }
                        $reponse = $con->query('SELECT id_couleur,couleur FROM couleur');
                         
                        while ($donnees = $reponse->fetch())
                        {
                        ?>
                        <option><?php echo$donnees['couleur']?></option>
                        <option value=<?php echo $donnees['id_couleur'];?>><?php echo $donnees['couleur'];?></option>
                         
                        <?php 
                        }
                         
                        ?>

                  </select>
                </div>
              </div>
              
               
             </div>

             <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label" for="couleur" >Article<span class="text-danger">*</span></label>
                  <select name="article" id="article" type="text"  class="form-control" value="" required="required">
                    <option><?php echo"$article"; ?></option>
                        <?php
                        try
                        {
                          $con= new PDO('mysql:host=localhost;dbname=projet;charset=latin1','root','');
                        }
                        catch (Exception $e)
                        {
                          die('Erreur : ' . $e->getMessage());
                        }
                        $reponse = $con->query('SELECT id_article,artdesc FROM article');
                         
                        while ($donnees = $reponse->fetch())
                        {
                        ?>
                        <option value=<?php echo $donnees['id_article'];?>><?php echo $donnees['artdesc'];?></option>
                         
                        <?php 
                        }
                         
                        ?>

                  </select>
                </div>
              </div>
              
         
        

             
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label" for="quantite" >Quantite<span class="text-danger">*</span></label>
                  <input type="text"  name="quantite" id="quantite" value="<?php echo"$quantite"; ?>" class="form-control" placeholder="0">
                </div>
                
              </div>

               <!--github-->
             
              <div class="col-sm-12">
                <div class="form-group">
                  <label class="control-label" for="description" >Description<span class="text-danger">*</span></label>
                  <input type="text"  name="description" id="description" class="form-control" value="<?php echo"$description"; ?>" placeholder="Description">
                </div>
                
              </div>
               
               
             </div>
      
              <!--vile-->
             
             <input style="background-color: #004d99; border : #004d99;" type="submit" class="btn btn-primary" value="mettre à jour" name="update">
              
           </form> 

             <?php
     include('config/bd.php');
   if (isset($_POST['update'])) {
     

      $id_article = $_GET['mstk'];
      $capacite = $_POST['id_capacite'];
      $couleur = $_POST['id_couleur'];
      $article = $_POST['id_article'];
      $quantite = $_POST['quantite'];
      $description = $_POST['description'];
     
    

     $get_update = "UPDATE stock_article SET id_capacite='$capacite', id_couleur='$couleur', id_article='$article', qte='$quantite', description = '$description',  WHERE id_article='$id_article'";

     $run_update = mysqli_query($con, $get_update);

   if ($run_update) {

  echo "<script>alert('mise à jour avec succè!')</script>";
  echo "<script>window.open('liste_stock.php','_self')</script>";
}else{
  printf("Errormessage: %s\n", $con->error);
  echo "<script>alert('fail')</script>";
 

       }
 }
      ?>

          </div>
          
        </div>
            
          </div>
      

        </div>
      
     </div><!-- /.container -->

       
   </div>
    <?php } ?>
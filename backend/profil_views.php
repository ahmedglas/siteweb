    <?php
     include('config/bd.php');
   
     $id_article = $_GET['profil_views'];

     $get_pro = "SELECT * from articles where id_article='$id_article'";

     $run_pro = mysqli_query($con, $get_pro);


     $i = 0;
     while ($row_pro = mysqli_fetch_array($run_pro)) {

      $id_article = $row_pro['id_article'];
      $description = $row_pro['description'];
      $marque = $row_pro['marque'];
      $avatar = $row_pro['avatar'];
       $categorie = $row_pro['categorie'];
      $fournisseur = $row_pro['fournisseur'];
      $prix = $row_pro['prix'];
      $remise = $row_pro['remise'];
       $ttc = $row_pro['ttc'];
      
      

      $i ++;
 
      ?>
    
     <div id="main-content">

      <div class="container">
        <div class="row">
       
          <div class="col-sm-7 col-sm-offset-2">
              <div class="panel panel-default">
               <div class="panel-heading">
                <h3 style="text-align:center;" class="panel-title"><b>profil de <?php echo "$description"; ?></b></h3>
            
           </div>
          <div class="panel-body">
            
            	
            	<img class='imghov' style="border-radius: 100%;" src="image_article/<?php echo "$avatar"; ?>"  width='140' height='150'>

            	<hr>
            	
    
              <div class="row">
               <div class="col-sm-6">
                 <div class="form-group">
                   <b>Description:</b>     <?php echo "$description"; ?></br></br>
                   <hr>
                   <b>marque:</b>   <?php echo "$marque"; ?></br></br>
                   <hr>
                   </b><?php echo "$categorie"; ?>" target="_blank"><?php echo "$categorie"; ?></a></br></br>
                   <hr>
                   <b>Sex: </b>    <?php echo "$fournisseur"; ?></br></br>
                   <hr>
                  <a class="btn btn-info" href="modif.php?modifie_article=<?php echo $id_article ; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Editer</a>

               </div>
             </div>
             <!--vile-->
             <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                 <b>Prix:</b><?php echo "$prix"; ?>"><?php echo "$prix"; ?></a></br></br>
                 <hr>
                 <b>Remise<?php echo "$email"; ?>"><?php echo "$remise"; ?></a></br></br>
                 <hr>
                 <b>TTC:</b><?php echo "$ttc"; ?></br></br>
                 <hr>
                                 <hr>
                 <a class="btn btn-danger" href="supprim2.php?supprimer_article=<?php echo $id_article ; ?>"><i class="fa fa-trash" aria-hidden="true"></i> Supprimer</a>

                </div>
                
              </div>

              </div>
            </div>
          </div>
            
          </div>
      

        </div>
      
     </div><!-- /.container -->

       
   </div>
    <?php } ?>

      
  <?php
     include('config/bd.php');
   

     $get_pro = "SELECT * from fournisseur where id_fournisseur=id_fournisseur";

     $run_pro = mysqli_query($con, $get_pro);


     $i = 0;
     while ($row_pro = mysqli_fetch_array($run_pro)) {
      
      $nom = $fournisseur_modif['fournisseurname'];
    
      $i ++;
 
      ?>

         $fournisseurtel = $row_pro['fournisseurtel'];
       $fournisseuremail = $row_pro['fournisseuremail'];
       $fournisseuradr = $row_pro['fournisseuradr'];
      $fournisseurdesc = $row_pro['fournisseurdesc'];
      $fournisseur_modif = $row_pro['id_fournisseur'];
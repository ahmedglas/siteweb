<?php


require_once("./php/config/db.php");
session_start();
if (!isset($_SESSION['user_id']))
                        header('Location: page_login.php');
						
						
                         $user_id=$_SESSION['user_id']; 
                         $id_article= $_GET['id_article'];
                            $qte=$_GET['quantite'];
                            echo "hahahah".$qte
;						
						$sql = "INSERT into apartient values
                        ($id_article, ( SELECT commande_id from commande where etatcmd like 'en%' and user_id ='".$user_id."'),
                        $qte);";
                        $res = mysqli_query($con, $sql);
                        if($res){
                        header('Location: product-details.php?profil_views='.$id_article);

                        }else {echo "<script>alert(\" eurreur\")</script>";}
						
						
?>
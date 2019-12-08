<?php


// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {
    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");
} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("./php/libraries/password_compatibility_library.php");
}
 
// include the configs / constants for the database connection
require_once("./php/config/db.php");
session_start();

$check=$_SESSION['user_id'];
//$session= "SELECT user_id  FROM users WHERE id='$check' ";
//$db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (!empty($_POST['user_password_new'])
&& !empty($_POST['user_password_repeat'])
&& ($_POST['user_password_new'] === $_POST['user_password_repeat']))
{
    
    $user_password=$_POST['user_password_new'];
    $user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
    $mod = "UPDATE users SET user_password_hash='$user_password_hash' WHERE  user_id ='$check'";
    $run_pro = mysqli_query($con,$mod);
    
    
}
if (!empty($_POST['user_code_postale']))
{   $u=$_POST['user_code_postale'];
     $mod = "UPDATE users SET user_code_postale='$u' WHERE  user_id ='$check'";
    $run_pro = mysqli_query($con, $mod);
    if($run_pro) echo "succ";
    else echo "3asba";
    echo $u;
}
if(!empty($_POST['user_tel']))
{
    $t=$_POST['user_tel'];
    $mod = "UPDATE users SET user_tel='$t' WHERE  user_id ='$check'";
    $run_pro = mysqli_query($con, $mod);
   

}if(!empty($_POST['user_adresse']))
{
    
    $adr=$_POST['user_adresse'];
    $mod = "UPDATE users SET user_adresse='$adr' WHERE  user_id ='$check'";
    $run_pro = mysqli_query($con, $mod);
    

}
if ($run_pro) {

    echo "<script>alert('mise à jour avec succè!')</script>";
  }else{
    echo "<script>alert('fail')</script>";
   
  
         }
   


// show the register view (with the registration form, and messages/errors)
include("update_info.php");

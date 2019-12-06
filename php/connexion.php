<?php

//connect to MYSQL
$con = mysqli_connect('localhost','root','','projet');
//Test connexion 
if (mysqli_connect_errno()) {
	echo 'Failled to connect to MYSQL: '.$mysqli_connect_errno();
}

?>
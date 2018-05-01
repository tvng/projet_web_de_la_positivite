





<!-- TEST !!!!!!! A VOIR PLUS TARD DANS LE PROJET -->




<!-- Il suffit d'ajouter 
include ("database_co.php");
à votre .php  pour que ce code soit inséré
-->

<?php 
	$user_name = "root";
	$password = "";
	$database = "eceperanto";
    $server = "127.0.0.1";
   
    
    $db_handle=mysqli_connect($server,$user_name,$password);
    $db_found=mysqli_select_db($db_handle, $database);

    
?>
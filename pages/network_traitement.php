<?php
session_start();

      try
      {
          $bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
      }
      catch (Exception $e)
      {
          die('Erreur : ' . $e->getMessage());
      }

      $sql="INSERT INTO invitation (ID_user1, status1, invitation.text, ID_user2, status2) 
      VALUES('".$_SESSION['ID_user']."', '1', '".$_POST['txt']."' ,'".$_POST['id_user']."','0')";
      $bdd->exec($sql);
      echo "Demande envoyée!";
?>
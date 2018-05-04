<?
session_start();
?>

<?php
    //Envoie les demandes de contact de l'utilisateur
    if (isset($_POST['submit_'.$sl_data['ID_user']]))
    {
        $sql="INSERT INTO invitation(ID_user1, status1, text, ID_user2, status2) 
        VALUES('". $_SESSION['ID_user'] . "','" . 1 . "','" . $_POST['text'] . "','" . $sl_data['ID_user'] . "','" . 0 . "')";
        $bdd->exec($sql);
        echo "Demande envoyée!";
    }
?>
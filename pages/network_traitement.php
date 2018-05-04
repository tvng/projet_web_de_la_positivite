<?
session_start();
?>

<?php
    //Envoie les demandes de contact de l'utilisateur
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['User_'.$sl_data['ID_user']]))
    {
        $sql="INSERT INTO invitation(ID_user1, status1, text, ID_user2, status2) 
        VALUES('". $_SESSION['ID_user'] . "','" . 1 . "','" . $_POST['text'] . "','" . $sl_data['ID_user'] . "','" . 0 . "')";
        echo $sql;
        $bdd->exec($sql);
        echo "Demande envoyée!";
    }
?>
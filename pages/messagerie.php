<?php
session_start();
?>
<!DOCTYPE html>

<html lang="en">

<head>

    <title>ECE reseau</title>

    <!-- required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS autre -->
    <link href="global.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="//code.jquery.com/jquery.min.js"></script>
</head>

<body>
<header>
    <!-- MENU -->
    <?php include ("menu.php");?>
</header>

<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

//on va envoyer a job box les informations si l'offre a été accepté
$sql = "SELECT * FROM invitation INNER JOIN user ON ID_user1 = ID_user WHERE ID_user2 =" . $_SESSION['ID_user'];
$invitations = $bdd->query($sql);

while ($data = $invitations->fetch())
{
    include ("invitation.php");
}
$invitations->closeCursor();

?>
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

<nav class="navbar navbar-expand-lg fixed-top" style="background-color: #007179;">

    <img src="../resources/logo.png" class="navbar-brand" width="30px">
    <a class="navbar-brand" href="#">ECEperanto</a>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="form-inline mx-auto">
        <select class="form-control" name="action">
            <option value="ban">Bannissement</option>
            <option value="inscrire">Inscription</option>
        </select>
        <input type="submit" value="Admin" name="Admin" class="btn mr-sm-2"
    </form>
</nav>
</body>
</html>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Admin']))
{
    if($_POST['action'] == "inscription")
    {
        //aller vers l'inscription
        header("Location: inscription.php");
        exit();
    }
    if($_POST['action'] == "ban")
    {
        //aller vers le bannissement
        header("Location: bannissement.php");
        exit();
    }
}
?>


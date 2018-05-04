
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
    <!-- Informations à entrer pour se connecter -->
    <img src="../resources/logo.png" class="navbar-brand" width="30px">   
    <a class="navbar-brand" href="#">ECEperanto</a>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="form-inline mx-auto">
            <input type="text" name="email" class="form-control mr-sm-2" placeholder="e-mail" required>
            <input type="password" name="password"  class="form-control mr-sm-2" placeholder="mot de passe" required>
            <input type="submit" value="Connection" name="Connection" class="btn mr-sm-2">
        </form>

  
</nav>

    </body>
</html>

<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['Connection']))
{
    echo "CONNECTION !";
    $email = $_POST['email'];
    $mdp = $_POST['password'];
    echo $email.$mdp;
    //ouverture de la bdd
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    //on récupère le mot de passe du mail donné
    $instruct = $bdd->prepare('SELECT password FROM user WHERE email = ?');
    $colog = $instruct->execute(array($email));
    $coreussi = false;

    if($colog != null)
    {
        //on compare le mot de passe donné à celui du'on a récupéré
        $data = $instruct->fetch();
        $mdp_vrai=password_verify($mdp,$data['password']);

        if($mdp_vrai)
        {
            //si le mot de passe est le bon l'utilisateur peut maintenant se connecter
            $coreussi = true;
            $coid = $bdd->prepare('SELECT * FROM user WHERE email = ?');
            $coid->execute(array($email));

            $result = $coid->fetch();
            var_dump($_POST);

            $_SESSION['ID_user'] = $result['ID_user'];
            $_SESSION['name'] = $result['name'];
            $_SESSION['first_name'] = $result['first_name'];
            $_SESSION['pseudo'] = $result['pseudo'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['profile_pic'] = $result['profile_pic'];

            header("Location: home.php");
            exit();
        }
        else
        {
            echo "Mot de passe incorrect."."/br";
        }

    }
    else
    {
        echo "Identifiant inexistant."."/br";
    }
    $instruct->closeCursor();
}

include("inscription.php");
?>


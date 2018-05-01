<?php
if(isset($_POST['submit'])){
	// Required field names
	$required = array('email', 'passw');
	// Loop over field names, make sure each one exists and is not empty
	$error = false;
    foreach($required as $field) 
    {
        if (empty($_POST[$field])) 
        {
			$error = true;
			echo "Le champ ". $field. " est vide". "<br>";
			exit();
		}
	}
}
if (!$error) 
{		
    $_SESSION['firstName'] = $_POST['firstName'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email']; 
    $_SESSion['passw'] = $_POST['passw'];
    $_SESSION['pseudo'] = $_POST['pseudo'];
}
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

$colog = $bdd->prepare("INSERT INTO user (name, firstname, email, password, type, pseudo, creation_date) VALUES(" . $_POST['name'] . "," . $_POST['firstname'] . "," . $_POST['email'] . "," . password_hash($mdp,PASSWORD_DEFAULT) . "," . $_POST['type'] . "," . $_POST['pseudo'] . "," . date('Y-m-d') . ")");
echo "L'inscription est complète. Bienvenue sur ECEperanto !"
//partir sur la page d'accueil
?>
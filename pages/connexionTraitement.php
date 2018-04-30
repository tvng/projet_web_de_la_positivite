<?php
if(isset($_POST['submit'])){
	// Required field names
	$required = array('login', 'passw');
	// Loop over field names, make sure each one exists and is not empty
	$error = false;
    foreach($required as $field) 
    {
        if (empty($_POST[$field])) 
        {
			$error = true;
			echo "Le champ ". $field. " est vide". "<br>";
		}
	}
}
if (!$error) 
{		
	$user = $_POST['login']; 
	$mdp = $_POST['passw'];
}
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}

$colog = $bdd->prepare('SELECT mdp FROM table WHERE login = ?');
$bol = $colog->execute($user);
$coreussi = false;
if($bol != null)
{
	while($data = $colog->fetch())
	{
		if($data == $mdp)
		{
			$coreussi = true;
			$coid = $bdd->prepare('SELECT id FROM table WHERE mdp = ?');
			$id = $coid->execute($data);//attention il prendra le premier id qu'il trouve, s'il y deux comptes identiques on ne pourra jamais se connecter avec le deuxième
		}
		else
		{
			echo "Bah ça marche pas leul, c'est pas les bons identifiants."."/br";
		}
	}
}
else
{
	echo "Bah ça marche pas leul, ce login exite pas."."/br";	
}
$colog->closeCursor();
//TADA, on a plus qu'a recuperer les info de l'id qu'on a pour afficher les infos en permanence
?>
<?php
/*if(isset($_POST['email'])){
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
	$user = $_POST['email'];
	$mdp = $_POST['password'];
}
*/
$user = $_POST['email'];
$mdp = $_POST['password'];

if (isset($_POST['email']) || isset($_POST['password']))
{
	$user = $_POST['email'];
	$mdp = $_POST['password'];

	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}

	//on verifie que le mail est correct
	$colog = $bdd->prepare('SELECT password FROM user WHERE email = ?');
	$bol = $colog->execute(array($user));//Ca devrait pas juste être $user?
	$info = array();
	$coreussi = false;
	if($bol != null)
	{
		while($data = $colog->fetch())
		{
			if($data == password_hash($mdp,PASSWORD_DEFAULT))
			{
				$coreussi = true;
				$coid = $bdd->prepare('SELECT * FROM user WHERE password = ?');
				$info = $coid->execute(password_hash($mdp,PASSWORD_DEFAULT));//attention il prendra le premier id qu'il trouve, s'il y deux comptes identiques on ne pourra jamais se connecter avec le deuxième

				//Creating a session for the user who is connecting
				session_start();
				$_SESSION['ID_user'] = $info['ID_user'];
				$_SESSION['name'] = $info['name'];
				$_SESSION['first_name'] = $info['first_name'];
				$_SESSION['pseudo'] = $info['pseudo'];
				$_SESSION['email'] = $info['email'];

				echo $_SESSION['ID_user'];
				echo $_SESSION['name'];
				echo $_SESSION['first_name'];
				echo $_SESSION['pseudo'];
				echo $_SESSION['email'];
			}
			else
			{
				echo "Mot de passe incorrect."."/br";
			}
		}
	}
	else
	{
		echo "Identifiant inexistant."."/br";
	}
	$colog->closeCursor();
	//TADA, on a plus qu'a recuperer les info de l'id qu'on a pour afficher les infos en permanence
}
else
{
    echo "Les champs sont vides";
    echo var_dump($user);
    echo var_dump($mdp);
    echo var_dump($_POST);
    echo var_dump($_REQUEST);
}

?>
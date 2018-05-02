<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$user = $_POST['email'];
	$mdp = $_POST['password'];
	echo $user.$mdp;

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
		$data = $colog->fetch();
		$mdp_vrai=password_verify($mdp,$data['password']);

			if($mdp_vrai)
			{
				$coreussi = true;
				$coid = $bdd->prepare('SELECT * FROM user WHERE email = ?');
				$coid->execute(array($user));//attention il prendra le premier id qu'il trouve, s'il y deux comptes identiques on ne pourra jamais se connecter avec le deuxième

                $result = $coid->fetch();
                var_dump($_POST);

				$_SESSION['ID_user'] = $result['ID_user'];
				$_SESSION['name'] = $result['name'];
				$_SESSION['first_name'] = $result['first_name'];
				$_SESSION['pseudo'] = $result['pseudo'];
				$_SESSION['email'] = $result['email'];

				echo "ID USER : " .$_SESSION['ID_user'];
				echo "nom : " .$_SESSION['name'];
				echo "fnom : " .$_SESSION['first_name'];
				echo "pseu : " .$_SESSION['pseudo'];
				echo "mail : " .$_SESSION['email'];
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
	$colog->closeCursor();

	//On a plus qu'a recuperer les info de l'id qu'on a pour afficher les infos en permanence
}
else
{
    echo "Les champs sont vides";
    echo var_dump($user);
    echo var_dump($mdp);
    echo var_dump($_POST);
}

?>
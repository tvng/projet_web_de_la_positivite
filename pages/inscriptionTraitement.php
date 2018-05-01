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
//if ($error == false)
{

    /*
    $_SESSION['firstName'] = $_POST['firstName'];
    $_SESSION['name'] = $_POST['name'];
    $_SESSION['email'] = $_POST['email']; 
    $_SESSION['password'] = $_POST['password'];
    $_SESSION['pseudo'] = $_POST['pseudo'];
    */
}
$_POST['name']="Loul";
$_POST['firstname']="Loul1";
$_POST['email']="@riendutout";
$_POST['password']="test4";
$_POST['type']="etudiant";
$_POST['pseudo']="freezos";
try
{

    $bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
    $sql="INSERT INTO user (name, firstname, email, password, type, pseudo, creation_date, profile_pic, header_pic) 
        VALUES(" . $_POST['name'] . "," . $_POST['firstname'] . "," . $_POST['email'] . "," .
        password_hash($_POST['password'],PASSWORD_DEFAULT) . "," . $_POST['type'] . "," . $_POST['pseudo'] . "," . date('Y-m-d') . ", NULL , NULL)";
    $bdd->exec($sql);

    /*
    $coregister = $bdd->prepare("INSERT INTO user (name, firstname, email, password, type, pseudo, creation_date) VALUES(?,?,?,?,?,?,?)");
    $colog = $coregister->execute($_POST['name'],$_POST['firstname'],$_POST['email'], password_hash($_POST['password'],PASSWORD_DEFAULT),$_POST['type'],$_POST['pseudo'],date('Y-m-d'));
    */
    echo "L'inscription est complète. Bienvenue sur ECEperanto !";
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
//partir sur la page d'accueil
?>
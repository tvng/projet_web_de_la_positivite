<?
//deconnexion de la session puis redirection vers la connexion
session_start();

$_SESSION = array();


session_unset();
session_destroy();

echo "Tu devrais être redirigé sur la connexion.";
//header("localhost/projet_web_de_la_positivite/pages/connexion.php");
//exit;
header("Location: connexion.php");
exit();
?>

<!DOCTYPE html>
<a class="dropdown-item" href="connexion.php">Se déconnecter</a>

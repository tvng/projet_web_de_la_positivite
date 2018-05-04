<?
session_start();
session_unset();
session_destroy();
echo "Tu devrais être redirigé sur la connexion.";
//header("localhost/projet_web_de_la_positivite/pages/connexion.php");
//exit;
header("Location: connexion.php");
exit();
?>

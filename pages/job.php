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

</header>
- afficher les emplois dispos et la possibilite de postuler
<?php include ("menu.php");
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}

$instruct = "SELECT COUNT(ID_job) FROM job";
$number = $bdd->exec($instruct);
$taken = array();
$not_taken = array();

/*Alors mon idée c'etait de d'abord séparer les jobs pending de ceux qui ne le sont pas
ce que j'ai fait normalement il n'y a pas de problème la dessus
Le problème arrive la, puisque la bdd bouge en fonction des offres il faut réussir a faire un nb de boutons variables
qui envoie de trucs a la bdd
Donc le problème c'est
Nombre de boutons = valeur en php
Boutons = html
Instructions = php
Bonne chance a celui qui me lira
*/

for($id_job = 1; $id_job <= $number ; $id_job++)
{
    $applied = $bdd->prepare('SELECT ID_job FROM job_taken WHERE ID_job = ? AND ID_user = ?')
        $applied->execute(array($id_job, $SESSION["ID_user"]));
        $empty = $applied->fetch();
        if($empty = null)
        {
            //ca va en bas dans la liste de job pour lequelle on a pas applied
            array_push($not_taken, $id_job);
        }
        else
        {
            //ca va en haut dans la liste des pending jobs
            array_push($taken, $id_job);
        }
    }

//on peut découper mieux que ça mais pour l'instant ça devrait donner
foreach($taken as $id_taken)
{
    $sql = $bdd->prepare('SELECT * FROM job WHERE ID_job = ?');
    $sql->execute(array($id_taken));
    $info = $sql->fetch();
    echo "Vous attendez la réponse pour l'offre de " . $info['company'] . ".\n";
    echo "<input type=\"submit\" value=\"Annuler\" name=\"submit\" />";
}
echo "\n \n";
foreach($not_taken as $id_not_taken)
{
    $sql = $bdd->prepare('SELECT * FROM job WHERE ID_job = ?');
    $sql->execute(array($id_not_taken));
    $info = $sql->fetch();
    echo "Cette offre d'emploi vous est offerte par " . $info['company'] . ".\n";
    echo "Le " . $info['date_post'] . " à " . $info['time_post'] . ".\n";
    echo "Présentation : " . $info['text'] . ".\n";
    echo "<input type=\"submit\" value=\"Participer\" name=\"submit\" />";
}
?>



<footer></footer>
</body>

</html>
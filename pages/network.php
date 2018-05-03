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
  <?php include ("menu.php"); ?>
   

</header>


<br/>
- rechercher des gens et proposer de les ajouter en ami
<br />
- proposer de supprimer des amis  (additionnel)

<?php
    try {
		$bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
    }
		catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
    } 

    $friendlist = $bdd->query(
		"SELECT user.name, user.first_name, profile_pic FROM user where ID_user = 
		ANY (" ."SELECT ID_user1 as User 
		FROM connect_with WHERE ID_user2 =" . $_SESSION['ID_user'] . " 
		UNION 
		SELECT ID_user2 as User 
		FROM connect_with WHERE ID_user1 =" . $_SESSION['ID_user'] .")"
		 );
?>

<!-- RECHERCE D'AMI -->
<div class="container col-sm-8" >
	<h3>Rechercher une personne</h3>
	<form class="form-inline" method="POST">
    <input type="text" class="form-control" name="chercher_ami" placeholder="Search">
    <input type="submit" class="btn" value="Chercher">
	</form>
</div>





<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

}
?>





<!--  invitations           -->
<div class="container col-sm-8" >
	<h3>Mes invitations</h3>
		</div>

<!--  AFFICHAGE DES AMIS -->
<div class="container col-sm-8" >
	<h3>Mon reseau</h3>
<div class="card-columns">
<?php	
		 while ($fl_data = $friendlist->fetch() )
		{
			echo '<div class="card mx-auto text-center" style="width: 20vw;">';
			echo '<img src="' .$fl_data['profile_pic'] .'" class="card-img-top img-fluid">';
			echo   '<div class="card-img-overlay" style="background-color: rgba(255, 255, 255, 0.5);">
			<h3 class="card-title">'.$fl_data["name"].' '.$fl_data["first_name"].'</h3>
			<a href="#" class="btn btn-success">Voir le profil</a>
			<a href="#" class="btn btn-outline-success">Supprimer des amis</a>
			</div>';
			echo ""."</div>"; 
			
		}

?></div>
</div>

<footer></footer>
</body>


</html>
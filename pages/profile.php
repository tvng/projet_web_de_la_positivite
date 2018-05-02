<?php
	if (session_status() == PHP_SESSION_NONE)
	{
		//redirect
		//http://localhost/projet_web_de_la_positivite/pages/connexion.php
	}
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
 <!-- BDD -->
<?php
	try {
		$bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	} 
?>

	 <!-- Partie du haut : header + pp + prenom & cv etc -->
<div class="profile_top">
	<div class="profile_top_header">
	<?php 
		$header_sql = $bdd->query("SELECT header_pic, profile_pic, user.name AS uname, first_name, pseudo, user.type AS utype 
		FROM user WHERE ID_user=".$_SESSION['ID_user']);
		$header_data = $header_sql->fetch();
		echo '<img src="'.$header_data['header_pic'].'" class="img" alt="header"> ';
	?>
	</div>
	<div class="profile_top_pic_name">
		<div class="row">
			<div>
			<?php
			echo '<img src="'.$header_data['profile_pic'].'" class="img-thumbnail img-fluid profile_top_picture" alt="header"> ';
			?>
			</div>
			<div>
				<h3>
				<?php echo $header_data['uname']." ";
				echo $header_data['first_name']; 
				echo " (".$header_data['pseudo'].")";
				?></h3>	
				<h4>
				<?php echo $header_data['utype'];?> </h4>
			</div>
		</div>
	</div>
	<div class="profile_top_ribbon">
		<a href="#" class="btn btn-success" role="button">Afficher le CV</a>
		<a href="#" class="btn btn-success" role="button">Modifier le CV</a>
		<a href="settings.php" class="btn btn-success" role="button">Modifier le profil</a>
	</div>
</div>

	

 <!-- partie des posts -->
<br />


<div class="container">
	<h3>Votre experience</h3>
	<div class="row justify-content-center"><div class="col-lg-10 rounded p-2 experience_style">
	- Afficher l'experience -

	
	<a href="#" class="btn btn-success" role="button">ajouter un nouveau poste!</a>
	- on peut ajouter le poste dans un "modal" avec un form dedans -
	</div>
	</div>

</div>

<br />Tant qu'on y pense il faudrait rediriger le site vers connexion.php si ya pas de sessinon started 
<br/>(cf plus haut dans le code)
<br />
<br />
<div class="container">

	<h3>Publications</h3>

	
ORDER BY!!!!!!!!!!!!!!!!!!!!!!!!!!!! DATE
<br />
	+ AFFICHER LES POSTS PARTAGES 

	<?php
		
		$get_friends="SELECT ID_user1 as User FROM connect_with INNER JOIN connect_with ON ID_user2 =" . $_SESSION['ID_user'] .
			"UNION SELECT ID_user2 as UserFROM connect_with INNER JOIN connect_with ON ID_user1 =" . $_SESSION['ID_user'];

		
		$posts = $bdd->query("SELECT u1.name AS author_n, u1.first_name AS author_f_n,
		publication.date, publication.time, publication.text, publication.location, publication.emotion
		FROM publication
		INNER JOIN user u1 ON u1.ID_user = publication.ID_author
		WHERE ID_user=".$_SESSION['ID_user']);
		while ($data = $posts->fetch())
		{
			echo '<div class="row justify-content-center"><div class="col-lg-10 post_style rounded p-2">';
			include ("post.php");
			echo "</div></div><br />";
		}
	$posts->closeCursor();

	?>
</div>

<footer></footer>
</body>

</html>
<?php
session_start(); // On démarre la session AVANT toute chose
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
  <div><?php include ("menu.php"); ?>
   </div>

   <?php
   		try {
			$bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
		}
		catch (Exception $e)
		{
			die('Erreur : ' . $e->getMessage());
		} 
	?>
	
	<div class="profile_header">
		<?php 
			$header_sql = $bdd->query("SELECT header_pic FROM user WHERE ID_user=".$_SESSION['ID_user']);
			$header_data = $header_sql->fetch();
			echo '<img src="'.$header_data['header_pic'].'" class="img-fluid" alt="header"> ';
		?>
	</div>
	

</header>
<div class="container">
	<?php
		
		$get_friends="SELECT ID_user1 as User FROM connect_with INNER JOIN connect_with ON ID_user2 =" . $_SESSION['ID_user'] .
			"UNION SELECT ID_user2 as User FROM connect_with INNER JOIN connect_with ON ID_user1 =" . $_SESSION['ID_user'];

		
		$posts = $bdd->query("SELECT u1.name AS author_n, u1.first_name AS author_f_n,
		publication.date, publication.time, publication.text, publication.location, publication.emotion
		FROM publication
		INNER JOIN user u1 ON u1.ID_user = publication.ID_author
		WHERE u1.ID_user =10");

		while ($data = $posts->fetch())
		{
			echo '<div class="container"><div class="row justify-content-center"><div class="col-lg-10 post_style rounded p-2">';
			include ("post.php");
			echo "</div></div></div><br />";
		}
	$posts->closeCursor();

	?>
</div>

<footer></footer>
</body>

</html>
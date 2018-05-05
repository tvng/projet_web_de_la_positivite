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

    <script src="http://code.jquery.com/jquery.min.js"></script>

	<script src="jquery.redirect.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('.go_to_pro').click(function(){
				
				
				var buttonValue = $(this).val();
				var id_btn =$("#p").attr("name") ;

				var ajaxurl = "profile2.php",
				data =  {'action': buttonValue,
				'id': id_btn,
				};
				
				$.post(ajaxurl, data, function (response) {
					// Response div goes here
					$.redirect('profile2.php', {'id': id_btn});
					
				})  

				
				.done(function( response ){
					delete id_btn;
				});
			});
		});
	</script>
	
	<script type="text/javascript">
	$(document).ready(function(){
		
		$('.add_friend').click(function(){
			var buttonValue = $(this).val();
			var id_btn =$("#p").attr("name") ;

			var ajaxurl = "network_traitement2.php",
			data =  {'action': buttonValue,
			'id_user': id_btn,
			'txt':txt};
			
			$.post(ajaxurl, data, function (response) {
				// Response div goes here.
				
			})  
			
			.done(function( response ){
			});
		});

	}); </script>
</head>

<body>
<header>
  <!-- MENU -->
  <?php include ("menu.php"); ?>
   

</header>


<?php
    try {
		$bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
    }
		catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
    } 

    
?>

<!-- RECHERCE D'AMI -->
<!--
<div class="container col-sm-8" >
	
	<h3>Rechercher une personne</h3>

	<form class="form-inline" method="POST">
    <input type="text" class="form-control" name="chercher_ami" placeholder="Search">
    <input type="submit" class="btn" name="chercher" value="Chercher">
	</form>

	<div class="card-columns">-->
	<?php
	/*
	if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['chercher']))
	{
		//si recherche vide
		if ($_GET['chercher_ami'] === "")
		{
			//rien
		}
		//sinon on a mis une valeur, il faut alors chercher tt les gens avec un prenom comme ca
		else {
			$sl = $bdd->query(" SELECT ID_user, first_name, user.name, user.profile_pic
			FROM user
			WHERE 
			(first_name LIKE '".$_GET['chercher_ami']."%' OR user.name LIKE '".$_GET['chercher_ami']."%' )
			AND ID_user <> ALL (" ."SELECT ID_user1 as User 
			FROM connect_with WHERE ID_user2 =" . $_SESSION['ID_user'] . " 
			UNION 
			SELECT ID_user2 as User 
			FROM connect_with WHERE ID_user1 =" . $_SESSION['ID_user'] .")
			");
		
			while ($sl_data = $sl->fetch())
			{
				echo '<div class="card mx-auto text-center" style="width: 20vw;">';
				echo '<img src="' .$sl_data['profile_pic'] .'" class="card-img-top img-fluid">';
				echo   '<div class="card-img-overlay" style="background-color: rgba(255, 255, 255, 0.5);">
                    <h3 class="card-title">'.$sl_data["name"].' '.$sl_data["first_name"].'</h3>
                    <form action="" method="post">
                        <input type="text" name="text" placeholder="Présentez vous"><br>
                        <input type="submit" name="User_'. $sl_data['ID_user'] .'" value="Envoyer">
                    </form>
				</div>';

                include ("network_traitement.php");
			//	<a href="" id="'.$sl_data['ID_user'].'" onclick="gotoprofile(this)" name="gotoprofile" class="btn">Voir le profil</a>
			//	<a href="" id="'.$sl_data['ID_user'].'" onclick="add(this)" name="add" class="btn">Ajouter un ami</a>
				echo ""."</div>";

			}
		}

	}
	?>

	*/

/*
	$sql="SELECT ID_user, first_name, user.name, user.profile_pic FROM user WHERE 
	ID_user <> ALL ("."SELECT ID_user1 as User 
	FROM connect_with WHERE ID_user2 =" . $_SESSION['ID_user'] . " 
	UNION 
	SELECT ID_user2 as User 
	FROM connect_with WHERE ID_user1 =" . $_SESSION['ID_user'].")";
$sl=$bdd->query($sql);

while ($sl_data = $sl->fetch()) {
	echo '<div class="card mx-auto text-center" style="width: 20vw;">';
	echo '<img src="' . $sl_data['profile_pic'] . '" class="card-img-top img-fluid">';
	echo '<div class="card-img-overlay" style="background-color: rgba(255, 255, 255, 0.5);">
		<h3 class="card-title">' . $sl_data["name"] . ' ' . $sl_data["first_name"] . '</h3>
		<form action="" method="post">
			<input type="text" name="text" placeholder="Présentez vous"><br>
			<input type="submit" name="submit_' . $sl_data['ID_user'] . '" value="Envoyer">
		</form>
	</div>';

	include("network_traitement.php");
	echo "" . "</div>";
}*/
?>

<!--

	</div>
</div>
-->
<!-- RECHERCE D'AMI -->

<div class="container col-sm-8" >
	
	<h3>Rechercher une personne</h3>

	<form class="form-inline" method="GET">
    <input type="text" class="form-control" name="chercher_ami" placeholder="Search">
    <input type="submit" class="btn" name="chercher" value="Chercher">
	</form>

	<div class="card-columns">
		<?php
		
		if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['chercher']))
		{
			//si recherche vide
			if ($_GET['chercher_ami'] === "")
			{
				//rien
			}
			//sinon on a mis une valeur, il faut alors chercher tt les gens avec un prenom comme ca
			else {
				$sl = $bdd->query(" SELECT ID_user, first_name, user.name, user.profile_pic
				FROM user
				WHERE 
				(first_name LIKE '%".$_GET['chercher_ami']."%' OR user.name LIKE '%".$_GET['chercher_ami']."%' )
				AND ID_user <> ALL (" ."SELECT ID_user1 as User 
				FROM connect_with WHERE ID_user2 =" . $_SESSION['ID_user'] . " 
				UNION 
				SELECT ID_user2 as User 
				FROM connect_with WHERE ID_user1 =" . $_SESSION['ID_user'] .")
				");
			
				while ($sl_data = $sl->fetch())
				{
					echo '<div class="card mx-auto text-center" style="width: 20vw;">';
					echo '<img src="' .$sl_data['profile_pic'] .'" class="card-img-top img-fluid">';
					echo   '<div class="card-img-overlay" style="background-color: rgba(255, 255, 255, 0.5);">
					<h3 class="card-title">'.$sl_data["name"].' '.$sl_data["first_name"].'</h3>   
					<form>     
					<input id="t" type="text" class="text_ami" name="text_ami">       
                        <input id="a" type="submit" class="add_friend" name="'. $sl_data['ID_user'] .'" value="Ajouter en ami">
						</form></div>';
						echo ""."</div>";

				}
			}

		}
		?>
	</div>
</div>




<!--  AFFICHAGE DES AMIS -->
<div class="container col-sm-8" >
	<h3>Mon reseau</h3>
<div class="card-columns">
<?php	

		$friendlist = $bdd->query(
		"SELECT user.ID_user, user.name, user.first_name, profile_pic FROM user where ID_user = 
		ANY (" ."SELECT ID_user1 as User 
		FROM connect_with WHERE ID_user2 =" . $_SESSION['ID_user'] . " 
		UNION 
		SELECT ID_user2 as User 
		FROM connect_with WHERE ID_user1 =" . $_SESSION['ID_user'] .")
		"
		 );

		 

		 while ($fl_data = $friendlist->fetch() )
		{
			echo '<div class="card mx-auto text-center" style="width: 20vw;">';
			echo '<img src="' .$fl_data['profile_pic'] .'" class="card-img-top img-fluid">';
			echo   '<div class="card-img-overlay" style="background-color: rgba(255, 255, 255, 0.5);">
			<h3 class="card-title">'.$fl_data["name"].' '.$fl_data["first_name"].'</h3>
			<form method="post">
			<input id="p" type="submit" class="go_to_pro" name="'.$fl_data['ID_user'].'" value="Voir le profil">
			<input class="btn" type="submit" value="Supprimer des amis" name="del_'.$fl_data['ID_user'].'">
			</form></div>';
			
			echo ""."</div>"; 

			if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['del_'.$fl_data['ID_user']])){
				//Faire en sorte que le gars postule avec sql
				//Du coup est ce qu'on fait un div légèrement différent pour les jobs auquel le gars a déjà postulé?
				$sql="DELETE FROM connect_with 
				WHERE (ID_user1 ='".$fl_data['ID_user']."' AND ID_user2 ='".$_SESSION['ID_user']."' )
				OR (ID_user1='".$_SESSION['ID_user']."' AND ID_user2='".$fl_data['ID_user']."') 
				";
				$bdd->exec($sql);
				echo '<div class="alert alert-success" role="alert">Vous avez supprimé cet ami </div>';
			}
		
		}
	

?></div>
</div>

<footer></footer>
</body>


</html>
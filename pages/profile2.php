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
 $idd=$_POST["id"];
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
<?php 
		$header_sql = $bdd->query("SELECT header_pic, profile_pic, CV_link, user.name AS uname, first_name, pseudo, user.type AS utype 
		FROM user WHERE ID_user=".$idd);
		$header_data = $header_sql->fetch();
		//echo '<img src="'.$header_data['header_pic'].'" class="img" alt="header"> ';
		echo '<div class="profile_top_header" style="background-image:url('.$header_data['header_pic'].')">';
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
	<div class="row justify-content-center">
        <!--<object data="Henri%20Verclytte%20CV.pdf" height="900" width="600"></object>-->
		<a href="<?php echo $header_data['CV_link'];?>"class="btn btn-success" role="button" target="_blank">Afficher le CV</a>
	</div>
	</div>
</div>

	

 <!-- partie des posts -->
<br />


<div class="container">

	<div class="row justify-content-center">
	<div class="col-lg-7">
	
	<h3>Mes publications</h3>
	
	<?php
		
		$get_friends="SELECT ID_user1 as User FROM connect_with INNER JOIN connect_with ON ID_user2 =" .$_POST['id'].
			"UNION SELECT ID_user2 as UserFROM connect_with INNER JOIN connect_with ON ID_user1 =" . $_POST['id'];

		
		$posts = $bdd->query("SELECT u1.name AS author_n, u1.first_name AS author_f_n, u1.profile_pic,
		publication.ID_post, publication.date, publication.time, publication.text, publication.location, publication.emotion, publication.media_link, publication.nb_like
		FROM publication
		INNER JOIN user u1 ON u1.ID_user = publication.ID_author
		WHERE ID_user=".$idd."
		ORDER BY publication.date DESC, publication.time DESC");

		echo '<div class="col-md-12">';
		while ($data = $posts->fetch())
		{
			include ("post2.php");
		}
		echo '</div>';
	$posts->closeCursor();


    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_CV'])){
        if (empty($_FILES["CV"]["tmp_name"])){
            //no file
            $target_file=" ";
        }
        else {
            $target_dir = "user".$idd;
            if (!is_dir($target_dir))
                mkdir($target_dir);

            $target_dir = $target_dir."/profile/";
            if (!is_dir($target_dir))
                mkdir($target_dir);

            $target_file = $target_dir . basename($_FILES["CV"]["name"]);
            //Petit test pour s'assurer qu'on créer le bon fichier
            echo $target_file."<br>";

            //Tests d'intégrité du fichier (taille, type, non doublon etc)
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            if($fileType != "pdf") {
                echo "Sorry, only pdf files are allowed.";
                $uploadOk = 0;
            }

            if (move_uploaded_file($_FILES["CV"]["tmp_name"], $target_file) && $uploadOk!== 0) {
                echo "The file ". basename( $_FILES["CV"]["name"]). " has been uploaded.";
            }
        }

        $sql="UPDATE user SET CV_link = '".$target_file. "' WHERE ID_user = " .$idd;
        //echo $sql;
        $bdd->exec($sql);
    }
	?>
	</div></div>
</div>

<footer></footer>
</body>

</html>
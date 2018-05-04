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
<?php include ("menu.php");?>
</header>
<div class="container pb-2">
<div class="row justify-content-center ">
    <div class="col col-lg-7 "><div class="post_job p-3 rounded">
    <h3>Déposer une offre d'emploi:</h3>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

            <label> Description :  </label><input class="form-control" type="text" name="text" required><br>
            <label> Entreprise :  </label><input class="form-control" type="text" name="company" required><br>
            <input class="btn" type="submit" value="Valider" name="submit"><br>
        </form>
    </div></div>
</div>
</div>


<div class="container pb-2">
<div class="row justify-content-center ">
    <div class="col col-lg-7 ">
<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }

    //on va envoyer a job box les informations si l'offre a été accepté
    $sql = "SELECT DISTINCT job.ID_job, author, company, date_post, time_post, text, name, first_name
    FROM job INNER JOIN user ON job.author = user.ID_user INNER JOIN apply_to ON job.ID_job = apply_to.ID_job WHERE apply_to.ID_user = ".$_SESSION['ID_user'];
    $jobs_applied = $bdd->query($sql);

    $applied_to_job=true;
    while ($data = $jobs_applied->fetch())
    {
        include ("job_box.php");
    }
    $jobs_applied->closeCursor();

//on va envoyer a job box les informations si l'offre n'a pas été accepté
    $sql="SELECT * FROM job INNER JOIN user ON job.author = user.ID_user WHERE ID_job <> ALL(SELECT DISTINCT job.ID_job 
    FROM job INNER JOIN apply_to ON job.ID_job = apply_to.ID_job WHERE apply_to.ID_user = ".$_SESSION['ID_user'].")";
    $jobs_to_take = $bdd->query($sql);

    $applied_to_job=false;
    while ($data = $jobs_to_take->fetch())
    {
        include ("job_box.php");
    }
    $jobs_to_take->closeCursor();

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        $sql="INSERT INTO job (author, date_post, time_post, company, text) VALUES('".$_SESSION['ID_user']."','".date('Y-m-d')."','".date('h:i:s')
            ."','" . $_POST['company'] . "','". $_POST['text'] . "')";
        echo $sql;
        $bdd->exec($sql);
    }
?>
</div>
</div>
</div>



<footer></footer>
</body>

</html>
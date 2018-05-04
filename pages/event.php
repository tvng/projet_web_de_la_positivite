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

<div class="container pb-2">
    <div class="row justify-content-center ">
        <div class="col col-lg-7 "><div class="post_job p-3 rounded">

        <h4>Organiser un evenement</h4>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
            <label> Description :</label> <input class="form-control"  type="text" name="text" required>
            <label>Lieu : </label><input class="form-control" type="text" name="location" required><br>
            <div class="row">
            <div class="col">
            <label>Date : </label><input class="form-control" type="date" name="date" required><br>
            </div><div class="col"> 
            <label>Heure : </label><input class="form-control" type="time" name="time" required><br></div>
            </div>
            <input class="btn" type="submit" value="Valider" name="submit"><br>
        </form>
        </div></div>
    </div>
</div>

<div class="container pb-2">
<div class="row justify-content-center ">
    <div class="col col-lg-7 ">
    <br/>
    <h4>Evenements</h4>
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

    /*
    //Pour compter le nombre de events si jamais
    $test = "SELECT count(ID_event) FROM event";
    $test = $bdd->query($test);
    $number_of_events = $test->fetch();
    echo $number_of_events['count(ID_event)'];
    */

    $sql = "SELECT DISTINCT event.ID_event, author, date, time, location,date_post, time_post, text, name, first_name
        FROM event INNER JOIN user ON event.author = user.ID_user INNER JOIN participate ON event.ID_event = participate.ID_event WHERE participate.ID_user = ".$_SESSION['ID_user'];
    $events_applied = $bdd->query($sql);

    $applied_to_event=true;
    while ($data = $events_applied->fetch())
    {
        include ("event_box.php");
    }
    $events_applied->closeCursor();

    $sql="SELECT * FROM event INNER JOIN user ON event.author = user.ID_user WHERE ID_event <> ALL(SELECT DISTINCT event.ID_event 
        FROM event INNER JOIN participate ON event.ID_event = participate.ID_event WHERE participate.ID_user = ".$_SESSION['ID_user'].")";
    $events_to_take = $bdd->query($sql);

    $applied_to_event=false;
    while ($data = $events_to_take->fetch())
    {
        include ("event_box.php");
    }
    $events_to_take->closeCursor();

    //Ajout d'un événement
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
        $sql="INSERT INTO event (author, date_post, time_post, date, time, location, text) VALUES('".$_SESSION['ID_user']."','".date('Y-m-d')."','".date('h:i:s')
            ."','".$_POST['date'] . "','" . $_POST['time'] . "','". $_POST['location'] . "','". $_POST['text'] . "')";
        echo $sql;
        $bdd->exec($sql);
    }
?>
</div></div>
</div>

<footer></footer>
</body>

</html>
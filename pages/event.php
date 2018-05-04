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
<h3>Events (sur onglet de notification</h3>
 selon le cdc , notification = notif sur des evenements, donc evenement -> page notif ?

<br /> - ajouter un Events 
<br /> - afficher les events et bouton pour y participer
<div class="container">
 	<div id="event_box" class="col-lg-7 rounded p-1 mx-auto">
 	<h4> Mes evenements</h4><br/><br/>
    
    Vivamus dignissim Etiam nec diam at leo porttitor iaculis non nec nisi. 
    Etiam velit lacus, iaculis ac tempus quis, convallis eget elit. 
    Morbi rhoncus eleifend justo, et semper tellus lacinia in.
    Nulla posuere blandit quam ut dapibus.
    Suspendisse potenti. Etiam dapibus laoreet posuere.
    Proin dignissim justo sed nibh viverra vestibulum non a nulla. 
    Nullam feugiat venenatis dui, eget condimentum leo viverra ac.
    Nulla at augue sed augue porttitor fermentum ac eget urna. 
    Praesent egestas libero arcu. Mauris blandit vitae magna eu fermentum. 
    Cras ac purus sapien. Nunc ex leo, convallis id ornare a, scelerisque nec nunc. In rutrum dictum iaculis. Fusce arcu libero, ultrices at rhoncus in, lobortis at massa. Maecenas nec nisl sit amet justo laoreet luctus vel ultrices quam.
</div>
</div>


<div class="container">
 	<div id="event_box" class="col-lg-7 rounded p-1 mx-auto">
	<h4> Wow un evenement!!</h4>
    Vivamus dignissim Etiam nec diam at leo porttitor iaculis non nec nisi. 
    Etiam velit lacus, iaculis ac tempus quis, convallis eget elit. 
    Morbi rhoncus eleifend justo, et semper tellus lacinia in.
    Nulla posuere blandit quam ut dapibus.
    Suspendisse potenti. Etiam dapibus laoreet posuere.
    Proin dignissim justo sed nibh viverra vestibulum non a nulla. 
    Nullam feugiat venenatis dui, eget condimentum leo viverra ac.
    Nulla at augue sed augue porttitor fermentum ac eget urna. 
    Praesent egestas libero arcu. Mauris blandit vitae magna eu fermentum. 
    Cras ac purus sapien. Nunc ex leo, convallis id ornare a, scelerisque nec nunc. In rutrum dictum iaculis. Fusce arcu libero, ultrices at rhoncus in, lobortis at massa. Maecenas nec nisl sit amet justo laoreet luctus vel ultrices quam.
	</div>
</div>

<footer></footer>
</body>

</html>
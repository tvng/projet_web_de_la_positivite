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
  <div><?php include ("menu.php"); ?>
   </div>

</header>
<!-- AU MILIEU -->
<div class="container">

  <div class="row justify-content-center"><h4>Salut <?php echo $_SESSION['first_name']; ?> </h4></div>
  <div class="row justify-content-center">
  
    <div class="col-lg-7">
      <div class="row">
        <div id="publish_box" class="col-lg-12 rounded p-1 mb-2">
          <h4>Veux-tu publier quelque-chose ?</h4>
          <?php include ("publish.php"); ?>
        </div> 
        <br />
      </div>
      <div class="row">
        
        <?php
          try {
          $bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
          }
          catch (Exception $e)
          {
              die('Erreur : ' . $e->getMessage());
          }
          
          $posts = $bdd->query("SELECT u1.name AS author_n, u1.first_name AS author_f_n,
          publication.date, publication.time, publication.text, publication.location, publication.emotion
          FROM publication
          INNER JOIN user u1 ON u1.ID_user = publication.ID_author
          WHERE u1.ID_user =10");

          while ($data = $posts->fetch())
          {
            echo '<div class="col-lg-12 post_style rounded p-2">';
            include ("post.php");
            echo "</div><br />";
          }
          $posts->closeCursor();

        ?>

      </div>
    </div>
    
    <div id="event_box" class=" col-lg-4 rounded p-1"><h4> Wow un evenement!!</h4><br/><br/>
    

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

</div>

<footer></footer>
</body>

</html>
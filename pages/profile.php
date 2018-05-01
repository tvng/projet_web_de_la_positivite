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

<?php
 $user_name = "root";
    $password = "";
    $database = "eceperanto";
    $server = "127.0.0.1";

    $db_handle=mysqli_connect($server,$user_name,$password);
    $db_found=mysqli_select_db($db_handle, $database);

    $get_friends="SELECT ID_user1 as User FROM connect_with INNER JOIN connect_with ON ID_user2 =" . $_SESSION['ID_user'] .
        "UNION SELECT ID_user2 as User FROM connect_with INNER JOIN connect_with ON ID_user1 =" . $_SESSION['ID_user'];


    if(!$db_found){
        echo("database erreur");
    }
    else {
        echo(" test ???????????????????????");
        
        $sql="SELECT publication.text, u1.name AS author, u2.name AS utilisator
		FROM publication
		INNER JOIN user u1 ON u1.ID_user = publication.ID_author
		INNER JOIN post ON post.ID_post = publication.ID_post 
		INNER JOIN user u2 ON u2.ID_user = post.ID_user
		
		WHERE u2.ID_user =1";

		$res=mysqli_query($db_handle, $sql);
		while ($data = mysqli_fetch_assoc($res) )
		{
			include ("post.php");
			echo "<br />";
		}
	
	}
?>


<footer></footer>
</body>

</html>
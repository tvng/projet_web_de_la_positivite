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
<h3>Settings</h3>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" enctype="multipart/form-data">
    Enregistrer une photo de profile : <input type="file" name="profile_pic">
    <input type="submit" name="submit" value="Confirmer votre choix">
</form>

<form action="" method="post" enctype="multipart/form-data">
    Enregistrer une photo de fond : <input type="file" name="header_pic">
    <input type="submit" name="submit" value="Confirmer votre choix">
</form>

<footer></footer>
</body>

</html>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        //Test pour vérifier que le form fonctionnne
        /*
        var_dump($_FILES);
        var_dump($_POST);
        */
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }

        if (isset($_FILES["profile_pic"])){

            if (empty($_FILES["profile_pic"]["tmp_name"])){
                //no file
                $target_file=" ";
            }
            else {
                $target_dir = "user".$_SESSION['ID_user'];
                if (!is_dir($target_dir))
                    mkdir($target_dir);

                $target_dir = $target_dir."/profile/";
                if (!is_dir($target_dir))
                    mkdir($target_dir);

                $target_file = $target_dir . basename($_FILES["profile_pic"]["name"]);
                //Petit test pour s'assurer qu'on créer le bon fichier
                echo $target_file."<br>";

                //Tests d'intégrité du fichier (taille, type, non doublon etc)
                $uploadOk = 1;
                $check = getimagesize($_FILES["profile_pic"]["tmp_name"]);
                if($check !== false) {
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }
                    if (file_exists($target_file)) {
                        echo "Sorry, file already exists.";
                        $uploadOk = 0;
                    }
                } else {
                    echo "File is not an image.<br>";
                    $uploadOk = 0;
                }

                if (move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file) && $uploadOk!== 0) {
                    echo "The file ". basename( $_FILES["profile_pic"]["name"]). " has been uploaded.";
                }
            }

            $sql="UPDATE user SET profile_pic = '".$target_file. "' WHERE ID_user = " . $_SESSION['ID_user'];
            //echo $sql;
            $bdd->exec($sql);
        }
        else{
            echo "Champs profile vide";
        }

        if(isset($_FILES['header_pic'])){
            if (empty($_FILES["header_pic"]["tmp_name"])){
                //no file
                $target_file=" ";
            }
            else {
                $target_dir = "user".$_SESSION['ID_user'];
                if (!is_dir($target_dir)){
                    mkdir($target_dir);
                    $target_dir = $target_dir."/profile/";
                    if (!is_dir($target_dir))
                        mkdir($target_dir);
                }
                else{
                    $target_dir = $target_dir."/profile/";
                }

                $target_file = $target_dir . basename($_FILES["header_pic"]["name"]);
                //Petit test pour s'assurer qu'on créer le bon fichier
                echo $target_file."<br>";

                //Tests d'intégrité du fichier (taille, type, non doublon etc)
                $uploadOk = 1;
                $check = getimagesize($_FILES["header_pic"]["tmp_name"]);
                if($check !== false) {
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                        && $imageFileType != "gif" ) {
                        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                        $uploadOk = 0;
                    }
                    if (file_exists($target_file)) {
                        echo "Sorry, file already exists.";
                        $uploadOk = 0;
                    }
                } else {
                    echo "File is not an image.<br>";
                    $uploadOk = 0;
                }

                if (move_uploaded_file($_FILES["header_pic"]["tmp_name"], $target_file) && $uploadOk!== 0) {
                    echo "The file ". basename( $_FILES["header_pic"]["name"]). " has been uploaded.";
                }
            }

            $sql="UPDATE user SET header_pic = '".$target_file. "' WHERE ID_user = " . $_SESSION['ID_user'];
            //echo $sql;
            $bdd->exec($sql);
        }
        else{
            echo "Champs header vide";
        }
    }


?>
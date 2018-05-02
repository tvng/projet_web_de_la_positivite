<?
session_start();
?>

<form method="POST" action="">
<div class="container-fluid">
    <div class="row">
        photo video poste
        <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
    <div class="row">
    <textarea id="desc" class="form-control" placeholder="Description" required></textarea>
    </div>
    <!-- emoji -->
    <div class="row">
        <select id="mood" class="custom-select col-sm-3">
        <option selected>Mood</option>
        <option value="1">:)</option>
        <option value="2">:(</option>
        <option value="3">!!!!!!!!!!!</option>
        </select>

        <input id="place" type="text" class="form-control col-sm-3" placeholder="Lieu">
    
    </div>
    <!--
    <div class="row">

        <label>Visibilité : </label>
        <select class="custom-select col-sm-2 ">
        <option selected value="friends">Mes amis</option>
        <option value="everyone">Public</option>
        <option value="me">Moi uniquement</option>
        </select>

        
    
    </div>
    -->
    <input type="submit" class="btn" name="poster" value="poster" />
</div>
</form>

<?php
    /*
    // Check if image file is a actual image or fake image
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Code pour le fichier
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        echo $target_file;
        echo "Salut le test";
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        }
    }
    else{
        echo "Le submit passe pas";
    }
    */
    if (isset($_POST['poster'])){
        poster();
      }


function poster() {
    echo("POST DEBUG -----------------");
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
       die('Erreur : ' . $e->getMessage());
    }

        
    // On verifie que "description" est rempli, c'est le seul qui est nécessaire
    if (isset($_POST["desc"]) ){ 
        $description=$_POST["desc"];
        //$sql=  requete ici ;
    }
    else{
    }
    
}
?>


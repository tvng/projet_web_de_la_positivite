<form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
<div class="container-fluid">
    <div class="row pb-1">
    <textarea id="desc" name="Description" class="form-control" placeholder="Description" required></textarea>
    </div>

     <div class="row pb-1">
        <input type="file" name="fileToUpload" id="fileToUpload">
    </div>
    <!-- emoji -->
    <div class="row pb-1">
        <select id="mood" name="Emotion" class="custom-select col-sm-3">
        <option selected>Mood</option>
        <option value="happy">:)</option>
        <option value="sad">:(</option>
        <option value="excited">!!!!!!!!!!!</option>
        </select>

        <input id="place" name="Lieu" type="text" class="form-control col-sm-3" placeholder="Lieu">
    
    </div>
   
    <div class="row">
        <!-- Le visibilité correspond a qui peut voir le post -->
        <label>Visibilité :  </label>
        <select name="Visible" class="custom-select col-sm-2">
        <option selected value="Friends only">Mes amis</option>
        <option value="Everyone">Public</option>
        <option value="Myself only">Moi uniquement</option>
        </select>
        <input type="submit" class="btn" name="poster" value="poster" />
    </div>

</div>
</form>

<?php

    if (isset($_POST['poster'])){
        poster();
      }


function poster() {
    echo("POST DEBUG -----------------<br>");
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=eceperanto;charset=utf8', 'root', '');
    }
    catch (Exception $e)
    {
       die('Erreur : ' . $e->getMessage());
    }

    // On verifie que le champs "Description" est rempli, c'est le seul qui est nécessaire
    if (isset($_POST["Description"])){
        //Test pour vérifier que le form fonctionnne
        /*
        var_dump($_FILES);
        var_dump($_POST);
        */
        if (empty($_FILES["fileToUpload"]["tmp_name"])){
           //no file
           $target_file=" ";
        }
        else {
            $target_dir = "user".$_SESSION['ID_user'];
            if (!is_dir($target_dir))
                mkdir($target_dir);

            $target_dir = $target_dir."/posts/";
            if (!is_dir($target_dir))
                mkdir($target_dir);

            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            //Petit test pour s'assurer qu'on créer le bon fichier
            echo $target_file."<br>";

            //Tests d'intégrité du fichier (taille, type, non doublon etc)
            $uploadOk = 1;
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
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

            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file) && $uploadOk!== 0) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            }
        }


        $sql="INSERT INTO publication(ID_author, date, time, visibility, location, emotion, text, media_link)
        VALUES ('" . $_SESSION['ID_user'] . "','" . date('Y-m-d') . "','"  . date('h:i:s') . "','" . $_POST['Visible'] . "','" . $_POST['Lieu'] . "','" .
        $_POST['Emotion'] . "','" . $_POST['Description'] . "','" . $target_file . "')";
        //echo $sql;
        $bdd->exec($sql);
    }
    else{
        echo "Description vide";
    }
    
}
?>


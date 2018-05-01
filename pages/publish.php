
<form method="POST" action="">
    <div class="row">
    photo video poste

    </div>

    <textarea id="desc" class="form-control" placeholder="Description" required></textarea>
  
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
</form>

<?php 
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


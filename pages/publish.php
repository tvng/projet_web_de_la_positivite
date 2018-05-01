
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
    <input type="submit" class="btn" value="Poster" onClick="poster()"/>
</form>

<?php 
function post() {
    echo("POST DEBUG -----------------");
    $user_name = "root";
    $password = "";
    $database = "eceperanto";
    $server = "127.0.0.1";

    $db_handle=mysqli_connect($server,$user_name,$password);
    $db_found=mysqli_select_db($db_handle, $database);

    if(!$db_found){
        echo("database erreur");
    }
    else {
        echo(" test ???????????????????????");
        
        // On verifie que "description" est rempli, c'est le seul qui est nécessaire
        if (isset($_POST["desc"]) ){ 
            $description=$_POST["desc"];
            //$sql=  requete ici ;
        }
        else{
        }
    }
}
?>


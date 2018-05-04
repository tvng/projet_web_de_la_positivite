<?
session_start();
?>

    <!-- Pour les propositions d'emplois
    on fait un seul modèle qui sera appelé plusieurs fois -->


<div class="job_box rounded p-3 mt-3">
        <?php
        echo '<h4 class="text-capitalize" style="margin:0px;">Evénement organisé par : '. $data["name"] . ' ' .$data["first_name"].'</h4>';
        echo "<p class='font-weight-light' style='margin:0px;'>Posté le " . $data["date_post"] . " à " . $data["time_post"] . "</p><br>";
        echo "Lieu : ".$data['location']." .". "<br>";
        echo "Date : " . $data["date"]." à " .$data["time"] . "<br>";
        echo "<br>Description : ".$data["text"]."<br />";

        if($applied_to_event == false){
            echo '<form action="" method="post">
                <input  class="btn" type="submit" value="Participer à cet événement" name="submit_'.$data['ID_event'].'">
              </form>';
        }
        else{
            echo '<button type="button" class="btn btn-secondary" disabled>Vous participez déjà à cet événement</button>';
        }
        ?>

    </div>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_'.$data['ID_event']])){
    //Faire en sorte que le gars postule avec sql
    //Du coup est ce qu'on fait un div légèrement différent pour les jobs auquel le gars a déjà postulé?
    $sql="INSERT INTO participate VALUES('" . $_SESSION['ID_user'] . "','" . $data['ID_event']."')";
    $bdd->exec($sql);
    echo '<div class="alert alert-success" role="alert">
    Vous participez maintenant à cet événement! </div>';
}

?>
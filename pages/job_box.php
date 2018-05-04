<?
session_start();
?>

<!-- Pour les propositions d'emplois
on fait un seul modèle qui sera appelé plusieurs fois -->

<div class="job_box rounded p-3 mt-3">
    <?php
     echo '<h3 class="text-capitalize" style="margin:0px;">Entreprise: ' . $data["company"].'</h3>';
    echo "Emploi posté par : ". $data["name"] . " " .$data["first_name"]."<br>";
   
    echo "Le " . $data["date_post"] . " à " . $data["time_post"] . "<br> <br/>";
    echo "Description : ".$data["text"]."<br><br />";

    if($applied_to_job == false){
        echo '<form action="" method="post">
                <input class="btn" type="submit" value="Postuler pour cet emploi" name="submit_'.$data['ID_job'].'">
              </form>';
    }
    else{
        echo '<button type="button" class="btn btn-secondary" disabled>Vous avez deja postulé pour ce poste</button>';
    }
?>

</div>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_'.$data['ID_job']])){
    //Faire en sorte que le gars postule avec sql
    //Du coup est ce qu'on fait un div légèrement différent pour les jobs auquel le gars a déjà postulé?
    $sql="INSERT INTO apply_to VALUES('" . $_SESSION['ID_user'] . "','" . $data['ID_job']."')";
    $bdd->exec($sql);
    echo "Vous avez postulé à cet emploi";
}

?>
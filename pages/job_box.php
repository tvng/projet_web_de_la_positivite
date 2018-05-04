<?
session_start();
?>

<!-- Pour les propositions d'emplois
on fait un seul modèle qui sera appelé plusieurs fois -->


<div class="container" style="background-color: pink;">
    <!-- Offre d'emploi -->
    <?php
    echo "Emploi posté par : ". $data["name"] . " " .$data["first_name"]."<br>";
    echo "de l'entreprise:" . $data["company"]."<br>";
    echo "le " . $data["date_post"] . " à " . $data["time_post"] . "<br>";
    echo "".$data["text"]."<br>";

    if($applied_to_job == false){
        echo '<form action="" method="post">
                <input type="submit" value="Postuler pour cet emploi" name="submit_'.$data['ID_job'].'">
              </form>';
    }
    else{
        echo "Vous avez déjà postulé pour cet emploi";
    }
?>

</div>
    <!-- Offre d'emploi -->
<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_'.$data['ID_job']])){
    //Faire en sorte que le gars postule avec sql
    //Du coup est ce qu'on fait un div légèrement différent pour les jobs auquel le gars a déjà postulé?
    $sql="INSERT INTO apply_to VALUES('" . $_SESSION['ID_user'] . "','" . $data['ID_job']."')";
    $bdd->exec($sql);
    echo "Vous avez postulé à cet emploi";
}

?>
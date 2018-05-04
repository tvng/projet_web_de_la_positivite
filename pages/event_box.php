<?
session_start();
?>

    <!-- Pour les propositions d'emplois
    on fait un seul modèle qui sera appelé plusieurs fois -->


    <div class="container" style="background-color: pink;">
        <?php
        echo "Evénement organisé par : ". $data["name"] . " " .$data["first_name"]."<br>";
        echo "".$data["text"]."<br>";
        echo "Rendez vous à ".$data['location']." .". "<br>";
        echo "Le:" . $data["date"]." à " .$data["time"] . "<br>";
        echo "posté le " . $data["date_post"] . " à " . $data["time_post"] . "<br>";


        if($applied_to_event == false){
            echo '<form action="" method="post">
                <input type="submit" value="Participer à cet événement" name="submit_'.$data['ID_event'].'">
              </form>';
        }
        else{
            echo "Vous participez déjà à cet événement";
        }
        ?>

    </div>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_'.$data['ID_event']])){
    //Faire en sorte que le gars postule avec sql
    //Du coup est ce qu'on fait un div légèrement différent pour les jobs auquel le gars a déjà postulé?
    $sql="INSERT INTO participate VALUES('" . $_SESSION['ID_user'] . "','" . $data['ID_event']."')";
    $bdd->exec($sql);
    echo "Vous participez à cet événement!";
}

?>
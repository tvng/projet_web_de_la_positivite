+<?
session_start();
?>

    <!-- Pour les propositions d'emplois
    on fait un seul modèle qui sera appelé plusieurs fois -->

    <div class="job_box rounded p-3 mt-3">
        <?php
        echo '<h3 class="text-capitalize" style="margin:0px;">Invitation envoyée par: ' . $data["first_name"] . ' ' . $data["name"] . '</h3>';
        echo $data["text"]."<br><br />";

            echo '<form action="" method="post">
                <input class="btn" type="submit" value="Accepter l\'invitation" name="submit_'.$data['ID_user1'].'">
              </form>';

        ?>

    </div>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_'.$data['ID_user1']])){
    //Faire en sorte que le gars postule avec sql
    //Du coup est ce qu'on fait un div légèrement différent pour les jobs auquel le gars a déjà postulé?
    $sql="INSERT INTO connect_with VALUES('" . $_SESSION['ID_user'] . "','" . $data['ID_user1']."')";
    $bdd->exec($sql);
    $delete_invite="DELETE FROM invitation WHERE ID_user1 = " .$data["ID_user1"] ." AND ID_user2 = " . $_SESSION["ID_user"];
    $bdd->exec($delete_invite);
    echo '<div class="alert alert-success" role="alert">Vous avez accepté l\'invitation!</div>';
}

?>
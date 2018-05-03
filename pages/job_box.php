<?
session_start();
?>

<!-- Pour les propositions d'emplois
on fait un seul modèle qui sera appelé plusieurs fois -->


<div class="container" style="background-color: pink;">
    <?php
    echo "Emploi posté par : ".$data["author"]."<br>";
    echo "de l'entreprise:" . $data["company"]."<br>";
    echo "le " . $data["date_post"] . " à " . $data["time_post"] . "<br>";
    echo "".$data["text"]."<br>";
    echo '<form action="" method="post">
    <input type="submit" value="Postuler pour cet emploi" name="submit">
</form>'
    ?>
</div>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])){
    //Faire en sorte que le gars postule avec sql
    //Du coup est ce qu'on fait un div légèrement différent pour les jobs auquel le gars a déjà postulé?
}

?>
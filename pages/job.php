<?
session_start();
?>

<!-- Pour les propositions d'emplois
on fait un seul modèle qui sera appelé plusieurs fois -->


<div class="container" style="background-color: pink;">
    <?php
    echo "posté par : ".$data["author"]."<br>";
    echo "de l'entreprise:" . $data["company"]."<br>";
    echo "le " . $data["date_post"] . " à " . $data["post_time"] . "<br>";
    echo "".$data["text"]."<br>";
    ?>
</div>
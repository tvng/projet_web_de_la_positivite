<!-- post 
On fait un seul modèle qui sera appelé plusieurs fois -->


<!-- PHP POUR COMPTER LE NOMBRE DE LIKES -->
<?php 

    $nb_likes = $bdd->query("SELECT COUNT(ID_liker) AS count_likes FROM like_post WHERE ID_liked=".$data['ID_post']);
    $nb_likes_data = $nb_likes->fetch();
?>

<!--  HTML -->

<div class="post_style rounded p-3 mt-3" >
    <div class="row">
        <div class="col col-md-auto">
        <div  class="pp_post">
            <?php
			echo '<img src="'.$data['profile_pic'].'" class="img-fluid rounded-circle"> ';
			?>
            <!--  style="max-height : 70px; object-position: center; object-fit: cover ;" -->
        </div></div>
        <div class="col">
        <?php echo "<p class='text-capitalize font-weight-bold' style='margin:0px;'>".$data["author_f_n"]." ".$data["author_n"]."</p>";
            echo "<p class='font-weight-light' style='margin:0px;'>Le ".$data["date"]." à ".$data["time"];
                
                if (!empty($data["location"]) )
                {
                    echo " - A ".$data["location"];
                }

                echo "</p>"; 
                if (!empty($data["emotion"]) )
                {
                    echo "<p class='font-weight-light' style='margin:0px;'>Feeling : ".$data["emotion"]."</p>";
                }
        ?>
        </div>
    </div>
    <br />
        <?php echo "<p class='text-justify'>".$data["text"]."</p>";
        if (empty($data["media_link"]) === false) {
            echo '<img src="'.$data['media_link'] .'" style="max-width : 30vw; max-heigh: 200px;">';
        }
        ?>
</div>


<!-- php des familles pour savoir si on a deja cliqué sur likeyyyyyyyyyy -->

<?php 
    $liked_sql = $bdd->query("SELECT ID_liker FROM like_post 
    WHERE ID_liked='".$data["ID_post"]."' 
    AND ID_liker='".$_POST["id"]."' ");
    $liked = $liked_sql->fetch();
    
    if (is_array($liked) )
    {
        $can_like=false;
    } else 
    {
        $can_like=true;
    }

?>

<!-- LES BOUTONS LIKE COMMENT SHARE -->
<div class="row">
    <div class="col col-md-auto"><form action="" method="post">
    <?php
   if ($can_like === true )
   {
    echo '<input class="btn" type="submit" value="'. $nb_likes_data['count_likes'].' LIKE" name="like_'.$data['ID_post'].'">';
   }
   else {
    echo '<input class="btn btn-success" type="submit" value="'. $nb_likes_data['count_likes'].' LIKE" name="like_'.$data['ID_post'].'">';
   }
  
    echo '<a class="btn" data-toggle="collapse" href="#box_'.$data['ID_post'].'" role="button" aria-expanded="false">COMMENT</a>';
    echo '<input class="btn" type="submit" value="SHARE" name="share_'.$data['ID_post'].'">';
    ?>
    </form></div>

</div>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['like_'.$data['ID_post']])){
    if ($can_like===true){        
        $sql_like="INSERT INTO like_post VALUES('" . $_POST["id"] . "','" . $data['ID_post']."')";
        $bdd->exec($sql_like);
    }
    else{
        $sql_like="DELETE FROM like_post WHERE ID_liked='".$data["ID_post"]."' AND ID_liker='".$_POST["id"]."' ";
        $bdd->exec($sql_like);
    }
    
}

?>

<!--  LA BOITE QUI S'AFFICHE QUAND ON CLIQUE SUR COMMENTAIRE -->
<div class="collapse" id="box_<?php echo $data['ID_post']; ?>">
    <div class="comment_box">
        <!--  FORM POUR POSTER UN COMMENTAIRE -->
      
        
    
        <?php
        // SI ON A VALIDE LE POSTAGE DE COMMENTAIRE
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment_'.$data['ID_post']])){
            $sql="INSERT INTO comment (ID_author, ID_post, comment_time, comment_date, comment_text)
            VALUES ('".$_POST["id"]."', '".$data['ID_post']."', '". date('h:i:s')."', '".date('Y-m-d')."', '".$_POST['comment_text']."' )";
            $bdd->exec($sql);
        }


        ///////// AFFICHAGE DES COMMENTAIRES
        $sqlco="SELECT comment.ID_author, comment.comment_date, comment.comment_time, comment.comment_text,
        user.profile_pic,user.first_name,user.name
        FROM comment 
        INNER JOIN user ON comment.ID_author = user.ID_user
        WHERE comment.ID_post= " . $data['ID_post']."
        ORDER BY comment.comment_date DESC, comment.comment_time DESC";
        $com= $bdd->query($sqlco);
        while ($datac = $com->fetch())
        {
            ?>
            <div class="container-fluid comment_style rounded pl-3 pr-3 mt-3" >
            <div class="row">
                <div class="col col-md-auto">
                    <div  class="pp_comment">
                        <?php
                        echo '<img src="'.$datac['profile_pic'].'" class="img-fluid rounded-circle"> ';
                        ?>
                    </div>
                </div>
                <div class="col col-md-auto">
                    <?php
                        echo '<span class="text-capitalize font-weight-bold" style="margin:0px;">'.$datac['name'].' '.$datac['first_name'].' </span> ';
                        echo '<span>('.$datac['comment_date'].')</span>';
                        echo '<p>'.$datac['comment_text'].' </p> ';
                    ?>
                </div>
            </div>
            </div>
            <?php
        }
        ?>

    </div>
</div>



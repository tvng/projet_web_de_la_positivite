<!-- post 
On fait un seul modèle qui sera appelé plusieurs fois -->

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

<div class="row">
    <div class="col col-md-auto"><form action="" method="post">
    <?php
    echo '<input class="btn" type="submit" value="'.$data['nb_like'].' LIKE" name="like_'.$data['ID_post'].'">';
    echo '<a class="btn" data-toggle="collapse" href="#box_'.$data['ID_post'].'" role="button" aria-expanded="false">COMMENT</a>';
    echo '<input class="btn" type="submit" value="SHARE" name="share_'.$data['ID_post'].'">';
    ?>
    </form></div>

</div>

<div class="collapse" id="box_<?php echo $data['ID_post']; ?>">
    <div class="comment_box">
        - commenter
        
        
        <form class="form-inline " action="" method="post"> 
            <div class="form-group container-fluid">
                <div class="col col-md-auto">
                    <div  class="pp_comment">
                        <?php
                        echo '<img src="'.$_SESSION['profile_pic'].'" class="img-fluid rounded-circle"> ';
                        ?>
                    </div>
                </div>
                <textarea name="comment_text" class="form-control col-md-8 mr-sm-2" placeholder="Commentaire" required></textarea> 
                <?php echo '<input class="btn" type="submit" value="comment" name="comment_'.$data['ID_post'].'">';
                ?>
            </div>
         </form>
        
        
    
        <?php
        // SI ON A VALIDER LE POSTAGE DE COMMENTAIRE
        if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['comment_'.$data['ID_post']])){
            $sql="INSERT INTO comment (ID_author, ID_post, comment_time, comment_date, comment_text)
            VALUES ('".$_SESSION['ID_user']."', '".$data['ID_post']."', '". date('h:i:s')."', '".date('Y-m-d')."', '".$_POST['comment_text']."' )";
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
            include('comments.php');
        }
        ?>

    </div>
</div>

<?php
    if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['like_'.$data['ID_post']])){
        //Faire en sorte que le gars postule avec sql
        //Du coup est ce qu'on fait un div légèrement différent pour les jobs auquel le gars a déjà postulé?
       // $sql="INSERT INTO apply_to VALUES('" . $_SESSION['ID_user'] . "','" . $data['ID_job']."')";
        //$bdd->exec($sql);
        echo "ciouciou";
    }


?>

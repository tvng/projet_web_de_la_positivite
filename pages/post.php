<!-- post 
On fait un seul modèle qui sera appelé plusieurs fois -->



    <div class="row">
        <div class="profile_pic rounded"><img src="../resources/pp_base.png" style="max-height : 70px" class="img-fluid rounded-circle" alt="pp"> </div>
        <?php echo "".$data["author_f_n"]." ".$data["author_n"]."<br>";
                echo "Le ".$data["date"]." à ".$data["time"]."<br>";
                
                if (!empty($data["location"]) )
                {
                    echo "A ".$data["location"]." ";
                }
                if (!empty($data["emotion"]) )
                {
                    echo "".$data["emotion"]."<br>";
                }
        ?>
    </div>
        <?php echo "".$data["text"]."<br>"; ?>
    <!--
    <img src="<?php echo $data['media_link']?>" height=300px width="400px">
    -->

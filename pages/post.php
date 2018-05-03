<!-- post 
On fait un seul modèle qui sera appelé plusieurs fois -->



    <div class="row">
            <?php
			echo '<img src="'.$data['profile_pic'].'" style="max-height : 70px" class="img-fluid rounded-circle"> ';
			?>
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
        <?php echo "".$data["text"]."<br>";
        if (empty($data["media_link"]) === false) {
            echo '<img src="'.$data['media_link'] .'" style="max-width : 30vw; max-heigh: 200px;">';
        }
        ?>

 
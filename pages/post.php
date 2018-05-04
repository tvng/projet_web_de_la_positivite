<!-- post 
On fait un seul modèle qui sera appelé plusieurs fois -->


<div class="post_style col-md-12 rounded p-3 mt-3">
    <div class="row">
        <div class="col col-md-auto">
            <?php
			echo '<img src="'.$data['profile_pic'].'" style="max-height : 70px" class="img-fluid rounded-circle"> ';
			?>
        </div>
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
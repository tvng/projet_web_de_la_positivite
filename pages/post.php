<!-- post 
On fait un seul modèle qui sera appelé plusieurs fois -->


<div class="container post_style">
    <?php echo "".$data["author_f_n"]." ".$data["author_n"]."<br>";
            echo "Le ".$data["date"]." - ".$data["time"]."<br>";
            if (!empty($data["location"]) )
            {
                echo "A ".$data["location"];
            }
            if (!empty($data["emotion"]) )
            {
                echo "".$data["emotion"]."<br>";
            }
            echo "".$data["text"]."<br>";
             ?>
</div>
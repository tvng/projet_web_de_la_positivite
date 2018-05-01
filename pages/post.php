<!-- post 
On fait un seul modèle qui sera appelé plusieurs fois -->


<div class="container post_style">
    <div class="row">
        <div class="col-sm-1 profile_pic"><img src="../resources/pp_base.png" class="img-fluid img-rounded" alt="pp"> </div>
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
</div>
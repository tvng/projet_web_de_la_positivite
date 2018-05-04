
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
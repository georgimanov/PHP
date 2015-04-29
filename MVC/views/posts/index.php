<!-- +++++ Post +++++ -->
<?php include_once "aside.php" ?>

<section>
<?php $counter = 0; ?>
<?php foreach( $posts as $post ): ?>
    <?php
    $grey_or_white = "";
    $counter++;
    if($counter % 2) {
        $grey_or_white = "grey";
    } else{
        $grey_or_white = "white";
    }

    $picture = 'default_user.png';

    if($post['username'] === 'georgi'){
        $picture = 'user.png';
    }
    ?>

    <div id="<?php echo $grey_or_white;?>" >
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-lg-offset-2">
                    <p>
                        <a href="<?php echo DX_URL . "user/profile/" . $post['user_id']; ?>">
                            <img src="<?php echo DX_URL;?>/views/assets/img/<?php echo $picture;?>" alt="Profile Picture" width="50px" height="50px">                           <ba><?php echo $post['username']; ?></ba>
                        </a>
                    </p>
                    <p>
                        <bd>Posted on: <?php echo $post['date_pubslished']; ?>, </bd>
                        <bd>Visits count: <?php echo $post['visits_count']; ?></bd>

                    </p>
                    <h4><?php echo $post['title']; ?></h4>
                    <p><?php echo $post['content']; ?></p>
                    <p><a href="<?php echo DX_URL . "posts/view/" . $post['id']; ?>">Continue Reading...</a></p>
                </div>
            </div><!-- /row -->
        </div> <!-- /container -->
    </div><!-- /grey -->

<?php endforeach;?>

</section>




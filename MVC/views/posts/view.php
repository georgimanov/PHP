<div id="white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <p><img src="<?php echo DX_URL;?>/views/assets/img/user.png" alt="Georgi Manov" width="50px" height="50px"> <ba><?php echo $user['username']; ?></ba></p>
                <p><bd><?php echo $post['date_pubslished']; ?></bd></p>
                <h4><?php echo $post['title']; ?></h4>
<!--                                    <p><img class="img-responsive" src="assets/img/blog01.jpg" alt=""></p>-->
                <p><?php echo $post['content']; ?></p>
                <br>
                <p><bt>TAGS: <a href="#"><?php echo $category['name']; ?></a> - <a href="#"><?php echo $category['name']; ?></a></bt></p>
                <hr>
                <p><a href="<?php echo DX_URL . "posts/index";?>"># Back</a></p>
            </div>

        </div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /white -->

<?php include_once "comments.php" ?>
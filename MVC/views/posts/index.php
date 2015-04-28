
<div class="categories text-center">
    <h4>Categories:
        <a href="<?php echo DX_URL . "posts/index";?>">All</a>
        <?php foreach( $categories_list as $category ): ?>
            <a href="<?php echo DX_URL . "posts/index?category=" . strtolower($category['name']);?>">
                <span>
                    <?php echo $category['name'];?>
                </span>
            </a>
        <?php endforeach;?>
    </h4>
</div>

<div class="categories text-center">
    <h4>Tags:
        <a href="<?php echo DX_URL . "posts/index";?>">All</a>
        <?php foreach( $tags_list as $tag ): ?>
            <a href="<?php echo DX_URL . "posts/index?tag=" . strtolower($tag['name']);?>">
                <span>
                    <?php echo $tag['name'];?>
                </span>
            </a>
        <?php endforeach;?>
    </h4>
</div>

<!-- +++++ Post +++++ -->
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
?>
<div id="<?php echo $grey_or_white;?>" >
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2">
                <p><img src="<?php echo DX_URL;?>/views/assets/img/user.png" alt="Georgi Manov" width="50px" height="50px"> <ba><?php echo $user['username']; ?></ba></p>
                <p><bd>Posted on: <?php echo $post['date_pubslished']; ?></bd></p>
                <h4><?php echo $post['title']; ?></h4>
                <p><?php echo $post['content']; ?></p>
                <p><a href="<?php echo DX_URL . "posts/view/" . $post['id']; ?>">Continue Reading...</a></p>
            </div>
        </div><!-- /row -->
    </div> <!-- /container -->
</div><!-- /grey -->

<?php endforeach;?>





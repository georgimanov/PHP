
<aside >
<div class="container">
    <div class="col-md-3">
        <div class="categories text-left">
            <h4>Categories:

                <ul>
                    <li>
                        <a href="<?php echo DX_URL . "posts/index";?>">All
                            <span class="badge"><?php echo $all_categories['count']; ?> </span>
                        </a>
                    </li>


                    <?php foreach( $categories_list as $category ): ?>
                        <li>
                            <a href="<?php echo DX_URL . "posts/index?category=" . strtolower($category['name']);?>">
                                <?php echo $category['name'];?>
                                <span class="badge"><?php echo $category['count'];?></span>
                            </a>
                        </li>
                    <?php endforeach;?>
            </h4>
        </div>
    </div>

    <div class="col-md-3">
        <div class="categories text-left">
            <h4>Tags:
                <ul>
                    <li>
                        <a href="<?php echo DX_URL . "posts/index";?>">All</a>
                    </li>
                    <?php foreach( $tags_list as $tag ): ?>
                        <li >
                            <a href="<?php echo DX_URL . "posts/index?tag=" . strtolower($tag['name']);?>">
                        <span>
                            <?php echo $tag['name'];?>
                        </span>
                            </a>
                        </li>
                    <?php endforeach;?>
                </ul>
            </h4>
        </div>
    </div>

    <div class="col-md-3">
        <div class="categories text-left">
            <h4>Dates:
                <ul>
                    <li>
                        <a href="<?php echo DX_URL . "posts/index";?>">All</a>
                    </li>

                    <?php foreach( $dates_list as $date ): ?>
                        <li >
                            <a href="<?php echo DX_URL . "posts/index?year=" . $date['year'] . "&month=" . $date['month'] ;?>">
                        <span>
                            <?php echo $date['year'] . "-" .$date['month'];?>
                        </span>
                            </a>
                        </li>
                    <?php endforeach;?>
                </ul>
            </h4>
        </div>
    </div>

    <div class="col-md-3">
        <div class="well">
            <h4>Search by tag</h4>
            <div class="input-group">
                <form role="form" method="get">
                    <input name="tag" class="form-control">
                    <input type="submit">
                </form>
            </div>
            <!-- /.input-group -->
        </div>
    </div>
</div>
</aside>
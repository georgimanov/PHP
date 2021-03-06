<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo DX_URL ; ?>views/img/favicon.png">

    <title>Manov</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo DX_URL;?>/views/assets/css/bootstrap.css" rel="stylesheet">


    <!-- Custom styles for this template -->
    <link href="<?php echo DX_URL;?>/views/assets/css/main.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="<?php echo DX_URL;?>/views/assets/js/hover.zoom.js"></script>
    <script src="<?php echo DX_URL;?>/views/assets/js/hover.zoom.conf.js"></script>
    <script src="<?php echo DX_URL;?>/ckeditor/ckeditor.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

	<body>

    <!-- Static navbar -->
    <div class="navbar navbar-inverse navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">

                </button>
                <a class="navbar-brand" href="<?php echo DX_URL;?>">Georgi Manov's Blog</a>
                <?php
                if( ! empty( $this->logged_user ) ) {
                    echo "<a href=". DX_URL . "user/profile/{$this->logged_user['id']} style='color: #ffff00'> Hello, {$this->logged_user['username']}</a><br />";
                    printf("<a href='%s' style='color: #000' >Post: </a>",DX_URL . "#");
                    printf("<a href='%s' style='color: #000' >Add </a>",DX_URL . "posts/add");
                    printf("<a href='%s' style='color: #000' >Edit </a>",DX_URL . "posts/edit");
                    printf("<a href='%s' style='color: #000' >Delete </a>",DX_URL . "posts/delete");
                } ?>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?php echo DX_URL;?>">Home</a></li>
                    <li><a href="<?php echo DX_URL . "posts/index";?>">Blog</a></li>
                    <li><a href="<?php echo DX_URL . "contacts/index";?>">Contacts</a></li>

                        <?php
                        if( ! empty( $this->logged_user ) ) {
                            echo "<li><a href=". DX_URL . "user/logout> Logout</a></li>";
                        } else {
                            echo "<li><a href=" . DX_URL . "user/login> Login</a></li>";
                        }?>

                </ul>
            </div><!--/.nav-collapse -->

        </div>

    </div>

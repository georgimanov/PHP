<?php

namespace Controllers;

class Comments_Controller extends Master_Controller {

    public function __construct() {
        parent::__construct(get_class(),
            'comment', '/views/comments/');
    }

    public function index()
    {
        $comments = $this->model->find();
        if( empty( $comments ) ){
            header( 'Location: ' . DX_URL);
            exit;
        }

        $template_name = DX_ROOT_DIR . $this->views_dir . 'index.php';

        include_once $this->layout;
    }
}

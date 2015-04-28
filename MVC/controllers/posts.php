<?php

namespace Controllers;

class Posts_Controller extends Master_Controller {

    public function __construct() {
        parent::__construct( get_class(),
            'post', '/views/posts/' );
    }

    public function index() {
        if( !empty ( $_GET["category"])){
            $category_name = $_GET["category"];
            var_dump($category_name);

            die();
        }



        $posts = $this->model->find();
        $template_name = DX_ROOT_DIR . $this->views_dir . 'index.php';
        if( empty( $posts) ){
            header( 'Location: ' . DX_URL);
            exit;
        }
        $post = $posts[0];

        $user = $this->get_user( $post['user_id'] );
        $category = $this->get_category( $post['category_id'] );
        $categories_list = $this->list_all_categories();
        include_once $this->layout;
    }

    public function view( $id )
    {
        $posts = $this->model->get($id);
        if( empty( $posts) ){
            header( 'Location: ' . DX_URL);
            exit;
        }

        $post = $posts[0];
        $user = $this->get_user( $post['user_id'] );
        $category = $this->get_category( $post['category_id'] );
        $template_name = DX_ROOT_DIR . $this->views_dir . 'view.php';

        include_once $this->layout;
    }

    private function get_user($id){
        include  DX_ROOT_DIR . '/models/user.php';
        $user_model = new \Models\User_Model();
        $users = $user_model->get( $id );
        $user = $users[0];

        return $user;
    }

    private function get_category($id){
        include  DX_ROOT_DIR . '/models/category.php';
        $category_model = new \Models\Category_Model();
        $categories = $category_model->get( $id );
        $category = $categories[0];

        return $category;
    }

    private function list_all_categories(){
        $category_model = new \Models\Category_Model();
        $categories = $category_model->distinct(array('column' => 'name'));

        return $categories;
    }
}
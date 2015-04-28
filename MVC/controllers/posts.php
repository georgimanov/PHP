<?php

namespace Controllers;

class Posts_Controller extends Master_Controller {

    public function __construct() {
        parent::__construct( get_class(),
            'post', '/views/posts/' );

        include  DX_ROOT_DIR . '/models/category.php';
        include  DX_ROOT_DIR . '/models/user.php';
        include  DX_ROOT_DIR . '/models/tag.php';

    }

    public function index()
    {
        if ( !empty ( $_GET["category"] ) ) {
            $category_name = $_GET["category"];
            $posts = $this->model->get_posts_by_category($category_name);
        } elseif ( !empty ( $_GET["tag"] ) ){
            $tag_name = $_GET["tag"];
            $posts = $this->model->get_posts_by_tag($tag_name);
        }else {
            $posts = $this->model->get_post_by_date();
        }

        $template_name = DX_ROOT_DIR . $this->views_dir . 'index.php';
        if( empty( $posts) ){
            header( 'Location: ' . DX_URL);
            exit;
        }

        $post = $posts[0];
        $user = $this->get_user( $post['user_id'] );
        $category = $this->get_category( $post['category_id'] );
        $categories_list = $this->list_all_categories();
        $tags_list = $this->list_all_tags();
        include_once $this->layout;
    }

    public function add( )
    {
        $auth = \Lib\Auth::get_instance();
        if(! $auth->is_logged_in() ){
            header("Location: ". DX_URL. "posts/index");
            exit;
        }

        if( ! empty( $_POST['title'] ) && ! empty( $_POST['category_id'] )  && ! empty( $_POST['content'] ) ) {
            $title = $_POST['title'];
            $category = $_POST['category_id'];
            $content = $_POST['content'];
            $user_id = $auth->get_logged_user()['id'];

            $post = array(
                'title' => $title,
                'category_id' => $category,
                'content' => $content,
                'user_id' => $user_id
            );

            $tags = null;
            if( ! empty ( $_POST['tags'] ) ) {
                $tags = $_POST['tags'];
            }

            $this->model->add_post( $post, $tags );

            header("Location: ". DX_URL. "posts/index");
            exit;
        }

        $categories_list = $this->list_all_categories();

        $template_name = DX_ROOT_DIR . $this->views_dir . 'add.php';

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
        $tags = $this->model->get_tags_by_post_id($id);
        $user = $this->get_user( $post['user_id'] );
        $category = $this->get_category( $post['category_id'] );
        $template_name = DX_ROOT_DIR . $this->views_dir . 'view.php';

        include_once $this->layout;
    }

    private function get_user($id){
        $user_model = new \Models\User_Model();
        $users = $user_model->get( $id );
        $user = $users[0];

        return $user;
    }

    private function get_category($id){
        $category_model = new \Models\Category_Model();
        $categories = $category_model->get( $id );
        $category = $categories[0];

        return $category;
    }

    private function list_all_categories(){
        $category_model = new \Models\Category_Model();
        $categories = $category_model->find();

        return $categories;
    }

    private function list_all_tags(){
        $category_model = new \Models\Tag_Model();
        $categories = $category_model->find();

        return $categories;
    }
}
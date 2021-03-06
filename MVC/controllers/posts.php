<?php

namespace Controllers;

class Posts_Controller extends Master_Controller {

    public function __construct() {
        parent::__construct( get_class(),
            'post', '/views/posts/' );

        //TODO: MOVE? to where
        include  DX_ROOT_DIR . '/models/category.php';
        include  DX_ROOT_DIR . '/models/tag.php';
        include  DX_ROOT_DIR . '/models/comment.php';
        include  DX_ROOT_DIR . '/models/user.php';
        include  DX_ROOT_DIR . '/models/poststags.php';
    }

    public function index() {
        if ( !empty ( $_GET["category"] ) ) {
            $category_name = $_GET["category"];
            $posts = $this->model->get_posts_by_category($category_name);
        } elseif ( !empty ( $_GET["tag"] ) ){
            $tag_name = $_GET["tag"];
            $posts = $this->model->get_posts_by_tag($tag_name);
        }elseif ( !empty ( $_GET["year"] ) && !empty ( $_GET["month"] ) ) {
            $month = $_GET["month"];
            $year = $_GET["year"];
            $posts = $this->model->get_posts_by_date($year, $month);

        } else {
            $posts = $this->model->get_posts();
        }

        if( empty( $posts) ){
            header( 'Location: ' . DX_URL . "posts/sorry");
            exit;
        }

        $all_categories = $this->model->posts_count()[0];
        $categories_list = $this->model->get_categories_count();
        $tags_list = $this->model->get_top_tags_with_count( 5 );
        $dates_list = $this->model->get_posts_by_dates();

        $template_name = DX_ROOT_DIR . $this->views_dir . (__FUNCTION__). '.php';
        include_once $this->layout;
    }

    public function add( ) {
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

        $categories_list = $this->model->get_categories_count();

        $template_name = DX_ROOT_DIR . $this->views_dir . (__FUNCTION__). '.php';

        include_once $this->layout;
    }

    public function sorry(){
        $template_name = DX_ROOT_DIR . $this->views_dir . (__FUNCTION__). '.php';

        include_once $this->layout;
    }

    public function view( $id ) {
        $posts = $this->model->get($id);
        if( empty( $posts) ){
            header( 'Location: ' . DX_URL);
            exit;
        }

        $post = $posts[0];

        $this->model->update_visits($post);

        $tags = $this->model->get_tags_by_post_id($id);
        $user = $this->model->get_user( $post['user_id'] );
        $comments = $this->model->get_comments( $id );

        $template_name = DX_ROOT_DIR . $this->views_dir . (__FUNCTION__). '.php';

        include_once $this->layout;
    }
}
<?php

namespace Models;

class Post_Model extends Master_Model {

    public function __construct( $args = array() ) {
        parent::__construct( array( 'table' => 'posts' ) );
    }

    public function get_posts(){
        $query = "SELECT p.id, p.title, p.content, p.date_pubslished, p.visits_count, u.id AS user_id, u.username
                    FROM posts AS p
                    LEFT JOIN users AS u
                      ON p.user_id = u.id";

        $result_set = $this->db->query( $query );
        $results = $this->process_results( $result_set );

        return $results;
    }

    public function add_post ( $post, $tags ) {
        $keys = array_keys( $post );
        $values = array();

        foreach( $post as $key => $value ) {
            $values[] = "'" . $this->db->real_escape_string($value) . "'";
        }

        $keys = implode( $keys, ',' );
        $values = implode( $values, ',' );

        $query = "INSERT INTO {$this->table}($keys) VALUES($values)";

        $this->db->query( $query );

        $new_post_id = $this->db->insert_id;


        if ( count($tags) > null ){
            $tags_list = explode(',', $tags);

            $category_tag_model = new \Models\Tag_Model();

            include  DX_ROOT_DIR . '/models/poststags.php';
            $category_posts_tag_model = new \Models\Poststags_Model();


            foreach($tags_list as $tag){

                $tag_element = array(
                    'name' => $tag,
                );

                $tag_id_result = $category_tag_model->add($tag_element);

                if($tag_id_result !== -1){
                    $count_added_tags = $category_posts_tag_model->add_relation($new_post_id, $tag_id_result);
                } else {
                    $new_tag_id = $category_tag_model->find(array(
                        'where' => "name = {'$tag'}"
                    ));
                    $count_added_tags = $category_posts_tag_model->add_relation($new_post_id, $new_tag_id);
                }
            }
        }

        return $this->db->affected_rows;
    }

    public function update_visits($post){

        $visits = $post['visits_count'] + 1;

        $query = "UPDATE {$this->table}
                    SET visits_count = {$visits} WHERE id = {$post['id']}";

        $this->db->query( $query );

        return $this->db->affected_rows;
    }


    // TODO: Move to Master
    public function posts_count(){

        $query = "SELECT COUNT(*) as count FROM `posts`";

        $result_set = $this->db->query( $query );
        $results = $this->process_results( $result_set );

        return $results;
    }

    public function get_posts_by_category( $category_name ) {

        $query = " SELECT p.id, p.title, p.content, p.date_pubslished, p.visits_count, u.id AS user_id, u.username
                        FROM POSTS as p";

        $query .= " LEFT JOIN categories
                        ON p.category_id=categories.id
                    LEFT JOIN users AS u
                        ON p.user_id = u.id";

        if( ! empty( $category_name ) ) {
            $query .= " WHERE categories.name ='{$category_name}'";
        }

        $result_set = $this->db->query( $query );
        $results = $this->process_results( $result_set );

        return $results;
    }

    public function get_posts_by_tag( $tag_name ) {

        $query = " SELECT p.id, p.title, p.content, p.date_pubslished, p.visits_count, u.id AS user_id, u.username
                        FROM POSTS as p";

        $query .= " LEFT JOIN posts_have_tags AS pt
                        ON pt.post_id = p.id
                    LEFT JOIN tags AS t
                        ON t.id = pt.tag_id
                    LEFT JOIN users AS u
                        ON p.user_id = u.id";

        if( ! empty( $tag_name ) ) {
            $query .= " WHERE t.name ='{$tag_name}'";
        }

        $result_set = $this->db->query( $query );
        $results = $this->process_results( $result_set );

        return $results;
    }

    public function get_posts_by_date($year, $month){
        $query = "SELECT p.id, p.title, p.content, p.date_pubslished, p.visits_count, u.id AS user_id, u.username
                    FROM POSTS as p
                  LEFT JOIN users AS u
                      ON p.user_id = u.id
                  WHERE
                    year(p.date_pubslished)=". $year ."
                      AND
                    month(p.date_pubslished)=". $month ."
                  ORDER BY YEAR(p.date_pubslished)
                    DESC,
                  MONTH(p.date_pubslished)
                    DESC";

        $result_set = $this->db->query( $query );
        $results = $this->process_results( $result_set );

        return $results;
    }

    public function get_dates_list(){
        $query = "SELECT MONTH(a.date_pubslished) AS month, YEAR(a.date_pubslished) AS year
                    FROM `posts` AS a
                  LEFT JOIN `posts` AS p
                      ON a.id = p.id
                  GROUP BY(month)
                  ORDER BY YEAR(a.date_pubslished) DESC,
                  MONTH(a.date_pubslished) DESC";

        $result_set = $this->db->query( $query );
        $results = $this->process_results( $result_set );

        return $results;
    }

    public function get_tags_by_post_id ( $id ){

        $query = "SELECT name FROM tags";
        $query .= " LEFT JOIN posts_have_tags AS pt
                        ON pt.tag_id = tags.id
                    LEFT join posts AS p
                        ON p.id = pt.post_id";
        if( ! empty( $id ) ) {
            $query .= " WHERE p.id ='{$id}'";
        }

        $result_set = $this->db->query( $query );
        $results = $this->process_results( $result_set );

        return $results;
    }

    public function get_categories_count(){

        $query = "SELECT c.id as id, c.name as name, count(p.category_id) as count
                    FROM `categories` as c
                  LEFT JOIN posts as p
                    ON c.id = p.category_id
                  GROUP BY (p.category_id)
                  ORDER BY count(p.category_id) DESC";

        $result_set = $this->db->query( $query );
        $results = $this->process_results( $result_set );

        return $results;
    }

    public function get_user($id){
        include  DX_ROOT_DIR . '/models/user.php';
        $user_model = new \Models\User_Model();
        $users = $user_model->get( $id );
        $user = $users[0];

        return $user;
    }
}
<?php

namespace Models;

class Tag_Model extends Master_Model {

    public function __construct( $args = array() ) {
        parent::__construct( array( 'table' => 'tags' ) );
    }
}
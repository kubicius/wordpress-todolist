<?php
class TodolistController{

    public function __construct(){
        $this->viewDirectory = TODOLIST_PATH . "views/";
        add_action( 'admin_menu', array ( $this , 'addMenuPage' ));
    }

    public function addMenuPage() {
        add_menu_page(
            TODOLIST_TITLE,
            TODOLIST_TITLE,
            'manage_options',
            'todolist',
            array ($this, 'show'),
            'dashicons-list-view',
            100
        );
    }

    public function show(){
        wp_enqueue_style( 'styles', '/wp-content/plugins/todolist/resources/styles.css', false, 1, 'all');
        wp_enqueue_script( 'scripts', '/wp-content/plugins/todolist/resources/scripts.js', false, 1, true);
        require $this->viewDirectory . 'list.php';
    }

}
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
        require $this->viewDirectory . 'list.php';
    }

}
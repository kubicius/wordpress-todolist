<?php
class Controller{

    public function __construct(){
        $this->viewDirectory = TODOLIST_PATH . "views/";
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
    
    protected function respond($response){
        header('Content-type: application/json');
        echo json_encode($response);
        die();
    }
    
}
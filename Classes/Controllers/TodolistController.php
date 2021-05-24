<?php
class TodolistController{

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

    public function activate(){
        $todolistObj = new Todolist();
        $todolistTaskObj = new TodolistTask();
        $todolistObj->createTable();
        $todolistTaskObj->createTable();
    }

    public function deactivate(){
        $todolistObj = new Todolist();
        $todolistTaskObj = new TodolistTask();
        $todolistObj->dropTable();
        $todolistTaskObj->dropTable();
    }

    public function addTodolist(string $name){
        $todolistObj = new Todolist();
        $todolistObj->setName($name);
        $todolistObj->insert();
    }

    public function updateTodolist(int $id, string $name){
        $todolistObj = new Todolist();
        $todolistObj->setId($id);
        $todolistObj->setName($name);
        $todolistObj->update();
    }

    public function deleteTodolist(int $id){
        $todolistObj = new Todolist();
        $todolistObj->setId($id);
        $todolistObj->delete($id);
    }

    public function show(){
        wp_enqueue_style( 'styles', '/wp-content/plugins/todolist/resources/styles.css', false, 1, 'all');
        wp_enqueue_script( 'scripts', '/wp-content/plugins/todolist/resources/scripts.js', false, 1, true);
        require $this->viewDirectory . 'list.php';
    }

}
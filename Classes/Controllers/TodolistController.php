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
        $todolistObj->dropTable();
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
        wp_enqueue_style( 'styles', '/wp-content/plugins/todolist/resources/css/styles.css', false, 1, 'all');
        wp_enqueue_script( 'Todolist', '/wp-content/plugins/todolist/resources/js/ajax/Todolist.js', false, 1, true);
        wp_enqueue_script( 'TodolistTask', '/wp-content/plugins/todolist/resources/js/ajax/TodolistTask.js', false, 1, true);
        wp_enqueue_script( 'listeners', '/wp-content/plugins/todolist/resources/js/listeners.js', false, 1, true);

        $todolistObj = new Todolist();
        $todolists = $todolistObj->selectAll();
        var_dump($todolists);
        require $this->viewDirectory . 'list.php';
    }

}
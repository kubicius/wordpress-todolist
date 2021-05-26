<?php
class TodolistController extends Controller{

    public function activate(){
        $todolistObj = new Todolist();
        $todolistTaskObj = new TodolistTask();
        $todolistObj->createTable();
        $todolistTaskObj->createTable();
    }

    public function deactivate(){
        $todolistObj = new Todolist();
        $todolistTaskObj = new TodolistTask();
        $todolistTaskObj->dropTable();
        $todolistObj->dropTable();
    }

    public function addTodolist(){
        if(isset($_POST['name'])){
            $todolistObj = new Todolist();
            $todolistObj->setName($_POST['name']);
            $this->respond($todolistObj->insert());
        }
    }

    public function updateTodolist(int $id, string $name){
        $todolistObj = new Todolist();
        $todolistObj->setId($id);
        $todolistObj->setName($name);
        $this->respond($todolistObj->update());
    }

    public function deleteTodolist(int $id){
        $todolistObj = new Todolist();
        $todolistObj->setId($id);
        $this->respond($todolistObj->delete($id));
    }

    public function show(){
        wp_enqueue_style( 'styles', '/wp-content/plugins/todolist/resources/css/styles.css', false, 1, 'all');
        wp_enqueue_script( 'Todolist', '/wp-content/plugins/todolist/resources/js/ajax/Todolist.js', false, 1, true);
        wp_enqueue_script( 'TodolistTask', '/wp-content/plugins/todolist/resources/js/ajax/TodolistTask.js', false, 1, true);
        wp_enqueue_script( 'listeners', '/wp-content/plugins/todolist/resources/js/listeners.js', false, 1, true);

        $todolistObj = new Todolist();
        $todolistTaskObj = new TodolistTask();
        $todolists = $todolistObj->selectAll();
        
        foreach($todolists as $key => $todolist){
            $todolists[$key]['tasks'] = $todolistTaskObj->selectByIdTodolist($todolist['ID']);
        }

        require $this->viewDirectory . 'list.php';
    }

}
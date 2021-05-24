<?php
class TodolistTaskController{

    public function addTask(){
        $idTodolist = $_POST['idTodolist'];
        $description = $_POST['description'];
        $todolistTaskObj = new TodolistTask();
        $todolistTaskObj->setIdTodolist($idTodolist);
        $todolistTaskObj->setDescription($description);
        echo json_encode($todolistTaskObj->insert());
    }

    public function updateTask(){
        $id = $_POST['id'];
        $description = $_POST['description'];
        $todolistTaskObj = new TodolistTask();
        $todolistTaskObj->setId($id);
        $todolistTaskObj->setDescription($description);
        $todolistTaskObj->update();
    }

    public function deleteTask(){
        $id = $_POST['id'];
        $todolistTaskObj = new TodolistTask();
        $todolistTaskObj->setId($id);
        $todolistTaskObj->delete();
    }

}
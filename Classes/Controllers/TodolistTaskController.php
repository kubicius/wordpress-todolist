<?php
class TodolistTaskController{

    public function addTask(){
        $idTodolist = $_POST['idTodolist'];
        $description = $_POST['description'];
        $todolistTaskObj = new TodolistTask();
        $todolistTaskObj->setIdTodolist($idTodolist);
        $todolistTaskObj->setDescription($description);
        header('Content-type: application/json');
        echo json_encode($todolistTaskObj->insert());
        die();
    }

    public function updateTask(){
        $id = $_POST['id'];
        $description = $_POST['description'];
        $finished = $_POST['finished'];
        $todolistTaskObj = new TodolistTask();
        $todolistTaskObj->setId($id);
        $todolistTaskObj->setDescription($description);
        $todolistTaskObj->setFinished($finished);
        echo json_encode($todolistTaskObj->update());
    }

    public function deleteTask(){
        $id = $_POST['id'];
        $todolistTaskObj = new TodolistTask();
        $todolistTaskObj->setId($id);
        echo json_encode($todolistTaskObj->delete());
    }

}
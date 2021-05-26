<?php
class TodolistTaskController extends Controller{

    public function addTask(){
        $idTodolist = $_POST['idTodolist'];
        $description = $_POST['description'];
        $todolistTaskObj = new TodolistTask();
        $todolistTaskObj->setIdTodolist($idTodolist);
        $todolistTaskObj->setDescription($description);
        $this->respond($todolistTaskObj->insert());
    }

    public function updateTask(){
        $id = $_POST['id'];
        $description = $_POST['description'];
        $finished = $_POST['finished'];
        $todolistTaskObj = new TodolistTask();
        $todolistTaskObj->setId($id);
        $todolistTaskObj->setDescription($description);
        $todolistTaskObj->setFinished($finished);
        $this->respond($todolistTaskObj->update());
    }

    public function deleteTask(){
        $id = $_POST['id'];
        $todolistTaskObj = new TodolistTask();
        $todolistTaskObj->setId($id);
        $this->respond($todolistTaskObj->delete());
    }

}
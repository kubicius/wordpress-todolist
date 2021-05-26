<?php
class TodolistTaskController extends Controller{

    public function addTask(){
        if(isset($_POST['idTodolist']) && isset($_POST['description'])){
            $todolistTaskObj = new TodolistTask();
            $todolistTaskObj->setIdTodolist($_POST['idTodolist']);
            $todolistTaskObj->setDescription($_POST['description']);
            $this->respond($todolistTaskObj->insert());
        }
    }

    public function updateTask(){
        if(isset($_POST['id']) && isset($_POST['description']) && isset($_POST['finished'])){
            $todolistTaskObj = new TodolistTask();
            $todolistTaskObj->setId($_POST['id']);
            $todolistTaskObj->setDescription($_POST['description']);
            $todolistTaskObj->setFinished($_POST['finished']);
            $this->respond($todolistTaskObj->update());
        }
    }

    public function deleteTask(){
        if(isset($_POST['id'])){
            $todolistTaskObj = new TodolistTask();
            $todolistTaskObj->setId($_POST['id']);
            $this->respond($todolistTaskObj->delete());
        }
    }

}
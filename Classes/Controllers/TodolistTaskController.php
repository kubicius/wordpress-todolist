<?php
class TodolistTaskController{

    public function addTask(string $name){
        $todolistTaskObj = new TodolistTask();
        $todolistTaskObj->insert($name);
    }

    public function updateTask(int $id, string $name){
        $todolistTaskObj = new TodolistTask();
        $todolistTaskObj->update($id, $name);
    }

    public function deleteTask(int $id){
        $todolistTaskObj = new TodolistTask();
        $todolistTaskObj->delete($id);
    }

}
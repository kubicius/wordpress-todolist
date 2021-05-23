<?php
/**
* Plugin Name: Todo list
* Plugin URI: https://github.com/kubicius/wordpress-todo-list
* Description: To-do list.
* Version: 0
* Author: Krzysztof Kubicius
* Author URI: https://kubicius.eu
**/

// Dissallowing direct access.
defined( 'ABSPATH' ) || exit;

// Defining constants.
define('TODOLIST_PATH', plugin_dir_path( __FILE__ ));
define('TODOLIST_TITLE', 'To Do List');

// Loading models.
require TODOLIST_PATH . 'Classes/Models/Todolist.php';
require TODOLIST_PATH . 'Classes/Models/TodolistTask.php';

// Initialzation of controllers.
require TODOLIST_PATH . 'Classes/Controllers/TodolistController.php';
$todolistControllerObj = new TodolistController();
require TODOLIST_PATH . 'Classes/Controllers/TodolistTaskController.php';
$todolistTaskControllerObj = new TodolistTaskController();

// Hooks and routes.
add_action( 'admin_menu', array ( $todolistControllerObj , 'addMenuPage' ));
register_activation_hook( __FILE__ , array ( $todolistControllerObj , 'activate' ));
register_deactivation_hook( __FILE__ , array ( $todolistControllerObj , 'deactivate' ));

// TODO: Authorization and POST checking
if( $_GET['controller'] == 'todolist' ){
    switch ( $_GET['action'] ){
        case 'add' : 
            $todolistControllerObj->addTodolist( $_POST['name'] );
        break;
        case 'update' : 
            $todolistControllerObj->updateTodolist( $_POST['id'], $_POST['name'] );
        break;
        case 'delete' : 
            $todolistControllerObj->deleteTodolist( $_POST['id'] );
        break;
    }
}elseif( $_GET['controller'] == 'todolist-task' ){
    switch ( $_GET['action'] ){
        case 'add' : 
            $todolistTaskControllerObj->addTask( $_POST['name'] );
        break;
        case 'update' : 
            $todolistTaskControllerObj->updateTask( $_POST['id'], $_POST['name'] );
        break;
        case 'delete' : 
            $todolistTaskControllerObj->deleteTask( $_POST['id'] );
        break;
    }
}
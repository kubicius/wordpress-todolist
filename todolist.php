<?php
/**
* Plugin Name: Todo list
* Plugin URI: https://github.com/kubicius/wordpress-todo-list
* Description: To-do list.
* Version: 1.0
* Author: Krzysztof Kubicius
* Author URI: https://kubicius.eu
**/

// Dissallowing direct access.
defined( 'ABSPATH' ) || exit;

// Defining constants.
define('TODOLIST_PATH', plugin_dir_path( __FILE__ ));
define('TODOLIST_URL', plugin_dir_url(__FILE__));
define('TODOLIST_TITLE', 'To Do List');

// Loading models.
require TODOLIST_PATH . 'Classes/Models/Todolist.php';
require TODOLIST_PATH . 'Classes/Models/TodolistTask.php';

// Initialzation of controllers.
require TODOLIST_PATH . 'Classes/Controllers/Controller.php';
require TODOLIST_PATH . 'Classes/Controllers/TodolistController.php';
require TODOLIST_PATH . 'Classes/Controllers/TodolistTaskController.php';
$todolistControllerObj = new TodolistController();
$todolistTaskControllerObj = new TodolistTaskController();

// Hooks.
add_action( 'admin_menu', array ( $todolistControllerObj , 'addMenuPage' ));
register_activation_hook( __FILE__ , array ( $todolistControllerObj , 'activate' ));
register_deactivation_hook( __FILE__ , array ( $todolistControllerObj , 'deactivate' ));

add_action( 'wp_ajax_todolist_task_add', array ( $todolistTaskControllerObj , 'addTask' ));
add_action( 'wp_ajax_todolist_task_update', array ( $todolistTaskControllerObj , 'updateTask' ));
add_action( 'wp_ajax_todolist_task_delete', array ( $todolistTaskControllerObj , 'deleteTask' ));

add_action( 'wp_ajax_todolist_add', array ( $todolistControllerObj , 'addTodolist' ));
add_action( 'wp_ajax_todolist_update', array ( $todolistControllerObj , 'updateTodolist' ));
add_action( 'wp_ajax_todolist_delete', array ( $todolistControllerObj , 'deleteTodolist' ));
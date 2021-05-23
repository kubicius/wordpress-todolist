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

// Initialzation of controllers.
require TODOLIST_PATH . 'Classes/Controllers/TodolistController.php';
$todolistControllerObj = new TodolistController();
require TODOLIST_PATH . 'Classes/Controllers/TodolistTaskController.php';
$todolistTaskControllerObj = new TodolistTaskController();

// Hooks and routes.
add_action( 'admin_menu', array ( $todolistControllerObj , 'addMenuPage' ));
register_activation_hook( __FILE__ , array ( $todolistControllerObj , 'activate' ));
register_deactivation_hook( __FILE__ , array ( $todolistControllerObj , 'deactivate' ));
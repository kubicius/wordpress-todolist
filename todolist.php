<?php
/**
* Plugin Name: To-do list
* Plugin URI: https://github.com/kubicius/wordpress-todo-list
* Description: To-do list.
* Version: 0
* Author: Krzysztof Kubicius
* Author URI: https://kubicius.eu
**/

// Dissallowing direct asccess.
defined( 'ABSPATH' ) || exit;
define('TODOLIST_PATH', plugin_dir_path( __FILE__ ));
define('TODOLIST_TITLE', 'To Do List');

require TODOLIST_PATH . 'Classes/TodolistController.php';
$todolistControllerObj = new TodolistController();

<?php
class TodolistTask{

    public function __construct(){
        global $wpdb;
        $this->db = $wpdb;
        $this->tableName = $wpdb->prefix . "todolist_tasks";
    }

    public function createTable(){
        $charset_collate = $this->db->get_charset_collate();

        if($this->db->get_var( "SHOW TABLES LIKE '" . $this->tableName . "'" ) != $this->tableName) 
        {
            $sql = "CREATE TABLE " . $this->tableName . " ( ";
            $sql .= "id INT(11) UNSIGNED AUTO_INCREMENT, ";
            $sql .= "id_todolist INT(11) UNSIGNED NOT NULL, ";
            $sql .= "name VARCHAR(128) NOT NULL, "; 
            $sql .= "PRIMARY KEY (id), ";
            $sql .= "CONSTRAINT FK_todolistTask_todolists FOREIGN KEY (id_todolist) ";
            $sql .= "REFERENCES " . $this->db->prefix . "todolists (id) ";
            $sql .= "ON DELETE CASCADE ";
            $sql .= ") " . $charset_collate . ";";
            require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
            dbDelta($sql);
        }
    }

    public function dropTable(){
        $sql = "DROP TABLE IF EXISTS " . $this->tableName;
        $this->db->query($sql);
    }

}
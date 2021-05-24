<?php
class Todolist{

    public function __construct(){
        global $wpdb;
        $this->db = $wpdb;
        $this->tableName = $wpdb->prefix . "todolists";
    }

    public function createTable(){
        $charset_collate = $this->db->get_charset_collate();

        if($this->db->get_var( "SHOW TABLES LIKE '" . $this->tableName . "'" ) != $this->tableName) 
        {
            $sql = "CREATE TABLE ". $this->tableName . " ( ";
            $sql .= "id INT(11) UNSIGNED AUTO_INCREMENT, ";
            $sql .= "name VARCHAR(128) NOT NULL, "; 
            $sql .= "PRIMARY KEY (id)";
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
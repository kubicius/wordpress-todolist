<?php
class TodolistTask{

    private $db;
    private $tableName;
    private $id;
    private $id_todolist;
    private $description;

    public function __construct(){
        global $wpdb;
        $this->db = $wpdb;
        $this->tableName = $wpdb->prefix . "todolist_tasks";
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function setIdTodolist(int $idTodolist){
        $this->id_todolist = $idTodolist;
    }

    public function setDescription(string $description){
        $this->description = $description;
    }

    public function createTable(){
        $charset_collate = $this->db->get_charset_collate();

        if($this->db->get_var( "SHOW TABLES LIKE '" . $this->tableName . "'" ) != $this->tableName) 
        {
            $sql = "CREATE TABLE " . $this->tableName . " ( ";
            $sql .= "ID INT(11) UNSIGNED AUTO_INCREMENT, ";
            $sql .= "ID_todolist INT(11) UNSIGNED NOT NULL, ";
            $sql .= "description VARCHAR(128) NOT NULL, "; 
            $sql .= "created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, "; 
            $sql .= "PRIMARY KEY (ID), ";
            $sql .= "CONSTRAINT FK_todolistTask_todolists FOREIGN KEY (ID_todolist) ";
            $sql .= "REFERENCES " . $this->db->prefix . "todolists (ID) ";
            $sql .= "ON DELETE CASCADE ";
            $sql .= ") " . $charset_collate . ";";
            require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
            return dbDelta($sql);
        }
        return false;
    }

    public function dropTable(){
        $sql = "ALTER TABLE " . $this->db->prefix . "todolist_tasks DROP FOREIGN KEY FK_todolistTask_todolists";
        $this->db->query($sql);
        $sql = "DROP TABLE IF EXISTS " . $this->tableName;
        return $this->db->query($sql);
    }

    public function insert(){
        return $this->db->insert(
            $this->tableName, 
            array(
                'id_todolist' => $this->id_todolist,
                'description' => $this->description
            )
        );
    }

    public function update(){
        return $this->db->update( 
            $this->tableName, 
            array( 
                'description' => $this->description
            ), 
            array( 'ID' => $this->id )
        );
    }

    public function delete(){
        return $this->db->delete( $this->tableName, array( 'ID' => $this->id ) );
    }

}
<?php
class Todolist{

    private $db;
    private $tableName;
    private $id;
    private $name;

    public function __construct(){
        global $wpdb;
        $this->db = $wpdb;
        $this->tableName = $wpdb->prefix . "todolists";
    }

    public function setId(int $id){
        $this->id = $id;
    }

    public function setName(string $name){
        $this->name = $name;
    }

    public function createTable(){
        $charset_collate = $this->db->get_charset_collate();

        if($this->db->get_var( "SHOW TABLES LIKE '" . $this->tableName . "'" ) != $this->tableName) 
        {
            $sql = "CREATE TABLE ". $this->tableName . " ( ";
            $sql .= "ID INT(11) UNSIGNED AUTO_INCREMENT, ";
            $sql .= "name VARCHAR(128) NOT NULL, "; 
            $sql .= "PRIMARY KEY (ID)";
            $sql .= ") " . $charset_collate . ";";
            require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
            dbDelta($sql);
        }
    }

    public function dropTable(){
        $sql = "DROP TABLE IF EXISTS " . $this->tableName;
        $this->db->query($sql);
    }

    public function insert(){
        $this->db->insert(
            $this->tableName, 
            array(
                'name' => $this->name
            )
        );
    }

    public function update(){
        $this->db->update( 
            $this->tableName, 
            array( 
                'name' => $this->name
            ), 
            array( 'ID' => $this->id )
        );
    }

    public function delete(){
        $this->db->delete( $this->tableName, array( 'ID' => $this->id ) );
    }

}
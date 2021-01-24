<?php
    class Preacher {
        /* public $id;
        public $name;
        public $tel;
        public $created;
        public $deleted_at; */
        public $db;

        function __construct() {
           $this->db = new Db();
        }

        public function store($name, $tel) {            
            $sql = "INSERT INTO preachers (name, tel) VALUES ('$name','$tel')";
            $result = $this->db->execute_sql_query($sql);
            return $result;
        }
    
        //view all records
        public function showAll() {
            $sql = "SELECT * FROM preachers";
            $result = $this->db->execute_sql_query($sql);
            return $result;
        }
        //update
        public function update($id) {
            
        }
        //delete
        public function delete($id) {
            $sql = "Delete FROM preachers WHERE id = '$id'";
            $result = $this->db->execute_sql_query($sql);
            return $result;
        }
    }
?>
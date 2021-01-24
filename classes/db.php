
 <?php
    include("config.php");
    class Db {
        //public $con;

        public function start_connection() {
            $con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            if($con -> connect_error) {
                echo "connection failed: ".$this->con -> connect_error;
            }
            return $con;
        }
        public function execute_sql_query($sql) {
            $con = $this->start_connection();
            
            return $con->query($sql);

            //close connection
            $con->close();

        }
    }
?>
<?php
    class Connection {
        private $host = "localhost";
        private $user = "root";
        private $pass = "";
        private $db = "Tp_DesarrolloWeb";
        private $connection;
        
        public function __construct() {
            // Create connection
            $this->$connection = mysqli_connect($this->$host, $this->$user, $this->$pass, $this->$db);
            mysqli_set_charset($connection, "utf8");
            
            // Check connection
            if (!$this->$connection) {
                die("Connection failed: " . mysqli_connect_error());
            }
            echo "Connected successfully";
        }

        public function getCon(){
            return $this->connection;
        }
    }


        /* 
        //**------Sin clase-------
            $host = "localhost";
            $user = "root";
            $pass = "";
            $db = "Tp_DesarrolloWeb";

            // Create connection
            $connection = mysqli_connect($host, $user, $pass, $db);
            mysqli_set_charset($connection, "utf8");

            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            echo "Connected successfully";
     
    */
?>


<?php
    require_once("require/database_setting.php");

    interface DatabaseInterfaces{
        public function __construct($hostname,$username,$password,$database);
        public function execute_query($query);
        public function __destruct();
    }

    class Database_connection implements DatabaseInterfaces{
        public $hostname;
		public $username;
		public $password;
		public $database;
		public $connection;
        public $query;
        public $result;

        public function __construct($hostname,$username,$password,$database){
            $this->hostname = $hostname;
			$this->username = $username;
			$this->password = $password;
			$this->database = $database;
            
            mysqli_report(false);
            $this->connection = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);
            if(mysqli_connect_errno()){
                echo "Failed to connect to MySql <br/>";
                echo "Error No: " .mysqli_connect_errno()."<br/>";
                echo "Error Message: " .mysqli_connect_error()."<br/>"; 
            }
        }
        public function execute_query($query){
            $this->query = $query;
            return $this->result = mysqli_query($this->connection,$this->query);
        }
        public function __destruct(){
            mysqli_close($this->connection);
         }
    }

   
   ?>
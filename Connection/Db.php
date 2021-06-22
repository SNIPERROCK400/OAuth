<?php


class Connection
{
    private string $hostname = "localhost";
    private string $username = "root";
    private string $password = "toor";
    private string $db = "app";
    public $conn = null;

   function getConnection()
   {
       if($this->conn == null){
            $this->conn = new mysqli($this->hostname,$this->username,$this->password,$this->db);
            if($this->conn->connect_error){
                die("Error connecting to the Database");
            }
            else{
                return $this->conn;
            }
       }
       else{
           return null;
       }
   }


}




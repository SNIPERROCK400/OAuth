<?php




class Auth
{
    public  $conn;
    public string $username;
    public string $password; 


    function __construct($db)
    {

       
        $this->conn = $db;
        
    }
    function do_signup()
    {
        $sql = "INSERT INTO users(username,password)VALUES('$this->username','$this->password')";
        if($this->conn->query($sql) == true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function username_exiest()
    {
        $sql = "SELECT username FROM users WHERE username = '$this->username'";
        $result = $this->conn->query($sql);
        if($result->num_rows >0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    function do_login()
    {
        $sql = "SELECT id,username,password FROM users WHERE username = '$this->username'";
        if($this->username_exiest())
        {
            $result = $this->conn->query($sql);
            $data = $result->fetch_assoc();
            if($data["password"] == $this->password){
                return true;
            }
            else
            {
                return false;
            }
        }
        else{
            return false;
        }

    }

    public function get_request_method(){
        return $_SERVER['REQUEST_METHOD'];
    }
  
}




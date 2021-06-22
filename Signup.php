<?php

include "./Connection/Db.php";
include "./Api/Auth.php";


$data = json_decode(file_get_contents("php://input"));
 


$database = new Connection();
$db = $database->getConnection();

$test = new Auth($db);

$test->username = $data->uname;
$test->password = $data->upass;


if(!$test->username_exiest()){
            if($test->do_signup()){
            echo json_encode(array("message" => "Login successfull","result"=>"True"));
            http_response_code(200);
        }
        else{

            echo  json_encode(array("message" => "Login Failed","result"=>"False","username"=> $test->username,"password"=> $test->password));
            http_response_code(400);
        }
    
}
else{
    echo  json_encode(array("message" => "username are not exiest"));
    http_response_code(400);

}



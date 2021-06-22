<?php

include "./Connection/Db.php";
include "./Api/Auth.php";


$data = json_decode(file_get_contents("php://input"));
 


$database = new Connection();
$db = $database->getConnection();

$test = new Auth($db);

$test->username = $data->uname;
$test->password = $data->upass;

if($test->do_login()){

    http_response_code(200);

    echo json_encode(array("message"=>"Login successfull","result"=>"true"));


}
else{
    http_response_code(400);
    echo json_encode(array("message"=>"Login failed","result"=>"false"));
}
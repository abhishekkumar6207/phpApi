<?php

header('content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,content-Type,Access-Control-Allow-Methods,Athorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);
$id = $data['id'];
$name = $data['s_name'];
$age = $data['s_age'];
$city = $data['s_city'];

include('config.php');

$sql = "UPDATE students SET  s_name = '{$name}' , s_age = {$age} , s_city = '{$city}' WHERE id = {$id} ";
if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'Student Record Updated.', 'status' => true));
} else {
    echo json_encode(array('message' => 'Student Record Not Updated.', 'status' => false));
}

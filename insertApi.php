<?php

header('content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,content-Type,Access-Control-Allow-Methods,Athorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);
$name = $data['s_name'];
$age = $data['s_age'];
$city = $data['s_city'];

include('config.php');

$sql = "INSERT INTO students(s_name,s_age,s_city) VALUES('$name',$age,'$city')";
if (mysqli_query($conn, $sql)) {
    echo json_encode(array('message' => 'Student Record Inserted.', 'status' => true));
} else {
    echo json_encode(array('message' => 'Student Record Not Inserted', 'status' => false));
}

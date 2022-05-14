<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
$servername = 'localhost';
$username = 'root';
$password = '';

// Create connection
$conn =  mysqli_connect($servername, $username, $password, 'user_db');


// Check connection
if (!$conn) {
  die("Connection failed: " .mysqli_error($conn));
}
echo "connected";

$received_data = json_decode(file_get_contents("php://input"));

if ($received_data->action == 'auth_user'){
    $query = SELECT 'password' FROM 'users' WHERE 'username' == $username;
    $result = mysqli_query($query);
    echo $result;
}
?>

<?php

function connected() {
$servername = "localhost";
$username = "root";
$password = "paulus";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
/*if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
echo "Connected successfully";*/

return !$conn->connect_error;

}

?>

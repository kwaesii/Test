<?php
include_once "la3_connection.php";

$username = $_POST['username'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$jersey_num = $_POST['jersey_num'];
$position = $_POST['position_code'];
$college_office = $_POST['college_code'];

$query = "UPDATE account SET 
          email = '$email', 
          first_name = '$first_name', 
          last_name = '$last_name', 
          jersey_num = '$jersey_num', 
          position_code = '$position', 
          college_code = '$college_office'
          WHERE username = '$username'";

if ($conn->query($query)) {
    header("Location: la3_dashboard.php");
    exit(); // Always call exit after header redirect
} else {
    echo "Error updating record: " . $conn->error;
}
?>
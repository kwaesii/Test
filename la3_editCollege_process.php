<?php
include_once "la3_connection.php";

$college_code = $_POST['colcode'];
$college_desc = $_POST['coldesc'];

$query = "UPDATE college_office SET 
          college_desc = '$college_desc' 
          WHERE college_code = '$college_code'";

if ($conn->query($query)) {
    header("Location: la3_dashboard.php");
    exit(); // Ensures script stops after redirection
} else {
    echo "Error updating record: " . $conn->error;
}
?>

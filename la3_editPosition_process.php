<?php
include_once "la3_connection.php";

$position_code = $_POST['poscode'];
$position_desc = $_POST['posdesc'];

$query = "UPDATE position SET 
          position_desc = '$position_desc' 
          WHERE position_code = '$position_code'";

if ($conn->query($query)) {
    header("Location: la3_dashboard.php");
    exit();
} else {
    echo "Error updating record: " . $conn->error;
}
?>

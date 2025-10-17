<?php
include_once "la3_connection.php";

$position_code = $_POST['position_code'];

$sql = "DELETE FROM position WHERE position_code = '$position_code'";

if ($conn->query($sql) === TRUE) {
    header("Location: la3_dashboard.php");
    exit(); 
} else {
    echo "<script>alert('Failed to delete position: " . addslashes($conn->error) . "');</script>";
}
?>


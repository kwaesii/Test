<?php
include_once "la3_connection.php";

$college_code = $_POST['college_code'];

$sql = "DELETE FROM college_office WHERE college_code = '$college_code'";

if ($conn->query($sql) === TRUE) {
    header("Location: la3_dashboard.php");
    exit(); // Always exit after header redirect
} else {
    echo "<script>alert('Failed to delete college: " . addslashes($conn->error) . "');</script>";
}
?>

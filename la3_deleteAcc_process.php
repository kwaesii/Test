<?php
include_once "la3_connection.php";

$username = $_GET['username'];

$sql = "DELETE FROM account WHERE username='$username'";

if ($conn->query($sql) === TRUE) {
    header("Location: la3_dashboard.php");
    exit(); // Always exit after header redirect
}
else {
    echo "<script>alert('Failed to delete account: " . addslashes($conn->error) . "');</script>";
}
?>

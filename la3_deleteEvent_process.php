<?php
include_once "la3_connection.php";

$event_code = $_POST['event_code'];

$sql = "DELETE FROM events WHERE event_code = '$event_code'";

if ($conn->query($sql) === TRUE) {
    header("Location: la3_dashboard.php");
    exit();
} else {
    echo "<script>alert('Failed to delete event: " . addslashes($conn->error) . "');</script>";
}
?>

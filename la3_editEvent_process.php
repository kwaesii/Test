<?php
include_once "la3_connection.php";

$event_code = $_POST['event_code'];
$event_desc = $_POST['event_desc'];

$query = "UPDATE events SET 
          event_desc = '$event_desc' 
          WHERE event_code = '$event_code'";

if ($conn->query($query)) {
    header("Location: la3_dashboard.php");
    exit();
} else {
    echo "Error updating record: " . $conn->error;
}
?>

<?php
include_once "la3_connection.php";

if (empty($_POST['event_code']) || empty($_POST['event_desc'])) {
    $message = "Please fill out all required fields.";
    $title = "Record Not Applied";
} else {
    $event_code = $_POST['event_code'];
    $event_desc = $_POST['event_desc'];

    try {
        $stmt = $conn->prepare("INSERT INTO events (event_code, event_desc) VALUES (?, ?)");
        $stmt->bind_param("ss", $event_code, $event_desc);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            echo "Error: The event code $event_code already exists. Please choose a different one.";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>

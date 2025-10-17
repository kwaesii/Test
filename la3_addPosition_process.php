<?php
include_once "la3_connection.php";

if (empty($_POST['poscode']) || empty($_POST['posdesc'])) {
    $message = "Please fill out all required fields.";
    $title = "Record Not Applied";
} else {
    $position_code = $_POST['poscode'];
    $position_desc = $_POST['posdesc'];

    try {
    $stmt = $conn->prepare("INSERT INTO `position` (position_code, position_desc) VALUES (?, ?)");
    $stmt->bind_param("ss", $position_code, $position_desc);

        if ($stmt->execute()) {
            echo "success"; 
        } else {
            echo "Error: " . $stmt->error;
        }
    
        $stmt->close();
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            echo "Error: The username $college_code already exists. Please choose a different one.";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
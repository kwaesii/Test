<?php
session_start();
include_once "la3_connection.php";

// Validate required fields
if (empty($_POST['colcode']) || empty($_POST['coldesc'])) {
    echo "Please fill out all required fields.";
    exit();
}

$college_code = $_POST['colcode'];
$college_desc = $_POST['coldesc'];

try {
    $stmt = $conn->prepare("INSERT INTO `college_office` (college_code, college_desc) VALUES (?, ?)");
    $stmt->bind_param("ss", $college_code, $college_desc);

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
?>
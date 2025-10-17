<?php

include_once "la3_connection.php";
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

$sql = "SELECT * FROM admin WHERE email_address = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

echo $result->num_rows > 0 ? "success" : "fail";

$stmt->close();
$conn->close();
?>

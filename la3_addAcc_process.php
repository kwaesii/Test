<?php
session_start();
include_once "la3_connection.php";

if (
    empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email']) ||
    empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['jersey_num']) ||
    empty($_POST['position']) || empty($_POST['college_office']) || empty($_FILES['profilePicture']['name'])
) {
    echo "Please fill out all required fields.";
    exit();
}

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$firstname = $_POST['first_name'];
$lastname = $_POST['last_name'];
$jerseyno = $_POST['jersey_num'];
$position = $_POST['position'];
$coloff = $_POST['college_office'];

$upload_dir = "profiles/";
if (!file_exists($upload_dir)) {
    mkdir($upload_dir, 0755, true);
}
$filename = basename($_FILES['profilePicture']['name']);
$profPicLoc = $upload_dir . $filename;

if (!move_uploaded_file($_FILES['profilePicture']['tmp_name'], $profPicLoc)) {
    echo "Error uploading profile picture.";
    exit();
}

try {
    $stmt = $conn->prepare("INSERT INTO `account` 
        (username, email, password, first_name, last_name, jersey_num, profile_picture, college_code, position_code) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("sssssssss", 
        $username, $email, $password, $firstname, $lastname, $jerseyno, $profPicLoc, $coloff, $position);

    if ($stmt->execute()) {
        echo "success"; 
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} catch (mysqli_sql_exception $e) {
    if ($e->getCode() == 1062) {
        echo "Error: The username $username already exists. Please choose a different one.";
    } else {
        echo "Error: " . $e->getMessage();
    }
}
?>

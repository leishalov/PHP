<?php
include "config.php";

$username = $_POST['username'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

$sql ="INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $username, $email, $password);

if($stmt->execute()) {
    echo "Register succesful! <a href='login.php'>Login here</a>";
    }else{
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
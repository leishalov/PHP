<?php
include "config.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: register.php");
    exit();
}

$fullName = trim($_POST["full_name"] ?? "");
$username = trim($_POST["username"] ?? "");
$email = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";
$confirmPassword = $_POST["confirm_password"] ?? "";
$terms = isset($_POST["terms"]);

function redirectWithError(string $message): void {
    header("Location: register.php?error=" . urlencode($message));
    exit();
}

if ($fullName === "" || $username === "" || $email === "" || $password === "" || $confirmPassword === "") {
    redirectWithError("Please fill in all required fields.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    redirectWithError("Please enter a valid email address.");
}

if (!preg_match('/^[a-zA-Z0-9_]{3,30}$/', $username)) {
    redirectWithError("Username must be 3-30 characters (letters, numbers, underscore).");
}

if (strlen($password) < 8) {
    redirectWithError("Password must be at least 8 characters long.");
}

if (!preg_match('/[A-Z]/', $password) || !preg_match('/[a-z]/', $password) || !preg_match('/[0-9]/', $password)) {
    redirectWithError("Password must include uppercase, lowercase, and a number.");
}

if ($password !== $confirmPassword) {
    redirectWithError("Password and confirmation do not match.");
}

if (!$terms) {
    redirectWithError("You must agree to the terms to continue.");
}

$checkSql = "SELECT id FROM users WHERE email = ? OR username = ? LIMIT 1";
$checkStmt = $conn->prepare($checkSql);

if (!$checkStmt) {
    redirectWithError("Unable to process your registration right now.");
}

$checkStmt->bind_param("ss", $email, $username);
$checkStmt->execute();
$checkStmt->store_result();

if ($checkStmt->num_rows > 0) {
    $checkStmt->close();
    redirectWithError("An account with that email or username already exists.");
}

$checkStmt->close();

$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
$insertSql = "INSERT INTO users (full_name, username, email, password) VALUES (?, ?, ?, ?)";
$insertStmt = $conn->prepare($insertSql);

if (!$insertStmt) {
    redirectWithError("Unable to save your account right now.");
}

$insertStmt->bind_param("ssss", $fullName, $username, $email, $hashedPassword);

if ($insertStmt->execute()) {
    $insertStmt->close();
    $conn->close();
    header("Location: register.php?success=1");
    exit();
}

$insertStmt->close();
$conn->close();
redirectWithError("Registration failed. Please try again.");
?>

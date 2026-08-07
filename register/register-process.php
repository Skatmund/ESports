<?php

require '../config/database.php';

// Get form data
$firstName = trim($_POST['first_name']);
$lastName = trim($_POST['last_name']);
$username = trim($_POST['username']);
$email = trim($_POST['email']);
$password = $_POST['password'];
$confirmPassword = $_POST['confirm_password'];

// Check if passwords match
if ($password !== $confirmPassword) {
    die("Passwords do not match.");
}

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert into database
$stmt = $conn->prepare("
    INSERT INTO users
    (first_name, last_name, username, email, password)
    VALUES (?, ?, ?, ?, ?)
");

$stmt->bind_param(
    "sssss",
    $firstName,
    $lastName,
    $username,
    $email,
    $hashedPassword
);

// IF REGISTRATION IS SUCCESSFUL

if ($stmt->execute()) {

    header("Location: ../login/login.php");
    exit();

} else {

    echo "Error: " . $stmt->error;

}

$stmt->close();
$conn->close();

?>
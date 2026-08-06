<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "esports";

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = $_POST['username'];
$password = $_POST['password'];

$stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
$stmt->bind_param("ss", $username, $username);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows == 1) {

    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {

        header("Location: ../dashboard/dashboard.php");
        exit();

    } else {

        header("Location: login.php?error=invalid");
        exit();

    }

} else {

    header("Location: login.php?error=invalid");
    exit();

}
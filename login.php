<?php
session_start();
$conn = new mysqli("localhost", "root", "", "interview_demo");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['name'];
        echo 'success';
        exit;
    } else {
        echo "<div class='alert alert-danger'>Invalid login!</div>";
    }
}

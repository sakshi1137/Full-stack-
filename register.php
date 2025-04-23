<?php
session_start(); // Session start hona chahiye pehle hi line me

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = isset($_POST["name"]) ? trim($_POST["name"]) : "";
    $email = isset($_POST["email"]) ? trim($_POST["email"]) : "";
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : "";
    $confirmPassword = isset($_POST["confirmPassword"]) ? trim($_POST["confirmPassword"]) : "";

    if (empty($name) || empty($email) || empty($password) || empty($confirmPassword)) {
        echo "<script>alert('All fields are required!'); window.location.href='register.html';</script>";
        exit();
    }

    if ($password !== $confirmPassword) {
        echo "<script>alert('Passwords do not match!'); window.location.href='register.html';</script>";
        exit();
    }

    // Save user info in session (simulate registration)
    $_SESSION["user"] = $name;

    // Redirect to dashboard
    header("Location: dashboard.php");
    exit();
} else {
    // Agar form POST se nahi aayi to redirect wapas
    header("Location: register.html");
    exit();
}
?>

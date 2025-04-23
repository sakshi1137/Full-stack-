<?php
session_start();

// Dummy login credentials
$valid_email = "user@example.com";
$valid_password = "123456";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if ($email === $valid_email && $password === $valid_password) {
        $_SESSION["user"] = $email;
        header("Location: dashboard.php");
        exit();
    } else {
        echo "<script>alert('Invalid login credentials.'); window.location.href='login.html';</script>";
    }
}
?>

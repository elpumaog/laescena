<?php
    include '../config/config.php';

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pw = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $pw);
        if($stmt->execute()) {
            header("Location: ../views/login.php");
        }else {
            echo "Error";
        }
    }
?>
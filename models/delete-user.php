<?php
    include '../config/config.php';

    $user_id = $_GET['id'];

    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute()) {
        header("Location: ../admin/users.php");
    } else {
        echo "Error";
    }
?>
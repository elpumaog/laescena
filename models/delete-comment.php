<?php
    include '../config/config.php';

    $comment_id = $_GET['id'];

    $sql = "DELETE FROM comments WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $comment_id);
    if($stmt->execute()) {
        header("Location: ../admin/panel.php");
    } else {
        echo "Error";
    }
?>
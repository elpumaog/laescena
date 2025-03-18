<?php
    include '../config/config.php';

    $post_id = $_GET['id'];

    $sql = "DELETE FROM posts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $post_id);
    if($stmt->execute()){
        header("Location: ../admin/panel.php");
    } else {
        echo "Error";
    }
?>
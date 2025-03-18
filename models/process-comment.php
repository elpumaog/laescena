<?php
    include '../config/config.php';

    $post_id = $_GET['id'];
    $user_name = $_POST['user_name'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO comments (post_id, user_name, comment) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $post_id, $user_name, $comment);
    if($stmt->execute()){
        header("Location: ../views/publicacion.php?id=" . $post_id);
    } else {
        echo "Error";
    }
?>
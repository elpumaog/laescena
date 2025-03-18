<?php
    include '../config/config.php';

    $admin_id = $_POST['admin_id'];
    $title = $_POST['title'];
    $tag = $_POST['tag'];
    $content = $_POST['content'];
    $img = $_FILES['post_img'];
    $rutaImg = NULL;

    // Si el usuario subio una imagen
    if ($img['error'] == 0) {
        $extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $infoImg = pathinfo($img['name']);
        $extensionImg = strtolower($infoImg['extension']);

        // Validar tipo de archivo
        if (in_array($extensionImg, $extensions)) {
            $imgName = uniqid() . "." . $extensionImg;  // Renombrar imagen
            $rutaImg = "../uploads/" . $imgName; // Carpeta donde se guarda

            // Mover la imagen al servidor
            if (!move_uploaded_file($img['tmp_name'], $rutaImg)) {
                die("Error al subir la imagen");
            }
        }else {
            die("Formato de imagen no permitido.");
        }
    }

    // Guardar en la based de datos

    $sql = "INSERT INTO posts (admin_id, title, tag, content, img_url) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("issss", $admin_id, $title, $tag, $content, $rutaImg);
    if ($stmt->execute()) {
        header("Location: ../admin/posts.php");
    } else {
        echo "Error";
    }

    $stmt->close();
    $conn->close();
?>
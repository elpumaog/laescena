<?php
    session_start();
    include '../config/config.php';

    $email = $_POST['email'];
    $pw = $_POST['password'];

    // Conseguir contraseña
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Comprobamos que el usuario existe
        $adminSql = "SELECT id, name, email, password FROM admin WHERE email = ?";
        $adminStmt = $conn->prepare($adminSql);
        $adminStmt->bind_param("s", $email);
        $adminStmt->execute();
        $adminResult = $adminStmt->get_result();
        if ($adminResult->num_rows > 0) {
            $fila = $adminResult->fetch_assoc();
            $pw_hash = $fila['password'];

            if (password_verify($pw, $pw_hash)) {
                $_SESSION['admin_id'] = $fila['id'];
                $_SESSION['admin_name'] = $fila['name'];
                $_SESSION['admin_email'] = $fila['email'];
                header("Location: ../admin/panel.php");
            } else {
                header("Location: ../index.php");
            }
        } else {
            header("Location: ../index.php");
        }
    }
?>
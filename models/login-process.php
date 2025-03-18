<?php
    session_start();
    include '../config/config.php';

    $email = $_POST['email'];
    $pw = $_POST['password'];

    // Conseguir contraseña
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Comprobamos que el usuario existe
        $userSql = "SELECT id, name, email, password FROM users WHERE email = ?";
        $userStmt = $conn->prepare($userSql);
        $userStmt->bind_param("s", $email);
        $userStmt->execute();
        $userResult = $userStmt->get_result();
        if ($userResult->num_rows > 0) {
            $fila = $userResult->fetch_assoc();
            $pw_hash = $fila['password'];

            if (password_verify($pw, $pw_hash)) {
                $_SESSION['id'] = $fila['id'];
                $_SESSION['name'] = $fila['name'];
                $_SESSION['email'] = $fila['email'];
                header("Location: ../index.php");
            } else {
                header("Location: ../views/login.php");
            }
        } else {
            header("Location: ../views/login.php");
        }
    }
?>
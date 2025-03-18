<?php
    session_start();
    include '../config/config.php';
    if (isset($_SESSION['admin_id'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/posts.css">
</head>
<body>
    <header class="navbar-container">
        <nav class="navbar">
            <h2 class="navbar-title" >Admin Panel</h2>
            <ul class="nav-list flex">
                <li class="nav-item"><a href="panel.php">Inicio</a></li>
                <li class="nav-item"><a href="post.php">Crear Publicacion</a></li>
                <li class="nav-item"><a href="posts.php">Publicaciones</a></li>
                <li class="nav-item"><a href="users.php">Usuarios</a></li>
                <li class="nav-item"><a href="../models/logout.php">Salir</a></li>
            </ul>
        </nav>
    </header>
<?php
    } else {
        header("Location: index.php");
    }
?>
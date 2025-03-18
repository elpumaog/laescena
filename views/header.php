<?php session_start(); include '../config/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaEscena</title>
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/posts.css">
</head>
<body>
    <header class="navbar-container">
        <nav class="navbar">
            <h2 class="navbar-title" >LaEscena</h2>
            <ul class="nav-list flex">
                <li class="nav-item"><a href="index.php">Inicio</a></li>
                <li class="nav-item"><a href="scene.php?tag=scene">Escena</a></li>
                <li class="nav-item"><a href="emulators.php?tag=emulator">Emuladores</a></li>
                <?php if(isset($_SESSION['id'])){ ?>
                    <li class="nav-item"><a href="profile.php?id=<?php echo $_SESSION['id']; ?>"><?php echo $_SESSION['name']; ?></a></li>
                    <li class="nav-item"><a href="../models/logout.php">Cerrar Sesion</a></li>
                <?php }else { ?>
                    <li class="nav-item"><a href="login.php">Iniciar Sesion</a></li>
                    <li class="nav-item"><a href="register.php">Register</a></li>
                <?php } ?>
            </ul>
        </nav>
    </header>
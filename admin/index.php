<?php
    if(isset($_SESSION['admin_id'])){
        header("Location: panel.php");
    }else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Log In</title>
    <link rel="stylesheet" href="../assets/css/main.css">
</head>
<body>
    <section class="login-form">
        <h2>Iniciar Sesion</h2>
        <form action="../models/admin-login-process.php" method="POST">
            <div class="form-item">
                <label for="email">Correo Electronico</label><br>
                <input type="email" name="email" required>
            </div>
            <div class="form-item">
                <label for="password">Contraseña</label><br>
                <input type="password" name="password">
            </div>
            <button type="submit">Iniciar Sesion</button>
        </form>
    </section>
</body>
</html>
<?php } ?>
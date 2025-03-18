<?php 
    include 'header.php'; 
    if (isset($_SESSION['id'])) {
        header("Location: index.php");
    } else {
?>
<section class="login-form">
    <h2>Registrarte</h2>
    <form action="../models/register-process.php" method="POST">
        <div class="form-item">
            <label for="name">Nombre</label><br>
            <input type="text" name="name" placeholder="John Doe" required>
        </div>
        <div class="form-item">
            <label for="email">Correo Electronico</label><br>
            <input type="email" name="email" placeholder="johndoe@example.com" required>
        </div>
        <div class="form-item">
            <label for="password">Contraseña</label><br>
            <input type="password" name="password" required>
        </div>
        <button type="submit">Registrarte</button>
    </form>
</section>
<?php
    }

    include 'footer.php'; 
?>
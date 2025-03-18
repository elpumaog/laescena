<?php 
    include 'header.php'; 
    if (isset($_SESSION['id'])) {
        header("Location: index.php");
    } else {
?>
<section class="login-form">
    <h2>Iniciar Sesion</h2>
    <form action="../models/login-process.php" method="POST">
        <div class="form-item">
            <label for="email">Correo Electronico</label><br>
            <input type="email" name="email" placeholder="johndoe@example.com" required>
        </div>
        <div class="form-item">
            <label for="password">Contraseña</label><br>
            <input type="password" name="password">
        </div>
        <button type="submit">Iniciar Sesion</button>
    </form>
</section>
<?php 
    } 

    include 'footer.php';
?>
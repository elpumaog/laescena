<?php include 'header.php'; ?>
<section class="hero">
    <div class="hero-content">
        <h2>LaEscena</h2>
        <p>Blog dedicado a todo sobre la scene de consolas.</p>
        <?php if(!isset($_SESSION['id'])){ ?>
        <p><a href="#">Unete</a></p>
        <?php } ?>
    </div>
</section>
<h2>Ultimas Publicaciones</h2>
<?php

    $sql = "SELECT id, title, tag, content, date, img_url FROM posts ORDER BY date DESC";
    $resultado = $conn->query($sql);
?>
<section class="posts">
    <?php while ($fila = $resultado->fetch_assoc()){ ?>
        <div class="card">
            <img src="<?php echo $fila['img_url']; ?>" alt="Imagen de la Publicacion">
            <h3 class="card-title"><?php echo htmlspecialchars($fila['title']); ?></h3>
            <p><?php echo htmlspecialchars($fila['tag']); ?></p>
            <p><?php echo htmlspecialchars($fila['date']); ?></p>
            <a href="publicacion.php?id=<?php echo $fila['id']; ?>">Ver mas</a>
        </div>
    <?php } ?>
</section>
<?php include 'footer.php'; ?>
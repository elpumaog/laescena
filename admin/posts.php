<?php
    include 'header.php';

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
            <a href="../models/delete-post.php?id=<?php echo $fila['id']; ?>">Eliminar</a>
        </div>
    <?php } ?>
</section>
<?php
    include 'header.php';

    $tag = $_GET['tag'];
    
    $sql = "SELECT * FROM posts WHERE tag = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $tag);
    $stmt->execute();
    $scene = $stmt->get_result();
?>
<section class="posts">
    <?php
        if ($scene->num_rows == 0) {
    ?>
    <h2>No hay publicaciones con esta etiqueta todavia.</h2>
    <?php }else{ ?>
    <?php while ($fila = $scene->fetch_assoc()){ ?>
        <div class="card">
            <img src="<?php echo $fila['img_url']; ?>" alt="Imagen de la Publicacion">
            <h3 class="card-title"><?php echo htmlspecialchars($fila['title']); ?></h3>
            <p><?php echo htmlspecialchars($fila['tag']); ?></p>
            <p><?php echo htmlspecialchars($fila['date']); ?></p>
            <a href="publicacion.php?id=<?php echo $fila['id']; ?>">Ver mas</a>
        </div>
    <?php }} ?>
</section>
<?php include 'footer.php'; ?>
<?php
    include 'header.php';

    $post_id = $_GET['id'];

    $sql = "SELECT title, tag, content, date, img_url FROM posts WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $post_id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows == 0) {
        die("Publicacion no encontrada");
    }

    $fila = $resultado->fetch_assoc();

    $commentSql = "SELECT id, user_name, comment, date FROM comments WHERE post_id = ?";
    $commentStmt = $conn->prepare($commentSql);
    $commentStmt->bind_param("i", $post_id);
    $commentStmt->execute();
    $comments = $commentStmt->get_result();
?>
<section class="post-view">
    <h2 class="view-title"><?php echo htmlspecialchars($fila['title']); ?></h2>
    <p class="view-date"><?php echo htmlspecialchars($fila['date']); ?></p>
    <div class="view-img">
        <img src="<?php echo $fila['img_url']; ?>" alt="Imagen de la Publicacion">
    </div>
    <p class="view-date"><?php echo htmlspecialchars($fila['tag']); ?></p>
    <p class="view-content"><?php echo $fila['content']; ?></p>
    <hr>
    <h2>Comentarios</h2>
    <div class="comments">
        <?php if ($comments->num_rows == 0){ ?>
            <h2>No hay comentarios todavia, se el primero!</h2>
        <?php } else { ?>
        <?php while($comment = $comments->fetch_assoc()){ ?>
        <div class="comment">
            <h3><?php echo htmlspecialchars($comment['user_name']); ?></h3>
            <small><?php echo htmlspecialchars($comment['date']); ?></small>
            <p><?php echo htmlspecialchars($comment['comment']) ?></p>
            <a href="../models/delete-comment.php?id=<?php echo $comment['id']; ?>">Eliminar</a>
        </div>
        <?php } }?>
    </div>
</section>

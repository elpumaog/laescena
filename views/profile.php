<?php
    include 'header.php';

    $sql = "SELECT id, user_name, comment, date FROM comments WHERE user_name = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $_SESSION['name']);
    $stmt->execute();
    $comments = $stmt->get_result();
?>
<div class="post-view">
    <h2><?php echo $_SESSION['name']; ?></h2>
    <hr><br>
    <h3>Tus comentarios</h3><br>
    <div class="comments">
    <?php while($comment = $comments->fetch_assoc()){ ?>
        <div class="comment">
            <h3><?php echo htmlspecialchars($comment['user_name']); ?></h3>
            <small><?php echo htmlspecialchars($comment['date']); ?></small>
            <p><?php echo htmlspecialchars($comment['comment']) ?></p>
            <a href="../models/delete-comment-user.php?id=<?php echo $comment['id']; ?>">Eliminar</a>
        </div>
        <?php } ?>
    </div>
</div>
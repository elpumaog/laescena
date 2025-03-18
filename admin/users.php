<?php
    include 'header.php';

    $sql = "SELECT id, name, email FROM users";
    $resultado = $conn->query($sql);
?>
<section class="posts">
    <?php while ($fila = $resultado->fetch_assoc()){ ?>
        <div class="card">
            <input type="hidden" name="user_id" value="<?php echo $fila['id']; ?>">
            <h3 class="card-title"><?php echo htmlspecialchars($fila['name']); ?></h3>
            <p><?php echo htmlspecialchars($fila['email']); ?> · Id: <?php echo $fila['id']; ?></p>
            <a href="../models/delete-user.php?id=<?php echo $fila['id']; ?>">Eliminar</a>
        </div>
    <?php } ?>
</section>
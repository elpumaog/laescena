<?php
    include 'header.php';
    if(!isset($_SESSION['admin_id'])){
        header("Location: panel.php");
    }else {
?>
    <section class="login-form">
        <h2>Nueva Publicacion</h2>
        <form action="../models/new_post.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="admin_id" value="<?php echo $_SESSION['admin_id']; ?>">
            <div class="form-item">
                <label for="title">Titulo de la Publicacion:</label><br>
                <input type="text" name="title" required>
            </div>
            <div class="form-item">
                <label for="tag">Etiqueta:</label><br>
                <input type="text" name="tag" required>
            </div>
            <div class="form-item">
                <label for="post_img">Imagen:</label><br>
                <input type="file" name="post_img">
            </div>
            <div class="form-item">
                <label for="content">Contenido:</label><br>
                <textarea name="content" id="contenido" cols="100" rows="25"></textarea>
            </div>
            <button type="submit">Crear Publicacion</button>
        </form>
    </section>
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('contenido');
    </script>
<?php } ?>
<?php
include 'db.php';
include 'header.php';

// Filtramos si llega una categoría
$id_categoria = isset($_GET['id_categoria']) ? (int)$_GET['id_categoria'] : null;

// Consulta de noticias
if ($id_categoria) {
    $sql = "SELECT n.*, c.categoria 
            FROM noticia n
            JOIN categoria c ON n.id_categoria = c.id_categoria
            WHERE c.id_categoria = $id_categoria AND c.activa = 1
            ORDER BY n.id_noticia DESC";
} else {
    $sql = "SELECT n.*, c.categoria 
            FROM noticia n
            JOIN categoria c ON n.id_categoria = c.id_categoria
            WHERE c.activa = 1
            ORDER BY c.orden, n.id_noticia DESC";
}

$result = $conn->query($sql);
$noticias = $result ? $result->fetch_all(MYSQLI_ASSOC) : [];
?>

<?php if (empty($noticias)): ?>
    <div class="alert alert-warning text-center">
        No hay noticias disponibles.
    </div>
<?php else: ?>
    <div class="row">
        <?php foreach ($noticias as $noticia): ?>
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h5 class="card-title"><?= htmlspecialchars($noticia['titulo']) ?></h5>
                        <p class="card-text"><?= nl2br(htmlspecialchars($noticia['parrafo'])) ?></p>
                    </div>
                    <div class="card-footer text-muted">
                        <?= htmlspecialchars($noticia['categoria']) ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>

<?php include 'footer.php'; ?>

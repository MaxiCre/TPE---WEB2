<?php
include 'header.php';
include 'footer.php';

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

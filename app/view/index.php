<?php
include 'data.php'; // Tus arrays $categorias y $noticias
include 'header.php';

// Filtrado por categoría
$categoria_id = isset($_GET['categoria']) ? (int)$_GET['categoria'] : null;

// Ordenamos categorías por 'orden'
usort($categorias, fn($a,$b) => $a['orden'] <=> $b['orden']);

foreach ($categorias as $cat):
    if (!$cat['activa']) continue;
    if ($categoria_id && $cat['id'] != $categoria_id) continue;
?>
    <div class="categoria mb-5">
        <h2 class="mb-3"><?= htmlspecialchars($cat['nombre']) ?></h2>
        <div class="row">
            <?php foreach ($noticias as $noticia): ?>
                <?php if ($noticia['categoria_id'] == $cat['id']): ?>
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($noticia['titulo']) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($noticia['parrafo']) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
<?php endforeach; ?>

<?php include 'footer.php'; ?>

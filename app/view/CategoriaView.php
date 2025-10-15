<?php

class CategoriaView {

    public function showCategorias($categorias) {
        $count = count($categorias);

        // NOTA: el template va a poder acceder a todas las variables y 
        // constantes que tienen alcance en esta funcion
        require_once './templates/index.php';
    }

    public function showError($error) {
        echo "<h1>$error</h1>";
    }
}

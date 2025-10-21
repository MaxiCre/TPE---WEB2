<?php

class CategoriaView {

    public function showCategorias($categorias,$noticias=null,$user=null) {
        $count = count($categorias);
        // NOTA: el template va a poder acceder a todas las variables y 
        // constantes que tienen alcance en esta funcion
        require_once './templates/index.phtml';
    }


    public function showError($error,$user) {
        echo "<h1>$error</h1>";
    }
}

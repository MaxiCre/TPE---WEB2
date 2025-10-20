<?php
class NoticiasView {
    public function showNoticias($noticias,$categorias=null) {
        $count = count($noticias);
        // NOTA: el template va a poder acceder a todas las variables y 
        // constantes que tienen alcance en esta funcion
        
        require_once './templates/index.phtml';
    }

    public function showError($error) {
        echo "<h1>$error</h1>";
    }
}
?>
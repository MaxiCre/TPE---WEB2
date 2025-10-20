<?php
require_once './app/model/CategoriaModel.php';
require_once './app/view/CategoriaView.php';
require_once './app/model/NoticiaModel.php';

class CategoriasController{
    private $categoriaModel;
    private $categoriasView;
    private $noticiaModel;

    function __construct(){
        $this ->categoriaModel=new CategoriaModel();
        $this ->categoriasView=new CategoriaView();
        $this ->noticiaModel=new NoticiaModel();
    } 

    //showCategorias
    function showCategorias(){
        $categorias= $this->categoriaModel->getAll();
        
        $this->categoriasView->showCategorias($categorias);
    }
    function mostrarCategoria($id){
        $noticias= $this->noticiaModel->getNoticiaCategoria($id);
        $categorias= $this->categoriaModel->getAll();
        $this->categoriasView->showCategorias($categorias,$noticias);
    }
    function removeCategoria($id){
        // obtengo la tarea que quiero eliminar
        $categoria = $this->categoriaModel->get($id);
        $noticias= $this->noticiaModel->getNoticiaCategoria($id);

        if ($noticias) {
            return $this->categoriasView->showError("La categoría con ID = $id ({$categoria->nombre}) no se puede eliminar porque tiene noticias asociadas.");
        }
    
        $this->categoriaModel->remove($id);

        // redirijo al home
        header('Location: ' . BASE_URL);
    

    }
     function agregarCategoria() {
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->view->showError('Error: falta completar el nombre');
        }

        if (!isset($_POST['orden']) || empty($_POST['orden'])) {
            return $this->view->showError('Error: falta completar el orden');
        }
        if (!isset($_POST['activa']) || empty($_POST['activa'])) {
            return $this->view->showError('Error: falta completar activa');
        }

        // obtengo los datos del formulario
        $nombre = $_POST['nombre'];
        $orden = $_POST['orden'];
        $activa = $_POST['activa'];

        $id = $this->categoriaModel->insert($nombre, $orden, $activa);

        if (!$id) {
            return $this->view->showError('Error la insertar tarea');
        } 

        // redirijo al home
        header('Location: ' . BASE_URL);
    }
    //editCategorias
    //showCategoria
}
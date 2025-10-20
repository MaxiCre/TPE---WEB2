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
    //deleteCategorias
    //addCategorias
    //editCategorias
    //showCategoria
}
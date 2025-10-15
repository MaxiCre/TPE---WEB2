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
        $this->categoriasView->showNoticias($noticias,$categorias);
    }
    //deleteCategorias
    //addCategorias
    //editCategorias
    //showCategoria
}
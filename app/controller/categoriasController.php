<?php
require_once './app/model/CategoriaModel.php';
require_once './app/view/Categoriaview.php';

class CategoriasController{
    private $categoriaModel;
    private $categoriasView;
    private $noticiasModel;

    function __construct(){
        $this ->categoriaModel=new CategoriaModel();
        $this ->categoriasView=new CategoriaView();
        //$this ->noticiasModel=new NoticiasModel();
    } 

    //showCategorias
    function showCategorias(){
        $categorias= $this->categoriaModel->getAll();
        
        $this->categoriasView->showCategorias($categorias);
    }
    //deleteCategorias
    //addCategorias
    //editCategorias
    //showCategoria
}
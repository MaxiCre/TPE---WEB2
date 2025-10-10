<?
require_once './app/models/CategoriasModel.php';
require_once './app/views/task.view.php';
class CategoriaController{
    private $categoriaModel
    private $noticiasModel

    function __construc(){
        $this ->categoriaModel=new CategoriaModel();
        $this ->noticiasModel=new NoticiasModel();
    } 

    //showCategorias
    //deleteCategorias
    //addCategorias
    //editCategorias
    //showCategoria
}
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
    function showCategorias($request){
        $categorias= $this->categoriaModel->getAll();
        $noticias = $this->noticiaModel->getNoticias();
        $this->categoriasView->showCategorias($categorias,$noticias,$request->user);
    }
    function mostrarCategoria($request){
        $noticias= $this->noticiaModel->getNoticiaCategoria($request->id);
        $categorias= $this->categoriaModel->getAll();
        $this->categoriasView->showCategorias($categorias,$noticias,$request->user);
    }
    function removeCategoria($request){
        if($request->user!=null){
        // obtengo la tarea que quiero eliminar
        $categoria = $this->categoriaModel->get($request->id);
        $noticias= $this->noticiaModel->getNoticiaCategoria($request->id);

        if ($noticias) {
            return $this->categoriasView->showError("La categoría con ID = $request->id ({$categoria->nombre}) no se puede eliminar porque tiene noticias asociadas.",$request->user);
        }
    
        $this->categoriaModel->remove($request->id);

        // redirijo al home
        header('Location: ' . BASE_URL);
        }else{
            $this->categoriasView->showError("no tiene los privilegios",null);
        }

    }
     function agregarCategoria($request) {
        if($request->user!=null){
        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->categoriasView->showError('Error: falta completar el nombre',$request->user);
        }

        if (!isset($_POST['orden']) || empty($_POST['orden'])) {
            return $this->categoriasView->showError('Error: falta completar el orden',$request->user);
        }
        if (!isset($_POST['activa'])) {
            return $this->categoriasView->showError('Error: falta completar activa',$request->user);
        }

        // obtengo los datos del formulario
        $nombre = $_POST['nombre'];
        $orden = $_POST['orden'];
        $activa = $_POST['activa'];

        $id = $this->categoriaModel->insert($nombre, $orden, $activa);

        if (!$id) {
            return $this->categoriasView->showError('Error la insertar tarea',$request->user);
        } 

        // redirijo al home
        header('Location: ' . BASE_URL.'home');
        }else{
            $this->categoriasView->showError("no tiene los privilegios",null);
        }
    }
    public  function modificarCategoria($request) {
        if($request->user!=null){
         if (!isset($_POST['id_categoria']) || empty($_POST['id_categoria'])) {
            return $this->categoriasView->showError('Error: falta completar el nombre',$request->user);
        }

        if (!isset($_POST['nombre']) || empty($_POST['nombre'])) {
            return $this->categoriasView->showError('Error: falta completar el nombre',$request->user);
        }

        if (!isset($_POST['orden']) || empty($_POST['orden'])) {
            return $this->categoriasView->showError('Error: falta completar el orden',$request->user);
        }
        if (!isset($_POST['activa'])) {
            return $this->categoriasView->showError('Error: falta completar activa',$request->user);
        }
        // obtengo los datos del formulario
        $id=$_POST['id_categoria'];
        $nombre = $_POST['nombre'];
        $orden = $_POST['orden'];
        $activa = $_POST['activa'];

        $this->categoriaModel->modificar($id,$nombre,$orden,$activa);

         // redirijo al home
        header('Location: ' . BASE_URL);
        }else{
            $this->categoriasView->showError("no tiene los privilegios",null);
        }
    }

    //editCategorias
}
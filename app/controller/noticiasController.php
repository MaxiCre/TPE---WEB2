<?php
require_once './app/model/NoticiaModel.php';
require_once './app/view/NoticiasView.php';

class NoticiasController {
    private $noticiaModel;
    private $noticiasView;
    private $categoriaModel;

    function __construct() {
        $this->noticiaModel = new NoticiaModel();
        $this->noticiasView = new NoticiasView();
    }

    // showNoticias
    function showNoticias() {
        $noticias = $this->noticiaModel->getNoticias();
        $this->noticiasView->showNoticias($noticias, null);
    }

    function mostrarNoticia($id) {
        $noticia = $this->noticiaModel->getNoticia($id);
        $categorias = $this->categoriaModel->getAll();

        if (!$noticia) {
            return $this->noticiasView->showError("La noticia con ID = $id no existe.");
        }

        $this->noticiasView->showNoticias($noticia, $categorias);
    }

    function removeNoticia($id) {
        // obtengo la noticia que quiero eliminar
        $noticia = $this->noticiaModel->getNoticia($id);

        if (!$noticia) {
            return $this->noticiasView->showError("La noticia con ID = $id no existe.");
        }

        $this->noticiaModel->remove($id);

        // redirijo al home
        header('Location: ' . BASE_URL);
    }

    public  function modificarNoticia($request) {
        if (!isset($_POST['id_noticia']) || empty($_POST['id_noticia'])) {
            return $this->noticiasView->showError('Error: falta completar el nombre',$request->user);
        }

        if (!isset($_POST['titulo']) || empty($_POST['titulo'])) {
            return $this->noticiasView->showError('Error: falta completar el nombre',$request->user);
        }

        if (!isset($_POST['parrafo']) || empty($_POST['parrafo'])) {
            return $this->noticiasView->showError('Error: falta completar el orden',$request->user);
        }
        if (!isset($_POST['id_categoria'])) {
            return $this->noticiasView->showError('Error: falta completar activa',$request->user);
        }
       // obtengo los datos del formulario
        $id=$_POST['id_categoria'];
        $titulo = $_POST['titulo'];
        $parrafo = $_POST['parrafo'];
        $idcat = $_POST['id_categoria'];

        $this->noticiaModel->modificar($id,$titulo,$parrafo,$idcat);

        // redirijo al home
        header('Location: ' . BASE_URL);
    }

    function agregarNoticia($request) {
        if (!isset($_POST['titulo']) || empty($_POST['titulo'])) {
            return $this->noticiasView->showError('Error: falta completar el nombre',$request->user);
        }

        if (!isset($_POST['parrafo']) || empty($_POST['parrafo'])) {
            return $this->noticiasView->showError('Error: falta completar el orden',$request->user);
        }

        // obtengo los datos del formulario
        $titulo = $_POST['titulo'];
        $parrafo = $_POST['parrafo'];

        $id = $this->noticiaModel->insert($titulo, $parrafo);

        if (!$id) {
            return $this->noticiasView->showError('Error la insertar tarea',$request->user);
        } 

        // redirijo al home
        header('Location: ' . BASE_URL);
    }
}
?>
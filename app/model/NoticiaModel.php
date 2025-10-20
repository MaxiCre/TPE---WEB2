<?php
class NoticiaModel{
    private $db;
    function __construct(){
        $this->db=new PDO('mysql:host=localhost;dbname=db_noticia;charset=utf8', 'root', '');
    }
    public function getNoticiaCategoria($id) {
        $query = $this->db->prepare('SELECT * FROM noticia WHERE id_categoria = ?');
    
        $query->execute([$id]);
    
        $categoria = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $categoria;
    }

    public function getNoticias() {
        $query = $this->db->prepare('SELECT * FROM noticia');
    
        $query->execute();
    
        $noticias = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $noticias;
    }

    public function getNoticia($id) {
        $query = $this->db->prepare('SELECT * FROM noticia WHERE id_noticia = ?');
    
        $query->execute($id);
    
        $noticia = $query->fetchAll(PDO::FETCH_OBJ);
        
        return $noticia;
    }

    function remove($id) {
        $query = $this->db->prepare('SELECT * FROM noticia WHERE id_noticia = ?');
        $query->execute([$id]);
    }

    function insert($titulo, $parrafo) {
        $query = $this->db->prepare("INSERT INTO noticia(titulo, parrafo) VALUES(?,?)");
        $query->execute([$titulo, $titulo]);

        // var_dump($query->errorInfo());

        return $this->db->lastInsertId();
    }
    
    function modificar($id,$titulo,$parrafo,$idcat) {
        $query = $this->db->prepare('UPDATE noticia SET titulo = ?, parrafo = ?  WHERE id_noticia = ?');
        $query->execute([$id, $titulo, $parrafo, $idcat]);
    }
}
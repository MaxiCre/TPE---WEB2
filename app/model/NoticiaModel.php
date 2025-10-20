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


}
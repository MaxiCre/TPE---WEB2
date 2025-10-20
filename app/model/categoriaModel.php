<?php

class CategoriaModel{
    private $db;
    function __construct(){
        $this->db=new PDO('mysql:host=localhost;dbname=db_noticia;charset=utf8', 'root', '');
    }
    public function getAll() {
        // 2. ejecuto la consulta SQL (SELECT * FROM tareas)
                
        $query = $this->db->prepare('SELECT * FROM categoria ORDER BY orden ASC');
        $query->execute();
        $categorias = $query->fetchAll(PDO::FETCH_OBJ);


        return $categorias;
    }
     public function get($id) {
        // 2. ejecuto la consulta SQL (SELECT * FROM tareas)
                
        $query = $this->db->prepare('SELECT * FROM categoria WHERE id_categoria = ?');
        $query->execute([$id]);
        $task = $query->fetch(PDO::FETCH_OBJ);

        return $task;

    }
     function remove($id) {
        $query = $this->db->prepare('DELETE from categoria where id_categoria = ?');
        $query->execute([$id]);


    }
    function insert($nombre, $orden, $activa) {
        $query = $this->db->prepare("INSERT INTO categoria(nombre, orden, activa) VALUES(?,?,?)");
        $query->execute([$nombre, $orden, $activa]);

        // var_dump($query->errorInfo());

        return $this->db->lastInsertId();
    }


}
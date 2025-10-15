<?php

class CategoriaModel{
    private $db;
    function __construct(){
        $this->db=new PDO('mysql:host=localhost;dbname=db_noticia;charset=utf8', 'root', '');
    }
  public function getAll() {
        // 2. ejecuto la consulta SQL (SELECT * FROM tareas)
        $query = $this->db->prepare('SELECT * FROM categoria');
        $query->execute();

        // 3. obtengo los resultados de la consulta
        $tasks = $query->fetchAll(PDO::FETCH_OBJ);

        return $tasks;
    }


}
<?php
    /**
     * Retorna una conexión a la base de datos.
     */
    function connect() {
        return new PDO('mysql:host=localhost;port=3307;'.'dbname=db_tareas;charset=utf8', 'root', '');
    }

    /**
     * Obtiene la lista de tareas dejando en primer lugar las que no fueron finalizadas.
     */
    function getTareas() {
        $db = connect();
        $query = $db->prepare('SELECT * FROM tarea');
        $query->execute();
        $tareas = $query->fetchAll(PDO::FETCH_OBJ);

        return $tareas;
    }

    function insertTarea($tituto, $descripcion, $completada) {
        // 1) abro la conexion con mysql
        $db = connect();

        // 2)enviamos la consulta
        $query = $db->prepare("INSERT INTO tarea(titulo, descripcion, estado) VALUES (?, ?, ?) ");  
        //los ? son para verificar que el usuario no ingrese codigo malisioso
        $query->execute([$tituto, $descripcion, $completada]);        //la ejecuto
    }

    function deletetarea($id) {
        // 1) abro la conexion con mysql
        $db = connect();
        // 2)enviamos la consulta
        $query = $db->prepare("DELETE FROM tarea WHERE id=?"); 
        return $query->execute([$id]);        //la ejecuto
    }
?>
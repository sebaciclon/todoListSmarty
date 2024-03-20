<?php
include('db.php');

function agregarTarea() {
    //print_r($_POST);
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    if(isset($_POST['completada']))
        $completada = $_POST['completada'];
    else
        $completada = 0;

    insertTarea($titulo, $descripcion, $completada);

    header("Location: home");
}

function eliminarTarea($id) {
    deletetarea($id);

    header('Location: http://'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');
}

function home() {
    $tareas = getTareas();
    //print_r($tareas);
    ?>
    




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Lista de tareas</title>
</head>
<body>
    <div class="container">
        <h1 class="text-aling-center">Lista de tareas</h1>
        <ul class="list-group">
            <?php
            foreach($tareas as $tarea) {
                echo '<li class="list-group-item">'.$tarea->titulo. ': '.$tarea->descripcion. 
                '<a href="eliminarTarea/'.$tarea->id.'">ELIMINAR</a></li>';
                
            }
            ?>
        </ul>

        <h1 class="text-aling-center">Formulario</h1>
        <form method="post" action="agregarTarea">
            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" aria-describedby="emailHelp">
            
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion">
            </div>

            <div class="mb-3">
                <label for="completada" class="form-label">Completada</label>
                <input type="checkbox" id="completada" name="completada">
            </div>
        
            <button type="submit" class="btn btn-primary">Crear tarea</button>
      </form>
    </div>
    
</body>
</html>
<?php } ?>
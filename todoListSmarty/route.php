<?php

include('index.php');
//include('calculadora.php');
//include('pi.php');

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

//en .htaccess (RewriteRule ^(.*)$ route.php?action=$1 [QSA,L]) va el nombre de este archivo (route.php) 
// y lo que esta en $_GET['action']
$accion = $_GET['action'];

if($accion == '') {
    home();
} else {
    //crea un arreglo con lo que tiene la variable $accion. 
    //divide lo que viene dentro de $accion (seria lo que esta en la URL despues de action=) segun /
    $parametros = explode('/' , $accion);

    //en $parametros[0] esta la accion que queremos hacer(home, crear, etc )
    switch($parametros[0]) {
        
        case 'home': {
            home();
        break;
        }
        case 'agregarTarea': {
            agregarTarea();
        break;
        }
        case 'eliminarTarea': {
            eliminarTarea($parametros[1]);
        break;
        }
        //default: {
        //    echo "Error, ruta no encontrada";
        //break;
        }
    }


?>
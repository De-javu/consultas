<?php

require_once 'conexion.php';
// SE CREA LA FUNCION QUE TRAE LOS DATOS DE LA BASE DE DATOS 
function registros($conexion, $busqueda = null, $skip, $top)
{
    // Comprobar si hay una búsqueda
    if(isset($busqueda)){
        // Escapar los caracteres especiales que puedan venir en $busqueda
        $busqueda = htmlspecialchars($busqueda);
        $busqueda = mysqli_real_escape_string($conexion, $busqueda);
    
        // Ejecutar la consulta SQL usando la variable $busqueda
        $sql= "SELECT * FROM rollo WHERE nombrearchivo LIKE '%$busqueda%'";
    } else {
        // Ejecutar la consulta SQL sin filtro
        $sql= "SELECT * FROM rollo limit ". $top ." offset " . $skip - $top;
    }

    // Ejecutar la consulta y obtener los resultados
    $resultado = mysqli_query($conexion, $sql) or die ("No se ha podido ejecutar la consulta");

    // Devolver el resultado
    return $resultado;
}

function size($conexion, $busqueda = null )
{
    // Comprobar si hay una búsqueda
    if(isset($busqueda)){
        // Escapar los caracteres especiales que puedan venir en $busqueda
        $busqueda = htmlspecialchars($busqueda);
        $busqueda = mysqli_real_escape_string($conexion, $busqueda);
    
        // Ejecutar la consulta SQL usando la variable $busqueda /*estudiar est0 */
        $sql= "SELECT count(*) as cantidad FROM rollo WHERE nombrearchivo LIKE '%$busqueda%'";
    } else {
        // Ejecutar la consulta SQL sin filtro
        $sql= "SELECT count(*) as cantidad FROM rollo";
    }

    // Ejecutar la consulta y obtener los resultados
    $resultado = mysqli_query($conexion, $sql) or die ("No se ha podido ejecutar la consulta");

    // Devolver el resultado
    return $resultado;
}
?>






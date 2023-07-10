<?php
// SE CREA LA FUNCION QUE TRAE LOS DATOS DE LA BASE DE DATOS 
function registros($conexion)
{
    // $sql="SELECT replace(r.img, '\\\', '/') as url_img, r.* FROM `rollo` r;";
    $sql= "SELECT * FROM rollo";

    $medellin = mysqli_query($conexion, $sql) or die ("No se ha podido ejecutar la consulta");

    return $medellin;

}


?>



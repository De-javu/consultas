<?php
function registros($conexion)
{
    $sql="SELECT * FROM rollo";

    $medellin = mysqli_query($conexion, $sql)  or die ("No se ha podido ejecutar la consulta");

    return $medellin;

}

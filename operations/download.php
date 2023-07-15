<?php
/*En esta linea de codigo indica que en la variable $filelocatio se creara la ruta 
donde se realiza la validacion de los documentos y se concatena por medio de un punto
la funcion filter_input la cual pide tres parametros
el mento de entrada , el nombre de la funcion , el filtro a realizar.
si se cumple es null de lo contrario es falce */
$fileLocation = 'D:/DiscoExtra/csv/191/' . filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);


/*utilizamos un condicional para validar con la funcion file_exists, si existe
el archivo o url que enviamos 
de cumplirce esta condicion se ejecuta el programa*/
if(file_exists($fileLocation)){
    header("Content-Type: application/pdf");/*Se utiliza para indicar el tipo de archivo a descargar*/
    header('Content-Disposition: inline; filename="'.basename($fileLocation).'"');/*Esta linea de codico muestra el archivo en line en la misma venta y asicional con la funcion besaname se encarga de tarer la ultima estencion y que el nombre cambie*/
    header("Content-Length: " . filesize($fileLocation));/*Esta line se encraga de realizar la descargar y mostar la line de descarga del archivo */
    readfile($fileLocation);/*Se encarga de leer el archivo lo envia la navegador sin tener que usar variables */
    exit;
} else {
    echo "Archivo no encontrado";
}

clearstatcache(true, $fileLocation);
?>




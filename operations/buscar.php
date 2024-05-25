<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo de consulta</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../styles.css" />

</head>

<?php


$skip = 0; // Declaración de la variable $skip
$top = 0; // Declaración de la variable $top


// RUTA PARA CONSULTAR LOS ARCHIVOS EXTERNOS 
//$link =("file:///D:/DiscoExtra/csv/191"); // Indicar la ruta
$link = ("../img/191"); // Indicar la ruta


require_once '../includes/conexion.php';
require_once '../includes/cabecera.php';

// Recibir la búsqueda del formulario, aca se valida que la varible no este vacia,
// Si esta vacia mostrata un alerta 
$busqueda = $_POST['busqueda'];
if (empty($busqueda)) {
    echo "<h1>EL CAMPO DE CONSULTA ESTA VACIO INTENTALO DE NUEVO !!!<h1>";
    header('refresh:3; ../index.php?pagina=1');
    exit;
}

//Conectar con la base de datos
require_once '../includes/helpers.php';

// Llamar a la función registros con la búsqueda y la conexión
$resultado = registros($db, $busqueda, $skip, $top);



//Luego ponemos un condicinal el cual se encarga de verificar si la variable no esta basia
//verificamos si el numero de filas que retorna la variable es >=1
// Si se cumplen esas dos condicionales se ejecutar el ciclo while 
if (!empty($resultado) && mysqli_num_rows($resultado) >= 1) {

    //ponemos el array asosiativo en la variable $fila 
    while ($fila = mysqli_fetch_assoc($resultado)) {


        // Ruta de consulta de la busqueda realizada por el buscador 
        // va al dierecotio de descaraga se pone en la ruta el nombre del archivo
        // por ultimo el hipervincilo que cuando se pica nos abre la ventana del archivo
        ?>
        <a href="download.php?url=&name=<?php echo $fila['nombrearchivo']; ?>"> 

            <h2 class="text-info mb-3 text-center">
                <?= $fila['nombrearchivo'] ?>
            </h2>
        </a>

        <?php




    }


} else {

    echo "<h1>" . "No se econtro resultados" . "</h1>";
    echo "<h1>" . "Realiza una nueva consulta" . "</h1>";
    echo "<h1>" . "Por favor " . "</h1>";

    header('refresh:2; ../index.php?pagina=1');

}



// Cerrar la conexión
mysqli_close($db);
 require_once '../includes/pie.php';

?>

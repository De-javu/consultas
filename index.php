<?php
//INCLUIMOS LOS FICHEROS DE LAS PAGINAS DE CONEXION
//INCLUIMOS LOS FICHEROS DE LAS PAGINAS DE CONSULTA SQL 

require_once 'includes/conexion.php';
require_once 'includes/helpers.php';

//FUNCIONQUE TRAE LOS DATOS DESDE LA BASE DE DATOS, SE CAPTURAN UNA VARIABLE
$datos = registros($db);

//RUTA DE LA CARPETA IMG PARA CONSULTAR 
//$ruta = "img/191/"; // Indicar la ruta

// RUTA PARA CONSULTAR LOS ARCHIVOS EXTERNOS 
$link =("file:///D:/DiscoExtra/csv/191"); // Indicar la ruta


// HTML INICIO
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo de consulta</title>

    <h1>base de cosnulta </h1>
</head>

<!-- BLOQUE DONDE SE REALIZARA EL FORMULARIO DE BUSQUEDA -->
<div>
    <h1>Buscar</h1>
    <form action="buscar.php" method="POST">
        <input type="text" name="busqueda">
        <input type="submit" value="buscar">
    </form>
</div>

<body>
    <div>
        <!-- INICIO DE TABLA  -->
        <table>
            <thead>
                <tr>
                    <!-- TITULOS DE LA TABLA  -->
                    <th>#</th>
                    <th>PRONTUARIO......</th>
                    <th>NOMBRES.........</th>
                    <th>APELLIDOS.......</th>
                    <th>IDENTIFICACION..</th>
                    <th>NOMBRE ARCHIVO..</th>
                    <th>IMG.............</th>

                </tr>

            </thead>
            <tbody>

                <!-- LISTAR LOS DATOS DE LA BASE EN LA TABLA  -->
                <?php
                while ($consulta = mysqli_fetch_assoc($datos)): ?>
                    <tr>
                        <td>
                            <?php echo $consulta['id']; ?>
                        </td>
                        <td>
                            <?php echo $consulta['prontuario']; ?>
                        </td>
                        <td>
                            <?php echo $consulta['nombre']; ?>
                        </td>
                        <td>
                            <?php echo $consulta['apellido']; ?>
                        </td>
                        <td>
                            <?php echo $consulta['identificacion']; ?>
                        </td>


                        <!-- CREACION DEL LINK DE CONSULTA -->
                        <td>
                        <a
                        href="operations/download.php?url=<?php echo $link . $consulta['nombrearchivo'];
                        ?>&name=<?php echo $consulta['nombrearchivo']; ?>">
                        <?php echo $consulta['nombrearchivo']; 
                        
                        ?>
                        
                    </a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>

        </table>
    </div>
</body>
</html>
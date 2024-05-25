<?php
//INCLUIMOS LOS FICHEROS DE LAS PAGINAS DE CONEXION
//INCLUIMOS LOS FICHEROS DE LAS PAGINAS DE CONSULTA SQL 

require_once 'includes/conexion.php';
require_once 'includes/helpers.php';




$pagina = $_GET['pagina'];
$top = 5;
$skip = $pagina * $top;


//FUNCION QUE TRAE LOS DATOS DESDE LA BASE DE DATOS, SE CAPTURAN UNA VARIABLE
$datos = registros($db, null, $skip, $top);
$size = mysqli_fetch_assoc(size($db, null))["cantidad"];


//RUTA DE LA CARPETA IMG PARA CONSULTAR 
//$ruta = "img/191/"; // Indicar la ruta

// RUTA PARA CONSULTAR LOS ARCHIVOS EXTERNOS 
//$link =("file:///D:/DiscoExtra/csv/191/"); // Indicar la ruta
$link = ("img/191");


//Consultar para contar elementos totales paginar
// HTML INICIO
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo de consulta</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="styles.css" />

</head>
<body>
<header>
    <div class="bg-dark text-white">
        <div class="container text-center">
            <div class="col-md-12 ">
                <h5>REPOSITORIO DIGITAL IMPERIO BIT</h5>
            </div>
</header>



    <div class="container border col-9">
        <div class="row">

            <header id="header" class="col P-2">

                <nav class=" shadow-none p-3 mb-5 bg-light rounded ">

                    <h1 class="text-info mb-3">DEMO
                    </h1>

                    <form action="operations/buscar.php" method="POST">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="busqueda" placeholder="Ingresa la consulta">
                            <button class="btn btn-outline-success btn-lg" type="submit" id="button-addon2"
                                value="buscar">BUSCAR</button>
                    </form>

                </nav>


            </header>
        </div>
        <div class="row">
            <!-- INICIO DE TABLA  -->

            <table class="table table-hover col p-2 ">
                <thead class="thead-dark">
                    <tr class="text-center">
                        <!-- TITULOS DE LA TABLA  -->
                        <th>#</th>
                        <th>PRONTUARIO</th>
                        <th>NOMBRES</th>
                        <th>APELLIDOS</th>
                        <th>IDENTIFICACION</th>
                        <th>NOMBRE ARCHIVO</th>

                    </tr>

                </thead>
                <tbody>

                    <!-- LISTAR LOS DATOS DE LA BASE EN LA TABLA  -->
                    <?php
                    while ($consulta = mysqli_fetch_assoc($datos)): ?>


                        <tr class="text-center">
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
                                <a href="operations/download.php?url=<?php echo $link . $consulta['nombrearchivo'];
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

        <!-- SISTEMA PARA LA PAGINACIION  -->
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">

                <!-- DESACTIVACION DEL BOTON ANTERIOR -->
                <li class="page-item
                    <?php echo $_GET['pagina'] <= 1 ? 'disabled' : '' ?>">
                    <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina'] - 1 ?>">
                        Anterior
                    </a>
                </li>
                <!-- CICLO FOR PARA RECORRER LA PAGINACION Y LISTAR -->
                <?php for ($i = 0; $i < $size / 5; $i++): ?>

                    <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>">
                        <a class="page-link" href="index.php?pagina=<?php echo $i + 1 ?>">
                            <?php echo $i + 1 ?>
                        </a>
                    </li>
                <?php endfor ?>

                <!-- DESACTIVACION DE BOTON SIGUIENTE -->
                <li class="page-item
                    <?php echo $_GET['pagina'] >= $i ? 'disabled' : '' ?>">
                    <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">
                        siguiente
                    </a>
                </li>
            </ul>
        </nav>
    </div>
    


    <script type="text/javascript" src="jquery/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>



    <footer>

        <div class="bg-dark text-white ">
            <div class="container text-center">
                <div class="col-md-12 ">
                    <h5>Información de contacto</h5>
                    <p class="text-muted">Dirección: Calle 123, Bogotá, Colombia</p>
                    <p class="text-muted">Teléfono: +57 123 456 7890</p>
                    <p class="text-muted">Email: info@ejemplo.com</p>
                </div>
                <div class="col-12 text-center">
                    <p class="text-white">© 2021 Todos los derechos reservados</p>
                </div>

            </div>
        </div>

    </footer>

    </body>

</html>
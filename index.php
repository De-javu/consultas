    <?php
    //INCLUIMOS LOS FICHEROS DE LAS PAGINAS DE CONEXION
    //INCLUIMOS LOS FICHEROS DE LAS PAGINAS DE CONSULTA SQL 

    require_once 'includes/conexion.php';
    require_once 'includes/helpers.php';

    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
    
   


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

    <?php require_once 'includes/cabecera.php'; ?>

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

                <table id="tabla" class="table table-hover col p-2 ">
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
                        <?php echo $pagina <= 1 ? 'disabled' : '' ?>">
                        <a class="page-link" href="index.php?pagina=<?php echo $pagina- 1 ?>">
                            Anterior
                        </a>
                    </li>



                    <!-- CICLO FOR PARA RECORRER LA PAGINACION Y LISTAR -->
                    <?php for ($i = 0; $i < $size / 5; $i++): ?>

                        

                        <li class="page-item <?php echo $pagina == $i + 1 ? 'active' : '' ?>">
                            <a class="page-link" href="index.php?pagina=<?php echo $i + 1 ?>">
                                <?php echo $i + 1 ?>
                            </a>
                        </li>
                    <?php endfor ?>

                    <!-- DESACTIVACION DE BOTON SIGUIENTE -->
                    <li class="page-item
                        <?php echo $pagina >= $i ? 'disabled' : '' ?>">
                        <a class="page-link" href="index.php?pagina=<?php echo $pagina + 1 ?>">
                            siguiente
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
        


        <script type="text/javascript" src="jquery/jquery-3.7.1.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>


    <?php require_once 'includes/pie.php'; ?>

        </body>

    </html>
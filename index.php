<?php
//INCLUIMOS LOS FICHEROS DE LAS PAGINAS DE CONEXION
require_once 'includes/conexion.php';
require_once 'includes/helpers.php';

//RUTAS DE LAS IMAGENES
$datos = registros($db);
$ruta = "img/191/"; // Indicar la ruta
//$ruta = fopen("D:/XAMPP/htdocs/demo/img/191/" ,"r"); // Indicar la ruta


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo de consulta</title>

    <h1>base de cosnulta </h1>
</head>

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
                <?php
                     while($consulta =mysqli_fetch_assoc($datos)): ?>
                    <tr>                 
                    <td><?php echo $consulta['id'];?></td>
                    <td><?php echo $consulta['prontuario'];?></td>
                    <td><?php echo $consulta['nombre'];?></td>
                    <td><?php echo $consulta['apellido'];?></td>
                    <td><?php echo $consulta['identificacion'];?></td>
                    
                    
                    <td><a href="<?php echo $ruta.$consulta['nombrearchivo'];?>">
                    <?php echo $consulta['nombrearchivo'];
                     
                    ?></a></td>            
                                       
                    </tr>

                
                <?php endwhile; ?>

                              
            </tbody>

        </table>



    </div>



</body>

</html>

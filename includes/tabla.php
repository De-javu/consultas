<?php require_once 'conexion.php'?>

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
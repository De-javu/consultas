<?php

// RUTA PARA CONSULTAR LOS ARCHIVOS EXTERNOS 
//$link =("file:///D:/DiscoExtra/csv/191"); // Indicar la ruta
$link =("../img/191"); // Indicar la ruta

// Recibir la búsqueda del formulario
$busqueda = $_POST['busqueda'];

//Conectar con la base de datos
require_once '../includes/helpers.php';

// Llamar a la función registros con la búsqueda y la conexión
$resultado = registros($db, $busqueda);

//Luego ponemo un condicinal el cual se encarga de verificar si la variable no esta basia
//veificamos si el numero de filas que retorna la variable es >=1
// Si se cumplen esas dos condicionales se ejecutar el ciclo while 
if (!empty($resultado) && mysqli_num_rows($resultado) >=1 ){ 

//ponemos el array asosiativo en la variable $fila 
while ($fila = mysqli_fetch_assoc($resultado)) {


    // Ruta de consulta de la busqueda realizada por el buscador 
    ?>
    <a href="download.php?url=<?php echo $link. $fila['nombrearchivo']
    ?>&name=<?php echo $fila['nombrearchivo']; ?>">

                    <h2>
                        <?= $fila['nombrearchivo'] ?>
                    </h2>

    
<?php
   
  
    

}


}else{

    echo "<h1>"."No se econtro resultados". "</h1>";
    echo "<h1>"."Realiza una nueva consulta". "</h1>";
    echo "<h1>"."Por favor ". "</h1>";
    
    header('refresh:3; ../index.php');

}



// Cerrar la conexión
mysqli_close($db);
?>

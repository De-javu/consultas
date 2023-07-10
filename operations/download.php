<?php
$fileLocation = 'D:/DiscoExtra/csv/191/' . filter_input(INPUT_GET, 'name', FILTER_SANITIZE_STRING);


if(file_exists($fileLocation)){
    header("Content-Type: application/octet-stream");
    header('Content-Disposition: attachment; filename="'.basename($fileLocation).'"');
    header("Content-Length: " . filesize($fileLocation));
    readfile($fileLocation);
    exit;
} else {
    echo "Archivo no encontrado";
}
?>




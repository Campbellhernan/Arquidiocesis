<?php
require_once '../librerias/conexion.php';
$conexion = conectar();

$id_doc = $_REQUEST['id_doc'];

$registros = mysqli_query($conexion, "select * from documento where id_doc = '$id_doc'");
$fila = mysqli_fetch_array($registros);

// Archivos
$archivos = [];
$folder = "uploads/documentos/" . $id_doc;

if (is_dir($folder)) {
    $files  = array_diff(scandir($folder), array('.', '..'));

    foreach ($files as $file) {
        $short_name = $file;
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        $url = $folder . '/' . urlencode($file);

        if (strlen($short_name) > 20) {
            $short_name = substr($file, 0, 17) . '...';
        }
        $archivos[] = ['name' => $file, 'short_name' => $short_name, 'url' => $url];
    }
}

$fila['archivos'] = $archivos;

echo json_encode($fila);

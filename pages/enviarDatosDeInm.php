<?php
require_once '../librerias/conexion.php';
$conexion = conectar();

$id_inm = $_REQUEST['id_inm'];

$registros = mysqli_query($conexion, "select * from inmueble where id_inm = $id_inm");
$fila = mysqli_fetch_array($registros);

$fecha = date_create_from_format("Y-m-d", $fila['fecha']);
if ($fecha) {
    $fila['fecha'] = $fecha->format('d-m-Y');
}


// Archivos
$archivos = [];
$folder = "uploads/inmuebles/" . $id_inm;

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

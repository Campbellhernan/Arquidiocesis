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

$resultado = mysqli_query($conexion, "SELECT DIN_HIJO FROM din_divisiones_inmuebles WHERE DIN_PADRE = $id_inm");
$lista_valores_hijos = array();
$lista_codigos_hijos = array();
//$i = 0;
while($hijos = mysqli_fetch_array($resultado)){
//    $lista_hijos[] = $hijos['DIN_HIJO'];
    $lista_valores_hijos[] = $hijos['DIN_HIJO'];
    $id_temp = $hijos['DIN_HIJO'];
    $resultado_temporal = mysqli_query($conexion, "SELECT cod_inm FROM inmueble WHERE id_inm = $id_temp");
    $temporal = mysqli_fetch_array($resultado_temporal);
    $lista_codigos_hijos[] = $temporal['cod_inm'];
//    $i++;
}

$fila['hijos'] = $lista_codigos_hijos;
$fila['valores_hijos'] = $lista_valores_hijos;
echo json_encode($fila);

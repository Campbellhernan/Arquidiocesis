<?php
function conectar() {
    $conexion = mysqli_connect("localhost", "root", "", "scnueva") or die("Problemas con la conexión");
    mysqli_set_charset($conexion, "utf8");

    return($conexion);
}

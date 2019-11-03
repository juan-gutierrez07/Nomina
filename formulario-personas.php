<?php

$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$basededatos  = "practicas";
$dni = $_POST['dni'];
$nombres = $_POST['nombres'];
$apellidos = $_POST['apellidos'];
$direccion = $_POST['dirrecion'];
$codigo_empleado = $_POST['cod-empleado'];
$celular = $_POST['celular'];
echo "$direccion";
$conexion = mysqli_connect($servidor, $usuario, "") or die("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, $basededatos) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");
$consulta = "select * from personas";
$resultado = mysqli_query($conexion, $consulta) or die("Algo ha ido mal en la consulta a la base de datos");
$datos = "INSERT INTO personas VALUES('$dni','$nombres','$apellidos','$direccion','$codigo_empleado','$celular')";
//if(isset($dni) || isset($nombres) || isset($apellidos) || isset($direccion) || isset($codigo_empleado) || isset($celular)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Enviar'])) {
        echo "<script> alert('Usted ha agregado algo...');<script>";
        if (empty($dni) || empty($nombres) || empty($apellidos) || empty($direccion) || empty($codigo_empleado) || empty($celular)) {
            echo "<script> alert('No puedes dejar campos vacios');<script>";
        }
    }
}

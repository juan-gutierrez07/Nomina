<?php

$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$basededatos  = "practicas";

$conexion = mysqli_connect($servidor, $usuario, "") or die("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, $basededatos) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");
$consulta ="select * from usuarios";
$resultado = mysqli_query( $conexion, $consulta ) or die ( "Algo ha ido mal en la consulta a la base de datos");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Login'])) {
        if (!empty($_POST['name']) && !empty($_POST['password'])) {
            $User = $_POST['name'];
            $Password = $_POST['password'];
            $Sql = " SELECT * FROM usuarios WHERE usuario = '$User' AND password = '$Password'";
            $Result = mysqli_query($conexion, $Sql);
            $Row = mysqli_num_rows($Result);
            if ($Row == 1) {
                $_SESSION['User'] = $User;
                header('Location:home.php');
            } else {
                echo "<script>alert('No se pudo ingresar, usuario o contraseña incorrecto'); </script>";
           
            }
        }
    }
}

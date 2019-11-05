<?php include_once('template.php');

?>

<?php
$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$basededatos  = "practicas";
$id = 0;
$conexion = mysqli_connect($servidor, $usuario, "") or die("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, $basededatos) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");
$consulta = "select * from cargo";
$resultado = mysqli_query($conexion, $consulta) or die("Algo ha ido mal en la consulta a la base de datos");
//if(isset($dni) || isset($nombres) || isset($apellidos) || isset($direccion) || isset($codigo_empleado) || isset($celular)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST['codigo'];
    $nombre_cargo = $_POST['cargo'];
    if (isset($_POST['Enviar'])) {

        if (empty($nombre_cargo) || empty($codigo)) {
            echo "<script>alert('No puede dejar un campo vacio.. '); </script>";
        } else {
            $datos = "INSERT INTO cargo(codigo,nombre)VALUES('$codigo','$nombre_cargo')";
            $resul = mysqli_query($conexion, $datos);
            if (!($resul)) {
                printf("Erro %s\n", mysqli_error($conexion));
            } else {
                echo "<script>alert('Registro completo.. '); </script>";
            }
        }
    }
}

?>
<html>

<head>
    <link rel="stylesheet" href="/alcari/css/css-agregarper.css">
</head>

<body>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Agregar Cargos</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
        </div>
        <div class="wrapper">
            <div class="container">
                <div class="col-md-12 section-a">
                    <div class="form-post">
                        <form action="add_cargos.php" method="POST">
                            <label name="codigo">Codigo: </label>
                            <input type="text" id="codigo" name="codigo" placeholder="Ingresa el codigo" width="800px" height="200px" />
                            <label name="nombre-cargo">Nombre del cargo: </label>
                            <input type="text" id="cargo" name="cargo" placeholder="Ingresa el cargo" width="800px" height="200px" />
                            <input class="enviar" type="submit" value="Enviar" name="Enviar" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
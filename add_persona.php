<?php include_once('template.php'); ?>



<?php

$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$basededatos  = "practicas";
$conexion = mysqli_connect($servidor, $usuario, "") or die("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, $basededatos) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");
$consulta = "select * from personas";
$resultado = mysqli_query($conexion, $consulta) or die("Algo ha ido mal en la consulta a la base de datos");
//if(isset($dni) || isset($nombres) || isset($apellidos) || isset($direccion) || isset($codigo_empleado) || isset($celular)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST['dni'];
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $direccion = $_POST['direccion'];
    $codigo_empleado = $_POST['cod-empleado'];
    $celular = $_POST['celular'];
    $codigo_cargo= $_POST['cargo'];
    if (isset($_POST['Enviar'])) {
        if (empty($dni) || empty($nombres) || empty($apellidos) || empty($direccion) || empty($codigo_empleado) || empty($celular) || empty($codigo_cargo)) {
            echo "<script>alert('No puede dejar un campo vacio.. '); </script>";
        } else {
            $datos = "INSERT INTO personas( dni,nombres,apellidos,direccion,codigo_empleado,celular)VALUES('$dni','$nombres','$apellidos','$direccion','$codigo_empleado','$celular')";
            $resul = mysqli_query($conexion, $datos);
            if ($resul) {
                echo "<script>alert('Se ha agregado a la persona exitosamente '); </script>";
            }
        }
    }
}

?>


<html>

<head>
    <link rel="stylesheet" href="http://127.0.0.1/Frontend-menus/alcari/css/css-agregarper.css">


</head>

<body>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Agregar personas</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
        </div>
        <div class="wrapper">
            <div class="container">
                <div class="col-md-12 section-a">
                    <div class="form-post">
                        <form action="add_persona.php" method="POST">
                            <label name="nombre">Nombres: </label>
                            <input type="text" id="nombres" name="nombres" placeholder="Ingresa tus nombres" width="800px" height="200px" />
                            <label name="apellidos">Apellidos: </label>
                            <input type="text" id="apellidos" name="apellidos" placeholder="Ingresa tus apellidos" width="800px" height="200px" />
                            <label name="dni">dni: </label>
                            <input type="text" id="dni" name="dni" placeholder="Ingresa dni" width="800px" height="200px" />
                            <label name="direccion">Direccion:</label>
                            <input type="text" id="dirrecion" name="direccion" placeholder="Ingresa la dirrecion" width="800px" height="200px" />
                            <label name="codempleado">Codigo empleado: </label>
                            <input type="text" id="cod-empleado" name="cod-empleado" placeholder="Ingresa codigo " width="800px" height="200px" />
                            <label name="celular">Celular: </label>
                            <input type="text" id="celular" name="celular" placeholder="Ingresa celular" width="800px" height="200px" />
                            <label name="cargos">Cargo: </label>
                            <select name="cargo" id="cargo">
                                <?php
                                $x = 1;
                                $consulta2 = "select  * from cargo ; ";
                                $resultado2 = mysqli_query($conexion, $consulta2);
                                while ($datos = mysqli_fetch_array($resultado2)) {
                                    ?> <option><?php echo $datos['nombre']; ?> </option>

                                <?php
                                }
                                   $codigo_cargo = $datos['codigo'];
                                ?>
                            </select>
                            <input class="enviar" type="submit" value="Enviar" name="Enviar" />
                        </form>
                    </div>
                </div>

                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

    </main>
</body>

</html>
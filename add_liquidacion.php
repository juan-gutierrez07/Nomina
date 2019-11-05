<?php include_once('template.php'); ?>
<?php

$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$basededatos  = "practicas";
$conexion = mysqli_connect($servidor, $usuario, "") or die("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, $basededatos) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");
$consulta = "select * from historial_de_liquidacion";
$resultado = mysqli_query($conexion, $consulta) or die("Algo ha ido mal en la consulta a la base de datos");
//if(isset($dni) || isset($nombres) || isset($apellidos) || isset($direccion) || isset($codigo_empleado) || isset($celular)
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $numero = $_POST['numero'];
    $fecha = $_POST['fecha'];
    $sueldo = $_POST['sueldo'];
    $descuentos = $_POST['descuento'];
    $cod_empleado = $_POST['cod-empleado'];
    $dias_liquidados = $_POST['dias-liquidados'];
    $auxilio_trans = $_POST['auxilio-trans'];
    $salud = $_POST['salud'];
    $pension = $_POST['pension'];
    $libranza = $_POST['libranza'];


    if (isset($_POST['Enviar'])) {

        if (
            empty($numero) || empty($fecha) || empty($sueldo) || empty($descuentos) || empty($cod_empleado) || empty($dias_liquidados)
            || empty($auxilio_trans) || empty($salud) || empty($pension) || empty($libranza)
        ) {
            echo "<script>alert('No puede dejar un campo vacio.. '); </script>";
        } else {
            if ($_POST['auxilio-trans'] == "Si") {
                $auxilio_trans = 30000;
            } else {
                $auxilio_trans = 0;
            }
            echo "{$auxilio_trans}";
            $datos = "INSERT INTO historial_de_liquidacion(numero,fecha,sueldo,descuentos,codigo_empleado,dias_liquidados,auxilio_tranporte,salud,pension,libranza)VALUES('$numero','$fecha','$sueldo','$descuentos','$cod_empleado','$dias_liquidados','$auxilio_trans','$salud','$pension','$libranza')";
            $resul = mysqli_query($conexion, $datos) or die("No puedes repetir registros");

            if (!($resul)) {
                printf("Error cargando el conjunto de caracteres utf8: %s\n", mysqli_error($conexion));
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
            <h1 class="h2">Agregar Liquidacion</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
        </div>
        <div class="wrapper">
            <div class="container">
                <div class="col-md-12 section-a">
                    <div class="form-post">
                        <form action="add_liquidacion.php" method="POST">
                            <label name="nombre">Numero: </label>
                            <input type="text" id="numero" name="numero" placeholder="Ingresa N° " width="800px" height="200px" />
                            <label name="fecha">Fecha:</label>
                            <input type="date" id="fecha" name="fecha" width="800px" height="200px" />
                            <label name="sueldo">Sueldo: </label>
                            <input type="text" id="sueldo" name="sueldo" width="800px" height="200px" />
                            <label name="descuento">Descuento:</label>
                            <input type="text" id="descuento" name="descuento" width="800px" height="200px" />
                            <label name="codempleado">Codigo empleado: </label>
                            <select name="cod-empleado" id="cod-empleado">
                                <?php
                                $consulta2 = "select  * from personas; ";
                                $resultado2 = mysqli_query($conexion, $consulta2);
                                while ($datos = mysqli_fetch_array($resultado2)) {

                                    ?> <option><?php echo $datos['codigo_empleado']; ?> </option>

                                <?php

                                }

                                ?>
                            </select>
                            <label name="dias-liquidados">Dias liquidados: </label>
                            <input type="text" id="dias-liquidados" name="dias-liquidados" placeholder="Ingresa Dias liquidados" width="800px" height="200px" />
                            <label name="auxlio">Auxilio Transporte: </label>
                            <select id="auxilio-trans" name="auxilio-trans">
                                <option>Si</option>
                                <option>No</option>
                            </select>
                            <label name="salud">Salud: </label>
                            <input type="text" id="salud" name="salud" width="800px" height="200px" />
                            <label name="pension">Pension: </label>
                            <input type="text" id="pension" name="pension" width="800px" height="200px" />
                            <label name="libranza">Libranza: </label>
                            <input type="text" id="libranza" name="libranza" width="800px" height="200px" />
                            <input class="enviar" type="submit" value="Enviar" name="Enviar" />
                        </form>
                    </div>
                </div>

                <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

    </main>
</body>

</html>
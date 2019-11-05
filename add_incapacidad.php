<?php include_once('template.php');
?>
<?php
$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$basededatos  = "practicas";
$conexion = mysqli_connect($servidor, $usuario, "") or die("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, $basededatos) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");
$consulta = "select * from incapacidad_o_licencia";
$resultado = mysqli_query($conexion, $consulta) or die("Algo ha ido mal en la consulta a la base de datos");
//if(isset($dni) || isset($nombres) || isset($apellidos) || isset($direccion) || isset($codigo_empleado) || isset($celular)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST['numero'];
    $descrip = $_POST['descripcion'];
    $tipo = $_POST['tipo'];
    $fecha_inicio = $_POST['fecha-inicio'];
    $fecha_final = $_POST['fecha-final'];
    $cod_empleado = $_POST['cod-empleado'];



    if (isset($_POST['Enviar'])) {

        if (empty($numero) || empty($descrip) || empty($tipo) || empty($cod_empleado)  || empty($fecha_inicio) || empty($fecha_final)) {
            echo "<script>alert('No puede dejar un campo vacio.. '); </script>";
        } else {
            $datos = "INSERT INTO incapacidad_o_licencia(numero,descripcion,tipo,codigo_empleado,fecha_inicio2,fecha_fin2)VALUES('$numero','$descrip','$tipo','$cod_empleado','$fecha_inicio','$fecha_final')";
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
            <h1 class="h2">Agregar Contratos</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
        </div>
        <div class="wrapper">
            <div class="container">
                <div class="col-md-12 section-a">
                    <div class="form-post">
                        <form action="add_incapacidad.php" method="POST">
                            <label name="numero">Numero: </label>
                            <input type="text" id="numero" name="numero" placeholder="Ingresa N° de incapacidad/licencia" width="800px" height="200px" />
                            <label name="fecha-ini">Fecha de inicio: </label>
                            <input type="date" id="fecha-inicio" name="fecha-inicio" width="800px" height="200px" />
                            <label name="fecha-fin">Fecha final: </label>
                            <input type="date" id="fecha-final" name="fecha-final" width="800px" height="200px" />
                            <label name="tipo">Tipo: </label>
                            <input type="text" id="tipo" name="tipo">
                            <label name="cargos">Codigo empleado: </label>
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
                            <label name="clasificacion">Descripcion: </label>
                            <textarea name="comentario" id="comentario" placeholder="Descripcion de incapacidad o licencia" cols="80" rows="10"></textarea>
                            <input class="enviar" type="submit" value="Enviar" name="Enviar" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
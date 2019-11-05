<?php include_once('template.php'); ?>
<?php
$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$basededatos  = "practicas";
$id = 0;
$conexion = mysqli_connect($servidor, $usuario, "") or die("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, $basededatos) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");
$consulta = "select * from novedades";
$resultado = mysqli_query($conexion, $consulta) or die("Algo ha ido mal en la consulta a la base de datos");
//if(isset($dni) || isset($nombres) || isset($apellidos) || isset($direccion) || isset($codigo_empleado) || isset($celular)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $numero = $_POST['numero'];
    $cod_empleado = $_POST['cod-empleado'];
    $descripcion = $_POST['comentario'];
    if (isset($_POST['Enviar'])) {

        if (empty($numero) || empty($cod_empleado) || empty($descripcion)) {
            echo "<script>alert('No puede dejar un campo vacio.. '); </script>";
        } else {
            $datos = "INSERT INTO novedades(numero,descripcion,codigo_empleado)VALUES('$numero','$descripcion','$cod_empleado')";
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
            <h1 class="h2">Agregar Novedad</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
            </div>
        </div>
        <div class="wrapper">
            <div class="container">
                <div class="col-md-12 section-a">
                    <div class="form-post">
                        <form action="add_novedad.php" method="POST">
                            <label name="codigo">Numero: </label>
                            <input type="text" id="numero" name="numero" placeholder="Ingresa N° novedad" width="800px" height="200px" />
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
                                <label name="descripcion">Descripcion: </label>
                                <textarea name="comentario" id="comentario" placeholder="Descripcion de novedad" cols="80" rows="10"></textarea>
                                <input class="enviar" type="submit" value="Enviar" name="Enviar" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
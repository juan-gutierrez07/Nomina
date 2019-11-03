<?php include_once('template.php'); ?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cargos</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <form id="formulario" action="datos_cargos.php" method="post">

        <fieldset>
            <label> codigo </label> <input id="codigo" type="number" name="codigo" placeholder="codigo del cargo" />
            <input class="button" type="submit" name="Buscar" value="Buscar" />
        </fieldset>

        <div class="wrapper">
            <a href="datos_cargos.php"> Mostrar todos los cargos </a>
        </div>
    </form>


        <?php

        $usuario = "root";
        $contraseña = "";
        $servidor = "localhost";
        $basededatos  = "practicas";

        $conexion = mysqli_connect($servidor, $usuario, "") or die("No se ha podido conectar al servidor de Base de datos");
        $db = mysqli_select_db($conexion, $basededatos) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");
        $consulta = "select * from cargo";
        $resultado = mysqli_query($conexion, $consulta) or die("Algo ha ido mal en la consulta a la base de datos");

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $documento = 0;
            $documento = $_POST['codigo'];
            $nombre = "";
            $nombre = $_POST['nombre'];
            $buscar = "select * from cargo where codigo = " . $documento;

            $resultado = mysqli_query($conexion, $buscar) or die("No existe en la base de datos.");
        }

        echo  "<center>";
        echo "<table border =1px >";
        echo "<tr>";
        echo "<th > Codigo  </th>";
        echo "<th > Nombre </th>";
        echo "</tr>";


        while ($columna = mysqli_fetch_array($resultado)) {

            echo "<tr>";
            echo "<td>" . $columna['codigo']  . "   </td>  <td>" . $columna['nombre'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "</center>";

        ?>
        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
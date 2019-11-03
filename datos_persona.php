<?php include_once('template.php'); ?>


<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Personas</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
        </div>
    </div>
    <form id="formulario" action="datos_persona.php" method="post">

        <fieldset>
            <label> Buscar por cedula </label> <input id="cedula" type="number" name="cedula" placeholder="cedula del trabajador" />
            <input class="button" type="submit" name="Buscar" value="Buscar" />
        </fieldset>

        <div class="wrapper">
            <a href="datos_persona.php"> Mostrar todos los trabajadores </a>
        </div>
    </form>


    <?php

    $usuario = "root";
    $contraseña = "";
    $servidor = "localhost";
    $basededatos  = "practicas";

    $conexion = mysqli_connect($servidor, $usuario, "") or die("No se ha podido conectar al servidor de Base de datos");
    $db = mysqli_select_db($conexion, $basededatos) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");
    $consulta = "select * from personas,cargos";
    $resultado = mysqli_query($conexion, $consulta) or die("Algo ha ido mal en la consulta a la base de datos");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $documento = 0;
        $documento = $_POST['cedula'];
        $buscar = "select * from personas,cargo where personas.codigo_cargo=cargo.codigo and dni =" . $documento;
        if ($documento == 0 || $documento < 0) {
            $resultado = die("No es una cedula valida");
        } else {
            $resultado = mysqli_query($conexion, $buscar) or die("No existe en la base de datos.");
        }
    }


    echo "<table border =1px >";
    echo "<tr>";
    echo "<th > Cedula  </th>";
    echo "<th > Nombres </th>";
    echo "<th > Apellidos  </th>";
    echo "<th > direccion  </th>";
    echo "<th > Codigo  </th>";
    echo "<th > Celular  </th>";
    echo "<th > Cargo </th>";

    echo "</tr>";


    while ($columna = mysqli_fetch_array($resultado)) {

        echo "<tr>";
        echo "<td>" . $columna['dni']  . "   </td>  <td>" . $columna['nombres'] . "</td> <td>" . $columna['apellidos'] . "</td> <td>" . $columna['direccion'] . "</td>";
        echo "<td>" . $columna['codigo_empleado']  . "   </td>  <td>" . $columna['celular'] . "</td> <td>" . $columna['cargo'] . "</td> ";
        echo "</tr>";
    }
    echo "</table>";

    ?>
    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
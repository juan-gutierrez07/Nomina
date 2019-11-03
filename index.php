<?php

$usuario = "root";
$contraseña = "";
$servidor = "localhost";
$basededatos  = "practicas";

$conexion = mysqli_connect($servidor, $usuario, "") or die("No se ha podido conectar al servidor de Base de datos");
$db = mysqli_select_db($conexion, $basededatos) or die("Upps! Pues va a ser que no se ha podido conectar a la base de datos");
$consulta = "select * from usuarios";
$resultado = mysqli_query($conexion, $consulta) or die("Algo ha ido mal en la consulta a la base de datos");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Login'])) {
        if (!empty($_POST['name']) && !empty($_POST['password'])) {
            $User = $_POST['name'];
            $Password = $_POST['password'];
            echo '{$Password}';
            $Sql = " SELECT * FROM usuarios WHERE usuario = '$User' AND password = '$Password'";
            $Result = mysqli_query($conexion, $Sql);
            $Row = mysqli_num_rows($Result);
            if ($Row == 1) {
                $_SESSION['User'] = $User;
                header('Location: home.php');
            } else {
                echo "<script>alert('No se pudo ingresar, usuario o contraseña incorrecto'); </script>";
            }
        }
    }
}

?>

<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Bienvenido Alcari </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
</head>

<body>
    <section id="login">
        <center>
            <font color="White">
                <h1>Bienvenido </h1>
            </font>
        </center>

        <form name='form-login' action="index.php" method="post">
            <div class="field name-box">
                <input type="text" id="name" name="name" placeholder="Nombre" />
                <label for="name" Nombre></label>
            </div>

            <div class="field name-box">
                <input type="password" id="password" name="password" placeholder="Contraseña" />
                <label for="name" Contraseña></label>
            </div>

            <input class="button" type="submit" name="Login" value="Ingresar" />
        </form>
    </section>
</body>

</html>
<style>
    @charset "utf-8";
    @import url(http://weloveiconfonts.com/api/?family=fontawesome);

    [class*="fontawesome-"]:before {
        font-family: 'FontAwesome', sans-serif;
    }

    body {
        background: #2c3338;
        color: #606468;
        font: 87.5%/1.5em 'Open Sans', sans-serif;
        margin: 0;
    }


    input {
        border: none;
        font-family: 'Open Sans', Arial, sans-serif;
        font-size: 16px;
        line-height: 1.5em;
        padding: 0;
        -webkit-appearance: none;
    }


    #login {
        margin: 50px auto;
        width: 320px;
    }

    #login form {
        margin: auto;
        padding: 22px 22px 22px 22px;
        width: 100%;
        border-radius: 5px;
        background: #282e33;
        border-top: 3px solid #434a52;
        border-bottom: 3px solid #434a52;
    }


    #login form input[type="text"] {
        background-color: #3b4148;
        border-radius: 0px 3px 3px 0px;
        color: #a9a9a9;
        margin-bottom: 1em;
        padding: 0 16px;
        width: 235px;
        height: 50px;
    }

    #login form input[type="password"] {
        background-color: #3b4148;
        border-radius: 0px 3px 3px 0px;
        color: #a9a9a9;
        margin-bottom: 1em;
        padding: 0 16px;
        width: 235px;
        height: 50px;
    }

    #login form input[type="submit"] {
        background: #b5cd60;
        border: 0;
        width: 100%;
        height: 40px;
        border-radius: 3px;
        color: white;
        cursor: pointer;
        transition: background 0.3s ease-in-out;
    }

    #login form input[type="submit"]:hover {
        background: #16aa56;
    }
</style>
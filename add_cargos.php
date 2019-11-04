<?php include_once('template.php');
?>
<html>

<head>
    <link rel="stylesheet" href="/alcari/css/css-agregarper.css" </head> <body>
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
                            <label name="codigo">Codigo: </label>
                            <input type="text" id="codigo" name="codigo" placeholder="Ingresa el codigo" width="800px" height="200px" />
                            <label name="apellidos">Nombre del cargo: </label>
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
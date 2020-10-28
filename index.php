<?php

use models\TareaModel as TareaModel;

require_once("models/TareaModel.php");

$modelo = new TareaModel();
$tareas = $modelo->getAllTareas();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h3 class="center">Gestion Tareas</h3>
        <div class="row">
            <div class="col l4 m6 s12 ">
                <form action="controllers/ControlInsert.php" method="POST">
                    <div class="input-field">
                        <input id="nombre" type="text" name="nombre">
                        <label for="nombre">Nombre de la Tarea</label>
                    </div>

                    <div class="input-field">
                        <input id="descripcion" type="text" name="descripcion">
                        <label for="descripcion">Descripción de la Tarea</label>
                    </div>

                    <button class="btn">Guardar Tarea</button>
                </form>
                <p>
                    <?php
                    session_start();
                    if (isset($_SESSION['respuesta'])) {
                        echo $_SESSION['respuesta'];
                        unset($_SESSION['respuesta']);
                    }
                    ?>
                </p>
            </div>
            <div class="col l8 m6 s12 ">
                <table border="1" class="ml-32">
                    <tr>
                        <th>ID</th>
                        <th>Tarea</th>
                        <th>Descripcion</th>
                    </tr>
                    <?php foreach ($tareas as $ta) {      ?>
                        <tr>
                            <td> <?= $ta["id"] ?> </td>
                            <td> <?= $ta["nombre"] ?> </td>
                            <td> <?= $ta["descripcion"] ?> </td>
                        </tr>
                    <?php   }   ?>
                </table>
            </div>
        </div>









    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>
<?php


use models\TareaModel as TareaModel;

require_once("models/TareaModel.php");

$modelo = new TareaModel();
$tareas = $modelo->getAllTareas();

$test = $modelo->buscarTarea(8);
print_r($test);

//$modelo->eliminarTarea(3);

//$data = ['nombre' => 'TAREA EDITADA', 'descripcion' => 'GGGG'];
//$modelo->editarTarea(1, $data);

session_start();
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
        <div class="row">
            <div class="col l4 m6 s12 ">

                <?php if (!isset($_SESSION['editar'])) { ?>

                    <h4 class="center">Nueva Tarea</h4>
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
                        //session_start();
                        if (isset($_SESSION['respuesta'])) {
                            echo $_SESSION['respuesta'];
                            unset($_SESSION['respuesta']);
                        }
                        ?>
                    </p>
                <?php } else { ?>
                    <!-- ----------------EDITAR TAREA------------------>
                    <h4 class="center">Editar Tarea</h4>
                    <form action="controllers/ControlEditar.php" method="POST">
                        <input type="hidden" name="id" value="<?= $_SESSION['tarea']['id'] ?>">
                        <div class="input-field">
                            <input id="nombre" type="text" name="nombre" value="<?= $_SESSION['tarea']['nombre'] ?>">
                            <label for="nombre">Nombre de la Tarea</label>
                        </div>

                        <div class="input-field">
                            <input id="descripcion" type="text" name="descripcion" value="<?= $_SESSION['tarea']['descripcion'] ?>">
                            <label for="descripcion">Descripción de la Tarea</label>
                        </div>

                        <button class="btn orange">Editar Tarea</button>
                    </form>

                <?php
                }
                unset($_SESSION['editar']);
                unset($_SESSION['tarea']);
                ?>


            </div>
            <div class="col l8 m6 s12 ">
                <h4 class="center">Lista de Tareas</h4>

                <form action="controllers/ControlTabla.php" method="POST">
                    <table border="1" class="ml-32">
                        <tr>
                            <th>ID</th>
                            <th>Tarea</th>
                            <th>Descripcion</th>
                            <th></th>
                        </tr>
                        <?php foreach ($tareas as $ta) {      ?>
                            <tr>
                                <td> <?= $ta["id"] ?> </td>
                                <td> <?= $ta["nombre"] ?> </td>
                                <td> <?= $ta["descripcion"] ?> </td>
                                <td>
                                    <button name="bt_edit" value="<?= $ta["id"] ?>" class="btn orange">Editar</button>
                                    <button name="bt_delete" value="<?= $ta["id"] ?>" class="btn red">Eliminar</button>
                                </td>

                            </tr>
                        <?php   }   ?>
                    </table>
                </form>
            </div>
        </div>


        <hr>

        <!-- MODULO BUSCAR --->
        <div class="row">
            <div class="col l6">
                <h4>buscar</h4>
                <form action="controllers/ControlBuscar.php" method="POST">
                    <input type="text" name="id" placeholder="Ingrese ID">
                    <button class="btn">Buscar</button>
                </form>
            </div>
            <div class="col l6">
                <p class="red-text  ">
                    <?php
                    if (isset($_SESSION['error_buscar'])) {
                        echo $_SESSION['error_buscar'];
                        unset($_SESSION['error_buscar']);
                    }
                    ?>

                    <?php
                    if (isset($_SESSION['tarea_buscar'])) { ?>
                        <ul class="collection">
                            <li class="collection-item"><?= $_SESSION['tarea_buscar']['id'] ?></li>
                            <li class="collection-item"><?= $_SESSION['tarea_buscar']['nombre'] ?></li>
                            <li class="collection-item"><?= $_SESSION['tarea_buscar']['descripcion'] ?></li>
                        </ul>

                    <?php
                        unset($_SESSION['tarea_buscar']);
                    } ?>

                </p>
            </div>
        </div>


        <!-- CARGAR TAREAS EN COMBOBOX Y EN EL VALUE DEL OPTION DEJAR EL ID-->

        <h4>Cargar Combobox</h4>
        <select name="xx">
            <?php foreach ($tareas as $tarea) { ?>
                <option value="<?= $tarea['id'] ?>"> <?= $tarea['nombre'] ?></option>
            <?php } ?>
        </select>

        <!--  

             Para el trabajo:
             1. Crear el modelo RecetaModel
             2. esta clase debe tener metodos como:
                 getAllMaterialCristal()  - select * from material_cristal
                 getAllArmazon()          - select * from armazon
                 getAllTipoCristal()      - select * from tipo_cristal
                 ----
                 buscarRecetaRut($rut)     - select * from receta where rut_cliente = :A
                 buscarRecetaFecha($fecha) - select * from recete where fecha_entrega = :A
                 insertarReceta

            -->



    </div> <!-- CONTAINER -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="controllers/ControlInsert.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre de la tarea">
        <br>
        <input type="text" name="descripcion" placeholder="Descripcion de la tarea">
        <br>
        <button>Guardar Tarea</button>
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
</body>

</html>
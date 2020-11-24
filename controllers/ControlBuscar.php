<?php

use models\TareaModel as TareaModel;

require_once("../models/TareaModel.php");

class ControlBuscar
{
    public $id;

    public function __construct()
    {
        $this->id = $_POST['id'];
    }

    public function buscarTarea()
    {
        session_start();
        if ($this->id == "") {
            $_SESSION['error_buscar'] = "Complete el id";
            header("Location: ../index.php");
            return;
        }

        $modelo = new TareaModel();
        $arr = $modelo->buscarTarea($this->id); //[], [['id'=>?, 'nombre'=>?]]
        if (count($arr) == 0) {
            $_SESSION['error_buscar'] = "ID no existe";
        } else {
            $_SESSION['tarea_buscar'] = $arr[0]; //['id'=>?, 'nombre'=>?]
        }

        header("Location: ../index.php");
    }
}

$obj = new ControlBuscar();
$obj->buscarTarea();

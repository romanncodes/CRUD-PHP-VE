<?php

namespace controllers;

use models\TareaModel as TareaModel;

require_once("../models/TareaModel.php");

class ControlTabla
{
    public $bt_edit;
    public $bt_delete;

    public function __construct()
    {
        $this->bt_edit = $_POST['bt_edit'];
        $this->bt_delete = $_POST['bt_delete'];
    }

    public function procesar()
    {
        if (isset($this->bt_edit)) {
            //echo "Editar el ID $this->bt_edit";
            session_start();
            $_SESSION['editar'] = "ON";
            $modelo = new TareaModel();
            $tarea = $modelo->buscarTarea($this->bt_edit);

            $_SESSION['tarea'] = $tarea[0];

            header("Location: ../index.php");
        } else {
            //echo "Eliminar el ID $this->bt_delete";
            $modelo = new TareaModel();
            $modelo->eliminarTarea($this->bt_delete);
            header("Location: ../index.php");
        }
    }
}

$obj = new ControlTabla();
$obj->procesar();

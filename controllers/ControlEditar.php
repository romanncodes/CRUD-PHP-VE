<?php

namespace controllers;

use models\TareaModel as TareaModel;

require_once("../models/TareaModel.php");

class ControlEditar
{
    public $id;
    public $nombre;
    public $descripcion;

    public function __construct()
    {
        $this->id = $_POST['id'];
        $this->nombre = $_POST['nombre'];
        $this->descripcion = $_POST['descripcion'];
    }

    public function editar()
    {
        if ($this->nombre == "" || $this->descripcion == "") {
            header("Location: ../index.php");
            return;
        }

        $modelo = new TareaModel();
        $data = ['nombre' => $this->nombre, 'descripcion' => $this->descripcion];

        $modelo->editarTarea($this->id, $data);
        header("Location: ../index.php");
    }
}

$obj = new ControlEditar();
$obj->editar();

<?php

namespace controllers;

use models\TareaModel as TareaModel;

require_once("../models/TareaModel.php");

class ControlInsert
{
    public $nombre;
    public $descripcion;


    public function __construct()
    {
        $this->nombre = $_POST['nombre'];
        $this->descripcion = $_POST['descripcion'];
    }

    public function guardarTarea()
    {
        session_start();
        if ($this->nombre == "" || $this->descripcion == "") {
            $_SESSION['respuesta'] = "Campos Vacios";
            header("Location: ../index.php");
            return;
        }
        $modelo = new TareaModel();
        $data = ["nombre" => $this->nombre, "descripcion" => $this->descripcion];
        $count = $modelo->insertarTarea($data);
        if ($count == 1) {
            $_SESSION['respuesta'] = "Tarea Creada con Exito";
        } else {
            $_SESSION['respuesta'] = "Hubo un error en la base de datos";
        }
        header("Location: ../index.php");
    }
}

$obj = new ControlInsert();
$obj->guardarTarea();

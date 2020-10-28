<?php

namespace models;

require_once("Conexion.php");


class TareaModel
{

    public function insertarTarea($data) //$data=["nombre"=>valor, "descripcion"=>valor]
    {
        $stm = Conexion::conector()->prepare("INSERT INTO TAREAS VALUES(NULL,:A, :B)");
        $stm->bindParam(":A", $data['nombre']);
        $stm->bindParam(":B", $data['descripcion']);
        return $stm->execute();
    }
}

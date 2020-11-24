<?php

namespace models;

require_once("Conexion.php");


class TareaModel
{

    public function insertarTarea($data) //$data=["nombre"=>valor, "descripcion"=>valor]
    {
        $stm = Conexion::conector()->prepare("INSERT INTO tareas VALUES(NULL,:A, :B)");
        $stm->bindParam(":A", $data['nombre']);
        $stm->bindParam(":B", $data['descripcion']);
        return $stm->execute();
    }

    public function getAllTareas()
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM tareas");
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC);
    }

    //SELECT * FROM TAREAS WHERE ID=?
    public function buscarTarea($id)
    {
        $stm = Conexion::conector()->prepare("SELECT * FROM tareas WHERE id=:A");
        $stm->bindParam(":A", $id);
        $stm->execute();
        return $stm->fetchAll(\PDO::FETCH_ASSOC); //
    }

    //DELETE FROM TAREAS WHERE ID = ?
    public function eliminarTarea($id)
    {
        $stm = Conexion::conector()->prepare("DELETE FROM tareas WHERE id=:A");
        $stm->bindParam(":A", $id);
        return $stm->execute();
    }

    //UPDATE TAREAS SET nombre=?, descripcion=? WHERE ID=?
    public function editarTarea($id, $data)
    { //$data=['nombre'=>valor, 'descripcion'=>valor]
        $stm = Conexion::conector()->prepare("UPDATE tareas SET nombre=:A, descripcion=:B WHERE id=:C");
        $stm->bindParam(":A", $data['nombre']);
        $stm->bindParam(":B", $data['descripcion']);
        $stm->bindParam(":C", $id);
        return $stm->execute();
    }
}

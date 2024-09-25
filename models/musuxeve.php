<?php
class Musuxeve
{

    private $idusu;
    private $ideve;

    //Get Methods
    public function getIdusu()
    {
        return $this->idusu;
    }
    public function getIdeve()
    {
        return $this->ideve;
    }

    //Set Methods
    public function setIdusu($idusu)
    {
        $this->idusu = $idusu;
    }

    public function setIdeve($ideve)
    {
        $this->ideve = $ideve;
    }

    public function getAll()
    {
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idusu, ideve FROM usuxeve";
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getOne($idusu, $ideve)
    {
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idusu, ideve FROM usuxeve WHERE idusu=:idusu && ideve=:ideve";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idusu", $idusu);
        $result->bindParam(":ideve", $ideve);
        $result->execute();
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function save()
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "INSERT INTO usuxeve(idusu, ideve) VALUES (:idusu, :ideve)";
        $result = $conexion->prepare($sql);
        $idusu = $this->getIdusu();
        $result->bindParam(":idusu", $idusu);
        $ideve = $this->getIdeve();
        $result->bindParam(":ideve", $ideve);
        $result->execute();
    }

    public function edit($idusu, $ideve)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "UPDATE usuxeve SET idusu=:idusu,ideve=:ideve WHERE idusu=:idusu && ideve:ideve";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idusu", $idusu);
        $result->bindParam(":ideve", $ideve);
        $result->execute();
    }

    public function delete($idusu, $ideve)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "DELETE FROM uusuxevesuario WHERE idusu=:idusu && ideve:ideve";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idusu", $idusu);
        $result->bindParam(":ideve", $ideve);
        $result->execute();
    }
}

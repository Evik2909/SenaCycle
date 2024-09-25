<?php
class Meve
{

    private $ideve;
    private $nomeve;
    private $deseve;
    private $feceve;
    private $idusu;

    //Get Methods
    public function getIdeve()
    {
        return $this->ideve;
    }
    public function getNomeve()
    {
        return $this->nomeve;
    }
    public function getDeseve()
    {
        return $this->deseve;
    }
    public function getFeceve()
    {
        return $this->feceve;
    }
    public function getIdusu()
    {
        return $this->idusu;
    }


    //Set Methods
    public function setIdeve($ideve)
    {
        $this->ideve = $ideve;
    }

    public function setNomeve($nomeve)
    {
        $this->nomeve = $nomeve;
    }

    public function setDeseve($deseve)
    {
        $this->deseve = $deseve;
    }

    public function setFeceve($feceve)
    {
        $this->feceve = $feceve;
    }

    public function setIdusu($idusu)
    {
        $this->idusu = $idusu;
    }

    public function getAll()
    {
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT ideve, nomeve, deseve, feceve, idusu FROM evento";
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getOne($ideve)
    {
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT ideve, nomeve, deseve, feceve, idusu FROM evento";
        $result = $conexion->prepare($sql);
        $result->bindParam(":ideve", $ideve);
        $result->execute();
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function save()
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "INSERT INTO evento(nomeve, deseve, feceve, idusu) VALUES (:nomeve, :deseve, :feceve, :idusu)";
        $result = $conexion->prepare($sql);
        $nomeve = $this->getNomeve();
        $result->bindParam(":nomeve", $nomeve);
        $deseve = $this->getDeseve();
        $result->bindParam(":deseve", $deseve);
        $feceve = $this->getFeceve();
        $result->bindParam(":feceve", $feceve);
        $idusu = $this->getIdusu();
        $result->bindParam(":idusu", $idusu);
        $result->execute();
    }

    public function edit($ideve)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "UPDATE evento SET nomeve=:nomeve,deseve=:deseve,feceve=:feceve,idusu=:idusu WHERE ideve=:ideve";
        $result = $conexion->prepare($sql);
        $result->bindParam(":ideve", $ideve);
        $result->bindParam(":nomeve", $nomeve);
        $deseve = $this->getDeseve();
        $result->bindParam(":deseve", $deseve);
        $feceve = $this->getFeceve();
        $result->bindParam(":feceve", $feceve);
        $idusu = $this->getIdusu();
        $result->bindParam(":idusu", $idusu);
        $result->execute();
    }

    public function delete($ideve)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "DELETE FROM evento WHERE ideve=:ideve";
        $result = $conexion->prepare($sql);
        $result->bindParam(":ideve", $ideve);
        $result->execute();
    }
}

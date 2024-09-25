<?php
class Malqxfin
{
    private $idfin;
    private $idalq;

    //Get Methods
    public function getIdfin()
    {
        return $this->idfin;
    }
    public function getIdalq()
    {
        return $this->idalq;
    }

    //Set Methods
    public function setIdalq($idalq)
    {
        $this->idalq = $idalq;
    }
    public function setIdfin($idfin)
    {
        $this->idfin = $idfin;
    }

    public function getAll()
    {
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idfin, idalq FROM alqxfin";
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getOne($idfin, $idalq)
    {
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idfin, idalq FROM alqxfin WHERE idfin=:idfin && idalq=:idalq";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idfin", $idfin);
        $result->bindParam(":idalq", $idalq);
        $result->execute();
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function save()
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "INSERT INTO alqxfin(idfin, idalq) VALUES (:idfin, :idalq)";
        $result = $conexion->prepare($sql);

        //********************* */
        $idfin = $this->getIdfin();
        $result->bindParam(":idfin", $idfin);
        $idalq = $this->getIdalq();
        $result->bindParam(":idalq", $idalq);
        $result->execute();
    }

    public function edit($idfin, $idalq)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "UPDATE alqxfin SET idfin=:idfin,idalq=:idalq WHERE idfin=:idfin && idalq=:idalq";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idfin", $idfin);
        $result->bindParam(":idalq", $idalq);
        $result->execute();
    }

    public function delete($idfin, $idalq)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "DELETE FROM alqxfin WHERE idfin=:idfin && idalq=:idalq";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idfin", $idfin);
        $result->bindParam(":idalq", $idalq);
        $result->execute();
    }
}

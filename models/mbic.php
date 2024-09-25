<?php
class Mbic
{
    
    private $idbic;
    private $seriall;
    private $marca;
    private $color;
    private $estbic;
    private $idsed;

    //Get Methods
    public function getIdbic()
    {
        return $this->idbic;
    }
    public function getSeriall()
    {
        return $this->seriall;
    }
    public function getMarca()
    {
        return $this->marca;
    }
    public function getColor()
    {
        return $this->color;
    }
    public function getEstbic()
    {
        return $this->estbic;
    }
    public function getIdsed()
    {
        return $this->idsed;
    }

    //Set Methods
    public function setIdbic($idbic)
    {
        $this->idbic = $idbic;
    }
    public function setSeriall($seriall)
    {
        $this->seriall = $seriall;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function setColor($color)
    {
        $this->color = $color;
    }

    public function setEstbic($estbic)
    {
        $this->estbic = $estbic;
    }

    public function setIdsed($idsed)
    {
        $this->idsed = $idsed;
    }

     // Función que retorna todos las bicicletas registradas en el sistema.
    public function getAll()
    {
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idbic, seriall, marca, color, estbic, idsed FROM bicicleta";
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    
    public function getOne($idbic)
    {
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idbic, seriall, marca, color, estbic, idsed FROM bicicleta WHERE idbic=:idbic";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idbic", $idbic);
        $result->execute();
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function save()
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "INSERT INTO bicicleta(seriall, marca, color, estbic, idsed) VALUES (:seriall, :marca, :color, :estbic, :idsed)";
        $result = $conexion->prepare($sql);
        $seriall = $this->getSeriall();
        $result->bindParam(":seriall", $seriall);
        $marca = $this->getMarca();
        $result->bindParam(":marca", $marca);
        $color = $this->getColor();
        $result->bindParam(":color", $color);
        $estbic = $this->getEstbic();
        $result->bindParam(":estbic", $estbic);
        $idsed = $this->getIdsed();
        $result->bindParam(":idsed", $idsed);
        $result->execute();
    }

    public function edit($idbic)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "UPDATE bicicleta SET seriall=:seriall,marca=:marca,color=:color,estbic=:estbic,idsed=:idsed WHERE idbic=:idbic";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idbic", $idbic);
        $seriall = $this->getSeriall();
        $result->bindParam(":seriall", $seriall);
        $marca = $this->getMarca();
        $result->bindParam(":marca", $marca);
        $color = $this->getColor();
        $result->bindParam(":color", $color);
        $estbic = $this->getEstbic();
        $result->bindParam(":estbic", $estbic);
        $idsed = $this->getIdsed();
        $result->bindParam(":idsed", $idsed);
        $result->execute();
    }

    public function delete($idbic)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "DELETE FROM bicicleta WHERE idbic=:idbic";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idbic", $idbic);
        $result->execute();
    }
}

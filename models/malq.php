<?php
class Malq
{
    private $idalq;
    private $idusu;
    private $idbic;
    private $dist;
    private $totalq;
    private $fecini;
    private $fecent;
    
    //Get Methods
    public function getIdalq()
    {
        return $this->idalq;
    }
    public function getIdusu()
    {
        return $this->idusu;
    }
    public function getIdbic()
    {
        return $this->idbic;
    }
    public function getDist()
    {
        return $this->dist;
    }
    public function getTotalq()
    {
        return $this->totalq;
    }
    public function getFecini()
    {
        return $this->fecini;
    }
    public function getFecent()
    {
        return $this->fecent;
    }


    //Set Methods
    public function setIdalq($idalq)
    {
        $this->idalq = $idalq;
    }
    public function setIdusu($idusu)
    {
        $this->idusu = $idusu;
    }
    public function setIdbic($idbic)
    {
        $this->idbic = $idbic;
    }
    public function setDist($dist)
    {
        $this->dist = $dist;
    }
    public function setTotalq($totalq)
    {
        $this->totalq = $totalq;
    }
    public function setFecini($fecini)
    {
        $this->fecini = $fecini;
    }
    public function setFecent($fecent)
    {
        $this->fecent = $fecent;
    }

    // Función que retorna todos los alquilires registrados en el sistema.
    public function getAll()
    {
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idalq, idusu, idbic, dist, totalq, fecini, fecent FROM alquiler";
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    // Función que retorna 'un alquiler' en especifico registrado en el sistema.
    public function getOne($idalq)
    {
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idalq, idusu, idbic, dist, totalq, fecini, fecent FROM alquiler WHERE idalq=:idalq";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idalq", $idalq);
        $result->execute();
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    // Función que almacena en la base de datos un alquiler en especifico del sistema.
    public function save()
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "INSERT INTO alquiler(idusu, idbic, dist, totalq, fecini, fecent) VALUES (:idusu, :idbic, :dist, :totalq, :fecini, :fecent)";
        $result = $conexion->prepare($sql);
        $idusu = $this->getIdusu();
        $result->bindParam(":idusu", $idusu);
        $idbic = $this->getIdbic();
        $result->bindParam(":idbic", $idbic);
        $dist = $this->getDist();
        $result->bindParam(":dist", $dist);
        $totalq = $this->getTotalq();
        $result->bindParam(":totalq", $totalq);
        $fecini = $this->getFecini();
        $result->bindParam(":fecini", $fecini);
        $fecent = $this->getFecent();
        $result->bindParam(":fecent", $fecent);
        $result->execute();
    }

    // Función que edita en la base de datos un alquiler en especifico del sistema.
    public function edit($idalq)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "UPDATE alquiler SET idusu=:idusu,idbic=:idbic,dist=:dist,totalq=:totalq,fecini=:fecini,fecent=:fecent WHERE idalq=:idalq";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idalq", $idalq);
        $idusu = $this->getIdusu();
        $result->bindParam(":idusu", $idusu);
        $idbic = $this->getIdbic();
        $result->bindParam(":idbic", $idbic);
        $dist = $this->getDist();
        $result->bindParam(":dist", $dist);
        $totalq = $this->getTotalq();
        $result->bindParam(":totalq", $totalq);
        $fecini = $this->getFecini();
        $result->bindParam(":fecini", $fecini);
        $fecent = $this->getFecent();
        $result->bindParam(":fecent", $fecent);
        $result->execute();
    }

    // Función que elimina en la base de datos un alquiler en especifico del sistema.
    public function delete($idalq)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "DELETE FROM alquuiler WHERE idalq=:idalq";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idalq", $idalq);
        $result->execute();
    }
}

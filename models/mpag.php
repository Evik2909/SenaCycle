<?php
class Mpag
{
    private $idpag;
    private $nompag;
    private $rutpag;
    private $ordpag;

    //Get Methods
    public function getIdpag()
    {
        return $this->idpag;
    }

    public function getNompag()
    {
        return $this->nompag;
    }

    public function getRutpag()
    {
        return $this->rutpag;
    }

    public function getOrdpag()
    {
        return $this->ordpag;
    }


    //Set Methods
    public function setNompag($nompag)
    {
        $this->nompag = $nompag;
    }

    public function setIdpag($idpag)
    {
        $this->idpag = $idpag;
    }

    public function setRutpag($rutpag)
    {
        $this->rutpag = $rutpag;
    }
 
    public function setOrdpag($ordpag)
    {
        $this->ordpag = $ordpag;
    }

    public function getAll(){
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idpag, nompag, rutpag, ordpag FROM pagina";
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getOne($idpag){
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idpag, nompag, rutpag, ordpag FROM pagina WHERE idpag=:idpag";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idpag",$idpag);
        $result->execute();
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function save(){
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "INSERT INTO pagina(nompag, rutpag, ordpag) VALUES (:nompag, :rutpag, :ordpag)";
        $result = $conexion->prepare($sql);
        $nompag = $this->getNompag();
        $result->bindParam(":nompag",$nompag);
        $rutpag = $this->getRutpag();
        $result->bindParam(":rutpag",$rutpag);
        $ordpag = $this->getOrdpag();
        $result->bindParam(":ordpag",$ordpag);
        $result->execute();
    }

    public function edit($idpag){
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "UPDATE pagina SET nompag=:nompag,rutpag=:rutpag,ordpag=:ordpag WHERE idpag=:idpag";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idpag",$idpag);
        $result->execute();
    }

    public function delete($idpag){
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "DELETE FROM pagina WHERE idpag=:idpag";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idpag",$idpag);
        $result->execute();
    }
}

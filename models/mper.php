<?php
class Mper
{
    private $idper;
    private $nomper;
    private $pagini;


    //Get Methods  
    public function getIdper()
    {
        return $this->idper;
    }
    public function getNomper()
    {
        return $this->nomper;
    }
    public function getPagini()
    {
        return $this->pagini;
    }

    //Set Methods
    public function setIdper($idper)
    {
        $this->idper = $idper;
    }
    public function setNomper($nomper)
    {
        $this->nomper = $nomper;
    }
    public function setPagini($pagini)
    {
        $this->pagini = $pagini;
    }

    public function getAll()
    {
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idper, nomper, pagini FROM perfil";
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getOne($idper)
    {
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idper, nomper, pagini FROM perfil WHERE idper=:idper";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idper", $idper);
        $result->execute();
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function save()
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "INSERT INTO perfil(nomper, pagini) VALUES (:nomper, :pagini)";
        $result = $conexion->prepare($sql);
        $nomper = $this->getNomper();
        $result->bindParam(":nomper", $nomper);
        $pagini = $this->getPagini();
        $result->bindParam(":pagini", $pagini);
        $result->execute();
    }

    public function edit($idper)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "UPDATE perfil SET nompag=:nompag,rutpag=:rutpag,ordpag=:ordpag WHERE idpag=:idpag";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idpag", $idpag);
        $result->execute();
    }

    public function delete($idper)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "DELETE FROM pagina WHERE idpag=:idpag";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idpag", $idpag);
        $result->execute();
    }


   

    


    


    
}

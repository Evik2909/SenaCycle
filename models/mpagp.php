<?php
class  Mpagp{
    private $idpag;
    private $idper;
    private $active;


    //metodos get

    public function getIdpag(){
        return $this->idpag;
    }
    public function getIdper(){
        return $this->idper;
    }
    public function getActive(){
        return $this->active;
    }

    //metodos set

    public function setIdpag($idpag){
        $this->idpag = $idpag;
    }
    public function setIdper($idper){
        $this->idper = $idper;
    }
    public function setActive($active){
        $this->active =$active;
    }

    function getAll(){
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idpag, idper, active FROM pagper";
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    
    function getOne(){
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idpag, idper, active FROM pagper WHERE idpag=:idpag";
        $result = $conexion->prepare($sql);
        $idpag = $this->getIdpag();
        $result->bindParam(":idpag", $idpag);
        $result->execute();
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    function save($idpag, $idper){
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "INSERT INTO pagper(idpag,idper) VALUES (:idpag,:idper)";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idpag", $idpag);
        $result->bindParam(":idper",$idper);
        $result->execute();
    }


    function delete($idper){
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "DELETE FROM pagper WHERE idper=:idper";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idper", $idper);
        $idper = $this->getIdper();
        $result->execute();
    }

    function edit(){
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "UPDATE pagper SET idpag=:idpag,idper=:idper WHERE idpag=:idpag";
        $result = $conexion->prepare($sql);
        $idpag = $this->getIdpag();
        $result->bindParam(":idpag",$idpag);
        $idper= $this->getIdper();
        $result->bindParam(":idper",$idper);
        $result->execute();
    }

    //Metodo para mostrar TODAS las paginas
    function getPag(){
        $res=null;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql='SELECT idpag, nompag, icopag  FROM pagina';
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;    
    }
    //Metodo para checkear las paginas activas para el perfil enviado
    function getPagper($idper){
        $res=null;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql='SELECT idpag, idper  FROM pagper WHERE idper=:idper';
        $result = $conexion->prepare($sql);
        $result->bindParam(":idper",$idper);
        $result->execute();
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;    
    }
    function menu($idper){
        $res=null;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql='SELECT pp.idpag, p.nompag, p.icopag, p.rutpag  FROM pagina AS p INNER JOIN pagper AS pp ON p.idpag=pp.idpag  WHERE pp.idper=:idper ORDER BY p.ordpag asc';
        $result = $conexion->prepare($sql);
        $result->bindParam(":idper",$idper);
        $result->execute();
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;    
    }
}
?>

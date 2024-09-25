<?php
 class Mpag{
    //Atributos
    private $idpag;
    private $nompag;
    private $rutpag;
    private $icopag;
    private $ordpag;

    //Metodos get

    public function getIdpag(){
        return $this -> idpag;
    }
    public function getNompag(){
        return $this -> nompag;
    }
    public function getRutpag(){
        return $this -> rutpag;
    }
    public function getIcopag(){
        return $this -> icopag;
    }
    public function getOrdpag(){
        return $this -> ordpag;
    }


    //Metodos set 
    public function setIdpag($idpag){
        $this -> idpag =  $idpag;
    }
    public function setNompag($nompag){
        $this -> nompag =  $nompag;
    }
    public function setRutpag($rutpag){
        $this -> rutpag =  $rutpag;
    }
    public function setIcopag($icopag){
        $this -> icopag =  $icopag;
    }
    public function setOrdpag($ordpag){
        $this -> ordpag = $ordpag;
    }
    

    //Metodos publicos
    public function getAll(){
        $res = NULL;
		$sql = "SELECT * FROM pagina";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();    
		$result = $conexion->prepare($sql);
		$result->execute();
		$res= $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
    }
    public function getOne(){
        $res = NULL;
        $sql = "SELECT * FROM pagina WHERE idpag=:idpag";
        $modelo = new conexion();
        $conexion = $modelo -> get_conexion();
        $result = $conexion -> prepare($sql);
        $idpag = $this-> getIdpag();
        $result->bindParam(":idpag",$idpag);
        $result->execute();
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }
    public function save(){
        $sql = "INSERT INTO pagina (idpag, nompag, rutpag, ordpag, icopag) VALUES (:idpag, :nompag, :rutpag,  :ordpag, :icopag )";
        $modelo = new conexion();
        $conexion = $modelo -> get_conexion();
        $result = $conexion -> prepare($sql);
        $idpag = $this-> getIdpag();
        $result->bindParam(":idpag",$idpag);
        $nompag = $this-> getNompag();
        $result->bindParam(":nompag",$nompag);
        $rutpag = $this-> getRutpag();
        $result->bindParam(":rutpag",$rutpag);
        $ordpag = $this-> getOrdpag();
        $result->bindParam(":ordpag",$ordpag);
        $icopag = $this-> getIcopag();
        $result->bindParam(":icopag",$icopag);
        $result->execute();
    }
    
    public function edit(){
        $sql = "UPDATE pagina SET idpag=:idpag, nompag=:nompag, rutpag=:rutpag, ordpag=:ordpag, icopag=:icopag WHERE idpag=:idpag";
        $modelo = new conexion();
        $conexion = $modelo -> get_conexion();
        $result = $conexion -> prepare($sql);
        $idpag = $this-> getIdpag();
        $result->bindParam(":idpag",$idpag);
        $nompag = $this-> getNompag();
        $result->bindParam(":nompag",$nompag);
        $rutpag = $this-> getRutpag();
        $result->bindParam(":rutpag",$rutpag);
        $icopag = $this-> getIcopag();
        $result->bindParam(":icopag",$icopag);
        $ordpag = $this-> getOrdpag();
        $result->bindParam(":ordpag",$ordpag);
        $result->execute();
    }
    public function del(){
        $sql = "DELETE FROM pagina WHERE idpag=:idpag";
        $modelo = new conexion();
        $conexion = $modelo -> get_conexion();
        $result = $conexion -> prepare($sql);
        $idpag = $this-> getIdpag();
        $result->bindParam(":idpag",$idpag);
        $result->execute();
    }
    

 }
?>
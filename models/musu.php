<?php
class Musu
{
    
    private $idusu;
    private $idper;
    private $nomusu;
    private $tipdoc;
    private $ndoc;
    private $emausu;
    private $telusu;
    private $pasusu;
    private $codubi;
    private $idsed;
    private $estusu;

    //Get Methods
    public function getIdusu()
    {
        return $this->idusu;
    }
    public function getIdper()
    {
        return $this->idper;
    }
    public function getNomusu()
    {
        return $this->nomusu;
    }
    public function getTipdoc()
    {
        return $this->tipdoc;
    }
    public function getNdoc()
    {
        return $this->ndoc;
    }
    public function getEmausu()
    {
        return $this->emausu;
    }
    public function getTelusu()
    {
        return $this->telusu;
    }
    public function getPasusu()
    {
        return $this->pasusu;
    }
    public function getCodubi()
    {
        return $this->codubi;
    }
    public function getIdsed()
    {
        return $this->idsed;
    }
    public function getEstusu()
    {
        return $this->estusu;
    }


    //Set Methods
    public function setIdusu($idusu)
    {
        $this->idusu = $idusu;
    }
    public function setIdper($idper)
    {
        $this->idper = $idper;
    }
    public function setNomusu($nomusu)
    {
        $this->nomusu = $nomusu;
    }
    public function setTipdoc($tipdoc)
    {
        $this->tipdoc = $tipdoc;
    }

    public function setNdoc($ndoc)
    {
        $this->ndoc = $ndoc;
    }

    public function setEmausu($emausu)
    {
        $this->emausu = $emausu;
    }

    public function setTelusu($telusu)
    {
        $this->telusu = $telusu;
    }

    public function setPasusu($pasusu)
    {
        $this->pasusu = $pasusu;
    }

    public function setCodubi($codubi)
    {
        $this->codubi = $codubi;
    }

    public function setIdsed($idsed)
    {
        $this->idsed = $idsed;
    }
    public function setEstusu($estusu)
    {
        $this->estusu = $estusu;
    }

    public function getAll()
    {
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idusu, idper, nomusu, tipdoc, ndoc, emausu, telusu, pasusu, codubi, idsed FROM usuario";
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    public function getOne($idusu)
    {
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idusu, idper, nomusu, tipdoc, ndoc, emausu, telusu, pasusu, codubi, idsed FROM usuario WHERE idusu=:idusu";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idusu", $idusu);
        $result->execute();
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    public function save()
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "INSERT INTO usuario(idper, nomusu, tipdoc, ndoc, emausu, telusu, pasusu, codubi, idsed) VALUES (:idper, :nomusu, :tipdoc, :ndoc, :emausu, :telusu, :pasusu, :codubi, :idsed)";
        $result = $conexion->prepare($sql);
        $idper = $this->getIdper();
        $result->bindParam(":idper", $idper);
        $nomusu = $this->getNomusu();
        $result->bindParam(":nomusu", $nomusu);
        $tipdoc = $this->getTipdoc();
        $result->bindParam(":tipdoc", $tipdoc);
        $ndoc = $this->getNdoc();
        $result->bindParam(":ndoc", $ndoc);
        $emausu = $this->getEmausu();
        $result->bindParam(":emausu", $emausu);
        $telusu = $this->getTelusu();
        $result->bindParam(":telusu", $telusu);
        $pasusu = $this->getPasusu();
        $result->bindParam(":pasusu", $pasusu);
        $codubi = $this->getCodubi();
        $result->bindParam(":codubi", $codubi);
        $idsed = $this->getIdsed();
        $result->bindParam(":idsed", $idsed);
        $result->execute();
    }

    public function edit($idusu)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "UPDATE usuario SET idper=:idper,nomusu=:nomusu,tipdoc=:tipdoc,ndoc=:ndoc,emausu=:emausu,telusu=:telusu,pasusu=:pasusu,codubi=:codubi,idsed=:idsed WHERE idusu=:idusu";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idusu", $idusu);
        $idper = $this->getIdper();
        $result->bindParam(":idper", $idper);
        $nomusu = $this->getNomusu();
        $result->bindParam(":nomusu", $nomusu);
        $tipdoc = $this->getTipdoc();
        $result->bindParam(":tipdoc", $tipdoc);
        $ndoc = $this->getNdoc();
        $result->bindParam(":ndoc", $ndoc);
        $emausu = $this->getEmausu();
        $result->bindParam(":emausu", $emausu);
        $telusu = $this->getTelusu();
        $result->bindParam(":telusu", $telusu);
        $pasusu = $this->getPasusu();
        $result->bindParam(":pasusu", $pasusu);
        $codubi = $this->getCodubi();
        $result->bindParam(":codubi", $codubi);
        $idsed = $this->getIdsed();
        $result->bindParam(":idsed", $idsed);
        $result->execute();
    }

    public function delete($idusu)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "DELETE FROM usuario WHERE idusu=:idusu";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idusu", $idusu);
        $result->execute();
    }

}

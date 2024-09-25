<?php
class Mfin
{
    //Propiedades de la clase 'finanza'
    private $idfin;
    private $nummes;
    private $nommes;
    private $ano;
    private $totfin;

    //Get Methods
    public function getIdfin()
    {
        return $this->idfin;
    }
    public function getNummes()
    {
        return $this->nummes;
    }
    public function getNommes()
    {
        return $this->nommes;
    }
    public function getAno()
    {
        return $this->ano;
    }
    public function getTotfin()
    {
        return $this->totfin;
    }

    //Set Methods
    public function setIdfin($idfin)
    {
        $this->idfin = $idfin;
    }

    public function setNummes($nummes)
    {
        $this->nummes = $nummes;
    }

    public function setNommes($nommes)
    {
        $this->nommes = $nommes;
    }
    public function setAno($ano)
    {
        $this->ano = $ano;
    }

    public function setTotfin($totfin)
    {
        $this->totfin = $totfin;
    }

    //Funcion que retorna todas las finanzas guardadas en la tabla de 'finanza'
    public function getAll()
    {
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idfin, nummes, nommes, ano, totfin FROM finanza";
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = $result->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    //Funcion que retorna una finanza guardadas en la tabla de 'finanza'
    public function getOne($idfin)
    {
        $res = NULL;
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "SELECT idfin, nummes, nommes, ano, totfin FROM finanza WHERE idfin=:idfin";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idfin", $idfin);
        $result->execute();
        $res = $result->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    //Funcion que guarda una finanza guardadas en la tabla de 'finanza'
    public function save()
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "INSERT INTO finanza(nummes, nommes,ano, totfin) VALUES (:idalq, :nummes, :nommes, :ano, :totfin)";
        $result = $conexion->prepare($sql);
        $ano = $this->getAno();
        $result->bindParam(":ano", $ano);
        $nummes = $this->getNummes();
        $result->bindParam(":nummes", $nummes);
        $nommes = $this->getNommes();
        $result->bindParam(":nommes", $nommes);
        $totfin = $this->getTotfin();
        $result->bindParam(":totfin", $totfin);
        $result->execute();
    }

    //Funcion que edita una finanza guardadas en la tabla de 'finanza'
    public function edit($idfin)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "UPDATE finanza SET nummes=:nummes,nommes=:nommes,ano=:ano,totfin=:totfin WHERE idfin=:idfin";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idfin", $idfin);
        $ano = $this->getAno();
        $result->bindParam(":ano", $ano);
        $nummes = $this->getNummes();
        $result->bindParam(":nummes", $nummes);
        $nommes = $this->getNommes();
        $result->bindParam(":nommes", $nommes);
        $totfin = $this->getTotfin();
        $result->bindParam(":totfin", $totfin);
        $result->execute();
    }

    //Funcion que elimina una finanza guardadas en la tabla de 'finanza'
    public function delete($idfin)
    {
        $modelo = new Conexion();
        $conexion = $modelo->get_conexion();
        $sql = "DELETE FROM finanza WHERE idfin=:idfin";
        $result = $conexion->prepare($sql);
        $result->bindParam(":idfin", $idfin);
        $result->execute();
    }
}

<?php 
class Mper{
	//atributos
	private $idper;
	private $nomper;
	private $pagini;

	
	//metodos get
	public function getIdper(){
		return $this->idper;
	}
	public function getNomper(){
		return $this->nomper;
	}
	public function getPagini(){
		return $this->pagini;
	}


	
	//metodos set
	public function setIdper($idper){
		$this->idper =$idper;
	}
	public function setNomper($nomper){
		$this->nomper =$nomper;
	}
	public function setPagini($pagini){
		$this->pagini =$pagini;
	}

	
	//metodos publicos
	public function getAll(){
		$res = NULL;
		$sql = " SELECT * FROM perfil";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res= $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
	}
	
	
	public function getOne(){
		$res = NULL;
		$sql = "SELECT * FROM perfil WHERE idper=:idper";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idper = $this->getIdper();
		$result->bindParam(":idper", $idper);
		$result->execute();
		$res= $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
	}
	public function save(){
		$sql = "INSERT INTO perfil (nomper, pagini) VALUES (:nomper, :pagini)";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
        $nomper = $this->getNomper();
		$result->bindParam(":nomper", $nomper);
		$pagini = $this->getPagini();
		$result->bindParam(":pagini", $pagini);
		$result->execute();
	}
	public function edit(){
		$sql = "UPDATE perfil SET nomper=:nomper, pagini=:pagini WHERE idper=:idper";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idper = $this->getIdper();
		$result->bindParam(":idper", $idper);
        $nomper = $this->getNomper();
		$result->bindParam(":nomper", $nomper);
		$pagini = $this->getPagini();
		$result->bindParam(":pagini", $pagini);
		$result->execute();
	}

	public function del(){
		$sql = "DELETE FROM perfil WHERE idper=:idper";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$idper = $this->getIdper();
		$result->bindParam(":idper", $idper);
		$result->execute();
	}

	public function getPag(){
		$res = NULL;
		$sql = "SELECT * FROM pagina";
		$modelo = new Conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res= $result->fetchall(PDO::FETCH_ASSOC);
		return $res;
	}
}
?>


   

    


    

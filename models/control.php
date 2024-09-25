<?php
require_once('conexion.php');
$uss = "pedro.arevalo2909@gmail.com"; //isset($_POST['usu']) ? $_POST['usu']:NULL;
$pas = "12345";//isset($_POST['pss']) ? $_POST['pss']:NULL;

if($uss AND $pas){
	valida($uss, $pas);
}else{
	reg();
}


function valida($usu, $pas){
	$res = ingr($usu, $pas);
	$res = isset($res) ? $res:NULL;
	if($res){
		session_start();
		$_SESSION['idusu'] = $res[0]['idusu'];
		$_SESSION['idper'] = $res[0]['idper'];
		$_SESSION['nomper'] = $res[0]['nomper'];
		$_SESSION['nomusu'] = $res[0]['nomusu'];
		$_SESSION['pagini'] = $res[0]['pagini'];
		$_SESSION['aut'] = 'hst%$vshYAT142&87ph.;';
		echo "<script>window.location='../home.php';</script>";
	}else{
		reg();
	}
}

function reg(){
	echo "<script>alert('Datos incorrectos o usuario inactivo, intente de nuevo por favor.')</script>";
	echo "<script>window.location='../index.php?err=oK';</script>";
}

function ingr($usu, $pas){
	$res=NULL;
	$con = $pas;
	$sql = "SELECT u.idusu, u.idper, p.nomper, u.nomusu, u.tipdoc, u.ndoc, u.emausu, u.telusu, u.pasusu, u.codubi, u.idsed, p.pagini  FROM usuario AS u INNER JOIN perfil AS P ON u.idper=p.idper WHERE emausu=:emausu AND pasusu=:pasusu";
	$modelo = new Conexion();
	$conexion = $modelo->get_conexion();
	$result = $conexion->prepare($sql);
	$result->bindParam(':emausu',$usu);
	$result->bindParam(':pasusu',$con);
	$result->execute();
	$res=$result->fetchall(PDO::FETCH_ASSOC);
	return $res;
}
?>
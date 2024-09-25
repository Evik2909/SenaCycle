<?php
    include("models/mpag.php");

    $idpag = isset($_REQUEST['idpag']) ? $_REQUEST['idpag']:NULL;
    $nompag = isset($_REQUEST['nompag']) ? $_REQUEST['nompag']:NULL;
    $rutpag = isset($_REQUEST['rutpag']) ? $_REQUEST['rutpag']:NULL;
    $icopag = isset($_REQUEST['icopag']) ? $_REQUEST['icopag']:NULL;
    $ordpag = isset($_REQUEST['ordpag']) ? $_REQUEST['ordpag']:NULL;
    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL; 

    $mpag = new Mpag();
    $mpag -> setIdpag($idpag);
    if($ope=="save"){
        $mpag -> setNompag($nompag);
        $mpag -> setRutpag($rutpag);
        $mpag -> setIcopag($icopag);
        $mpag -> setOrdpag($ordpag);
        if($idpag)$mpag->edit();
        else $mpag->save();
    }
    
    if ($ope=="del" && $idpag)$mpag->del();
    if ($ope=="edi" && $idpag){
        $dtOne = $mpag->getOne(); 
    }else{ 
        $dtOne=NULL;
    };

    $dat = $mpag->getAll();
    
?>
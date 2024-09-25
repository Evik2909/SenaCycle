<?php
    
    
    $idper = isset($_REQUEST['idper']) ? $_REQUEST['idper']:NULL;
    $ope = isset($_REQUEST['ope']) ? $_REQUEST['ope']:NULL;
    $counter = isset($_REQUEST['counter']) ? $_REQUEST['counter']:NULL;
    
    $mpagp = new Mpagp();
    
    $mpagp->setidper($idper);
    
    if($ope == "agregar" && $idper){
        $mpagp->delete($idper);
            for ($i=0; $i < $counter; $i++) { 
                $idpag = isset($_REQUEST['idpag'.$i]) ? $_REQUEST['idpag'.$i]:NULL;
                if($idpag){
                    $mpagp->save($idpag, $idper);
                }
            }
    }
    
    
    
    $dtpag = $mpagp->getPag();
    $dtpape = $mpagp->getPagper($idper);

?>
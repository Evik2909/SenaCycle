<?php 
    include("controllers/cpagp.php");
?>
<div class="mdl-container">
    <div class="mdl-basic mdl-pagper">
        <div class="head-mdl">
            <span class="material-symbols-outlined">person</span>
            <span><?php if($dtOne && $dtOne[0]['nomper']) echo $dtOne[0]['nomper']; ?></span>
            <a href="home.php?pg=<?= $m['idpag']; ?>" class="mdl-cls-btn">
                <span class="material-symbols-outlined">close</span>
            </a>
        </div> 
        <hr>
        <div class="content-mdl">
            <form action="" method="post" class="row" style="width: 100%;">
                <?php 
                if($dtpag){
                    $m=0;
                    foreach($dtpag as $page){
                        ?>
                        <div class="form-group col-md-6 pagper-item">    
                            <input type="checkbox" name="idpag<?php echo $m;?>" value="<?= $page['idpag'];?>" 
                            <?php
                                if($dtpape){
                                    foreach($dtpape as $pp){
                                        if($page['idpag'] == $pp['idpag'] ){
                                            echo "checked";
                                        }
                                    }
                                }
                            ?>
                            >
                            <span class="material-symbols-outlined pagper-item-icon"><?= $page['icopag'];?></span>    
                            <span><?= $page['nompag'];?></span>    
                        </div>
                        <?php 
                        $m = $m+1;
                    }
                }
                ?>
                <input type="hidden" name="idper" value="<?php if($dtOne && $dtOne[0]['idper']) echo $dtOne[0]['idper']; ?>">
                <input type="hidden" name="counter" value="<?php echo count($dtpag); ?>">
                <input type="hidden" name="ope" value="agregar">
                <button type="submit" class="btn btn-color btn-pagper-save">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
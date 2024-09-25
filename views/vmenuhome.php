    <div class="show-menu">
    <nav class="general-menu">
        <div class="menu-logo-container">
            <img class="isologo" src="img/logosena.png" alt="logo-checking">
        </div>
        <div class="menu-opc-container">
            <ul>
            <?php
                if($menu){
                    foreach($menu as $m){
            ?>  
                    <li><a href="home.php?pg=<?= $m['idpag']; ?>">
                        <span class="material-symbols-outlined menu-opc-icon"><?= $m['icopag']; ?></span>
                        <span class="menu-opc-text"><?= $m['nompag']; ?></span>
                        </a>
                    </li>
                    <?php          
                    }
                }
            ?>
            </ul>
        </div>

        <div class="account-container">
            <div class="ac-img-container">
                <img src="img/iconempty.png" >
            </div>
            <div class="ac-info-container">
                <div>
                <span><?php echo substr($_SESSION['nomusu'], 0, 17)."..."; ?></span>
                <br>
                <span><?= $_SESSION['nomper']; ?></span>
                </div>
            </div>
        </div>
        <a href="home.php?statesesion=break" class="logout-opc">
            <span class="material-symbols-outlined menu-opc-icon">Logout</span>
            <span class="menu-opc-text">Cerrar Sesión</span>
        </a>
    </nav>
    </div>

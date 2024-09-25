<?php 
    function title($icon, $title, $btn, $iconbtn, $idbtn,$txtbtn){
        echo "<h1 class='title-views'>";
            echo "<span class='material-symbols-outlined icon-tv'>".$icon."</span>";
            echo "<span class='txt-tv'>".$title."</span>";
        echo "</h1>";
        if($btn==1){
            echo "<button class='btn-tv show-btn' id='".$idbtn."'>";
            echo "<span class='material-symbols-outlined btn-tv-ico'>".$iconbtn."</span>";
            echo "<span class='btn-tv-txt'>".$txtbtn."</span>";
            echo "</button>";
        }
    };
?>

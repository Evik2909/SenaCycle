<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="css/generalstyle.css">
    <link rel="stylesheet" href="css/homestyle.css">
    <link rel="icon" type="image/x-icon" href="img/logosena.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Accountly - Login</title>
    <title>SenaCycle</title>
</head>
<body>
    <script>
        function drop(){
            if (confirm("¿Estás seguro de que deseas eliminar este elemento?")) {
                // Si el usuario hace clic en "Aceptar"
                console.log("Elemento eliminado");
            } else {
                // Si el usuario hace clic en "Cancelar"
                window.reload();
            }
        }
    </script>
    <?php 
        include("models/conexion.php");
        include("models/functions.php");
        date_default_timezone_set('America/Bogota');
        $pg= isset($_REQUEST["pg"]) ? $_REQUEST["pg"]:NULL;
        $mdl= isset($_REQUEST["mdl"]) ? $_REQUEST["mdl"]:NULL;
        
        ?>
    <?php
        session_start();
        if(isset($_SESSION['idper'])){
            include("models/mpagp.php");
            $mpagp = new Mpagp();
            $menu = $mpagp->menu($_SESSION['idper']);
            require_once("views/vmenuhome.php");
    ?>
    <main class="views-content">
        <?php
            if(!$pg)$pg=$_SESSION['pagini'];
            if(isset($_SESSION['idper'])) {
                foreach($menu as $m){
                    if($pg==$m['idpag']){
                        require_once($m['rutpag']);
                    }
                }
            }    
        ?>
    </main>
        <?php
        }else{
            // Si no hay sesión, redirigir al index
            echo "<script>window.location='index.php';</script>";
        }
        
        //Captura el valor de la variable que indica el cierre de sesión
        $sesion = isset($_GET['statesesion']) ? $_GET['statesesion']:NULL ;
        if($sesion && $sesion=="break"){
            echo "<script>alert('Ha cerrado sesion correctamente!');</script>";
            session_destroy();
            echo "<script>window.location='index.php';</script>";
        }
        ?>
    <script>
        $(document).ready(function() {
            $('#tables').DataTable({
                "paging": true, // Habilita paginación
                "searching": true, // Habilita el buscador
                "ordering": true, // Habilita ordenación de columnas
                "pageLength": 10, // Muestra 5 filas por página
                "lengthMenu": [5, 10, 20, 50] // Opciones para cambiar el número de filas
            }); // Inicializa DataTables
        });
    </script>
    <script src="js/script.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDaeWicvigtP9xPv919E-RNoxfvC-Hqik&callback=iniciarMap"></script>
    <script src="js/openform.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
include("controllers/calq.php");
title("bike_lane", "Alquiler de Bicicletas", 0, "add", "opbtn", "Crear");
?>
<?php if (!$actAlq) { ?>
    <div class="cycles-container">
        <?php
        if ($dtBic) {
            foreach ($dtBic as $dt) {
        ?>
                <a href="home.php?pg=<?= $m['idpag']; ?>&mdl=1&idbic=<?= $dt['idbic']; ?>&mdl=alq" class="cycle-item">
                    <img class="cycle-item-img" src="img/cycleicon.png" alt="Bicicleta">
                    <div class="cycle-info">
                        <table>
                            <tr>
                                <th>ID:</th>
                                <td><?= $dt['idbic'] ?></td>
                            </tr>
                            <tr>
                                <th>Marca:</th>
                                <td><?= $dt['marca'] ?></td>
                            </tr>
                            <tr>
                                <th>Color:</th>
                                <td><?= $dt['color'] ?></td>
                            </tr>
                        </table>
                    </div>
                </a>
        <?php
            }
        }
        ?>
    </div>
    <?php
    if ($mdl == "alq") {
        require_once("views/vmdlalq.php");
    }
} else {
    ?>
    <div class="alq-container">
        <h3 class="p-3" style="color:#00c217;">En este momento tienes un alquiler activo!</h3>
        <h4 class="px-3">Esta es la informacion de tu alquiler:</h4>
        <div class="row">
            <div class="col-md-6 p-3">
                <table class="table" border="1">
                    <tr>
                        <th>ID:</th>
                        <td><?= $inAl[0]['idbic'] ?></td>
                    </tr>
                    <tr>
                        <th>Marca:</th>
                        <td><?= $inAl[0]['marca'] ?></td>
                    </tr>
                    <tr>
                        <th>Serial:</th>
                        <td><?= $inAl[0]['seriall'] ?></td>
                    </tr>
                    <tr>
                        <th>Color:</th>
                        <td><?= $inAl[0]['color'] ?></td>
                    </tr>
                    <tr>
                        <th><?= $inAl[0]['tin'] ?></th>
                        <td>$<?= $inAl[0]['tiv'] ?></td>
                    </tr>
                    <tr>
                        <th><?= $inAl[0]['phn'] ?></th>
                        <td>$<?= $inAl[0]['phv'] ?></td>
                    </tr>
                    <tr>
                        <th>Fecha:</th>
                        <td><?= $inAl[0]['fecini'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6 p-3 row">
                <div class="col-12">
                    <h4 class="text-center pt-2" style="color:#00c217;">Tiempo de uso:</h4>
                    <h5 class="text-center pb-1 fs-5">
                        <?php
                        // Convertir la fecha de la base de datos en un objeto DateTime
                        $fechaInicio = new DateTime($inAl[0]['fecini']);

                        // Obtener la fecha y hora actual
                        $fechaFin = new DateTime(date('Y-m-d H:i:s'));

                        // Diferencia entre las dos fechas
                        $interval = $fechaInicio->diff($fechaFin);

                        // Convertir la diferencia a horas
                        $horas = $interval->days * 24 + $interval->h + $interval->i / 60;

                        // Verificar si ha pasado menos de una hora
                        if ($horas < 1) {
                            // Mostrar la diferencia en minutos
                            $minutos = $interval->days * 24 * 60 + $interval->h * 60 + $interval->i;
                            echo "Has usado la bicicleta $minutos minutos.";
                        } else {
                            // Mostrar la diferencia en horas
                            echo "Has usado la bicicleta ".substr($horas, 0, 3)." horas.";
                        }
                        ?>
                    </h5>
                </div>
                <div class="col-md-6">
                    <h4 class="text-center ps-3" style="color:#00c217;">Subtotal:</h4>
                    <h5 class="text-center ps-3 fs-3">
                        <?php
                        // Tarifas
                        $tarifaInicial = $inAl[0]['tiv']; // Tarifa inicial por las primeras 4 horas
                        $horasIncluidas = 4;   // Horas incluidas en la tarifa inicial
                        $tarifaExtraPorHora = $inAl[0]['phv']; // Tarifa extra por cada hora adicional

                        // Calcular el costo
                        if ($horas <= $horasIncluidas) {
                            $precio = $tarifaInicial;
                        } else {
                            $horasExtras = $horas - $horasIncluidas;
                            $precio = $tarifaInicial + ceil($horasExtras) * $tarifaExtraPorHora;
                        }
                        echo "$$precio COP";
                        ?>
                    </h5>
                </div>
                <div class="col-md-6">
                    <h4 class="text-center pt-1 ps-3 fs-5" style="color:#00c217;">Descuento por estrato:</h4>
                    <h5 class="text-center ps-3 fs-3">
                        <?php
                            $valorDesc = $precio*$inAl[0]['dsc'];
                        echo "$".$valorDesc." COP";
                        ?>
                    </h5>
                </div>
                <div class="col-12">
                    <h4 class="text-center pt-1 ps-3 fs-3" style="color:#00c217;">Total a pagar:</h4>
                    <h5 class="text-center ps-3 fs-1">
                        <?php
                            $totalPago=$precio-$valorDesc;
                        echo "$".$totalPago." COP";
                        ?>
                    </h5>
                    <a href="home.php?pg=<?= $m['idpag'];?>&ope=finalq&idalq=<?=$inAl[0]['idalq']?>&idbic=<?=$inAl[0]['idalq']?>&totalq=<?=$totalPago?>" class="btn btn-color d-block">Finalizar y pagar alquiler</a> 
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
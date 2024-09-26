<?php
include("controllers/cfin.php");
title("monitoring", "Finanzas", 0, "person_add", "opbtn", "Crear Perfil");
?>
<div class="d-flex justify-content-center align-items-center vh-100">
  <div class="col-md-6">
    <canvas id="myChart"></canvas>
  </div>
</div>

<div class="text-center mt-4">
  <h1>
    Valor Total del Mes: 
    <?php
    // Suponiendo que $dtFinanzas es un array con datos de finanzas del mes actual
    $valorTotal = 0;
    if ($dtFinanzas) {
      foreach ($dtFinanzas as $dtF) {
        $valorTotal += intval($dtF['totfin']);
      }
    }
    echo $valorTotal; // Muestra el valor total
    ?>
  </h1>
</div>

<script>
  const ctx = document.getElementById('myChart');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
      datasets: [{
        label: 'Ingresos totales por Mes',
        data: [
          <?php
          if ($dtFinanzas) {
            $valores = [];
            foreach ($dtFinanzas as $dtF) {
              $valores[] = intval($dtF['totfin']);
            }
            echo implode(',', $valores); // Convierte el array a una cadena separada por comas
          } else {
            echo '0'; // Valor por defecto si no hay datos
          }
          ?>
        ],
        backgroundColor: 'rgba(0, 194, 23, 1)', // Color verde en formato RGBA
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      },
      plugins: {
        tooltip: {
          callbacks: {
            label: function(tooltipItem) {
              return tooltipItem.label + ': ' + tooltipItem.raw; // Muestra el nombre del mes y el valor
            }
          }
        }
      }
    }
  });
</script>

<?php
include("controllers/cper.php");
title("monitoring", "Finanzas", 0, "person_add", "opbtn", "Crear Perfil");
?>
<div style="width: 55%;">
  <canvas id="myChart"></canvas>
</div>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Marzo', 'Abril', 'Junio', 'Julio', 'Agosto','Septiembre'],
      datasets: [{
        label: 'Ingresos totales por Mes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
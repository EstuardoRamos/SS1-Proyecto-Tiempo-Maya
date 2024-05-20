<?php
$conn = include "conexion/conexion.php";

// Obtener el año y mes actual, o los proporcionados por el usuario
$year = isset($_GET['year']) ? $_GET['year'] : date('Y');
$month = isset($_GET['month']) ? $_GET['month'] : date('m');

// Obtener el primer día del mes y el número de días en el mes
$first_day_of_month = date('Y-m-01', strtotime("$year-$month"));
$days_in_month = date('t', strtotime($first_day_of_month));

// Crear el calendario
echo '<div class="calendar">';
echo '<div class="day-header">Dom</div>';
echo '<div class="day-header">Lun</div>';
echo '<div class="day-header">Mar</div>';
echo '<div class="day-header">Mié</div>';
echo '<div class="day-header">Jue</div>';
echo '<div class="day-header">Vie</div>';
echo '<div class="day-header">Sáb</div>';

// Añadir espacios vacíos para los días antes del primer día del mes
$first_day_of_week = date('w', strtotime($first_day_of_month));
for ($i = 0; $i < $first_day_of_week; $i++) {
    echo '<div class="day empty"></div>';
}

// Generar los días del mes
for ($day = 1; $day <= $days_in_month; $day++) {
    $fecha_consultar = date('Y-m-d', strtotime("$year-$month-$day"));

    // Obtener las fechas mayas
    $nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
    $nahual_name = $nahual['name'];
    $nahual_image = $nahual['image'];
    $energia = include 'backend/buscar/conseguir_energia_numero.php';
    $haab_data = include 'backend/buscar/conseguir_uinal_nombre.php';
    $haab_name = $haab_data['name'];
    $haab_image = $haab_data['image'];
    $haab_day = $haab_data['day'];
    $cholquij = $nahual_name . " " . strval($energia);

    echo '<div class="day">';
    echo "<div class='day-number'>$day<br><img src='./imgs/src/numMaya/$day.png' alt='$haab_name' class='haab-image'></div>";
    echo "<div class='maya-dates'>";
    echo "<div class='maya-date'>Haab <br> $haab_name $haab_day <br><img src='./imgs/$haab_image' alt='$haab_name' class='haab-image'></div>";
    echo "<div class='maya-date'>Cholquij: $cholquij<br><img src='./imgs/$nahual_image' alt='$nahual_name' class='haab-image'></div>";
    echo "</div>";
    echo '</div>';
}
echo '</div>';
?>

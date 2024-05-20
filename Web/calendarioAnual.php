<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Calendario Anual - Tiempo Maya</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .calendar-container {
            width: 90%;
            margin: 0 auto;
            padding: 20px;
            background-color: rgba(52, 59, 64, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }

        h1, h2 {
            text-align: center;
            color: #2dc997;
        }

        .calendar {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 5px;
            margin-bottom: 50px;
        }

        .day-header {
            padding: 5px;
            background-color: #fcfefd;
            color: rgb(12, 12, 12);
            text-align: center;
            border-radius: 5px;
            font-weight: bold;
        }

        .day {
            display: grid;
            grid-template-rows: 1fr 1fr;
            padding: 8px;
            background-color: #fcfefd;
            color: rgb(17, 17, 17);
            text-align: center;
            border-radius: 5px;
        }

        .empty {
            background-color: transparent;
        }

        .day-number {
            font-size: 1.2em;
            font-weight: bold;
        }

        .maya-dates {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 3px;
        }

        .maya-date {
            font-size: 0.8em;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: rgba(0, 0, 0, 0.1);
            border-radius: 3px;
            border-color: black;
        }

        .haab-image {
            margin-left: 5px;
            width: 40px;
            height: 40px;
            border-color: black;
        }

        /* Estilos para la impresión */
        @media print {
            body {
                background-color: #fff;
            }

            .calendar-container {
                margin-top: 0;
                box-shadow: none;
            }

            button {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="calendar-container">
        <h1>Calendario Anual</h1>
        <?php
        $conn = include "conexion/conexion.php";

        // Obtener el año seleccionado
        $year = isset($_GET['year']) ? $_GET['year'] : date('Y');

        $meses = [
            1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
            5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
            9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
        ];

        foreach ($meses as $num => $nombre) {
            // Obtener el primer día del mes y el número de días en el mes
            $first_day_of_month = date('Y-m-01', strtotime("$year-$num"));
            $days_in_month = date('t', strtotime($first_day_of_month));

            echo "<h2>{$nombre} $year</h2>";
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
                $fecha_consultar = date('Y-m-d', strtotime("$year-$num-$day"));

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
        }
        ?>
        <button onclick="window.print()">Imprimir / Guardar como PDF</button>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tiempo Maya - Calculadora de Mayas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php include "blocks/bloquesCss.html" ?>
    <link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/calendario.css?v=<?php echo (rand()); ?>" />
</head>

<body>

    <?php include "NavBar.php" ?>
    <div>
        <section id="inicio">
            <div id="inicioContainer" class="inicio-container">
                    <div class="calendar-container">
                        <h1>Calendario Maya</h1>
                        <form action="calendarioMes.php" method="GET">
                            <label for="month">Mes:</label>
                            <select name="month" id="month">
                                <?php
                                $meses = [
                                    1 => 'Enero', 2 => 'Febrero', 3 => 'Marzo', 4 => 'Abril',
                                    5 => 'Mayo', 6 => 'Junio', 7 => 'Julio', 8 => 'Agosto',
                                    9 => 'Septiembre', 10 => 'Octubre', 11 => 'Noviembre', 12 => 'Diciembre'
                                ];
                                $current_month = date('n');
                                foreach ($meses as $num => $nombre) {
                                    $selected = ($num == $current_month) ? 'selected' : '';
                                    echo "<option value='$num' $selected>$nombre</option>";
                                }
                                ?>
                            </select>
                            <label for="year">Año:</label>
                            <select name="year" id="year">
                                <?php
                                $current_year = date('Y');
                                for ($y = $current_year - 10; $y <= $current_year + 10; $y++) {
                                    $selected = ($y == $current_year) ? 'selected' : '';
                                    echo "<option value='$y' $selected>$y</option>";
                                }
                                ?>
                            </select>
                            <button type="submit">Mostrar Calendario</button>
                        </form>

                        <?php
                        $year = isset($_GET['year']) ? $_GET['year'] : date('Y');
                        $month = isset($_GET['month']) ? $_GET['month'] : date('m');
                        echo "<h2>{$meses[intval($month)]} $year</h2>";
                        include "generar_calendario.php";
                        ?>
                    </div>

                

    </div>
    </section>
    </div>


    <?php include "blocks/bloquesJs1.html" ?>
    <script src="js/background.js"></script>

</body>

</html>


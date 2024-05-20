<?php session_start(); ?>
<?php 
$conn = include "conexion/conexion.php";

if(isset($_GET['fecha'])){
$fecha_consultar = $_GET['fecha'];
}else{
date_default_timezone_set('US/Central');  
$fecha_consultar = date("Y-m-d");
}

$nahual = include 'backend/buscar/conseguir_nahual_nombre.php';
$energia = include 'backend/buscar/conseguir_energia_numero.php';
$haab = include 'backend/buscar/conseguir_uinal_nombre.php';
$cuenta_larga = include 'backend/buscar/conseguir_fecha_cuenta_larga.php';
$cholquij = $nahual." ". strval($energia);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Tiempo Maya - Calculadora de Mayas</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <?php include "blocks/bloquesCss.html" ?>
    <link rel="stylesheet" href="css/estilo.css?v=<?php echo (rand()); ?>" />
    <link rel="stylesheet" href="css/calculadora.css?v=<?php echo (rand()); ?>" />
</head>

<body>

    <?php include "NavBar.php" ?>
    <div>
        <section id="inicio">
            <div id="inicioContainer" class="inicio-container">

                <div id='formulario'>
                    <h1>Calculadora</h1>
                    <form id="dateForm">
        <label for="date">Selecciona una fecha:</label>
        <input type="date" id="date" name="date">
        <button type="submit">Convertir</button>
    </form>

    <div id="longCountDisplay">
        <div class="unit">
            <img src="imgs/baktun.png" class="icon" alt="Baktun">
            <div id="baktun">0</div>
        </div>
        <div class="unit">
            <img src="imgs/katun.png" class="icon" alt="Katun">
            <div id="katun">0</div>
        </div>
        <div class="unit">
            <img src="imgs/tun.png" class="icon" alt="Tun">
            <div id="tun">0</div>
        </div>
        <div class="unit">
            <img src="imgs/uinal.png" class="icon" alt="Uinal">
            <div id="uinal">0</div>
        </div>
        <div class="unit">
            <img src="imgs/kin.png" class="icon" alt="Kin">
            <div id="kin">0</div>
        </div>
    </div>

    <script>
        document.getElementById('dateForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const date = document.getElementById('date').value;
            fetch(`convert.php?date=${date}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('baktun').innerText = data.baktun;
                    document.getElementById('katun').innerText = data.katun;
                    document.getElementById('tun').innerText = data.tun;
                    document.getElementById('uinal').innerText = data.uinal;
                    document.getElementById('kin').innerText = data.kin;
                });
        });
    </script>
                </div>

            </div>
    </div>
    </section>
    </div>


    <?php include "blocks/bloquesJs1.html" ?>
    <script src="js/background.js"></script>
</body>

</html>



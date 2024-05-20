<?php
function gregorianToLongCount($year, $month, $day) {
    $startGregorian = new DateTime("3114-08-11"); // Fecha inicial de la Cuenta Larga
    $targetDate = new DateTime("$year-$month-$day");
    $interval = $startGregorian->diff($targetDate);
    $totalDays = $interval->days;

    // Calculamos las unidades de la Cuenta Larga
    $baktun = floor($totalDays / 144000);
    $totalDays %= 144000;
    $katun = floor($totalDays / 7200);
    $totalDays %= 7200;
    $tun = floor($totalDays / 360);
    $totalDays %= 360;
    $uinal = floor($totalDays / 20);
    $kin = $totalDays % 20;

    return [
        'baktun' => $baktun,
        'katun' => $katun,
        'tun' => $tun,
        'uinal' => $uinal,
        'kin' => $kin
    ];
}

if (isset($_GET['date'])) {
    list($year, $month, $day) = explode('-', $_GET['date']);
    $longCount = gregorianToLongCount($year, $month, $day);
    echo json_encode($longCount);
}
?>

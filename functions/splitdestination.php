<?php
// splitdestination.php

function tachDichDen($tuyen) {
    $parts = explode(' - ', $tuyen);
    $dich_den = trim(end($parts));
    return $dich_den;
}
?>
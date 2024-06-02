<?php
// splitelement.php

function tachLoTrinh($lo_trinh) {
    $parts = explode(' - ', $lo_trinh);
    $parts = array_map('trim', $parts);
    return $parts;
}
?>
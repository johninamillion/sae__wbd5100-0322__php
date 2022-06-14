<?php

/*
 * php.net Referenzen
 * https://www.php.net/manual/en/language.operators.logical.php
 * https://www.php.net/manual/en/types.comparisons.php
 * 
 * Vergleichsoperatoren
 * and  and     true wenn $condition1 und $condition2 erfüllt sind
 * or   or      true wenn $condition1 oder $condition2 erfüllt sind
 * xor  xor     true wenn $condition1 oder $condition2 erfüllt sind, aber nicht beide
 * &&   and     true wenn $condition1 und $condition2 erfüllt sind
 * ||   or      true wenn $condition1 oder $condition2 erfüllt sind
 * !    not     true wenn $condition1 nicht erfüllt ist
 */

/** @var int $condition1 */
$condition1 = TRUE;
/** @var int $condition2 */
$condition2 = FALSE;

// if - wenn die erste Bedingung erfüllt ist
if ( $condition1 && $condition2 ) {
    echo 'IF';
}
// elseif - wenn eine alternative Bedingung erfüllt ist
elseif( $condition2 || $condition1 ) {
    echo 'ELSE IF';
}
// else - wenn keine Bedingung erfüllt wurde
else {
    echo 'ELSE';
}

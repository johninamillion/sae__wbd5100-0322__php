<?php

/*
 * php.net Referenzen
 * https://www.php.net/manual/en/language.operators.comparison.php
 * https://www.php.net/manual/en/types.comparisons.php
 * 
 * Vergleichsoperatoren
 * !=   Negativer Wertevergleich, vergleicht den WErt aber nicht den Typen
 * ==   Wertevergleich, vergleicht den WErt aber nicht den Typen
 * !==  Negativer Typen und Wertevergleich, vergleicht den WErt und den Typen
 * ===  Typen und Wertevergleich, vergleicht den WErt und den Typen
 * >    Größer als
 * >=   Größer als oder gleich
 * <    Kleiner als
 * <=   Kleiner als oder gleich
 * <=>  Größer als oder kleiner als [>PHP 7.0]
 */

/** @var int $condition1 */
$condition1 = 1;
/** @var int $condition2 */
$condition2 = 2;

// if - wenn die erste Bedingung erfüllt ist
if ( $condition1 > $condition2 ) {
    echo 'IF';
}
// elseif - wenn eine alternative Bedingung erfüllt ist
elseif( $condition2 > $condition1 ) {
    echo 'ELSE IF';
}
// else - wenn keine Bedingung erfüllt wurde
else {
    echo 'ELSE';
}

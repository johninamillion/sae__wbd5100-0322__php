<?php

/*
 * php.net Referenzen:
 * https://www.php.net/manual/en/control-structures.switch.php
 */

$i = 1;

switch ( $i ) {
    case 2:
        echo '$i equals 2';
    break;
    case 1:
        echo '$i equals 1';
        break;
    case 0:
        echo '$i equals 0';
        break;
    default:
        echo '$i doesn\'t equals any case';
        break;
}

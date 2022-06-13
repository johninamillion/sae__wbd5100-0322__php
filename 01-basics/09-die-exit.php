<?php

// siehe "01-basics/08-error-reporting.php"
error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

/*
 * Beenden des Skriptes
 * https://www.php.net/manual/de/function.die.php
 * https://www.php.net/manual/de/function.exit.php
 *
 * Die Funktion "die" entspricht der Funktion "exit"
 * Die Funktionen beenden das Skript an einem gewünschten Punkt, innerhalb des Skriptes
 * Die Funktionen sind nicht Notwendig um das Skript am Schluss zu beenden
 */

die() && exit(); // Ausführen von "die" und "exit"

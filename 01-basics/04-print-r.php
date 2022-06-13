<?php

// siehe "01-basics/08-error-reporting.php"
error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

/*
 * Gibt einen Wert in einer lesbaren Form aus
 *
 * php.net Referenz:
 * https://www.php.net/manual/de/function.print-r.php
 *
 * Geeignet für Strings, Integers, Floats, Arrays und Objects
 * String       gibt den String aus
 * Integer      gibt den Integer aus
 * Float        gibt den Float aus
 * Array        gibt den Array mit index/kex => value aus
 * Object       gibt den Klassennamen des Objektes und die Objektvariablen mit Geltungsbereich aus
 *
 * Nicht geeignet für Booleans
 * Booleans     gibt bei TRUE 1 aus, bei FALSE keine Ausgabe
 */
print_r( "Hello World" );   // Ausgabe von einem String
print_r( 1 );               // Ausgabe von einem Integer
print_r( 1.2 );             // Ausgabe von einem Float
print_r( [ 'a', 'b', 'c' ] );     // Ausgabe von einem Array
print_r( new Exception() );       // Ausgabe von einem Objekt

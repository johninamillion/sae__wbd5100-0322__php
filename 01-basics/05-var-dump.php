<?php

error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

/*
 * Gibt alle Informationen zur einer Variable aus
 *
 * php.net Referenz:
 * https://www.php.net/manual/de/function.var-dump.php
 *
 * Geeignet für Strings, Integers, Floats, Arrays und Objects
 * String       gibt den Typ String, in Klammern die Länge und den Wert aus
 * Integer      gibt den Typ Integer und in Klammern den Wert aus
 * Float        gibt den Typ Float und in Klammern den Wert aus
 * Boolean      gibt den Typ Boolean und in Klammern den Wert aus
 * Array        gibt den Typ Array, in Klammern die Anzahl der Werte und eine Auflistung aller index/key => values mit jeweiligen Typen aus
 * Object       gibt den Typ Object, in Klammern den Klassennamen und eine Auflistung der Objektvariablen mit Geltungsbereich aus
 */
var_dump( "Hello World" );  // Ausgabe von einem String
var_dump( 1 );              // Ausgabe von einem Integer
var_dump( 1.2 );            // Ausgabe von einem Float
var_dump( TRUE );           // Ausgabe von einem Boolean
var_dump( [ 'a', 'b', 'c' ] );    // Ausgabe von einem Array
var_dump( new Exception() );      // Ausgabe von einem Objekt

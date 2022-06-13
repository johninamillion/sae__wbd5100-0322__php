<?php

error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

/*
 * Gibt einen oder mehrere Wert(e) aus ohne Rückgabewert
 *
 * php.net Referenz:
 * https://www.php.net/manual/de/function.echo.php
 *
 * Geeignet für Strings, Integers und Floats
 * String       gibt den String aus
 * Integer      gibt den Integer aus
 * Float        gibt den Float aus
 *
 * Nicht geeignet für Booleans, Arrays und Objects
 * Booleans     gibt bei TRUE 1 aus, bei FALSE keine Ausgabe
 * Array        gibt "Array" aus
 * Object       gibt den Klassennamen des Objektes aus
 */
echo "Hello World!";                    // Ausgabe von einem String
echo 1;                                 // Ausgabe von einem Integer
echo 1.2;                               // Ausgabe von einem Float

echo( "Hello World" );                  // Alternative Schreibweise zur Ausgabe von einem String
echo( 1 );                              // Alternative Schreibweise zur Ausgabe von einem Integer
echo( 1.2 );                            // Alternative Schreibweise zur Ausgabe von einem Float

echo( "Hello World"), ( 1 ), ( 1.2 );   // Alternative Schreibweise zur Ausgabe mehrere Werte

<?php

error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

/*
 * Gibt einen Wert aus und Rückgabewert
 *
 * php.net Referenz:
 * https://www.php.net/manual/de/function.print.php
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
print "Hello World!";   // Ausgabe von einem String
print 1;                // Ausgabe von einem Integer
print 1.2;              // Ausgabe von einem Float

print( "Hello World" ); // Alternative Schreibweise zur Ausgabe von einem String
print( 1 );             // Alternative Schreibweise zur Ausgabe von einem Integer
print( 1.2 );           // Alternative Schreibweise zur Ausgabe von einem Float

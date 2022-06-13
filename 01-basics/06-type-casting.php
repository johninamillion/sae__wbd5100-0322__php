<?php

error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

/*
 * Type Casting konvertiert den Wert in einen bestimmten Typen
 *
 * php.net Referenz:
 * https://www.php.net/manual/de/language.types.type-juggling.php#language.types.typecasting
 *
 * Type Casts:
 * (string)     konvertiert zu String
 * (int)        konvertiert zu Integer
 * (float)      konvertiert zu Float
 * (bool)       konvertiert zu Boolean
 * (array)      konvertiert zu Array
 * (object)     konvertiert zu Objekt
 */

// Type Casting aus einem String
$string = "1, 2, 3 Hello World!";

var_dump( (int) $string );          // = 1
var_dump( (float) $string );        // = 1
var_dump( (bool) $string );         // = TRUE (FALSE, wenn der String leer ist)
var_dump( (array) $string );        // = [ 0 => "1, 2, 3 Hallo Welt!"
var_dump( (object) $string );       // = (stdClass) [ "scalar" => "1, 2, 3, Hello World!" ]

// Type Casting aus einem Integer
$int = 1;

var_dump( (string) $int );          // = "1"
var_dump( (float) $int );           // = 1
var_dump( (bool) $int );            // = TRUE (FALSE, wenn der Integer 0 ist)
var_dump( (array) $int );           // = [ 0 => 1 ]
var_dump( (object) $int );          // = (stdClass) [ "scalar" => 1 ]

// Type Casting aus einem Float
$float = 1.2;

var_dump( (string) $float );        // = "1.2"
var_dump( (int) $float );           // = 1
var_dump( (bool) $float );          // = TRUE (FALSE, wenn der Float 0 ist)
var_dump( (array) $float );         // = [ 0 => 1.2 ]
var_dump( (object) $float );        // = (stdClass) [ "scalar" => 1.2 ]

// Type Casting aus einem Boolean
$bool = TRUE;

var_dump( (string) $bool );         // = "1"
var_dump( (int) $bool );            // = 1
var_dump( (float) $bool );          // = 1
var_dump( (array) $bool );          // = [ 0 => TRUE ]
var_dump( (object) $bool );         // = (stdClass) [ "scalar" => TRUE ]

// Type Casting aus einem Array
$array = [ 'A', 'B', 'C', 'D', 'E' ];

var_dump( (string) $array );        // = "Array" (Error)
var_dump( (int) $array );           // = 1
var_dump( (float) $array );         // = 1
var_dump( (bool) $array );          // = TRUE (FALSE, wenn der Array leer ist)
var_dump( (object) $array );        // = (stdClass) [ "scalar" => [ 'A', 'B', 'C', 'D', 'E' ] ]

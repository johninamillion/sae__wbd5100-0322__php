<?php

/*
 * Definieren einer Konstanten
 *
 * php.net Referenzen:
 * https://www.php.net/manual/de/function.define.php
 *
 * Geeignet für Strings, Integer, Floats und Booleans
 * Nicht geeignet für Arrays und Objects
 *
 * Konstanten sind im Verhältnis zu Variablen immer Global
 * Konstanten lassen sich im Verhältnis zu Variablen nicht überschreiben
 * Konstanten werden in Caps-Lock geschrieben und mit unterstrichen getrennt
 *
 * Die wichtigsten durch PHP vorhandenen Konstanten:
 * __DIR__          der Pfad des aktuelle Verzeichnis (Directory) im Verhältnis zur Datei
 * __FILE__         der Pfad der aktuellen Datei (File) im Verhältnis zur Datei
 * __LINE__         die aktuelle Zeile
 * __CLASS__        die aktuelle Klasse
 * __NAMESPACE__    der aktuelle Namespace
 * __TRAIT__        der aktuelle Trait
 *
 * Weitere Beispiele von vorhandenen Konstanten:
 * DIRECTORY_SEPARATOR  trennzeichen von Verzeichnissen (Systemabhängig, bspw. "/" oder "\")
 * PHP_INT_MAX          der größtmögliche Integer (Positiver Wert)
 * PHP_INT_MIN          der kleinstmögliche Integer (Negativ Wert)
 */
define( 'DATABASE_NAME',   'db_name' ); // Beispiel Konstante um den Datenbank Namen in einer Konfigurationsdatei festzulegen
define( 'DATABASE_USER',   'db_user' ); // Beispiel Konstante um den Datenbank Nutzer in einer Konfigurationsdatei festzulegen
define( 'DATABASE_PASS',   'db_pass' ); // Beispiel Konstante um das Datenbank Passwort in einer Konfigurationsdatei festzulegen
define( 'APPLICATION_DEBUG',    TRUE ); // Beispiel Konstante um Festzulegen ob die Anwendung im Debug Mode laufen soll

<?php

/*
 * Festlegen das Error Meldungen im Browser ausgegeben werden
 *
 * php.net Referenzen:
 * https://www.php.net/manual/de/function.error-reporting.php
 * https://www.php.net/manual/de/function.ini-set.php
 *
 * Error Level:
 * E_ALL            Gibt alle Fehler aus
 * E_ERROR          Gibt alle Errormeldungen aus
 * E_WARNING        Gibt alle Warnungen aus
 * E_NOTICE         Gibt alle Hinweise aus
 * E_DEPRECATED     Gibt alle Hinweise zu deprecated aus
 */
error_reporting( E_ALL );              // Legt fest welche Errormeldungen ausgespielt/reported werden
ini_set( 'display_errors', '1' );   // Legt fest das Fehler ausgegeben werden, dies kann alternative in der Konfiguration vom Server festgelegt werden

/*
 * Error Meldungen Triggern
 *
 * php.net Referenzen:
 * https://www.php.net/manual/de/function.trigger-error.php
 *
 * Error Level:
 * E_USER_ERROR
 * E_USER_WARNING
 * E_USER_NOTICE
 * E_USER_DEPRECATED
 */
trigger_error( 'Deprecated Message', E_USER_DEPRECATED ); // Gibt einen Error vom Typ Deprecated aus
trigger_error( 'Notice Message', E_USER_NOTICE ); // Gibt einen Error vom Typ Notice aus
trigger_error( 'Warning Message', E_USER_WARNING ); // Gibt einen Error vom Typ Warning aus
trigger_error( 'Error Message', E_USER_ERROR ); // Gibt einen Error vom Typ Error aus, hier bricht das Skript ab!

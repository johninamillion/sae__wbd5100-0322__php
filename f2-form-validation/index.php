<?php

// Error Handling aktivieren
error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

// Funktionen einbinden
require_once 'register.php';

/** @var array $errors */
$errors = [];

/**
 * @global  array   $errors
 * @param   string  $input_name     Wert vom Name Attribute des Input Feldes für das Fehler ausgespielt werden sollen
 * @return  void                    Kein Rückgabewert
 */
function printInputErrors( string $input_name ) : void {
    global $errors;

    if ( isset( $errors[ $input_name ] ) === TRUE ) {
        echo '<ul class="form__errors">';
        foreach( $errors[ $input_name ] as $error ) {
            echo "<li class=\"form__error\">{$error}</li>";
        }
        echo '</ul>';
    }
}

// Überprüfen ob das Formular vom Nutzer abgeschickt wurde
if ( $_SERVER[ 'REQUEST_METHOD' ] === 'POST' ) {
    registerUser();
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Formularvalidierung</title>
        <style>
            html, body {
                padding: 0;
                margin: 0;
            }
            body {
                font-family: sans-serif;
            }
            .form__row {
                padding: 12px;
                clear: both;
                overflow: hidden;
            }
            .form__row:nth-child(even) {
                background: #f1f1f1;
            }
            .form__row:nth-child(odd) {
                background: #e1e1e1;
            }
            .form__col {
                width: 50%;
                float: left;
            }
            .form__label {
                font-weight: bold;
            }
            .form__label--inline {
                font-size: 14px;
            }
            .form__errors {
                color: #ff0000;
            }
        </style>
    </head>
    <body>
        <!-- method: POST, damit die Daten nicht über die URL verschickt werden -->
        <form class="form" method="POST">
            <div class="form__row">
                <p class="form__label">Anrede:</p>
                <?php printInputErrors( 'gender' ); ?>
                <input id="gender--female" type="radio" name="gender" value="female">
                <label class="form__label--inline" for="gender--female">Frau</label>
                <input id="gender--male" type="radio" name="gender" value="male">
                <label class="form__label--inline" for="gender--male">Herr</label>
            </div>
            <div class="form__row">
                <label class="form__label" for="email">E-Mail Adresse:</label>
                <?php printInputErrors( 'email' ); ?>
                <input id="email" type="email" name="email">
            </div>
            <div class="form__row">
                <label class="form__label" for="username">Benutzername:</label>
                <?php printInputErrors( 'username' ); ?>
                <input id="username" type="text" name="username">
            </div>
            <div class="form__row">
                <div class="form__col">
                    <label class="form__label" for="password">Passwort:</label>
                    <?php printInputErrors( 'password' ); ?>
                    <input id="password" type="password" name="password">
                </div>
                <div class="form__col">
                    <label class="form__label" for="password_repeat">Passwort wiederholen:</label>
                    <?php printInputErrors( 'password__repeat' ); ?>
                    <input id="password_repeat" type="password" name="password_repeat">
                </div>
            </div>
            <div class="form__row">
                <div class="form__col">
                    <label class="form__label" for="firstname">Vorname:</label>
                    <?php printInputErrors( 'firstname' ); ?>
                    <input id="firstname" type="text" name="firstname">
                </div>
                <div class="form__col">
                    <label class="form__label" for="lastname">Nachname:</label>
                    <?php printInputErrors( 'lastname' ); ?>
                    <input id="lastname" type="text" name="lastname">
                </div>
            </div>
            <div class="form__row">
                <label class="form__label" for="country">Land:</label>
                <?php printInputErrors( 'country' ); ?>
                <select id="country" name="country">
                    <option value="germany">Deutschland</option>
                    <option value="austria">Österreich</option>
                    <option value="swiss">Schweiz</option>
                    <option value="luxembourg">Luxemburg</option>
                </select>
            </div>
            <div class="form__row">
                <input id="terms-and-conditions" name="terms-and-conditions" type="checkbox">
                <label class="form__label--inline" for="terms-and-conditions">Hiermit bestätige ich die AGBs</label>
                <?php printInputErrors( 'terms-and-conditions' ); ?>
            </div>
            <div class="form__row">
                <input type="submit" value="Registrieren!">
            </div>
        </form>
    </body>
</html>
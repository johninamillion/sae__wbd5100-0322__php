<?php

/**
 * Formularfelder validieren und bei einer erfolgreichen Validierung den Nutzer "registrieren" und eine E-Mail verschicken
 *
 * @global  array   $errors     Wir verschaffen uns Zugriff auf die globale Variable $errors
 * @return  bool
 */
function registerUser() : bool {
    global $errors;

    /** @var string|NULL $gender */
    $gender = filter_input( INPUT_POST, 'gender' );
    /** @var string|NULL $email */
    $email = filter_input( INPUT_POST, 'email' );
    /** @var string|NULL $username */
    $username = filter_input( INPUT_POST, 'username' );
    /** @var string|NULL $password */
    $password = filter_input( INPUT_POST, 'password' );
    /** @var string|NULL $password_repeat */
    $password_repeat = filter_input( INPUT_POST, 'password_repeat' );
    /** @var string|NULL $firstname */
    $firstname = filter_input( INPUT_POST, 'firstname' );
    /** @var string|NULL $lastname */
    $lastname = filter_input( INPUT_POST, 'lastname' );
    /** @var string|NULL $counttry */
    $country = filter_input( INPUT_POST, 'country' );
    /** @var string|NULL $terms_conditions */
    $terms_conditions = filter_input( INPUT_POST, 'terms-and-conditions' );

    // Wir speichern uns die Ergebnisse der Validierung in Variablen
    // Dies sorgt dafür das alle Nutzereingaben validiert werden
    /** @var bool $validate_gender */
    $validate_gender = validateGender( $gender, $errors );
    /** @var bool $validate_email */
    $validate_email = validateEmail( $email, $errors );
    /** @var bool $validate_username */
    $validate_username = validateUsername( $username, $errors );
    /** @var bool $validate_password */
    $validate_password = validatePassword( $password, $password_repeat, $errors );
    /** @var bool $validate_firstname */
    $validate_firstname = validateName( 'firstname', $firstname, $errors );
    /** @var bool $validate_lastname */
    $validate_lastname = validateName( 'lastname', $lastname, $errors );
    /** @var bool $validate_country */
    $validate_country = validateCountry( $country, $errors );
    /** @var bool $validate_terms_and_conditions */
    $validate_terms_and_conditions = validateTermsAndConditions( $terms_conditions, $errors );

    if (    $validate_gender
        &&  $validate_email
        &&  $validate_username
        &&  $validate_password
        &&  $validate_firstname
        &&  $validate_lastname
        &&  $validate_country
        &&  $validate_terms_and_conditions
    ) {
        /** @var array $genders */
        $genders = [
            'male'  =>  'Männlich',
            'female'    =>  'Weiblich'
        ];
        /** @var array $countries */
        $countries = [
            'germany'       =>  'Deutschland',
            'austria'       =>  'Österreich',
            'swiss'         =>  'Schweiz',
            'luxembourg'    =>  'Luxemburg'
        ];

        /** @var string $to */
        $to    = $email;
        /** @var string $subject */
        $subject = 'Registrierung erfolreich!';
        /** @var string $mail_body */
        $body  = "Geschlecht: {$genders[ $gender ]}<br>\n";
        $body .= "E-Mail Adresse: {$email}<br>\n";
        $body .= "Nutzername: {$username}<br>\n";
        $body .= "Passwort: {$password}<br>\n";
        $body .= "Vorname: {$firstname}<br>\n";
        $body .= "Nachname: {$lastname}<br>\n";
        $body .= "Land: {$countries[ $country ]}<br>\n";
        $body .= "AGBs bestätigt: Ja<br>\n";
        /** @var bool $mail */
        $mail  = mail( $to, $subject, $body );

        if ( $mail === TRUE ) {
            echo "Alle Eingaben waren valide und die E-Mail wurde erfolgreich verschickt!";
        }
        else {
            echo "Alle Eingaben waren valide, der E-Mail Versand ist fehlgeschlagen! Der Inhalt der E-Mail:<br> \n";
            echo $body;
        }

        exit();
    }

    return FALSE;
}

/**
 * @param   string|NULL $country    Die Nutzerauswahl zum Land
 * @param   array       &$errors    Eine Referenz vom Errors Array
 * @return  bool
 */
function validateCountry( ?string $country, array &$errors ) : bool {
    // Überprüfen ob das ausgewählte Land leer oder NULL ist
    if ( empty( $country ) === TRUE ) {
        $errors[ 'country' ][] = 'Das ausgewählte Land ist leer';
    }
    // Überprüfen ob das ausgewählte Land im Array mit gültigen Werten fehlt
    if ( in_array( $country, [ 'germany', 'austria', 'swiss', 'luxembourg' ] ) === FALSE ) {
        $errors[ 'country' ][] = 'Das ausgewählte Land ist ungültig';
    }

    // Fehlt der Key country im Errors Array
    // || sind keine Werte im Array mit dem Key country vorhanden
    // Dann return wir TRUE, weil das Land valide ist
    return isset( $errors[ 'country' ] ) === FALSE || count( $errors ) === 0;
}


/**
 * @param   string|NULL $email      Die Nutzereingabe zur E-Mail Adresse
 * @param   array       &$errors    Eine Referenz vom Errors Array
 * @return  bool
 */
function validateEmail( ?string $email, array &$errors ) : bool {
    // Überprüfen ob die E-Mail Adresse leer oder NULL ist
    if ( empty( $email ) === TRUE ) {
        $errors[ 'email' ][] = 'Die eingegebene E-Mail Adresse ist leer';
    }
    // Überprüfen ob die E-Mail Adresse nicht dem Muster entspricht
    if ( filter_var( $email, FILTER_VALIDATE_EMAIL ) === FALSE ) {
        $errors[ 'email' ][] = 'Die eingegebene E-Mail Adresse ist invalide';
    }

    // Fehlt der Key email im Errors Array
    // || sind keine Werte im Array mit dem Key email vorhanden
    // Dann return wir TRUE, weil die E-Mail Adresse valide ist
    return isset( $errors[ 'email' ] ) === FALSE || count( $errors[ 'email' ] ) === 0;
}

/**
 * @param   string|NULL $gender     Die Nutzerauswahl zum Geschlecht
 * @param   array       &$errors    Eine Referenz vom Errors Array
 * @return  bool
 */
function validateGender( ?string $gender, array &$errors ) : bool {
    // Überprüfen ob das Geschlecht leer oder NULL ist
    if ( empty( $gender ) === TRUE ) {
        $errors[ 'gender' ][] = 'Das ausgewählte Geschlecht ist leer';
    }
    // Überprüfen ob as Geschlecht im Array mit gültigen Werten fehlt
    if ( in_array( $gender, [ 'female', 'male' ] ) === FALSE ) {
        $errors[ 'gender' ][] = 'Das ausgewählte Geschlecht ist ungültig';
    }

    // Fehlt der Key gender im Errors Array
    // || sind keine Werte im Array mit dem Key gender vorhanden
    // Dann return wir TRUE, weil das Geschlecht valide ist
    return isset( $errors[ 'gender' ] ) === FALSE || count ( $errors[ 'gender' ] ) === 0;
}

/**
 * @param   string      $input_name Der Wert des name Attributes vom input feld, zur Zuweisung von Fehlern
 * @param   string|NULL $name       Die Nutzereingabe zum Name
 * @param   array       &$errors    Eine Referenz vom Errors Array
 * @return  bool
 */
function validateName( string $input_name, ?string $name, array &$errors ) : bool {
    // Überprüfen ob der Name leer oder NULL ist
    if ( empty( $name ) === TRUE ) {
        $errors[ $input_name ][] = 'Der eingegebene Name ist leer';
    }
    // Überprüfen ob der Name kürzer als 3 Zeichen ist
    if ( strlen( $name ) < 3 ) {
        $errors[ $input_name ][] = 'Der eingegebene Name ist kürzer als 3 Zeichen';
    }
    // Überprüfen ob der Name zahlen enthält
    if ( preg_match( '/\d/', $name ) == 1 ) {
        $errors[ $input_name ][] = 'Der eingegebene Name enthält Zahlen';
    }

    // Fehlt der Key $input_name im Errors Array
    // || sind keine Werte im Array mit dem Key $input_name vorhanden
    // Dann return wir TRUE, weil der Name valide ist
    return isset( $errors[ $input_name ] ) === FALSE || count( $errors[$input_name] ) === 0;
}

/**
 * @param   string|NULL $password
 * @param   string|NULL $password_repeat
 * @param   array       $errors
 * @return  bool
 */
function validatePassword( ?string $password, ?string $password_repeat, array &$errors ) : bool {
    // Überprüfen ob das Passwort leer oder Null ist
    if ( empty( $password ) === TRUE ) {
        $errors[ 'password' ][] = 'Das eingegebene Passwort ist leer';
    }
    // Überprüfen ob das Passwort kürzer als 8 Zeichen ist
    if ( strlen( $password ) < 8 ) {
        $errors[ 'password' ][] = 'Das eingegebene Passwort ist kürzer als 8 Zeichen';
    }
    // Überprüfen ob dem Passwort Kleinbuchstaben fehlen
    if ( preg_match( '/[a-z]/', $password ) == 0 ) {
        $errors[ 'password' ][] = 'Das eingegebene Passwort enthält keine Kleinbuchstaben';
    }
    // Überprüfen ob dem Passwort Großbuchstaben fehlen
    if ( preg_match( '/[A-Z]/', $password ) == 0 ) {
        $errors[ 'password' ][] = 'Das eingegebene Passwort enthält keine Großbuchstaben';
    }
    // Überprüfen ob dem Passwort Zahlen fehlen
    if ( preg_match( '/\d/', $password ) == 0 ) {
        $errors[ 'password' ][] = 'Das eingegebene Passwort enthält keine Zahlen';
    }
    // Überprüfen ob dem Passwort Sonderzeichen fehlen
    if ( preg_match( '/\W/', $password ) == 0 ) {
        $errors[ 'password' ][] = 'Das eingegebene Passwort enthält keine Sonderzeichen';
    }
    // Überprüfen ob die Wiederholung vom Passwort nicht mit dem Passwort übereinstimmt
    if ( $password !== $password_repeat ) {
        $errors[ 'password_repeat' ][] = 'Die Wiederholung vom Passwort stimmt nicht mit dem Passwort überein';
    }

    // Fehlt der Key password und password_repeat im Errors Array
    // || sind keine Werte im Array mit dem Key password und password_repeat vorhanden
    // dann return wir TRUE, weil die Passwörter valide sind
    return ( isset( $errors[ 'password' ] ) === FALSE || count( $errors[ 'password' ] ) === 0 )
        && ( isset( $errors[ 'password_repeat' ] ) === FALSE || count( $errors[ 'password_repeat' ] ) === 0 );
}

/**
 * @param   string|NULL $username   Die Nutzereingabe zum Nutzernamen
 * @param   array       &$errors    Eine Referenz vom Errors Array
 * @return  bool
 */
function validateUsername( ?string $username, array &$errors ) : bool {
    // Überprüfen ob der Nutzername leer oder NULL ist
    if ( empty( $username ) === TRUE ) {
        $errors[ 'username' ][] = 'Der eingegebene Nutzername ist leer';
    }
    // Überprüfen ob der Nutzername kürzer als 4 Zeichen ist
    if ( strlen( $username ) < 4 ) {
        $errors[ 'username' ][] = 'Der eingegebene Nutzername ist kürzer als 4 Zeichen';
    }
    // Überprüfen ob der Nutzername länger als 16 Zeichen ist
    if ( strlen( $username ) > 16 ) {
        $errors[ 'username' ][] = 'Der eingegebene Nutzername ist länger als 16 Zeichen';
    }
    // Überprüfen ob der Nutzername whitespace enthält
    if ( preg_match( '/\s/', $username ) === 1 ) {
        $errors[ 'username' ][] = 'Der Nutzername enthält leerzeichen';
    }

    // Fehlt der Key username im Errors Array
    // || sind keine Werte im Array mit dem Key username vorhanden
    // Dann return wir TRUE, weil der Nutzername valide ist
    return isset( $errors[ 'username' ] ) === FALSE || count( $errors[ 'username' ] ) === 0;
}

/**
 * @param   string|NULL $terms_conditions   Die Nutzerauswahl zu den AGBs
 * @param   array       &$errors            Eine Referenz vom Errors Array
 * @return  bool
 */
function validateTermsAndConditions( ?string $terms_conditions, array &$errors ) : bool {
    // Überprüfen ob die AGBs nicht akzeptiert wurden
    if ( $terms_conditions === NULL ) {
        $errors[ 'terms-and-conditions' ][] = 'Die AGBs wurden nicht bestätigt';
    }

    // Fehlt der Key terms-and-conditions im Errors Array
    // || sind keine Werte im Array mit dem Key terms-and-conditions vorhanden
    // Dann return wir TRUE, weil die AGBs bestätigt wurden
    return isset( $errors[ 'terms-and-conditions' ] ) === FALSE || count( $errors[ 'terms-and-conditions' ] ) === 0;
}

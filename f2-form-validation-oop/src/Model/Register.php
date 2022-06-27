<?php

namespace SAE\FormValidation\Model;

use SAE\FormValidation\Data\Countries;
use SAE\FormValidation\Data\Genders;
use SAE\FormValidation\Model;

final class Register extends Model {

    /**
     * @return  void
     */
    public function register() : bool {
        /** @var string|NULL $gender */
        $gender = filter_input( INPUT_POST, 'gender' );
        /** @var string|NULL $firstname */
        $firstname = filter_input( INPUT_POST, 'firstname' );
        /** @var string|NULL $lastname */
        $lastname = filter_input( INPUT_POST, 'lastname' );
        /** @var string|NULL $username */
        $username = filter_input( INPUT_POST, 'username' );
        /** @var string|NULL $email */
        $email = filter_input( INPUT_POST, 'email' );
        /** @var string|NULL $password */
        $password = filter_input( INPUT_POST, 'password' );
        /** @var string|NULL $password_repeat */
        $password_repeat = filter_input( INPUT_POST, 'password_repeat' );
        /** @var string|NULL $country */
        $country = filter_input( INPUT_POST, 'country' );
        /** @var string|NULL $terms_conditions */
        $terms_conditions = filter_input( INPUT_POST, 'terms-and-conditions' );

        // Wir speichern uns die Ergebnisse der Validierung in Variablen
        // Dies sorgt dafür das alle Nutzereingaben validiert werden
        /** @var bool $validate_gender */
        $validate_gender = $this->validateGender( $gender );
        /** @var bool $validate_firstname */
        $validate_firstname = $this->validateName( 'firstname', $firstname );
        /** @var bool $validate_lastname */
        $validate_lastname = $this->validateName( 'lastname', $lastname );
        /** @var bool $validate_username */
        $validate_username = $this->validateUsername( $username );
        /** @var bool $validate_email */
        $validate_email = $this->validateEmail( $email );
        /** @var bool $validate_password */
        $validate_password = $this->validatePassword( $password, $password_repeat );
        /** @var bool $validate_country */
        $validate_country = $this->validateCountry( $country );
        /** @var bool $validate_terms_conditions */
        $validate_terms_conditions = $this->validateTermsAndConditions( $terms_conditions );

        if (    $validate_gender
            &&  $validate_firstname
            &&  $validate_lastname
            &&  $validate_username
            &&  $validate_email
            &&  $validate_password
            &&  $validate_country
            &&  $validate_terms_conditions
        ) {
            /** @var string $query */
            $query = "INSERT INTO users ( username, email, password, firstname, lastname, gender, country ) VALUES ( :username, :email, :password, :firstname, :lastname, :gender, :country );";

            /** @var \PDOStatement $Statement */
            $Statement = $this->Database->prepare( $query );
            $Statement->bindValue( ':username', $username );
            $Statement->bindValue( ':email', $email );
            $Statement->bindValue( ':password', hash( 'sha512', $password ) );
            $Statement->bindValue( ':firstname', $firstname );
            $Statement->bindValue( ':lastname', $lastname );
            $Statement->bindValue( ':gender', $gender );
            $Statement->bindValue( ':country', $country );

            $Statement->execute();

            return $Statement->rowCount() > 0;
        }

        return FALSE;
    }

    private function validateCountry( ?string $country ) : bool {
        // Überprüfen ob das ausgewählte Land leer oder NULL ist
        if ( empty( $country ) === TRUE ) {
            $this->Form->addError( 'country', 'Das ausgewählte Land ist leer' );
        }
        // Überprüfen obn das ausgewählte Land als Key im Array fehlt
        if ( array_key_exists( $country, Countries::ASSOC_ARRAY ) === FALSE ) {
            $this->Form->addError( 'country', 'Das ausgewählte Land ist ungültig' );
        }

        return $this->Form->isValid( 'country' );
    }

    private function validateEmail( ?string $email ) : bool {
        if ( empty( $email ) === TRUE ) {
            $this->Form->addError( 'email', 'Die eingegebene E-Mail Adresse ist leer' );
        }
        if ( filter_var( $email, FILTER_VALIDATE_EMAIL ) === FALSE ) {
            $this->Form->addError( 'email', 'Die eingegebene E-Mail Adresse ist ungültig' );
        }

        return $this->Form->isValid( 'email' );
    }

    private function validateGender( ?string $gender ) : bool {
        if ( empty( $gender ) === TRUE ) {
            $this->Form->addError( 'gender', 'Das ausgewählte Geschlecht ist leer' );
        }
        if ( array_key_exists( $gender, Genders::ASSOC_ARRAY ) === FALSE ) {
            $this->Form->addError( 'gender', 'Das ausgewählte Geschlecht ist ungültig' );
        }

        return $this->Form->isValid( 'gender' );
    }

    private function validateName( ?string $input_name, ?string $name ) : bool {
        if ( empty( $name ) === TRUE ) {
            $this->Form->addError( $input_name, 'Der eingegebene Name ist leer' );
        }
        if ( strlen( $name ) < 3 ) {
            $this->Form->addError( $input_name, 'Der eingegebene Name ist kürzer als 3 Zeichen' );
        }
        if ( preg_match( '/\d/', $name ) == 1 ) {
            $this->Form->addError( $input_name, 'Der eingegebene Name enthält Zahlen' );
        }

        return $this->Form->isValid( $input_name );
    }

    private function validatePassword( ?string $password, ?string $password_repeat ) : bool {
        // Überprüfen ob das Passwort leer oder Null ist
        if ( empty( $password ) === TRUE ) {
            $this->Form->addError( 'password', 'Das eingegebene Passwort ist leer');
        }
        // Überprüfen ob das Passwort kürzer als 8 Zeichen ist
        if ( strlen( $password ) < 8 ) {
            $this->Form->addError( 'password', 'Das eingegebene Passwort ist kürzer als 8 Zeichen');
        }
        // Überprüfen ob dem Passwort Kleinbuchstaben fehlen
        if ( preg_match( '/[a-z]/', $password ) == 0 ) {
            $this->Form->addError( 'password', 'Das eingegebene Passwort enthält keine Kleinbuchstaben');
        }
        // Überprüfen ob dem Passwort Großbuchstaben fehlen
        if ( preg_match( '/[A-Z]/', $password ) == 0 ) {
            $this->Form->addError( 'password', 'Das eingegebene Passwort enthält keine Großbuchstaben');
        }
        // Überprüfen ob dem Passwort Zahlen fehlen
        if ( preg_match( '/\d/', $password ) == 0 ) {
            $this->Form->addError( 'password', 'Das eingegebene Passwort enthält keine Zahlen');
        }
        // Überprüfen ob dem Passwort Sonderzeichen fehlen
        if ( preg_match( '/\W/', $password ) == 0 ) {
            $this->Form->addError( 'password', 'Das eingegebene Passwort enthält keine Sonderzeichen');
        }
        // Überprüfen ob die Wiederholung vom Passwort nicht mit dem Passwort übereinstimmt
        if ( $password !== $password_repeat ) {
            $this->Form->addError( 'password_repeat', 'Die Wiederholung vom Passwort stimmt nicht mit dem Passwort überein');
        }

        return $this->Form->isValid( 'password' ) && $this->Form->isValid( 'password_repeat' );
    }

    private function validateUsername( ?string $username ) : bool {
        // Überprüfen ob der Nutzername leer oder NULL ist
        if ( empty( $username ) === TRUE ) {
            $this->Form->addError( 'username' , 'Der eingegebene Nutzername ist leer');
        }
        // Überprüfen ob der Nutzername kürzer als 4 Zeichen ist
        if ( strlen( $username ) < 4 ) {
            $this->Form->addError( 'username' , 'Der eingegebene Nutzername ist kürzer als 4 Zeichen');
        }
        // Überprüfen ob der Nutzername länger als 16 Zeichen ist
        if ( strlen( $username ) > 16 ) {
            $this->Form->addError( 'username' , 'Der eingegebene Nutzername ist länger als 16 Zeichen');
        }
        // Überprüfen ob der Nutzername whitespace enthält
        if ( preg_match( '/\s/', $username ) === 1 ) {
            $this->Form->addError( 'username' , 'Der Nutzername enthält leerzeichen');
        }

        return $this->Form->isValid( 'username' );
    }

    private function validateTermsAndConditions( ?string $terms_conditions ) : bool {
        if ( empty( $terms_conditions ) === TRUE ) {
            $this->Form->addError( 'terms-and-conditions', 'Die AGBs wurden nicht bestätigt' );
        }

        return $this->Form->isValid( 'terms-and-conditions' );
    }

}

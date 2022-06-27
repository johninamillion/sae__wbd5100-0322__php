<?php

error_reporting( E_ALL );
ini_set( 'display_errors', '1' );

class Car {

    const TIME_TO_MAX_SPEED_TEXT = 'Das Auto braucht %s Sekunden um auf die Höchstgeschwindigkeit zu kommen.';

    private int $maxSpeed = 0;

    private int $accelerate = 0;

    /**
     * Wird ausgeführt/aufgerufen sobald eine Instanz von unserer Klasser erstellt wird
     */
    public function __construct( int $maxSpeed = 250, int $accelerate = 3 ) {
        $this->maxSpeed = $maxSpeed;
        $this->accelerate = $accelerate;
    }

    public function timeToMaxSpeed() : string {

        return sprintf( static::TIME_TO_MAX_SPEED_TEXT, $this->maxSpeed / $this->accelerate );
    }

}

/*
 * ::       statischer Aufruf ohne das eine Instanz besteht (Klassengebunden)
 * ->       aufruf innerhalb einer Instanz (Objektgebunden)
 *
 * $this    innerhalb der eigenen Klassen wenn von einer instanz ausgegangen wird
 * parent   greift auf das Elternelement zu, wenn wir innerhalb von einem erben sind
 * self     greift auf die eigene Klasse zu
 * static   greift auf die eigene Klasse oder Eltern, oder Erben zu
 */
final class Audi extends Car {

    const TIME_TO_MAX_SPEED_TEXT = 'Der Audi braucht ganze %s Sekunden um auf die Höchstgeschwindigkeit zu kommen.';

    public function __construct() {
        parent::__construct( 250, 5 );
    }

}

final class BMW extends Car {

    const TIME_TO_MAX_SPEED_TEXT = 'Der BMW braucht schnelle %s Sekunden um auf die Höchstgeschwindigkeit zu kommen.';

    public function __construct() {
        parent::__construct( 280, 6 );
    }

}

$audi = new Audi();
$bmw = new BMW();
$mercedes = new Car( 220, 4 );

//var_dump( Audi::TIME_TO_MAX_SPEED_TEXT );

var_dump( $audi->timeToMaxSpeed() );
var_dump( $bmw->timeToMaxSpeed() );
var_dump( $mercedes->timeToMaxSpeed() );
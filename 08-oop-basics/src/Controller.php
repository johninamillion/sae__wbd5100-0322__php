<?php

/**
 * abstract     Verhindert das wir eine Klasse Instanziieren können
 */

abstract class Model {

    protected array $errors = [];

    protected function isValid() : bool {

        return count( $this->errors ) === 0;
    }

}

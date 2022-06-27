<?php

namespace SAE\FormValidation;

class Form {

    /**
     * @var     array
     */
    private array $errors = [];

    /**
     * @param   string  $input
     * @param   string  $message
     * @return  void
     */
    public function addError( string $input, string $message ) : void {

        $this->errors[ $input ][] = $message;
    }

    /**
     * @return  array
     */
    public function getErrors() : array {

        return $this->errors;
    }

    /**
     * @param   string  $input
     * @return  bool
     */
    public function isValid( string $input ) : bool {

        return isset( $this->errors[ $input ] ) === FALSE || count( $this->errors[ $input ] ) === 0;
    }

}

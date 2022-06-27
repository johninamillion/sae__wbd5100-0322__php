<?php

namespace SAE\FormValidation;

abstract class Controller {

    const METHOD_GET    = 'GET';
    const METHOD_POST   = 'POST';

    protected ?View $View = NULL;

    /**
     * @access  public
     * @constructor
     */
    public function __construct() {
        $this->View = new View();
    }

    /**
     * Legt fest das Erben dieser Klasse eine öffentliche Funktion mit dem Namen index definieren müssen
     *
     * @return  void
     */
    public abstract function index() : void;

    /**
     * Überprüft ob der Wert im Key REQUEST_METHOD der superglobalen $_SERVER der als Argument übergebenen Methode entspricht
     *
     * @param   string  $method
     * @return  bool
     */
    protected function isMethod( string $method ) : bool {

        return $_SERVER[ 'REQUEST_METHOD' ] === $method;
    }

}

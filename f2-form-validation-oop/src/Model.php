<?php

namespace SAE\FormValidation;

abstract class Model {

    protected ?\PDO $Database = NULL;

    public ?Form $Form = NULL;

    public function __construct() {
        $this->Database = new Database();
        $this->Form = new Form();
    }

}

<?php

namespace SAE\FormValidation;

final class Database extends \PDO {

    public function __construct() {
        /** @var string $dsn */
        $dsn = sprintf(
            '%1$s:host=%2$s;dbname=%3$s;port=%4$s',
            DB_TYPE,
            DB_HOST,
            DB_NAME,
            DB_PORT
        );
        /** @var string $username */
        $username = DB_USER;
        /** @var string $password */
        $password = DB_PASS;

        parent::__construct( $dsn, $username, $password );
    }

}

<?php

namespace CMS\Model\Traits;

trait Password {

    private function hashPassword( string $password ) : string {

        return hash( 'sha512', $password );
    }

}

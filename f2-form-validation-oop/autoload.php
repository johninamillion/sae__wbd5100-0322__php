<?php

namespace SAE\FormValidation;

function autoload( ?string $class ) : void {
    /** @var string $base_to_root_dir */
    $base_to_root_dir = str_replace( 'SAE\\FormValidation', __DIR__ . DIRECTORY_SEPARATOR . 'src', $class );
    /** @var string $backslash_to_dir_separator */
    $backslash_to_dir_separator = str_replace( '\\', DIRECTORY_SEPARATOR, $base_to_root_dir );
    /** @var string $file */
    $file = "{$backslash_to_dir_separator}.php";

    if ( file_exists( $file ) ) {

        require_once $file;
    }
}

spl_autoload_register( __NAMESPACE__ . '\\autoload' );

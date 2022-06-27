<?php

namespace SAE\FormValidation;

class View {

    private array $form_errors = [];

    public function getTemplatePart( ?string $template ) : void {
        /** @var string $template_file */
        $template_file = APP_TEMPLATES_DIR . DIRECTORY_SEPARATOR . "{$template}.php";

        if ( file_exists( $template_file ) ) {
            include $template_file;
        }

    }

    public function addFormErrors( array $errors ) : void {
        $this->form_errors = $errors;
    }

    public function printInputErrors( string $input_name ) : void {
        if ( isset( $this->form_errors[ $input_name ] ) ) {
            echo '<ul class="errors">';
            foreach( $this->form_errors[ $input_name ] as $error ) {
                echo "<li class=\"error\">{$error}</li>";
            }
            echo '</ul>';
        }
    }

}

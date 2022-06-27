<?php

namespace SAE\FormValidation\Controller;

use SAE\FormValidation\Controller;
use SAE\FormValidation\Model\Register as RegisterModel;

final class Register extends Controller {

    /**
     * @return  void
     */
    public function index(): void {
        if ( $this->isMethod( self::METHOD_POST ) ) {
            /** @var RegisterModel $Model */
            $Model = new RegisterModel();

            if ( $Model->register() ) {
                header( 'Location: /login' );
            }
            else {
                $this->View->addFormErrors( $Model->Form->getErrors() );
            }
        }

        $this->View->getTemplatePart( 'register/index' );
    }

}

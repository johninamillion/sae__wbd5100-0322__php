<?php

namespace SAE\FormValidation;

use SAE\FormValidation\Data\Countries;

/** @var View $this */
$this;

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Formularvalidierung Objektorientiert</title>
        <style>
            html, body {
                padding: 0;
                margin: 0;
            }
            body {
                font-family: sans-serif;
            }
            .form__row {
                padding: 12px;
                clear: both;
                overflow: hidden;
            }
            .form__row:nth-child(even) {
                background: #f1f1f1;
            }
            .form__row:nth-child(odd) {
                background: #e1e1e1;
            }
            .form__col {
                width: 50%;
                float: left;
            }
            .form__label {
                font-weight: bold;
            }
            .form__label--inline {
                font-size: 14px;
            }
            .form__errors {
                color: #ff0000;
            }
        </style>
    </head>
    <body>
        <form class="form" method="POST">
            <div class="form__row">
                <p class="form__label">Anrede:</p>
                <?php $this->printInputErrors( 'gender' ); ?>
                <input id="gender--female" type="radio" name="gender" value="female">
                <label class="form__label--inline" for="gender--female">Weiblich</label>
                <input id="gender--male" type="radio" name="gender" value="male">
                <label class="form__label--inline" for="gender--male">Männlich</label>
            </div>
            <div class="form__row">
                <div class="form__col">
                    <label class="form__label" for="firstname">Vorname:</label>
                    <?php $this->printInputErrors( 'firstname' ); ?>
                    <input id="firstname" type="text" name="firstname">
                </div>
                <div class="form__col">
                    <label class="form__label" for="lastname">Nachname:</label>
                    <?php $this->printInputErrors( 'lastname' ); ?>
                    <input id="lastname" type="text" name="lastname">
                </div>
            </div>
            <div class="form__row">
                <div class="form__col">
                    <label class="form__label" for="username">Benutzername:</label>
                    <?php $this->printInputErrors( 'username' ); ?>
                    <input id="username" type="text" name="username">
                </div>
                <div class="form__col">
                    <label class="form__label" for="email">E-Mail Adresse:</label>
                    <?php $this->printInputErrors( 'email' ); ?>
                    <input id="email" type="email" name="email">
                </div>
            </div>
            <div class="form__row">
                <div class="form__col">
                    <label class="form__label" for="password">Passwort:</label>
                    <?php $this->printInputErrors( 'password' ); ?>
                    <input id="password" type="password" name="password">
                </div>
                <div class="form__col">
                    <label class="form__label" for="password_repeat">Passwort wiederholen:</label>
                    <?php $this->printInputErrors( 'password_repeat' ); ?>
                    <input id="password_repeat" type="password" name="password_repeat">
                </div>
            </div>
            <div class="form__row">
                <label class="form__label" for="country">Land:</label>
                <?php $this->printInputErrors( 'country' ); ?>
                <select id="country" name="country">
                    <?php foreach(Countries::ASSOC_ARRAY as $value => $text ): ?>
                        <option value="<?=  $value ?>"><?= $text ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form__row">
                <?php $this->printInputErrors( 'terms-and-conditions' ); ?>
                <input id="terms-and-conditions" name="terms-and-conditions" type="checkbox">
                <label class="form__label--inline" for="terms-and-conditions">Hiermit bestätige ich die AGBs</label>
            </div>
            <div class="form__row">
                <input type="submit" value="Registrieren">
            </div>
        </form>
    </body>
</html>

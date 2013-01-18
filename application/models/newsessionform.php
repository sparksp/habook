<?php

class NewSessionForm extends FormBaseModel\Base {

    public static $rules = array(
        'email'    => 'required|email',
        'password' => 'required',
    );

}

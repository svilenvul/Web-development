<?php

namespace CarRepair\Validation;

class UserValidator extends Validator {

    public $rules = array(
        'UserName' => array('required', 'min:5'),
        'FirstName' => array('required'),
        'FamilyName' => array('required'),
        'Email' => array('email','required'),
        'Age' => array ('required'),
        'Sex' => array('required'),
        'Password' => array('required'),
        'RepearPassword' => array('same:Password'),
        'Question' => 'required',
        'Answer' => 'required' 
    );

}

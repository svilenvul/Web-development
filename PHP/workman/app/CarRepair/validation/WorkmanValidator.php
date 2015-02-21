<?php

namespace CarRepair\Validation;

class WorkmanValidator extends Validator {

    public $rules = array(
        'UserName' => array('required', 'min:5'),
        'FirstName' => array('required'),
        'FamilyName' => array('required'),
        'Email' => array('email','required'),
        'Age' => array ('required'),
        'Sex' => array('required'),
        'Password' => array('required'),
        'Repearpassword' => array('same:password'),
        'Question' => 'required',
        'Answer' => 'required',
        'Profession' => array('required'),
        'Payment' => array('required')        
    );

}


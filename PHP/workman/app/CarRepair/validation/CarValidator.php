<?php

namespace CarRepair\Validation;

class CarValidator extends Validator {

    public $rules = array(
        'model' => array('required',),
        'year' => array('required','numeric'),
        'enginesize' => array('required','numeric'),
        'trademark' => array('required'),
        'owner' =>array('required')
    );

}

<?php

namespace CarRepair\Validation;

class VoteValidator extends Validator {

    public $rules = array(
        'from' => array('required',),
        'to' => array('required'),
        'mark' => array('required','numeric')
    );

}


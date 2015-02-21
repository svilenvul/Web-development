<?php

namespace CarRepair\Validation;

class CommentValidator extends Validator {

    public $rules = array(
        'Text' => array('required',),
        'From' => array('required'),
        'Date' => array('required')
    );

}

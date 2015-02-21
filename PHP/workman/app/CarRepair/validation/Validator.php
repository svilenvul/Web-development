<?php

namespace CarRepair\Validation;

use Illuminate\Validation\Factory as IlluminateValidator;
use CarRepair\Exceptions\ValidationException;

abstract class Validator {

    protected $_validator;

    public function __construct(IlluminateValidator $validator) {
        $this->_validator = $validator;
    }

    public function validate(array $data, array $rules = array(), array $custom_errors = array()) {
        if (empty($rules) && !empty($this->rules) && is_array($this->rules)) {
            $rules = $this->rules;
        }

        $validation = $this->_validator->make($data, $rules, $custom_errors);

        if ($validation->fails()) {
            //validation failed, throw an exception
            throw new ValidationException($validation->messages());
        }

        //all good and shiny
        return true;
    }

}

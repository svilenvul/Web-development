<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
namespace CarRepair\Database\Reprisotories;

use CarRepair\Database\Models\CarInterface as CI;

interface CarInterface extends ReprisotoryInterface {

    public function __construct(CI $car);
    
}

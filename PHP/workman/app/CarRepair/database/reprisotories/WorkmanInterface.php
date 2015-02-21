<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CarRepair\Database\Reprisotories;

use CarRepair\Database\Models\WorkmanInterface as WorkmanModel;

interface WorkmanInterface extends ReprisotoryInterface {
    public function __construct(WorkmanModel $workman);
    public function comments($id);
    public function votes($id);  
    public function user($id);
    public function getAllWithName($name);
}
